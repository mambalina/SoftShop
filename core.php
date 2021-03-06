

<?php
$action = $_POST['action'];
require_once ('connect.php');
switch ($action){
    case "addToBasket": {
        addToBasket();
        break;
    }
    case "showBasket": {
        showBasket();
        break;
    }
    case "init": {
        init();
        break;
    }
    case "sendEmail": {
        sendEmail();
        break;
    }
    case "selectOneGood": {
        selectOneGood();
        break;
    }
    case "updateDB": {
        updateDB();
        break;
    }
    case "selectSizes": {
        selectSizes();
        break;
    }
    case "selectOneProvider": {
        selectOneProvider();
        break;
    }
    case "selectProviders": {
        selectProviders();
        break;
    }
    case "selectPhotos": {
        selectPhotos();
        break;
    }
    case "selectCategories": {
        selectCategories();
        break;
    }
    case "selectAllCategories": {
        selectAllCategories();
        break;
    }
    case "selectMaterials": {
        selectMaterials();
        break;
    }
    case "selectAllMaterials": {
        selectAllMaterials();
        break;
    }
    case "selectAllSizes": {
        selectAllSizes();
        break;
    }
    case "filtrBy": {
        filtrBy();
        break;
    }
    case "sortBy": {
        sortBy();
        break;
    }
    case "selectAllGoods": {
        selectAllGoods();
        break;
    }
    case "deleteGood": {
        deleteGood();
        break;
    }
    case "addNewOrder": {
        addNewOrder();
        break;
    }
    case "selectCurrentOrder": {
        selectCurrentOrder();
        break;
    }
    case "selectClosedOrders": {
        selectClosedOrders();
        break;
    }
}
function selectAllGoods()
{
    $link = connect();
//    if(isset($_POST['gen'])){
        if ($_POST['gen'] == 'm'){
            $STH = $link->query('Select id, preview, name, price from good where gender = "м"');
            $STH->setFetchMode(PDO::FETCH_ASSOC);
            $i = 0;
            $arr = [];
            # выводим результат
            while($row = $STH->fetch()) {
                $arr[] = $row;
                $i++;
            }
            echo json_encode($arr);
        }
        else{
            if ($_POST['gen'] == 'w'){
                $STH = $link->query('Select id, preview, name, price from good where gender = "ж"');
                $STH->setFetchMode(PDO::FETCH_ASSOC);
                $i = 0;
                $arr = [];
                # выводим результат
                while($row = $STH->fetch()) {
                    $arr[] = $row;
                    $i++;
                }
                echo json_encode($arr);
            }
            else{
                $STH = $link->query('Select id, preview, name, price from good');
                $STH->setFetchMode(PDO::FETCH_ASSOC);
                $arr = [];
                # выводим результат
                while($row = $STH->fetch()) {
                    $arr[] = $row;
                }
                echo json_encode($arr);
            }
        }
//    }

}
function sortBy()
{
    $sort = $_POST['type'];
    $link = connect();
//    $STH = $link->query('Select id, preview, name, price from good');
    switch ($sort){
        case 'price-asc': {
            $STH = $link->query('Select id, preview, name, price from good order by price');
            break;
        }
        case 'price-desc': {
            $STH = $link->query('Select id, preview, name, price from good order by price desc');
            break;
        }
        case 'without': {
            $STH = $link->query('Select id, preview, name, price from good');
            break;
        }
        case 'name': {
            $STH = $link->query('Select id, preview, name, price from good order by name');
            break;
        }
    }

    $STH->setFetchMode(PDO::FETCH_ASSOC);
    $arr = [];
    while($row = $STH->fetch()) {
        $arr[] = $row;
    }
    echo json_encode($arr);
}
function deleteGood()
{
    //todo: delete ITEM
//    $link = connect();
//    $link->beginTransaction();
//    $sql = "Delere from good where id=".$_POST['id']."";
//    $STH = $link->prepare($sql);
//    $STH->execute();
//    $sql = "Delere from good_material where good_id=".$_POST['id']."";
//    $STH = $link->prepare($sql);
//    $STH->execute();
//    $sql = "Delere from good_category where good_id=".$_POST['id']."";
//    $STH = $link->prepare($sql);
//    $STH->execute();
//    $sql = "Delere from photo where good_id=".$_POST['id']."";
//    $STH = $link->prepare($sql);
//    $STH->execute();
}
function filtrBy()
{
    $filtrBy = json_decode($_POST['filtr']);

    $link = connect();
//    $last = array_shift($filtrBy);
//    $last = array_pop($filtrBy);
    $filtration = implode(',', $filtrBy);
    $sql = "Select distinct id, preview, name, price from good, good_category where category_id IN ($filtration) and good.id=good_category.good_id";

    $STH = $link->query($sql);
    $STH->setFetchMode(PDO::FETCH_ASSOC);
    $arr = [];
    while($row = $STH->fetch()) {
        $arr[] = $row;
    }
    echo json_encode($arr);
}
function selectCurrentOrder() {
    $email = $_POST['email'];
    $link = connect();
    $sql = "Select good.id, preview, good.name, price, purchase_state, quantity, size_name from good, orders, purchase, customer, state, provider, shoesize where orders.id_ord = purchase.order_id and orders.customer_id = (select id from customer where email = '$email') and orders.status_id not in (select id from state where purchase_state = \"Закрыт\") and purchase.good_id = good.id and purchase.size_id = shoesize.id and good.provider_id=provider.id and orders.status_id = state.id GROUP by good.name";
    $STH = $link->query($sql);
    $STH->setFetchMode(PDO::FETCH_ASSOC);
    $arr = [];
    while($row = $STH->fetch()) {
        $arr[] = $row;
    }
    echo json_encode($arr);
}
function selectClosedOrders() {
    $email = $_POST['email'];
    $link = connect();
    $sql = "Select good.id, preview, good.name, price, purchase_state, quantity, size_name from good, orders, purchase, customer, state, provider, shoesize where orders.id_ord = purchase.order_id and orders.customer_id = (select id from customer where email = '$email') and orders.status_id = (select id from state where purchase_state = \"Закрыт\") and purchase.good_id = good.id and purchase.size_id = shoesize.id and good.provider_id=provider.id and orders.status_id = state.id GROUP by good.name";
    $STH = $link->query($sql);
    $STH->setFetchMode(PDO::FETCH_ASSOC);
    $arr = [];
    while($row = $STH->fetch()) {
        $arr[] = $row;
    }
    echo json_encode($arr);
}
//function filtrBy()
//{
////    шото непонятное
//    $filtrBy = $_POST['filtrBy'];
//    $link = connect();
//    $last = array_pop($filtrBy);
//    $filtration = implode(',', $filtrBy);
//
//    if (count($filtrBy) == 1){
//        $sql = "Select distinct id, preview, name, price from good, good_category where category_id IN ($filtration) and good.id=good_category.good_id";
//        $STH = $link->query($sql);
//        $STH->setFetchMode(PDO::FETCH_ASSOC);
//        $arr = [];
//        while($row = $STH->fetch()) {
//            $arr[] = $row;
//        }
//        echo json_encode($arr);
//    }
//    else {
//        $f = "";
//
//        for ($i = 0; $i < count($filtrBy); $i++) {
//            if ($i == 0) {
//                $f = "Select distinct id, preview, name, price from good, good_category where category_id = $filtrBy[$i]  and good.id=good_category.good_id";
//
//            }
//            else {
//                $sql = "Select distinct id, preview, name, price from ($f) where category_id =$filtrBy[$i] and good.id=good_category.good_id";
//                $f = $sql;
//            }
//        }
//        $STH = $link->query('$f');
//        $STH->setFetchMode(PDO::FETCH_ASSOC);
//        $arr = [];
//        while($row = $STH->fetch()) {
//            $arr[] = $row;
//        }
//        echo json_encode($arr);
//    }
//}

