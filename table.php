<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Таблица размеров</title>
    <link rel="icon" type="image/png" href="img/favicon.png">

    <link rel="stylesheet" href="font/stylesheet.css">
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

            <a class="navbar-brand" href="index.php"><img src="img/logo.png" class = "logo"></a>
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
                            echo "<a class=\"nav-link\" href=\"#\">Вход <span class=\"sr-only\">(current)</span></a>
                        <!--ФООРМА АВТОРИЗАЦИИ-->
                        <ul class=\" sub-menu\">
                            <form action=\"action.php\"  method=\"post\">
                                <li>Здравствуйте!</li>
                                <li><input type=\"email\" placeholder=\"E-mail\" name=\"login\" onmouseover=\"mouselog(event)\" onmouseout=\"mouselog(event)\" required></li>
                                <li><input type=\"password\" placeholder=\"Пароль\" name=\"pass\" onmouseover=\"mouselog(event)\" required></li>
                                <li><input type=\"submit\" value=\"Войти\" class=\"btn fbtn\" onmouseover=\"mouselog(event)\"></li>
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
            <li><a href="#">Женская</a></li>
            <li><a href="#">Мужская</a></li>
            <li><a href="maintov.php">Вся обувь</a></li>
        </ul>
    </div>


    <div class="container-fluid">

        <div class="inform" >
            <div class="inside-div" id = "divtov" style="display: block">
                <h2>Таблица размеров</h2>
                <div class="women">
                    <h5>Размерная сетка на женскую обувь</h5>
                    <table>
                        <tr>
                            <th>Размер Украина</th>
                            <td>35</td>
                            <td>36</td>
                            <td>37</td>
                            <td>38</td>
                            <td>39</td>
                            <td>40</td>
                            <td>41</td>
                            <td>42</td>
                            <td>43</td>
                        </tr>
                        <tr>
                            <th>Длина стопы, см</th>
                            <td>23</td>
                            <td>23.5</td>
                            <td>24</td>
                            <td>24.5</td>
                            <td>25</td>
                            <td>25.5</td>
                            <td>26</td>
                            <td>27</td>
                            <td>28</td>
                        </tr>
                    </table>
                </div>
                <div class="men">
                    <h5>Размерная сетка на мужскую обувь</h5>
                    <table>
                        <tr>
                            <th>Размер Украина</th>
                            <td>35</td>
                            <td>36</td>
                            <td>37</td>
                            <td>38</td>
                            <td>39</td>
                            <td>40</td>
                            <td>41</td>
                            <td>42</td>
                            <td>43</td>
                        </tr>
                        <tr>
                            <th>Длина стопы, см</th>
                            <td>24</td>
                            <td>25</td>
                            <td>25.5</td>
                            <td>26</td>
                            <td>26.5</td>
                            <td>27</td>
                            <td>27.5</td>
                            <td>28</td>
                            <td>28.5</td>
                        </tr>
                    </table>
                </div>
                <div class="how-to-do">
                    <h2>Подбираем свой размер</h2>
                    <div class="todo" style="margin-left: 10%; ">
                        <p>Вам понадобится провести измерения с помощью сантиметровой ленты. Для определения подходящего размера необходимо соотнести полученные измерения с размерами в таблице.</p>
                        <p>Поставьте ногу на чистый лист бумаги. Отметьте крайние границы ступни и измерьте расстояние между самыми удаленными точками стопы.</p>
                    </div>
                    <img src="img/legs.png" alt="" style="margin-right: 10%">
                </div>
            </div>
        </div>
        </div>
            <div class="more-info text-center" style="display: block"></div>
        <!-- Grid column -->
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
                    <a href="#!">Женская</a>
                </p>
                <p>
                    <a href="#!">Мужская</a>
                </p>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                <p><a href="#">Таблица размеров</a></p>
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





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="js/mouselog.js"></script>
<script src="js/checkRegistrarion.js"></script>
</body>
</html>