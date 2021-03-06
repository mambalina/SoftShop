<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Аккаунт</title>
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link rel="stylesheet" href="font/stylesheet.css">
    <link rel="stylesheet" href="css/acc.css">
    <link rel="stylesheet" href="css/sign.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/basket.css">
    <link rel="stylesheet" href="css/information.css">
    <link rel="stylesheet" href="css/acc.css">
    <link href="https://fonts.googleapis.com/css?family=Prata" rel="stylesheet">

</head>
<body>

<div class="top-block" id="top">
    <div class="container-fluid ">
        <nav class="navbar navbar-expand-lg navbar-light">

            <a class="navbar-brand" href="index.php"><img src="img/logo.png" class="logo" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!--менюшка справа-->
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0 main-menu">
                    <li class="nav-item active">

                        <?php
                        echo "<a  class=\"nav-link\" href=\"account.php?page=o\">";
                        echo  $_COOKIE['name'] .' ' .$_COOKIE['l_name']. " </a>"; ?>


<!--                        <a class="nav-link" href="#">Имя <span class="sr-only">(current)</span></a>-->


                        <ul class="sub-menu-acc sub-menu">
                            <li><a href="account.php?page=o">Мои заказы</a></li>
                            <li><a href="account.php?page=f">Избранное</a></li>
                            <li><a href="account.php?page=d">Мои данные</a></li>
                            <li><a href="account.php?page=e">Выход</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="#" style="opacity: 0.9" onclick='checkRegistration()'><img src="img/heart.png" class="bag" alt=""></a></li>
                    <li class="nav-item"><a href="basket.php" style="opacity: 0.9"><img src="img/bag.png" class="bag" alt=""></a></li>
                </ul>
            </div>
        </nav>

        <div class="col-md-6 col-lg-6 col-xl-6 mx-auto mt-3 wht"></div>
    </div>
</div>


<main>

    <div id="menu">
        <ul>
            <li><a href="maintov.php?gender=w">Женская</a></li>
            <li><a href="maintov.php?gender=m">Мужская</a></li>
            <li><a href="maintov.php">Вся обувь</a></li>
        </ul>
    </div>


    <div class="container">

        <div class="inform">
            <div class="inside-div" id = "divtov">
                <div class="sidebar">
                    <div class="category-wrap">
                        <ul>
                            <li><a href="account.php?page=o">Мои заказы</a></li>
                            <li><a href="account.php?page=f">Избранное</a></li>
                            <li><a href="account.php?page=d">Мои данные</a></li>
                            <li><a href="account.php?page=e">Выход</a></li>
                        </ul>
                    </div>
                </div>

                    <div class="div-info">
                        <div class="info" style="color: #393B3B;">
                            <ul>
                                <li><div class="menu-switch active"><a href="">Текущие заказы</a></div></li>
                                <li><div class="menu-switch"><a href="">Все заказы</a></div></li>
                            </ul>
                        </div>
                        <div class="div-goods">
<!--                            <div class="div-one-good">-->
<!--                                <div class="div-img">-->
<!--                                    <img src="img/her.jpg" alt="">-->
<!--                                </div>-->
<!--                                <div class="div-description">-->
<!--                                    <h6>Название кросовок</h6>-->
<!--                                    <p>Размер - <span>2</span></p>-->
<!--                                    <p>Количество - <span>2</span></p>-->
<!--                                </div>-->
<!--                                <div class="state text-success"></div>-->
<!--                                <div class="div-cost">-->
<!--                                    356 грн.-->
<!--                                </div>-->
<!--                            </div>-->



                        </div>

                    </div>

            </div>
        </div>
        </div>
            
        <!-- Grid column -->

</main>


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
<!--                <p><a href="#">О нас</a></p>-->
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


<script src = "js/jquery-3.2.1.min.js"></script>
<script src = "js/jquery.cookie.js"></script>
<script src ="js/account.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>