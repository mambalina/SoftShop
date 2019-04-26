function addNewOrder() {
  $link = connect();
  $email = $_POST['email'];
  $name = $_POST['name'];
  $l_name = $_POST['l_name'];
  $cart = $_POST['cart'];
  // взять остальные переменные для выполнения запроса
  try{
    $link->beginTransaction();
    // проверка на наличие такого пользователя в БД
    $sql = $link->query("SELECT COUNT(*) AS 'count' FROM customer WHERE email = '$email'");
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    if ($row=$sql->fetch() > 0){
        // такой пользователь есть
        $res = $link->query("SELECT id FROM customer WHERE email = '$email'");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $customer_id = $res->fetch();
    }
    else{
      // такого пользователя нет
      $qwry = "INSERT INTO customer (name, l_name, email) VALUES ($name, $l_name, $email)";
      $customer_id = $link->lastInsertId();
    }
    
   
    $s_id = $link->query("SELECT id FROM status WHERE purchase_state = 'Сделан заказ' ");
    $s_id->setFetchMode(PDO::FETCH_ASSOC);
    $status_id = $s_id->fetch();
    
    // вставляем в таблицу с заказами, фиксируем заказ, так сказать
    $sql = "INSERT INTO orders (customer_id, order_date, status_id) VALUES (:customer_id, :order_date, :status_id)";
    $res = $link->prepare($sql);
    $res->execute(array(':customer_id'=> $customer_id, ':order_date' => GETDATE(), ':status_id' => $status_id ));
    
    // вставляем в таблицу, которая хранит данные о заказе одного товара, для того, чтобы внести несколько товаров в один чек
    $order_id = $link->lastInsertId();
    
    //тут нужно делать в цикле, считываю id товара, размер и количество из cart
     foreach ($cart as $key=>$value){
        if (strripos($key, '+')){
            $res = explode('+',$key);
            $size = $res[1];
            $idProduct = $res[0];
            
            $sql = $link->query("SELECT id FROM shoesize WHERE size_name = '$size'");
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $size_id=$sql->fetch();
            
            // обновляем общее количество
            $sql = "UPDATE avalibility SET amount = amount-($cart[$key][2]) WHERE amount>0 and good_id='$idProduct' and size_id ='.$size_id.' ";
            $stmt = $link->prepare($sql);
            $stmt->execute();
            
            // таблица с одним товаром
            $sql = "INSERT INTO purchase (good_id, order_id, amount) VALUES (:good_id, :order_id, :amount)";
            $res = $link->prepare($sql);
            $res->execute(array(':good_id'=> $idProduct, ':order_id' => $order_id, ':amount' => $cart[$key][2] ));
            
        }
     }
    
     $link->commit();
  }
  catch (PDOExeption $e){
    $link->rollback();
    echo "Error: " . $e->getMessage();
  }
}
