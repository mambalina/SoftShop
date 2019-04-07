<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Информация</title>
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link rel="stylesheet" href="font/stylesheet.css">
    <link rel="stylesheet" href="css/sign.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/information.css">
    <link rel="stylesheet" href="css/acc.css">
    <link href="https://fonts.googleapis.com/css?family=Prata" rel="stylesheet">
    <!--<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">-->
    <style>.sizes {
            margin: 20px;
            font: 14px Tahoma;
        }
        .sizes div {
            display: inline-flex;
        }
        .sizes input {
            position: absolute;
            left: -9999px;
        }
        .sizes label {
            display: block;
            margin: 0 0 0 -1px;
            padding: 8px 10px;
            border: 1px solid #BBBBBB;
            background: linear-gradient(to bottom,  rgba(255,255,255,1) 0%,rgba(229,229,229,1) 100%);
            box-shadow: 0 2px 5px rgba(0, 0, 0, .12);
            cursor: pointer;
        }
        .sizes input:checked + label {
            background: white;
            box-shadow: inset 0 3px 6px rgba(0, 0, 0, .2);
        }
        .sizes div:first-child label {
            margin-left: 0;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }
        .sizes div:last-child label {
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }</style>
</head>
<body>

<div class="top-block" id = "top">
    <div class="container ">
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
                            <li><a href=\"#\" class = 'deleteCookie' onclick='deleteCookie()' >Выход</a></li>
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


<div class="container">

    <!-- Footer links -->

    <div class="inform">
        <div class="pictures">
            <div class="row">
                <div class="group_of_pictures" style="width: 100px; max-height: 502px;">
                    <?
                    require_once('connect.php');
                    $link = connect();
                    $result = $link->query("SELECT name, price, description  FROM good where id=".$_GET['id']);
                    $result->setFetchMode(PDO::FETCH_ASSOC);
                    $row = $result->fetch();
                    $res_photo = $link->query("SELECT DISTINCT src from good, photo where photo.good_id = good.id and good.id=".$_GET['id']);
                    $res_photo->setFetchMode(PDO::FETCH_ASSOC);

                    while ($res = $res_photo->fetch()){
                        echo "<div class=\"one_pic\">
                            <img data-auto-id=\"image\" src=\"".$res['src']."\"  alt=\"\" class='pics' onclick='changeBG()' >
                        </div>";
                        $photo_src = $res['src'];
                    }
                    echo "</div> <div class=\"main_image\">
                        <img data-auto-id=\"image\" src=\"".$photo_src."\"  alt=\"\" id='mImg'>
                        </div>";
                    echo "<div class=\"about-boots\">
                        <h3>".$row['name']."</h3>
                        <p>".$row['description']."</p>
                        <b><span id=\"price\">".$row['price']."</span> гривен</b>
                        <p><a href=\"table.php\" target=\"_blank\" style=\"color: #1C6E91; opacity: 1;text-decoration: underline;\">Таблица размеров<img src=\"img/len.png\" alt=\"\"></a></p>
                        <div class=\"sizes\">";
                    $result = $link->query("SELECT  size_name from good, avalibility, shoesize where avalibility.good_id = good.id and size_id=shoesize.id and amount>0 and good.id=".$_GET['id']." ORDER BY shoesize.id    ");
                    $result->setFetchMode(PDO::FETCH_ASSOC);
                    $i=1;
                    while ($res=$result->fetch()){
                        echo "<div>
        <input type=\"radio\" name=\"option\" id=\"radio".$i."\" class=\"radio\"  value=\"".$res['size_name']."\"/>
        <label for=\"radio".$i."\" id =\"size\">".$res['size_name']."</label>
    </div>";
                        $i++;
                    }


                    echo "
                            </div>
                            <p>Введите количество</p>
                            <input type=\"number\" min=\"1\" max = \"5\" value=\"1\" id=\"product\" onmouseout='changeNumber()'>
                        
                        <div class=\"buttons\">   
                            <input type=\"button\" value=\"Добавить в корзину\" data-id =\"". $_GET['id']."\" class=\"btn btn-primary btn-lg main_btn fbtn add-to-basket\">
                            <input type=\"image\" src=\"img/heart.png\" onclick='checkRegistration()'>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>";

                    $res_name = $link->query("SELECT provider.name from provider, good where good.provider_id=provider.id and good.id=".$_GET['id']);
                    //                        $res_photo = $link->query("SELECT provider.name, good.id, category.name from provider, good, category where good.provider_id=provider.id  and good.category_id=category.id and good.id=".$_GET['id']);
                    $res_name->setFetchMode(PDO::FETCH_ASSOC);
                    $name = $res_name->fetch();
                    $materials = $link->query("SELECT material.name from good_material, good, material where good.id=good_material.good_id AND material.id=good_material.material_id and good.id=".$_GET['id']);
                    //                        $res_photo = $link->query("SELECT provider.name, good.id, category.name from provider, good, category where good.provider_id=provider.id  and good.category_id=category.id and good.id=".$_GET['id']);
                    $materials->setFetchMode(PDO::FETCH_ASSOC);

                    echo "<div class=\"more-info text-center\">
                <h3>Характеристики товара</h3>
                <p>Артикул: ". $_GET['id']."</p>
                <p>Материалы:";
                    while ($result_materials = $materials->fetch()){
                        echo " ".$result_materials['name']." ";
                    }
                    echo "</p>
                <p>Бренд: ".$name['name']."</p>



            </div>
        </div>"; ?>

                    <!-- Grid column -->

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
                <script>
                    function changeBG(){
                        $(".pics").on('click', function () {
                            $("#mImg").attr("src", $(this).attr("src"));
                        })
                    }
                </script>
                <script>
                    function changeNumber() {
                        $('#product').on('change', function () {
                            if ($('#product').val() < 1){
                                $(this).val(1);
                            }
                        })
                    }
                </script>
                <script>
                        function deleteCookie(){
                            $(".deleteCookie").on('click', function() {



                                $(location).attr('href', "http://softshop.ua/index.php");
                                return false;
                            })
                        }



                        // $("#product").on('change', changeNumber)


                </script>

                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="js/jquery-3.2.1.min.js">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
                <script src="js/mouselog.js"></script>
                <script src="js/localstorage.js"></script>
                <script src="js/checkRegistrarion.js"></script>
</body>
</html>