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
    case "getNameById": {
        getNameById();
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
//    itemId = idGood,// ID товара 0
//                itemSize = size, // размер 1
//                itemCount = count_product , // количество товара 2
//                itemPrice
//      name =   idGood+size;
//    cartData[itemName] = [itemId, itemSize, itemCount, itemPrice];
function getNameById(){
    $link = connect();
    $id = $_POST['id'];
    $result = $link->query("SELECT name from good where id = '$id' ");
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row = $result->fetch();
    echo json_encode($row);
}