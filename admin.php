<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Администратор</title>
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link rel="stylesheet" href="font/stylesheet.css">
<!--    <link rel="stylesheet" href="css/sign.css">-->
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Prata" rel="stylesheet">
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
            <li class="nav-item active">ПАНЕЛЬ АДМИНИСТРАТОРА</li>
        </ul>
    </div>
</nav>
    </div>
</div>


    <div class="container-fluid" >  <!--style="height: 80vh"-->
        <div class="row">
<!--            инфа о товаре-->
            <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                <div class="goods"></div>
                <div class="pr" style="height: 50px"></div>
                <div class="good">
                    <h2>Товар</h2>
                    <p>Название: <input type="text" id ="gname"></p>
                    <p>Цена (грн.): <input type="text" id ="gprice"> </p>
                    <p>Пол: <select name="" id="">
                            <option value="" id = "wom">Женский</option>
                            <option value="" id = "man">Мужской</option>
                        </select></p>
                    <p>Фото превью: <input type="text" id ="preview" style="width: 25%"></p>
                    <p>Описание: <textarea name="" id="description" cols="30" rows="2"></textarea></p>
                </div>
            </div>
<!--инфа о поставщике, наличии на складе-->
            <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">

                <div class="pr" style="height: 50px"></div>
                <div class="provider">
                    <h4>Поставщик</h4>
                    <div class="provider-name"></div>

                </div>
                <div class="good">
                    <h4>Размеры</h4>
                    <div class="sizes"></div>
                </div>
            </div>
            <!--инфа о  фотках, категории, материалах-->
            <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                <div class="pr" style="height: 50px"></div>
                <div class="information">
                    <h4>Фото</h4>
                    <div class="photos">
                        <p>Фото - <input type="text" class="ph" style="width: 80%"></p>
                        <p>Фото - <input type="text" class="ph" style="width: 80%"></p>
                        <p>Фото - <input type="text"  class="ph" style="width: 80%"></p>
                        <p>Фото - <input type="text" class="ph" style="width: 80%"></p>
                    </div>
                </div>
                <div class="information">
                    <h4>Категории</h4>
                    <div class="categories">
                        <input type="text" class="categ">
                    </div>
                </div>
                <div class="information">
                    <h4>Материалы</h4>
                    <div class="materials">
                        <input type="text" class = "mater">
                    </div>
                </div>
            </div>

        </div>
        <div class="button" style="text-align: center">
            <input type="hidden" id = "good_id" value="0">
            <button class="add-to-db"  style="margin: 50px auto 100px auto">Обновить данные</button>
        </div>

    </div>


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




<script src="js/jquery-3.2.1.min.js">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src = "js/admin.js"></script>
</body>
</html>