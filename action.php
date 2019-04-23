<?php
$link = mysqli_connect("localhost", "root", "", "shop");

if($_POST['login'] && $_POST['pass']){
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    $sql = "SELECT name, l_name FROM customer WHERE email = '$login' AND pword = '$pass'";
    $result = mysqli_query($link, $sql);
    if(mysqli_num_rows($result) == 0) {
        if ($login == "administrator@adm.in" and $pass = "qwqwqw"){
            header("Location: admin.php");
        }
        else {
		 header("Location: signin.php");
        }
    } 
	else {
	    setcookie("login", $login, time() + 300);
	    setcookie("password", $pass, time() + 300);
	    $res = mysqli_fetch_array($result);
	    $name = $res['name'];
	    $l_name = $res['l_name'];
	    setcookie('name', $name, time() + 300);
	    setcookie('l_name', $l_name, time() + 300);
	    header("Location: account.php");
    }
}
