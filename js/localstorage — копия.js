var cart = {};

$(document).ready(function () {
    showBasket();
    $(".add-to-basket").on('click', addToBasket);
    // $("#product").on('change', changeNumber)
    });

function addToBasket() {
// добавление в корзину
    var idGood = $(this).attr('data-id');
    var size = $(".radio:checked").val();
    var count_product = Number($('#product').val());
    // var count_product = changeNumber();
    var price = $("#price").text();
    var name = idGood+size;
    if(size!== undefined) {

        // todo сделать запрос, проверка на количество
        $.ajax({
            type: "POST",
            url: "core.php",
            data : {
                "action": "addToBasket",
                "good_id": idGood,
                "count_product": count_product,
                "size": size,
                "price": price
            },
            dataType: "JSON",
            success: function(data){
                var cartData = getCartData() || {}, // получаем данные корзины или создаём новый объект, если данных еще нет
                itemName = name;
                itemId = idGood,// ID товара 0
                itemSize = size, // размер 1
                itemCount = count_product , // количество товара 2
                itemPrice = price; //цена 3

                if (cartData.hasOwnProperty(itemName)) { // если такой товар уже в корзине, то добавляем + к его количеству
                    a = cartData[itemName][2] + Number(itemCount);
                    if (data.amount>= a){
                        alert("Товар добавлен");
                        cartData[itemName][2] += Number(itemCount);
                    }
                    else {
                        alert("Товар уже есть, cлишком большое количество!");
                    }
                }
                else { // если товара в корзине еще нет, то добавляем в объект

                    if (data.amount>= itemCount){
                        cartData[itemName] = [itemId, itemSize, itemCount, itemPrice];
                        alert("Товар добавлен");
                    }
                    else {
                        alert("Слишком большое количество! Максимально - " + data.amount);
                    }

                }
                setCartData(cartData); // Обновляем данные в LocalStorage
                return false;
            }
        });
    }
    else{
        alert("Размер не выбран!");
    }
}

function addItem(data) {

    var str = getCookie("amount");
    if (str.localeCompare("no")) { //количество заказанных меньше, чем есть на складе

}
}


// Записываем данные в LocalStorage
function setCartData(o){
    localStorage.setItem('cart', JSON.stringify(o));
    return false;
}
// берём данные из локалстораж
function getCartData() {
    return JSON.parse(localStorage.getItem('cart'));
}

function saveBasket() {
    //сохранить корзину
    localStorage.setItem('cart',JSON.stringify(cart));  //корзину в строку
}

function showBasket() {
    var arr = "";
    for(var key in cart){
        arr += key + ' ---- ' + cart[key] + '  ';
    }
    $('.mini-basket').html(arr);
}

// возвращает cookie с именем name, если есть, если нет, то undefined
function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

    // var count_product = $('#product').val();


    // var id = $('.add-to-basket').attr('data-id');
    // //todo: поправить значения размеров
    // var size = $(".radio:checked").val();
    // var price = $("#price").text();
    // if (size!== undefined){
    //     $.post(
    //         "check.php",{
    //             "action" : "addToBasket",
    //             "good_id": id,
    //             "count_product": count_product,
    //             "size":size,
    //             "price": price
    //         // data: {, , , },
    //         // success: function(data) {alert( data+ " Товар добавлен");}
    //     });
    // }
    // else{
    //     alert("Размер не выбран!");
    // }
    //
    // return false;

// Получить значение атрибута alt первого изображения на странице
// и, используя его, установить значение атрибута title.

// var title = $("img").attr("alt") + " -> Увеличить";
// $("img:first").attr("title", title);