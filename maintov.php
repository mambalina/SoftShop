<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Товары</title>
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link rel="stylesheet" href="font/stylesheet.css">
    <link rel="stylesheet" href="css/maintov.css">
    <link rel="stylesheet" href="css/sign.css">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Prata" rel="stylesheet">
    <link rel="stylesheet" href="css/acc.css">
</head>
<body>

<div class="top-block" id="top">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">

            <a class="navbar-brand" href="index.php"><img src="img/logo.png" class = "logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0 main-menu">
                    <li class="nav-item active" >
                        <?php
                        if ($_COOKIE['login']){
                            //Выводим меню загегистрированного
                            echo "<a class=\"nav-link\" href=\"account.php\">";
                            echo  $_COOKIE['name'] . ' ' . $_COOKIE['l_name'] . " <span class=\"sr-only\">(current)</span></a>
                        <ul class=\"sub-menu-acc sub-menu\">
                            <li><a href=\"#\">Мои заказы</a></li>
                            <li><a href=\"\">Избранное</a></li>
                            <li><a href=\"#\">Мои данные</a></li>
                            <li><a href=\"#\">Выход</a></li>
                        </ul>
                    </li>";}
                        else{
                            //Выводим меню гостя
                            echo "<a class=\"nav-link\" href=\"#\" id = \"login\">Вход</a>
                        <!--ФООРМА АВТОРИЗАЦИИ-->
                        <ul class=\" sub-menu\">
                            <form action=\"action.php\"  method=\"post\">
                                <li>Здравствуйте!</li>
                                <li><input type=\"email\" placeholder=\"E-mail\" name=\"login\"  required></li>
                                <li><input type=\"password\" placeholder=\"Пароль\" name=\"pass\" required></li>
                                <li><input type=\"submit\" value=\"Войти\" class=\"btn fbtn\"></li>
                            </form>
                        </ul>
                    </li>
                    <li class=\"nav-item\"><a class=\"nav-link\" href=\"signin.php\">Регистрация</a></li>";}
                        ?>

                    <li class="nav-item"><a href="#" style="opacity: 0.9" onclick='checkRegistration()'><img src="img/heart.png" class="bag" alt=""></a></li>
                    <li class="nav-item"><a href="basket.php" style="opacity: 0.9"><img src="img/bag.png" class="bag" alt=""></a></li>
                </ul>
            </div>
        </nav>

        <div class="col-md-6 col-lg-6 col-xl-6 mx-auto mt-3 wht"></div>
    </div>
</div>


    <div id="menu">
        <ul>
            <li><a href="maintov.php?gender=w">Женская</a></li>
            <li><a href="maintov.php?gender=m">Мужская</a></li>
            <li><a href="maintov.php">Вся обувь</a></li>
        </ul>
    </div>

<div class="container bg">
    <div class="insideDiv" id = "divtov">
        <h2>Вся обувь</h2>
<!-- фильтр -->
        <div class="btn-group" role="group">
             <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Сортировка
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
<!--                <a class="dropdown-item active" href="#">Без фильтра</a>-->
                <a class="dropdown-item" href="" id = "without">Без сортировки</a>
                <a class="dropdown-item" href="" id = "price-asc">По возрастанию цены</a>
                <a class="dropdown-item" href="" id = "price-desc">По убыванию цены</a>
                <a class="dropdown-item" href="" id = "name">От А до Я</a>
            </div>
        </div>
<style>
    input[type = 'checkbox'] {
        position: absolute;
        left: -9999px;
    }
    label {
        display: inline-block;
        margin: 0 5px 0 -1px;
        padding: 8px 10px;
        border: 1px solid #BBBBBB;
        /*background: linear-gradient(to bottom,  rgba(255,255,255,1) 0%,rgba(229,229,229,1) 100%);*/
        box-shadow: 0 2px 5px rgba(0, 0, 0, .12);
        cursor: pointer;
        border-radius: 0;

    }
    input[type = 'checkbox']:checked + label {
        background: #f44336cf;
        color: #fff;
        /*background: white;*/
        /*box-shadow: inset 0 3px 6px rgba(0, 0, 0, .2);*/
    }
    div:first-child label {
        margin-left: 0;

    }
</style>
        <div class="filtr">
            <h6>Фильтрация товаров</h6>
            <?php
            require_once('connect.php');
            $link = connect();
            $STH = $link->query('Select id, name from category');
            $STH->setFetchMode(PDO::FETCH_ASSOC);
            while($row = $STH->fetch()) {
                echo "<input type=\"checkbox\" id='".$row['id']."'
                    value=".$row['name']." >";
                echo "<label for='".$row['id']."'>".$row['name']."</label>";
            }
            echo "<input type=\"button\" value='Применить' id = 'filtr' >";
            ?>
        </div>

    </div>
    <div class="all-cards"></div>
<!--            --><?php
//            require_once('connect.php');
//            $sort = $_GET['sort'];
//            $filtrBy = $_GET['filtrBy'];
//
//            $link = connect();
//            $STH = $link->query('Select id, preview, name, price from good');
//            # создаем запрос
//            switch ($sort){
//
//                case 'price-asc': {
//                    $STH = $link->query('Select id, preview, name, price from good order by price');
//                    break;
//                }
//                case 'price-desc': {
//                    $STH = $link->query('Select id, preview, name, price from good order by price desc');
//                    break;
//                }
//                case 'without': {
//                    $STH = $link->query('Select id, preview, name, price from good');
//                    break;
//                }
//                case 'name': {
//                    $STH = $link->query('Select id, preview, name, price from good order by name');
//                    break;
//                }
//
//            }
//
//
//            # выбираем режим выборки
//            $STH->setFetchMode(PDO::FETCH_ASSOC);
//            $i = 1;
//            # выводим результат
//            while($row = $STH->fetch()) {
//
//                switch ($i){
//                    case 1:{
//                        echo "<div class=\"all-cards\">
//<div class=\"cards\"><div class=\"col-md-4 col-lg-4 col-xl-4 mx-auto mt-3\">
//                <div class=\"card\">
//                    <img src=\"img/" .$row['preview'] ."\" class=\"card-img-top\" alt=\"...\">
//                    <div class=\"card-body\">
//                        <p class=\"card-text\"> " .$row['name'] ." </p>
//                        <p class=\"card-text money\">" .$row['price'] ." грн.</p>
//                        <div class=\"buttons\">
//                            <a href='information.php?id=".$row['id']."'><input type=\"button\" class=\"btn sbtn\" value=\"Подробнее\" data-price=\"333\" data-id='".$row['id']."' data-product=\"Название товара\"></a>
//                            <div class=\"input-image\"><input type=\"image\" src=\"img/heart.png\" alt=\"\" onclick='checkRegistration()'></div>
//                        </div>
//                    </div>
//                </div>
//            </div>
//            <!-- пустой -->
//            <div class=\"col-md-2 col-lg-2 col-xl-2 mx-auto mt-3 \"></div>";
//                        $i++;
//                        break;
//                    }
//                    case 2:{
//                        echo "<div class=\"col-md-4 col-lg-4 col-xl-4 mx-auto mt-3\">
//        <div class=\"card\">
//            <img src=\"img/" .$row['preview'] ."\" class=\"card-img-top\" alt=\"...\">
//            <div class=\"card-body\">
//                <p class=\"card-text ttle\">" .$row['name'] ."</p>
//                <p class=\"card-text money\">" .$row['price'] ." грн.</p>
//                <div class=\"buttons\">
//                    <a href='information.php?id=".$row['id']."'><input type=\"button\" class=\"btn sbtn\" value=\"Подробнее\" data-price=\"333\" data-id='".$row['id']."' data-product=\"Название товара\"></a>
//                    <div class=\"input-image\">
//                        <input type=\"image\" src=\"img/heart.png\" alt=\"\" onclick='checkRegistration()'></div>
//                </div>
//            </div>
//        </div>
//    </div>
//</div>";
//                        $i++;
//                        break;
//                    }
//                    case 3:{
//                        echo "<div class=\"gridDiv\" style=\"margin-top: -30%;\">
//                <div class=\"alone-card\">
//                    <div class=\"col-md-4 col-lg-4 col-xl-4 mx-auto mt-3\">
//                        <div class=\"card\">
//                            <img src=\"img/" .$row['preview'] ."\" class=\"card-img-top\" alt=\"...\">
//                            <div class=\"card-body\">
//                                <p class=\"card-text\">" .$row['name'] ."</p>
//                                <p class=\"card-text money\">" .$row['price'] ." грн.</p>
//                                <div class=\"buttons\">
//                                    <a href='information.php?id=".$row['id']."'><input type=\"button\" class=\"btn sbtn\" value=\"Подробнее\" data-price=\"333\" data-id='".$row['id']."' data-product=\"Название товара\"></a>
//                                    <div class=\"input-image\"><input type=\"image\" src=\"img/heart.png\" alt=\"\" onclick='checkRegistration()'></div>
//                                </div>
//                            </div>
//                        </div>
//                    </div>
//                </div>";
//                        $i++;
//                        break;
//                    }
//
//                    case 4:{
//                        echo "<div class=\"another-cards cards\">
//                    <div class=\"col-md-4 col-lg-4 col-xl-4 mx-auto mt-3\">
//                        <div class=\"card\" style=\"top: 115px;\">
//                            <img src=\"img/" .$row['preview'] ."\" class=\"card-img-top\" alt=\"...\">
//                            <div class=\"card-body\">
//                                <p class=\"card-text\">" .$row['name'] ."</p>
//                                <p class=\"card-text money\">" .$row['price'] ." грн.</p>
//                                <div class=\"buttons\">
//                                   <a href='information.php?id=".$row['id']."'><input type=\"button\" class=\"btn sbtn\" value=\"Подробнее\" data-price=\"333\" data-id='".$row['id']."' data-product=\"Название товара\"></a>
//                                    <div class=\"input-image\"><input type=\"image\" src=\"img/heart.png\" alt=\"\" onclick='checkRegistration()'></div>
//                                </div>
//                            </div>
//                        </div>
//                    </div>
//
//<!--                   пустой-->
//                    ";
//                        $i++;
//                        break;
//                    }
//                    case 5: {
//                        echo "<div class=\"col -md -2 col-lg -2 col-xl-2 mx-auto mt-3\"></div>
//
//                    <div class=\"col-md-4 col-lg-4 col-xl-4 mx-auto mt-3\">
//                        <div class=\"card\">
//                            <img src=\"img /" .$row['preview'] ."\" class=\"card-img-top\" alt=\"...\">
//                            <div class=\"card-body\">
//                                <p class=\"card-text\">" .$row['name'] ."</p>
//                                <p class=\"card-text money\">" .$row['price'] ." грн.</p>
//                                <div class=\"buttons\">
//                                    <a href='information.php?id=".$row['id']."'><input type=\"button\" class=\"btn sbtn\" value=\"Подробнее\" data-price=\"333\" data-id='".$row['id']."' data-product=\"Название товара\"></a>
//                                    <div class=\"input-image\"><input type=\"image\" src=\"img/heart.png\" alt=\"\" onclick='checkRegistration()'></div>
//                                </div>
//                            </div>
//                        </div>
//                    </div>
//
//                </div> <!-- another-cards-->
//
//           </div> <!-- cards -->
//
//        </div> <!-- all-cards -->";
//                    }
//                }
//            }
//            ?>
 <div class="pages">
<!--    <a href="#">Предыдущая</a>-->
<!--    <a href="#">1</a>-->
<!--    <a href="#">2</a>-->
<!--    <a href="#">3</a>-->
<!--    <a href="#">Следующая</a>-->
</div>

    </div>
<!--</div>-->



    <!-- Footer -->
    <footer class="page-footer mdb-color pt-4">

        <!-- Footer Links -->
        <div class="container text-center text-md-left">

            <!-- Footer links -->
            <div class="row text-center text-md-left mt-3 pb-3">

                <!-- Grid column -->
                <div class="col-md-1 col-lg-1 col-xl-1 mx-auto mt-3">
                    <p><a href="index.php">Главная</a></p>
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <p>
                        <a href="maintov.php">Вся обувь</a>
                    </p>
                    <p>
                        <a href="maintov.php?gender=w">Женская</a>
                    </p>
                    <p>
                        <a href="maintov.php?gender=m">Мужская</a>
                    </p>
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <p><a href="table.php">Таблица размеров</a></p>
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
<!--                    <p><a href="#">О нас</a></p>-->
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3 hovernotwhite">
                    <p style="color: white; opacity: 0.8">
                       Харьков, 2018 г.
                    </p>

                </div>

                <div class="col-md-1 col-lg-1 col-xl-1 mx-auto mt-3">
                    <p>
                        <a class="wht" href="#top" style="background: none">Наверх</a>
                    </p>
                </div>
                <!-- Grid column -->

            </div>

        </div>
        <!-- Footer Links -->

    </footer>
    <!-- Footer -->



<script src="js/jquery-3.2.1.min.js">

//<!--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!--<script src="js/main.js"></script>-->
<script src="js/mouselog.js"></script>
<script src="js/sotring.js"></script>
<script src="js/filtration.js"></script>
<script src="js/checkRegistrarion.js"></script>
</body>
</html>