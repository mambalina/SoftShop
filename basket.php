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
    <title>Корзина</title>

    <link rel="stylesheet" href="css/basket.css">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link rel="stylesheet" href="font/stylesheet.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sign.css">
    <!--fonts-->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Prata" rel="stylesheet">
    <link rel="stylesheet" href="css/acc.css">
</head>
<body>

<div class="top-block" id = "top">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">

            <a class="navbar-brand" href="index.php"><img src="img/logo.png" class = "logo" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0 main-menu">
                    <li class="nav-item active">
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
                            echo "<a class=\"nav-link\" href=\"#\" id = \"login\">Вход </a>
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

        <div class="my-div" id = "divtov">
            <h2>Ваши товары</h2>
            <!-- фильтр -->
            <div class="links">
                <p class="num">Количество товаров - <span id ="num-of-goods"></span></p>
                <a href="maintov.php" class="back">Продолжить покупки</a>
            </div>

            <div class="all-cards"></div>
            <div class="row">
                <input type="submit" value="Оплатить покупки" id="oplata">
                <p class="allCost">Итого: <span id = "allCost"></span> гривен</p>
            </div>

        </div>
    </div>

    <div class="popup">
        <h4>Оформление заказа</h4>
        <form action="">
            <input type="email" id="email" placeholder="email" required>
            <input type="text" id="name" placeholder="name" required>
            <input type="text" id="l_name" placeholder="l_name" required>
<!--            <input type="tel" id="tel" placeholder="tel">-->
            <input type="button" value="Продолжить" class="send-email" onclick="sendEmail()">
        </form>

    </div>

<div class="popup_bg"></div>


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

                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>-->
<script src="js/mouselog.js"></script>
<script src="js/cart.js"></script>
<script src="js/checkRegistrarion.js"></script>
</body>
</html>