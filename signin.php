<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link rel="stylesheet" href="font/stylesheet.css">
    <link rel="stylesheet" href="css/sign.css">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Prata" rel="stylesheet">
    <script src="js/jquery-3.2.1.min.js"></script>

    <script type = "text/javascript">
        $(document).ready(function () {

            $("#button").on('click', function () {
                var username = $("input[name='username']").val();
                var l_name = $("input[name='user_l_name']").val();
                var p1 = $("input[name='password']").val();
                var p2 = $("input[name='password2']").val();
                var email = $("input[name='email']").val();
                if (p1.toString() !== p2.toString()) {
                    $('.err').text("Пароли не совпадают").css("display", "block");
                }
                else{
                // проверка на наличие такого пользователя
                    $i = 0;
                    $.ajax({
                        type: "POST",
                        url: "user.php",
                        data: {
                            "funct": "email",
                            "email": email
                        },
                        success: function (data) {
                            if(data == 1){
                                $('.err').text("Пользователь с таким e-mail уже существует").css("display", "block");
                                $i = 1;
                            }
                            else{
                                if (username!='' && l_name != '' && p1!= '' && email != ''){
                                    $.ajax({
                                        type: "POST",
                                        url: "user.php",
                                        data: {
                                            "funct": "reg",
                                            "email": email,
                                            "username": username,
                                            "l_name": l_name,
                                            "password" : p1
                                        },
                                        success: function () {
                                            $('.access').text("Регистрация прошла успешно!").css("display", "block");
                                        }
                                    });
                                }
                                else {
                                    $('.err').text("Заполните все поля!").css("display", "block");
                                }
                            }
                        }
                    });
            }
                return false;
        })
});
    </script>

</head>
<body>

<div class="top-block" id="top">
    <div class="container-fluid">
<!--        меню-->
        <nav class="navbar navbar-expand-lg navbar-light">

            <a class="navbar-brand" href="index.php"><img src="img/logo.png" class = "logo" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0 main-menu">
                    <li class="nav-item active">
                        <a class="nav-link" href="#" id='login'>Вход</a>

                        <!--ФООРМА АВТОРИЗАЦИИ-->
                        <ul class="sub-menu">
                            <form action="action.php"  method="post">
                                <li>Здравствуйте!</li>
                                <li><input type="email" placeholder="E-mail" name="login" required></li>
                                <li><input type="password" placeholder="Пароль" name="pass"  required></li>
                                <li><input type="submit" value="Войти" class="btn fbtn" ></li>
                            </form>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="signin.php">Регистрация</a></li>
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
            <li><a href="">Женская</a></li>
            <li><a href="#">Мужская</a></li>
            <li><a href="maintov.php">Вся обувь</a></li>
        </ul>
    </div>


    <div class="container text-center text-md-left">

        <!-- Footer links -->
        <div class="row text-center text-md-left mt-3 pb-3 pic">



            <!-- Grid column -->
            <div class="col-md-6 col-lg-6 col-xl-6 mx-auto mt-3 backgroundReg">
                <form name="regform" id="regform" method="post" class="insideDiv">

                <h2>Регистрация</h2>
                    <div class="err" style="color: red; display: none"></div>
                    <div class="access" style="color: darkgreen; display: none"></div>
                    <input type="text" name = "username" class="form-control" placeholder="Введите Ваше имя" aria-label="Введите Ваше имя" aria-describedby="basic-addon2" form="regform" required>
                    <input type="text" name = "user_l_name" class="form-control" placeholder="Введите Вашу фамилию" aria-label="Введите Вашу фамилию" aria-describedby="basic-addon2" form="regform" required>
                    <input type="email" name = "email" class="form-control" placeholder="Введите Ваш e-mail" aria-label="Введите Ваш e-mail"  form="regform" required>
                    <input type="password" name = "password" class="form-control" placeholder="Придумайте пароль" aria-label="Придумайте пароль" form="regform" required>
                    <input type="password" name = "password2" class="form-control" placeholder="Повторите пароль" aria-label="Повторите пароль" " form="regform" required>
                        <!--<a href="index.html" type="submit">Register</a>-->
                    <input type="submit" value="Зарегистрироваться" id="button"  >

                </form>
                
            </div>
    </div>
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

<script src="js/jquery-3.2.1.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="js/mouselog.js"></script>
<script src="js/checkRegistrarion.js"></script>
</body>
</html>