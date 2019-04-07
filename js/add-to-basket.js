$(document).ready(function () {
    $(".add-to-basket").click(function () {
        var count_product = $('#product').val();
        var id = $('.add-to-basket').attr('data-id');
        //todo: поправить значения размеров
        var size = $(".radio:checked").val();
        var price = $("#price").text();
        if (size!== undefined){
            $.ajax ({
                type: "POST",
                url: "check.php",
                data: {good_id: id, count_product: count_product, size:size, price: price},
                success: function(data) {alert( data+ " Товар добавлен");}
            });
        }
        else{
            alert("Размер не выбран!");
        }



        return false;
    });
});
// Получить значение атрибута alt первого изображения на странице
// и, используя его, установить значение атрибута title.

// var title = $("img").attr("alt") + " -> Увеличить";
// $("img:first").attr("title", title);