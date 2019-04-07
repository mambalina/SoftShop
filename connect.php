<?php
function connect (){
    $dsn = "mysql:host=localhost;dbname=shop";
    return new PDO($dsn, 'root' , '');
}

