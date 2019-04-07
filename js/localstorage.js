var cart = {};

$(document).ready(function () {

    $(".add-to-basket").on('click', addToBasket);
    // $("#product").on('change', changeNumber)
    });

function addToBasket() {
// добавление в корзину
    var idGood = $(this).attr('data-id');
    var size = $(".radio:checked").val();
    var count_product = Number($('#product').val());
    // var count_product = changeNumber();
    // var price = $("#price").text();
    var name = idGood+'+'+ size;
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
            },
            dataType: "JSON",
            success: function(data){
                var cartData = getCartData() || {}, // получаем данные корзины или создаём новый объект, если данных еще нет
                itemName = name;
                itemId = idGood;// ID товара 0
                itemSize = size; // размер 1
                itemCount = count_product; // количество товара 2
                // itemPrice = data.price; //цена 3
                // itemTitle = data.price; //цена 3
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
                    if (data.amount>= Number(itemCount)){
                        cartData[itemName] = [itemId, itemSize, itemCount];
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


// Записываем данные в LocalStorage
function setCartData(o){
    localStorage.setItem('cart', JSON.stringify(o));
    return false;
}
// берём данные из локалстораж
function getCartData() {
    return JSON.parse(localStorage.getItem('cart'));
}
