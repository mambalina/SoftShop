<?php
$link = mysqli_connect("localhost", "root", "", "shop");

if($_POST['login'] && $_POST['pass']){
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $sql = "SELECT name, l_name FROM customer WHERE email = '$login' AND pword = '$pass'";
    $result = mysqli_query($link, $sql);
    if(mysqli_num_rows($result) == 0) {
		 header("Location: signin.php");
    } 
	else {
		setcookie("login", $login, time()+300);
		setcookie("password", $pass, time()+300);
        $res = mysqli_fetch_array($result);
        $name = $res['name'];
        $l_name = $res['l_name'];
        setcookie('name', $name, time()+300);
        setcookie('l_name', $l_name, time()+300);
        header("Location: account.php");
    }

}

		//Вроде работает, но только если в запросе стоят все поля
        //
//            echo $res['userid'];
//            echo $res['username'];
//            echo $res['l_name'];
//            echo $res['adress'];
//            echo $res['phone'];
//            echo $res['email'];
//            echo $res['pword'];
//            echo $res['birth'];


//		$row = mysqli_fetch_assoc($result);
//        while ($res = mysqli_fetch_assoc($result)) {
//            printf ("%s (%s)\n", $res['login'], $res['pass']);
//        }

