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
function updateDB(){
    $link = connect();
    $id = $_POST['id'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $name = $_POST['name'];
    $preview = $_POST['preview'];
    //update
    if ($id != 0){
        $sql = "UPDATE good SET name='$name', price = '$price', description = '$description', preview = '$preview' WHERE id='$id'";
        // Prepare statement
        $stmt = $link->prepare($sql);

        // execute the query
        $stmt->execute();
        echo  $stmt->rowCount() . " запись обновлена успешно!";
    }
    // add new
    else{
        try{
            $link->beginTransaction();
            $link->exec("INSERT INTO good (name, price, description, preview) VALUES('$name', '$price', '$description', '$preview')");
//            $sql = "INSERT INTO good (name, price, description) VALUES (:name, :price, :description) ";
//            $stmt = $link->prepare($sql);
//            $stmt->execute(array(':name' => $name, ':price' => $price, ':description' => $description));
//
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

//function getNameById(){
//    $link = connect();
//    $id = $_POST['id'];
//    $result = $link->query("SELECT name from good where id = '$id' ");
//    $result->setFetchMode(PDO::FETCH_ASSOC);
//    $row = $result->fetch();
//    echo json_encode($row);
//}

function sendEmail(){
    $link = connect();
    $mess = '';
    $mess .= '<h1>Заказ в SoftShop</h1>';
    $mess .= '<p>Почта: '.$_POST['email'].'</p>';
    $mess .= '<p>Имя клиента: '.$_POST['name'].'</p>';
    $mess .= '<p>Фамилия клиента: '.$_POST['l_name'].'</p><br>';

    $cart = $_POST['cart'];
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
    $to .= $_POST['email'];
    $spectext= '<!DOCTYPE html><html><head><title>Заказ</title></head><body>';
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
//    $headers .= 'From: lalgrebra@gmail.com' . "\r\n";

//todo: mail
    $m = mail($to,'Заказ в SoftShop' , $spectext.$mess.'</body></html>', $headers);
    if ($m) {echo 1;} else {echo 0;}
}


