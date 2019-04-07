<?php
session_start();
require_once('connect.php');

//
function addToBasket(){
    $link = connect();
    $size = $_POST('size');
    $id = $_POST('good_id');
# создаем запрос
    $result = $link->query("SELECT amount from avalibility, good, shoesize where avalibility.good_id = good.id and shoesize.id = avalibility.size_id  and shoesize.size_name='$size' and good.id = '$id' ");

# выбираем режим выборки

    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row = $result->fetch();
    echo $row['amount'];
    if ($row['amount']< $_POST['count_product'] ){
        echo "Слишком большое количество!";
    }

//        $_SESSION['shop'] [] = array(
//            "good_id"=> $_POST['good_id'],
//            "count_product"=> $_POST['count_product'],
//            "size"=> $_POST['size'],
//            "price" => $_POST['price']);


}



