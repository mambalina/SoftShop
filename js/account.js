
$(document).ready(function () {
    var email = $.cookie('login');
    // var password = $.cookie('password');

    function selectOrders() {
        var id = $('input:radio:checked').attr('id');
        if (id == 'now') {
            var row = '';
            $.ajax({
                type: 'post',
                url: 'core.php',
                data: {
                    "action": "selectCurrentOrder",
                    "email": email
                },
                success: function (data) {
                    data = JSON.parse(data);
                    console.log(data);
                    if (data == ''){
                        row = "Текущих заказов нет!";
                    }
                    else{
                        for (key in data) {
                            row += "<div class=\"div-one-good\">\n" +
                                "                                <div class=\"div-img\">\n" +
                                "                                    <img src=\"img/" + data[key].preview + "\" alt=\"\">\n" +
                                "                                </div>\n" +
                                "                                <div class=\"div-description\">\n" +
                                "                                    <h6>" + data[key].name + "</h6>\n" +
                                "                                    <p>Размер - <span>" + data[key].size_name + "</span></p>\n" +
                                "                                    <p>Количество - <span>" + data[key].quantity + "</span></p>\n" +
                                "                                </div> <div class=\"state text-success\"> " + data[key].purchase_state + "</div>\n" +
                                "                                <div class=\"div-cost\">\n" +
                                "                                   " + data[key].price + " грн.\n" +
                                "                                </div>\n" +
                                "                            </div>";
                        }
                    }

                    $('.div-goods').html(row);
                }
            });
        } else {
            var row = '';
            $.ajax({
                type: 'post',
                url: 'core.php',
                data: {
                    "action": "selectClosedOrders",
                    "email": email
                },
                success: function (data) {
                    data = JSON.parse(data);
                    console.log(data);
                    if (data == ''){
                        row = "Закрытых заказов нет!";
                    }
                    else{
                        for (key in data) {
                            row += "<div class=\"div-one-good\">\n" +
                                "                                <div class=\"div-img\">\n" +
                                "                                    <img src=\"img/" + data[key].preview + "\" alt=\"\">\n" +
                                "                                </div>\n" +
                                "                                <div class=\"div-description\">\n" +
                                "                                    <h6>" + data[key].name + "</h6>\n" +
                                "                                    <p>Размер - <span>" + data[key].size_name + "</span></p>\n" +
                                "                                    <p>Количество - <span>" + data[key].quantity + "</span></p>\n" +
                                "                                </div> <div class=\"state text-secondary\"> " + data[key].purchase_state + "</div>\n" +
                                "                                <div class=\"div-cost\">\n" +
                                "                                   " + data[key].price + " грн.\n" +
                                "                                </div>\n" +
                                "                            </div>";
                        }
                    }
                    $('.div-goods').html(row);
                }
            });
        }
    }

    if (window.location.href.indexOf("page") > -1){
        var url = window.location.href;
        var gen = url.charAt(url.length-1);
        switch (gen) {
            case "o": {
                var out = '<div class="info" style="color: #393B3B;">';
                out += '<input type="radio" id = "now" name = "orders" checked><label for = "now">Текущие заказы</label>';
                out += '<input type="radio" id = "all" name = "orders"><label for = "all">Все закрытые заказы</label>';
                out += '</div>';
                $('.info').html(out);
                selectOrders();
                $('input:radio').change(selectOrders);
                break;
            }
            case "f": {

                break;
            }
            case "d": {

                break;
            }
            case "e": {
                $.removeCookie('login',  { path: '/' });
                $.removeCookie('password',  { path: '/' });
                $.removeCookie('name',   { path: '/' });
                $.removeCookie('l_name',   { path: '/' });
                $(location).attr('href', "index.php");

                break;
            }
        }
    }
});