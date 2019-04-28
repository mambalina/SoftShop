<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SoftShop</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/acc.css">
    <link href="https://fonts.googleapis.com/css?family=Prata" rel="stylesheet">
 </head>
 <body>

 <div class="top-block" id="top">
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
                                echo "<a class=\"nav-link\" href=\"account.php?page=o\">";
                                echo  $_COOKIE['name'] . ' ' . $_COOKIE['l_name'] ." <span class=\"sr-only\">(current)</span></a>
                        <ul class=\"sub-menu-acc sub-menu\">
                            <li><a href=\"#\">Мои заказы</a></li>
                            <li><a href=\"\" >Избранное</a></li>
                            <li><a href=\"#\">Мои данные</a></li>
                            <li><a href=\"#\">Выход</a></li>
                        </ul>
                    </li>";}
                            else{
                                //Выводим меню гостя
                                echo "<a class=\"nav-link\" href=\"#\" id='login'>Вход <span class=\"sr-only\">(current)</span></a>
                        <!--ФООРМА АВТОРИЗАЦИИ-->
                        <ul class=\" sub-menu\">
                            <form action=\"action.php\"  method=\"post\" style='background: none'>
                                <li>Здравствуйте!</li>
                                <li><input type=\"email\" placeholder=\"E-mail\" name=\"login\"  required></li>
                                <li><input type=\"password\" placeholder=\"Пароль\" name=\"pass\"  required></li>
                                <li><input type=\"submit\" value=\"Войти\" class=\"btn fbtn signin\" ></li>
                            </form>
                        </ul>
                    </li>
                    <li class=\"nav-item\"><a class=\"nav-link\" id='reg' href=\"signin.php\">Регистрация</a></li>";}
                            ?>

                        <li class="nav-item"><a href="#" style="opacity: 0.9" onclick='checkRegistration()'><img src="img/heart.png" class="bag" alt=""></a></li>
                        <li class="nav-item"><a href="basket.php" style="opacity: 0.9"><img src="img/bag.png" class="bag" alt=""></a></li>
                    </ul>
                </div>
            </nav>
         <div class="main_img" >
             <h1>Делай <b style="font-weight: bold">больше</b>. Будь <b style="font-weight: bold">сильнее</b></h1>
             <h1>Делай <b style="font-weight: bold">больше</b>. Будь <b style="font-weight: bold">сильнее</b></h1>
             <div class="carousel-caption">
                 <button type="button" class="btn btn-primary btn-lg main_btn fbtn" onclick="window.location='maintov.php'">Выбрать обувь</button>
                 <button type="button" class="btn btn-outline-dark main_btn sbtn" onclick="window.location='table.php'" >Таблица размеров</button>
             </div>
         </div>

                        <div class="carousel-caption">
                            <button type="button" class="btn btn-primary btn-lg main_btn fbtn" onclick="window.location='maintov.php'">Выбрать обувь</button>
                            <button type="button" class="btn btn-outline-dark main_btn sbtn" onclick="window.location='table.php'" >Таблица размеров</button>
                        </div>


            <div class="pic">
                <div class = "block him" onclick="window.location.href='maintov.php?gender=m'" id = "his_products"><h3>Для него</h3>

                </div>
                <div class="block her" onclick="window.location.href='maintov.php?gender=w'" id = "her_products"><h3>Для неё</h3></div>
            </div>
        </div>

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
                        <a class="wht" href="#top">Наверх</a>
                    </p>
                </div>
                <!-- Grid column -->

            </div>

        </div>
        <!-- Footer Links -->

    </footer>
    <!-- Footer -->

     <script src="js/jquery-3.2.1.min.js"></script>
     <script src="js/jquery.cookie.js"></script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
     <script src="js/mouselog.js"></script>
     <script src="js/checkRegistrarion.js"></script>
 </body>
</html>