function addNewOrder() {
    $link = connect();

    if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['l_name']) ) {
        $email =$_POST['email'];
        $name = $_POST['name'];
        $l_name = $_POST['l_name'];
    }
    else {
        $email = $_COOKIE['login'];
        $name = $_COOKIE['name'];
        $l_name = $_COOKIE['l_name'];
    }
    $cart = $_POST['cart'];
    // взять остальные переменные для выполнения запроса
    try{
        $link->beginTransaction();
        // проверка на наличие такого пользователя в БД
        $sql = $link->query("SELECT COUNT(*) AS 'count' FROM customer WHERE email = '$email'");
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $row=$sql->fetch();
        $r = $row['count'];

        if ( $r > 0){
            // такой пользователь есть

            $res = $link->query("SELECT id FROM customer WHERE email = '$email'");
            $res->setFetchMode(PDO::FETCH_ASSOC);
            $r = $res->fetch();
            $customer_id = $r['id'];
        }
        else{
            // такого пользователя нет, работает
            $qwry = "INSERT INTO customer (name, l_name, email) VALUES (:name, :l_name, :email)";
            $res = $link->prepare($qwry);
            $res->execute(array(':name'=> $name, ':l_name'=> $l_name, ':email'=> $email));
            $customer_id = $link->lastInsertId();
        }

        $s_id = $link->query("SELECT id FROM state WHERE purchase_state = 'Сделан заказ' ");
        $s_id->setFetchMode(PDO::FETCH_ASSOC);
        $stat_id = $s_id->fetch();
        $status_id = $stat_id['id'];

        // вставляем в таблицу с заказами, фиксируем заказ, так сказать
        $sql = "INSERT INTO orders (customer_id, status_id) VALUES (:customer_id, :status_id)";
        $res = $link->prepare($sql);
        $res->execute(array(':customer_id'=> $customer_id,  ':status_id' => $status_id ));

        // вставляем в таблицу, которая хранит данные о заказе одного товара, для того, чтобы внести несколько товаров в один чек
        $order_id = $link->lastInsertId();
        echo ($order_id);
        //тут нужно делать в цикле, считываю id товара, размер и количество из cart
        foreach ($cart as $key=>$value){
            if (strripos($key, '+')){
                $res = explode('+',$key);
                $size = $res[1];
                $idProduct = $res[0];
                $sql = $link->query("SELECT id FROM shoesize WHERE size_name = '$size' ");
                $sql->setFetchMode(PDO::FETCH_ASSOC);
                $sze_id=$sql->fetch();
                $size_id = $sze_id['id'];
                // обновляем общее количество
                $amt = $cart[$key][2];
                $sql = "UPDATE avalibility SET amount = amount-('$amt') WHERE amount>0 and good_id='$idProduct' and size_id ='$size_id' ";
                $stmt = $link->prepare($sql);
                $stmt->execute();

                // таблица с одним товаром
                $sql = "INSERT INTO purchase (good_id, order_id, size_id, quantity) VALUES (:good_id, :order_id, :size_id, :amount)";
                $res = $link->prepare($sql);
                $res->execute(array(':good_id'=> $idProduct, ':order_id' => $order_id, ':size_id' => $size_id,':amount' => $amt ));
            }
        }

        $link->commit();
    }
    catch (PDOExeption $e){
        $link->rollback();
        echo "Error: " . $e->getMessage();
    }
}

