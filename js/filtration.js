
$(document).ready(function () {

    // отображение товаров при загрузке
    $.ajax({
        type: "post",
        url: "core.php",
        data: {
            "action": "selectAllGoods",
        },
        success: function (data) {
            data = JSON.parse(data);
            var out = '';
            for (var i = 0; i<5; i++){
                switch (i) {
                    case 0: {
                        out += "<div class=\"cards\">";
                        out +=    "<div class=\"col-md-4 col-lg-4 col-xl-4 mx-auto mt-3\">";
                        out +=    "<div class=\"card\">";
                        out +=    " <img src=\"img/"+data[i].preview+"\" class=\"card-img-top\" alt=\"...\">";
                        out +=    "<div class=\"card-body\">";
                        out +=    "<p class=\"card-text\">"+data[i].name+"</p>";
                        out +=   "<p class=\"card-text money\">"+data[i].price+" грн.</p>";
                        out +="<div class=\"buttons\">";
                        out +=" <a href='information.php?id="+data[i].id+"'><input type=\"button\" class=\"btn sbtn\" value=\"Подробнее\" data-id="+data[i].id+"' ></a>";
                        out +="<div class=\"input-image\"><input type=\"image\" src=\"img/heart.png\" onclick='checkRegistration()'></div>";
                        out +=" </div>";
                        out +=   "</div>";
                        out +=   "</div>";
                        out +=    "</div>";
                        out +=    "<div class=\"col-md-2 col-lg-2 col-xl-2 mx-auto mt-3 \"></div>";
                        break;
                    }
                    case 1: {
                        out += "<div class=\"col-md-4 col-lg-4 col-xl-4 mx-auto mt-3\">";
                        out +=  "<div class=\"card\">";
                        out += "<img src=\"img/"+data[i].preview+"\" class=\"card-img-top\" alt=\"...\">";
                        out += "<div class=\"card-body\">";
                        out += "<p class=\"card-text\">"+data[i].name+"</p>";
                        out += "<p class=\"card-text money\">"+data[i].price+" грн.</p>";
                        out +="<div class=\"buttons\">";
                        out +=" <a href='information.php?id="+data[i].id+"'><input type=\"button\" class=\"btn sbtn\" value=\"Подробнее\" data-id="+data[i].id+"' ></a>";
                        out +="<div class=\"input-image\"><input type=\"image\" src=\"img/heart.png\" onclick='checkRegistration()'></div>";
                        out +=" </div>";
                        out += "</div>";
                        out += "</div>";
                        out += "</div>";
                        out += "</div>";
                        break;
                    }
                    case 2: {
                        out += "<div class=\"gridDiv\" style=\"margin-top: -30%;\">\n" +
                                    "                <div class=\"alone-card\">\n" +
                                    "                    <div class=\"col-md-4 col-lg-4 col-xl-4 mx-auto mt-3\">\n" +
                                    "                        <div class=\"card\">\n" +
                                    "                            <img src=\"img/"+data[i].preview+"\" class=\"card-img-top\" alt=\"...\">\n" +
                                    "                            <div class=\"card-body\">\n" +
                                    "                                <p class=\"card-text\">"+data[i].name+"</p>\n" +
                                    "                                <p class=\"card-text money\">"+data[i].price+" грн.</p>";
                        out +="<div class=\"buttons\">";
                        out +=" <a href='information.php?id="+data[i].id+"'><input type=\"button\" class=\"btn sbtn\" value=\"Подробнее\" data-id="+data[i].id+"' ></a>";
                        out +="<div class=\"input-image\"><input type=\"image\" src=\"img/heart.png\" onclick='checkRegistration()'></div>";
                        out +=" </div>";
                                   out += "                            </div>\n" +
                                    "                        </div>\n" +
                                    "                    </div>\n" +
                                    "                </div>";
                                break;
                    }
                    case 3: {
                        out += "<div class=\"another-cards cards\">\n" +
                            "                    <div class=\"col-md-4 col-lg-4 col-xl-4 mx-auto mt-3\">\n" +
                            "                        <div class=\"card\" style=\"top: 115px;\">\n" +
                            "                            <img src=\"img/"+data[i].preview+"\" class=\"card-img-top\" alt=\"...\">\n" +
                            "                            <div class=\"card-body\">\n" +
                            "                                <p class=\"card-text\">"+data[i].name+"</p>\n" +
                            "                                <p class=\"card-text money\">"+data[i].price+" грн.</p>";
                        out +="<div class=\"buttons\">";
                        out +=" <a href='information.php?id="+data[i].id+"'><input type=\"button\" class=\"btn sbtn\" value=\"Подробнее\" data-id="+data[i].id+"' ></a>";
                        out +="<div class=\"input-image\"><input type=\"image\" src=\"img/heart.png\" onclick='checkRegistration()'></div>";
                        out +=" </div>";
                           out += "                            </div>\n" +
                            "                        </div>\n" +
                            "                    </div>\n" +
                            "\n" +
                            "                    <div class=\"col-md-2 col-lg-2 col-xl-2 mx-auto mt-3 \"></div>";
                            break;
                    }
                    case 4: {
                        out += "<div class=\"col-md-4 col-lg-4 col-xl-4 mx-auto mt-3\">\n" +
                            "                        <div class=\"card\">\n" +
                            "                            <img src=\"img/"+data[i].preview+"\" class=\"card-img-top\" alt=\"...\">\n" +
                            "                            <div class=\"card-body\">\n" +
                            "                                <p class=\"card-text\">"+data[i].name+"</p>\n" +
                            "                                <p class=\"card-text money\">"+data[i].price+" грн.</p>";
                        out +="<div class=\"buttons\">";
                        out +=" <a href='information.php?id="+data[i].id+"'><input type=\"button\" class=\"btn sbtn\" value=\"Подробнее\" data-id="+data[i].id+"' ></a>";
                        out +="<div class=\"input-image\"><input type=\"image\" src=\"img/heart.png\" onclick='checkRegistration()'></div>";
                        out +=" </div>";
                           out += "                            </div>\n" +
                            "                        </div>\n" +
                            "                    </div>\n" +
                            "\n" +
                            "                </div><!-- another-cards -->\n" +
                            "\n" +
                            "            </div>";
                        break;
                    }
                }
            }
            $('.all-cards').html(out);
        }
    });

    $('.dropdown-item').on('click', function () {
        var type = $(this).attr("id");
        $.ajax({
            type: "post",
            url: "core.php",
            data: {
                "action": "sortBy",
                "type": type
            },
            success: function (data) {
                data = JSON.parse(data);
                console.log(data);
                var out = '';
                for (var i = 0; i<5; i++){
                    switch (i) {
                        case 0: {
                            out += "<div class=\"cards\">";
                            out +=    "<div class=\"col-md-4 col-lg-4 col-xl-4 mx-auto mt-3\">";
                            out +=    "<div class=\"card\">";
                            out +=    " <img src=\"img/"+data[i].preview+"\" class=\"card-img-top\" alt=\"...\">";
                            out +=    "<div class=\"card-body\">";
                            out +=    "<p class=\"card-text\">"+data[i].name+"</p>";
                            out +=   "<p class=\"card-text money\">"+data[i].price+" грн.</p>";
                            out +="<div class=\"buttons\">";
                            out +=" <a href='information.php?id="+data[i].id+"'><input type=\"button\" class=\"btn sbtn\" value=\"Подробнее\" data-id="+data[i].id+"' ></a>";
                            out +="<div class=\"input-image\"><input type=\"image\" src=\"img/heart.png\" onclick='checkRegistration()'></div>";
                            out +=" </div>";
                            out +=   "</div>";
                            out +=   "</div>";
                            out +=    "</div>";
                            out +=    "<div class=\"col-md-2 col-lg-2 col-xl-2 mx-auto mt-3 \"></div>";
                            break;
                        }
                        case 1: {
                            out += "<div class=\"col-md-4 col-lg-4 col-xl-4 mx-auto mt-3\">";
                            out +=  "<div class=\"card\">";
                            out += "<img src=\"img/"+data[i].preview+"\" class=\"card-img-top\" alt=\"...\">";
                            out += "<div class=\"card-body\">";
                            out += "<p class=\"card-text\">"+data[i].name+"</p>";
                            out += "<p class=\"card-text money\">"+data[i].price+" грн.</p>";
                            out +="<div class=\"buttons\">";
                            out +=" <a href='information.php?id="+data[i].id+"'><input type=\"button\" class=\"btn sbtn\" value=\"Подробнее\" data-id="+data[i].id+"' ></a>";
                            out +="<div class=\"input-image\"><input type=\"image\" src=\"img/heart.png\" onclick='checkRegistration()'></div>";
                            out +=" </div>";
                            out += "</div>";
                            out += "</div>";
                            out += "</div>";
                            out += "</div>";
                            break;
                        }
                        case 2: {
                            out += "<div class=\"gridDiv\" style=\"margin-top: -30%;\">\n" +
                                "                <div class=\"alone-card\">\n" +
                                "                    <div class=\"col-md-4 col-lg-4 col-xl-4 mx-auto mt-3\">\n" +
                                "                        <div class=\"card\">\n" +
                                "                            <img src=\"img/"+data[i].preview+"\" class=\"card-img-top\" alt=\"...\">\n" +
                                "                            <div class=\"card-body\">\n" +
                                "                                <p class=\"card-text\">"+data[i].name+"</p>\n" +
                                "                                <p class=\"card-text money\">"+data[i].price+" грн.</p>";
                            out +="<div class=\"buttons\">";
                            out +=" <a href='information.php?id="+data[i].id+"'><input type=\"button\" class=\"btn sbtn\" value=\"Подробнее\" data-id="+data[i].id+"' ></a>";
                            out +="<div class=\"input-image\"><input type=\"image\" src=\"img/heart.png\" onclick='checkRegistration()'></div>";
                            out +=" </div>";
                            out += "                            </div>\n" +
                                "                        </div>\n" +
                                "                    </div>\n" +
                                "                </div>";
                            break;
                        }
                        case 3: {
                            out += "<div class=\"another-cards cards\">\n" +
                                "                    <div class=\"col-md-4 col-lg-4 col-xl-4 mx-auto mt-3\">\n" +
                                "                        <div class=\"card\" style=\"top: 115px;\">\n" +
                                "                            <img src=\"img/"+data[i].preview+"\" class=\"card-img-top\" alt=\"...\">\n" +
                                "                            <div class=\"card-body\">\n" +
                                "                                <p class=\"card-text\">"+data[i].name+"</p>\n" +
                                "                                <p class=\"card-text money\">"+data[i].price+" грн.</p>";
                            out +="<div class=\"buttons\">";
                            out +=" <a href='information.php?id="+data[i].id+"'><input type=\"button\" class=\"btn sbtn\" value=\"Подробнее\" data-id="+data[i].id+"' ></a>";
                            out +="<div class=\"input-image\"><input type=\"image\" src=\"img/heart.png\" onclick='checkRegistration()'></div>";
                            out +=" </div>";
                            out += "                            </div>\n" +
                                "                        </div>\n" +
                                "                    </div>\n" +
                                "\n" +
                                "                    <div class=\"col-md-2 col-lg-2 col-xl-2 mx-auto mt-3 \"></div>";
                            break;
                        }
                        case 4: {
                            out += "<div class=\"col-md-4 col-lg-4 col-xl-4 mx-auto mt-3\">\n" +
                                "                        <div class=\"card\">\n" +
                                "                            <img src=\"img/"+data[i].preview+"\" class=\"card-img-top\" alt=\"...\">\n" +
                                "                            <div class=\"card-body\">\n" +
                                "                                <p class=\"card-text\">"+data[i].name+"</p>\n" +
                                "                                <p class=\"card-text money\">"+data[i].price+" грн.</p>";
                            out +="<div class=\"buttons\">";
                            out +=" <a href='information.php?id="+data[i].id+"'><input type=\"button\" class=\"btn sbtn\" value=\"Подробнее\" data-id="+data[i].id+"' ></a>";
                            out +="<div class=\"input-image\"><input type=\"image\" src=\"img/heart.png\" onclick='checkRegistration()'></div>";
                            out +=" </div>";
                            out += "                            </div>\n" +
                                "                        </div>\n" +
                                "                    </div>\n" +
                                "\n" +
                                "                </div><!-- another-cards -->\n" +
                                "\n" +
                                "            </div>";
                            break;
                        }
                    }
                }
                $('.all-cards').html(out);
            }
        });
        return false;
    });
    $('#filtr').on('click', function () {
        var filtrBy = $("input:checkbox:checked").map(function () {return $(this).attr('id')}).get();
        console.log(filtrBy);
        $.ajax({
            type: "post",
            url: "core.php",
            data: {
                "action" : "filtrBy",
                "filtrBy" : filtrBy
            },
            success(data){
                data = JSON.parse(data);
                console.log(data);
                var out = '';
                for (var i = 0; i<5; i++){
                    switch (i) {
                        case 0: {
                            if (data.hasOwnProperty(i)){
                                out += "<div class=\"cards\">";
                                out +=    "<div class=\"col-md-4 col-lg-4 col-xl-4 mx-auto mt-3\">";
                                out +=    "<div class=\"card\">";
                                out +=    " <img src=\"img/"+data[i].preview+"\" class=\"card-img-top\" alt=\"...\">";
                                out +=    "<div class=\"card-body\">";
                                out +=    "<p class=\"card-text\">"+data[i].name+"</p>";
                                out +=   "<p class=\"card-text money\">"+data[i].price+" грн.</p>";
                                out +="<div class=\"buttons\">";
                                out +=" <a href='information.php?id="+data[i].id+"'><input type=\"button\" class=\"btn sbtn\" value=\"Подробнее\" data-id="+data[i].id+"' ></a>";
                                out +="<div class=\"input-image\"><input type=\"image\" src=\"img/heart.png\" onclick='checkRegistration()'></div>";
                                out +=" </div>";
                                out +=   "</div>";
                                out +=   "</div>";
                                out +=    "</div>";
                                out +=    "<div class=\"col-md-2 col-lg-2 col-xl-2 mx-auto mt-3 \"></div>";
                                break;
                            }
                        }
                        case 1: {
                            if (data.hasOwnProperty(i)){
                                out += "<div class=\"col-md-4 col-lg-4 col-xl-4 mx-auto mt-3\">";
                                out +=  "<div class=\"card\">";
                                out += "<img src=\"img/"+data[i].preview+"\" class=\"card-img-top\" alt=\"...\">";
                                out += "<div class=\"card-body\">";
                                out += "<p class=\"card-text\">"+data[i].name+"</p>";
                                out += "<p class=\"card-text money\">"+data[i].price+" грн.</p>";
                                out +="<div class=\"buttons\">";
                                out +=" <a href='information.php?id="+data[i].id+"'><input type=\"button\" class=\"btn sbtn\" value=\"Подробнее\" data-id="+data[i].id+"' ></a>";
                                out +="<div class=\"input-image\"><input type=\"image\" src=\"img/heart.png\" onclick='checkRegistration()'></div>";
                                out +=" </div>";
                                out += "</div>";
                                out += "</div>";
                                out += "</div>";
                                out += "</div>";
                                break;
                            }
                        }
                        case 2: {
                            if (data.hasOwnProperty(i)){
                                out += "<div class=\"gridDiv\" style=\"margin-top: -30%;\">\n" +
                                    "                <div class=\"alone-card\">\n" +
                                    "                    <div class=\"col-md-4 col-lg-4 col-xl-4 mx-auto mt-3\">\n" +
                                    "                        <div class=\"card\">\n" +
                                    "                            <img src=\"img/"+data[i].preview+"\" class=\"card-img-top\" alt=\"...\">\n" +
                                    "                            <div class=\"card-body\">\n" +
                                    "                                <p class=\"card-text\">"+data[i].name+"</p>\n" +
                                    "                                <p class=\"card-text money\">"+data[i].price+" грн.</p>";
                                out +="<div class=\"buttons\">";
                                out +=" <a href='information.php?id="+data[i].id+"'><input type=\"button\" class=\"btn sbtn\" value=\"Подробнее\" data-id="+data[i].id+"' ></a>";
                                out +="<div class=\"input-image\"><input type=\"image\" src=\"img/heart.png\" onclick='checkRegistration()'></div>";
                                out +=" </div>";
                                out += "                            </div>\n" +
                                    "                        </div>\n" +
                                    "                    </div>\n" +
                                    "                </div>";
                                break;
                            }
                        }
                        case 3: {
                            if (data.hasOwnProperty(i)){
                                out += "<div class=\"another-cards cards\">\n" +
                                    "                    <div class=\"col-md-4 col-lg-4 col-xl-4 mx-auto mt-3\">\n" +
                                    "                        <div class=\"card\" style=\"top: 115px;\">\n" +
                                    "                            <img src=\"img/"+data[i].preview+"\" class=\"card-img-top\" alt=\"...\">\n" +
                                    "                            <div class=\"card-body\">\n" +
                                    "                                <p class=\"card-text\">"+data[i].name+"</p>\n" +
                                    "                                <p class=\"card-text money\">"+data[i].price+" грн.</p>";
                                out +="<div class=\"buttons\">";
                                out +=" <a href='information.php?id="+data[i].id+"'><input type=\"button\" class=\"btn sbtn\" value=\"Подробнее\" data-id="+data[i].id+"' ></a>";
                                out +="<div class=\"input-image\"><input type=\"image\" src=\"img/heart.png\" onclick='checkRegistration()'></div>";
                                out +=" </div>";
                                out += "                            </div>\n" +
                                    "                        </div>\n" +
                                    "                    </div>\n" +
                                    "\n" +
                                    "                    <div class=\"col-md-2 col-lg-2 col-xl-2 mx-auto mt-3 \"></div>";
                                break;
                            }
                        }
                        case 4: {
                            if (data.hasOwnProperty(i)){
                                out += "<div class=\"col-md-4 col-lg-4 col-xl-4 mx-auto mt-3\">\n" +
                                    "                        <div class=\"card\">\n" +
                                    "                            <img src=\"img/"+data[i].preview+"\" class=\"card-img-top\" alt=\"...\">\n" +
                                    "                            <div class=\"card-body\">\n" +
                                    "                                <p class=\"card-text\">"+data[i].name+"</p>\n" +
                                    "                                <p class=\"card-text money\">"+data[i].price+" грн.</p>";
                                out +="<div class=\"buttons\">";
                                out +=" <a href='information.php?id="+data[i].id+"'><input type=\"button\" class=\"btn sbtn\" value=\"Подробнее\" data-id="+data[i].id+"' ></a>";
                                out +="<div class=\"input-image\"><input type=\"image\" src=\"img/heart.png\" onclick='checkRegistration()'></div>";
                                out +=" </div>";
                                out += "                            </div>\n" +
                                    "                        </div>\n" +
                                    "                    </div>\n" +
                                    "\n" +
                                    "                </div><!-- another-cards -->\n" +
                                    "\n" +
                                    "            </div>";
                                break;
                            }
                        }
                    }
                }
                $('.all-cards').html(out);
                // alert(data);
            }
        });
    });

});