<?

require_once "connect.php";




switch ($_POST['funct']){

    case 'email': {
        $link = connect();
        $col = $link->query("Select id from customer where email = '".$_POST['email']."'");
       // $col->setFetchMode(PDO::FETCH_ASSOC);
        //$row = $col->fetch();
        $i = $col->rowCount();

        if ($i != 0){
            echo 1;
        }
        else {
            echo 0;
        }
        break;
    }
    case 'reg' : {
        $link = connect();
        $username = $_POST['username'];
        $user_l_name = $_POST['l_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT INTO customer (name, l_name, pword, email) VALUES (:name, :l_name, :pword, :email) ";
        $stmt = $link->prepare($sql); //метод prepare выполняет необходимые экранирования.

        $stmt->execute(array(':name' => $username, ':l_name' => $user_l_name, ':pword' => $password, ':email' => $email));
        echo 1;
        break;
    }
}