function addToBasket()
{
    $link = connect();
    $size = $_POST['size'];
    $good_id = $_POST['good_id'];
    $result = $link->query("SELECT DISTINCT amount, good.name from avalibility, good, shoesize where avalibility.good_id = good.id and shoesize.id = avalibility.size_id  and shoesize.size_name='$size' and good.id = '$good_id' ");
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row = $result->fetch();
    echo json_encode($row);
}
function showBasket(){
    $link = connect();
    $result = $link->query("SELECT good_id, name, price, src from good, photo where good.id = photo.good_id GROUP BY good.name");
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $res = array();
    $i = 1;
    while($row = $result->fetch()){
        $res[$i]['id'] = $row['good_id'];
        $res[$i]['name'] = $row['name'];
        $res[$i]['price'] = $row['price'];
        $res[$i]['src'] = $row['src'];
        $i++;
    }
    echo json_encode($res);
}
function init(){
    $link = connect();
    $result = $link->query("select id,name from good");
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $out = array();
    while ($row = $result->fetch()){
        $out[$row["id"]] = $row;
    }
    echo json_encode($out);
}
function selectOneGood(){
    $link = connect();
    $id = $_POST['id'];
    $result = $link->query("select * from good where id = '$id'");
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $out = array();
    while ($row = $result->fetch()){
        $out[$row["id"]] = $row;
    }
    echo json_encode($out);
}
function selectSizes(){
    $link = connect();
    $id = $_POST['id'];
    $result = $link->query("SELECT  size_name, size_id, amount from good, avalibility, shoesize where avalibility.good_id = good.id and size_id=shoesize.id and amount>0 and good.id='$id' ORDER BY shoesize.id");
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $out = array();
    while ($row = $result->fetch()){
        $out[$row['size_id']] = $row;
    }
    echo json_encode($out);
}
function selectOneProvider(){
    $link = connect();
    $id = $_POST['id'];
    $result = $link->query("SELECT provider.name, provider.id from  provider, good where good.id='$id' and good.provider_id = provider.id");
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row = $result->fetch();
    echo json_encode($row);
}
function selectProviders(){
    $link = connect();
    $result = $link->query("SELECT id, name from provider");
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $out = array();
    while ($row = $result->fetch()){
        $out[$row['id']] = $row;
    }
    echo json_encode($out);
}
function selectPhotos(){
    $link = connect();
    $id = $_POST['id'];
    $result = $link->query("SELECT id, src from photo where good_id='$id' group by src");
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $out = array();
    while ($row = $result->fetch()){
        $out[$row['id']] = $row;
    }
    echo json_encode($out);
}
function selectCategories(){
    $link = connect();
    $id = $_POST['id'];
    $result = $link->query("SELECT id,name from category, good_category where good_category.good_id='$id' and good_category.category_id = category.id");
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $out = array();
    while ($row = $result->fetch()){
        $out[$row['id']] = $row;
    }
    echo json_encode($out);
}
function selectAllCategories(){
    $link = connect();
    $result = $link->query("SELECT id,name from category ");
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $out = array();
    while ($row = $result->fetch()){
        $out[$row['id']] = $row;
    }
    echo json_encode($out);
}
function selectMaterials(){
    $link = connect();
    $id = $_POST['id'];
    $result = $link->query("SELECT id,name from material, good_material where good_material.good_id='$id' and good_material.material_id = material.id");
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $out = array();
    while ($row = $result->fetch()){
        $out[$row['id']] = $row;
    }
    echo json_encode($out);
}
function selectAllMaterials(){
    $link = connect();
    $result = $link->query("SELECT id,name from material");
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $out = array();
    while ($row = $result->fetch()){
        $out[$row['id']] = $row;
    }
    echo json_encode($out);
}
function selectAllSizes(){
    $link = connect();
    $result = $link->query("SELECT id,size_name from shoesize");
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $out = array();
    while ($row = $result->fetch()){
        $out[$row['id']] = $row;
    }
    echo json_encode($out);
}
function updateDB(){
    $link = connect();
    $id = $_POST['id'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $name = $_POST['name'];
    $preview = $_POST['preview'];
    $gender = $_POST['gender'];
    $provider = $_POST['provider'];
    $sizes = $_POST['size'];
    $photo = $_POST['photo'];
    //update
    if ($id != 0){
        //todo: обновление таблицы good
        $sql = "UPDATE good SET name='$name', price = '$price', description = '$description', preview = '$preview', gender = '$gender', provider_id='$provider' WHERE id='$id'";
        $stmt = $link->prepare($sql);
        $stmt->execute();
//todo: обновление таблицы avalibility, обновление количества размера(ов)
        foreach ($sizes as $key => $value){
            foreach ($value as $size=>$amt){
                if ($size == 0){
                    $size_amount = $amt;
                }
                else{
                    $sql = "UPDATE avalibility SET amount = '$size_amount' WHERE good_id='$id' and size_id='$amt'";
                    $stmt = $link->prepare($sql);
                    $stmt->execute();
                }
            }
        }
        $result = $link->query("select id from photo where good_id = '$id'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $id_ph = array();
        $i = 0;
        while ($row = $result->fetch()){
            $id_ph[$i] = $row['id'];
            $i++;
        }
        $i = 0;
        $sql = "UPDATE photo SET src = :src WHERE good_id = :g_id and id = :id";
        $stmt = $link->prepare($sql);
        foreach ($photo as $src){
            $stmt->execute(array(':src' => $src, ':g_id' => $id, ':id' => $id_ph[$i]));
            $i++;
        }

    }
    // add new
    else{
        try{
            $link->beginTransaction();
            $sql = "INSERT INTO good (name, price, description, preview, gender, provider_id) VALUES (:name, :price, :description, :preview, :gender, :provider_id)";
            $stmt = $link->prepare($sql);
            $stmt->execute(array(':name' => $name, ':price' => $price, ':description' => $description, ':preview' => $preview, ':gender' => $gender, ':provider_id' => $provider));
            $id = $link->lastInsertId();
            $category = $_POST['category'];
            $material = $_POST['material'];
            $size = $_POST['size'];
            $amt = $_POST['amt'];

            $sql = "INSERT INTO good_material (good_id, material_id) VALUES (:good_id, :material_id)";
            $stmt = $link->prepare($sql);
            foreach ($material as $mat){
                $stmt->execute(array(':good_id' => $id, ':material_id' => $mat));
            }
            $sql = "INSERT INTO good_category (good_id, category_id) VALUES (:good_id, :category_id)";
            $stmt = $link->prepare($sql);
            foreach ($category as $cat){
                $stmt->execute(array(':good_id' => $id, ':category_id' => $cat));
            }
            $sql = "INSERT INTO avalibility (good_id, size_id, amount) VALUES (:good_id, :size_id, :amt)";
            $stmt = $link->prepare($sql);
            $stmt->execute(array(':good_id' => $id, ':size_id' => $size, ':amt' => $amt));
            $sql = "INSERT INTO photo (good_id, src) VALUES (:good_id, :src)";
            $stmt = $link->prepare($sql);
            foreach ($photo as $src){
                $stmt->execute(array(':good_id' => $id, ':src' => $src));
            }

            $link->commit();
            echo "New records created successfully";
        }
        catch (PDOException $e)
        {
            // roll back the transaction if something failed
            $link->rollback();
            echo "Error: " . $e->getMessage();
        }
    }
}

function sendEmail(){
    $link = connect();
    if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['l_name']) ) {
        $email =$_POST['email'];
        $name = $_POST['name'];
        $l_name = $_POST['l_name'];
    }
    else {
        $email = $_COOKIE['login'];
        $name = $_COOKIE['name'];
        $l_name = $_COOKIE['l_name'];
    }
    $cart = $_POST['cart'];
    $mess = '';
    $mess .= '<h1>Заказ в SoftShop № '.$_POST['id'].'</h1>';
    $mess .= '<p>Почта: '.$email.'</p>';
    $mess .= '<p>Имя клиента: '.$name.'</p>';
    $mess .= '<p>Фамилия клиента: '.$l_name.'</p><br>';

//    $me$mess .= '<p>Почта: '.$_POST['email'].'</p>';
//    $mess .= '<p>Имя клиента: '.$_POST['name'].'</p>';
//    $mess .= '<p>Фамилия клиента: '.$_POST['l_name'].'</p><br>';
//    $cart = $_POST['cart'];
    $sum = 0;
    foreach ($cart as $key=>$value){
        if (strripos($key, '+')){
            $res = explode('+',$key);
            $size = $res[1];
            $idProduct = $res[0];
            $result = $link->query("select name, price from good where id = '$idProduct'");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $row = $result->fetch();
            $mess .= $row['name'];
            $mess .= '<p>Размер: '.$size.'</p>';
            $mess .= '<p>Количество: '.$cart[$key][2].'</p>';
            //подсчёт итоговой суммы
            $sum += $cart[$key][2]*$row['price'];
            $mess .= '<p>Цена: '.$cart[$key][2]*$row['price'].'</p>';
            $mess .= '<br>';
        }
    }
    $mess .= '<p><b>Всего: '.$sum.' гривен</b></p>';
//    print_r($mess);
    $to = 'mambalina0501@gmail.com'.',';
    $to .= $email;
    $spectext= '<!DOCTYPE html><html><head><title>Заказ</title></head><body>';
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
//    $headers .= 'From: lalgrebra@gmail.com' . "\r\n";
//todo: mail
    $m = mail($to,'Заказ в SoftShop' , $spectext.$mess.'</body></html>', $headers);
    if ($m) {echo 1;} else {echo 0;}
}
