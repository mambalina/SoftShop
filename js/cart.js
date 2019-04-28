var cart = {};

function loadCart() {
	if (localStorage.getItem('cart')){
		// если есть - расшифровать и записать в переменную cart
		cart = getCartData();
		console.log(cart);
    }
        showBasket();
}

function showBasket() {
// вывод корзины
    if (!isEmpty(cart)) {
        var cssValues = {"font-size": "30px", "padding-top": "22%"};
        $('.all-cards').html('Корзина пуста!').height(55 + 'vh').css(cssValues);
        $('#num-of-goods').text(" 0");
        $('#oplata').hide();
        $('.allCost').hide();
    } else {
        $.ajax({
            type: "POST",
            url: "core.php",
            data: {
                "action": "showBasket"
            },
            dataType: "json",
            success: function (data) { // id, name, price, src
                // console.log(data);
                var idCard = JSON.parse(localStorage.getItem('cart'));

                var num = 0;
                var out = '';
                var allCount = 0;
                $.each(data, function (index, arr) { // id
                    for(var k in cart) {
                        var idProduct = k.split('+')[0];
                        var size = k.split('+')[1];
                        $.each (arr, function (idResultQuery, result) { //arr

                           if (result == parseInt(idProduct) && idResultQuery == "id" ){
                            out += `<div class="row" style="padding: 3%; ">`;
                           out += `<div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">`;
                               out += `<img src="${data[index].src}" alt="boots" class="preview" style="width: 200px">`;
                               out += `</div>`;
                               out += `<div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">`;
                               out += `<div class="descr">`;
                               out += `<h4 class="title">${data[index].name}</h4>`;
                               out += `<p class="inf">${idCard[k][1] + " размер"}</p>`;
                               out += `<a href="" onclick='deleteItem(this.id)' id = "${k}">Удалить</a>`;
                               out += `</div>`;
                               out += `</div>`;
                               out += `<div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">`;
                                   // <!--ввод кол-ва-->
                               out += `<div class="quantity-block">`;
                                  out += `<button class="quantity-arrow-minus" data-id = "${k}" onclick="minusGoods(this);"> - </button>`;
                               out += `<input class="quantity-num" type="number" id = "${k}" value="${idCard[k][2]}" readonly='readonly'/>`;
                                   out += `<button class="quantity-arrow-plus" data-id = "${k}" onclick="plusGoods(this);"> + </button>`;

                               out += `</div>`;
                               out += `</div>`;
                               out += `<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">`;
                                   // out += `<p class="cost"><span class="cost-value">${data[index].price}</span> грн.</p>`; цена за 1 товар
                               out += `<p class="cost"><span class="cost-value">${parseInt(`${data[index].price}`) * parseInt(`${idCard[k][2]}`)}</span> грн.</p>`;
                               out += `</div>`;
                               out += `</div>`;
                               allCount += parseInt(`${data[index].price}`) * parseInt(`${idCard[k][2]}`);
                                num++;
                           }

                       });
                    }
                });
                $('#num-of-goods').text(num);
                $('.all-cards').html(out);
                $('#allCost').text(allCount);
            }
        });
    }
}



function minusGoods(good) {
    id = $(good).data('id');
    if (cart[id][2] == 1){
        deleteItem(id);
    }
    else{
        cart[id][2]--;
    }
    setCartData();
    showBasket();
}

function plusGoods(good) {
    id = $(good).data('id');

    cart[id][2]++;
    setCartData();
    showBasket();
}

// Записываем данные в LocalStorage
function setCartData(){
    localStorage.setItem('cart', JSON.stringify(cart));
}

// берём данные из localStorage
function getCartData() {
    return JSON.parse(localStorage.getItem('cart'));
}

function isEmpty(cart){
	for (var key in cart)
		if (cart.hasOwnProperty(key)) return true;
		return false;
}
//удаение из корзины
function deleteItem(id){
    delete cart[id];
    setCartData();
    showBasket();
}

function sendEmail(){
    if (!$.cookie('login')) {
        var email = $('#email').val();
        var name = $('#name').val();
        var l_name = $('#l_name').val();

        if (email!= '' && name!= '' && l_name!=''){
            $.ajax({
                type: "post",
                url: "core.php",
                data: {
                    "action" : "addNewOrder",
                    "email" : email,
                    "name" : name,
                    "l_name" : l_name,
                    "cart" : cart
                },
                success : function (id) {
                    $.ajax({
                        method: "post",
                        url: "core.php",
                        data: {
                            "action": "sendEmail",
                            "email": email,
                            "name": name,
                            "l_name":l_name,
                            "cart": cart,
                            "id" : id
                        },
                        dataType: "json",
                        success: function (data) {
                            if(data==1){
                                alert('Заказ принят! Проверьте почту для просмотра информации');

                                localStorage.clear();
                                cart = {};
                                setCartData();
                                $('.popup_bg, .popup').fadeOut(500);
                                showBasket();
                            }
                            else{
                                alert('Повторите заказ')
                            }
                        }
                    });
                }
            });

        }
        else {
            alert('Заполните поля!');
        }
    }
    else{
        $.ajax({
            type: "post",
            url: "core.php",
            data: {
                "action" : "addNewOrder",
                "cart" : cart
            },
            success: function (id) {
                $.ajax({
                    method: "post",
                    url: "core.php",
                    data: {
                        "action": "sendEmail",
                        "cart": cart,
                        "id" : id
                    },
                    dataType: "json",
                    success: function (data) {
                        if(data==1){
                            alert('Заказ принят! Проверьте почту для просмотра информации');

                            localStorage.clear();
                            cart = {};
                            setCartData();
                            showBasket();
                        }
                        else{
                            alert('Повторите заказ')
                        }
                    }
                });
            }
        });


    }


}

$(document).ready(function () {
	loadCart();
    $('.popup, .popup_bg').hide();
	 $('#oplata').on('click', function () {
	     if ($.cookie('login')){
             sendEmail();
         }
	     else{
             $('.popup, .popup_bg').show();
             $('.popup_bg').animate({
                 opacity:0.8
             });

         }
         $('.popup_bg').click(function () {
             $('.popup_bg, .popup').fadeOut(500);
         });
     });


});