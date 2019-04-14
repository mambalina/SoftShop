
function init(){
    $.ajax({
       type: "post",
        url: "core.php",
       data: {
           "action": "init"
       },
       success: function (data) {
           data = JSON.parse(data);
           // console.log(data);
           var out = '<select>';
           out += '<option data-id ="0">Новый товар</option>';
           for (var id in data){
               out += `<option data-id = "${id}">${data[id].name}</option>`
           }
           out += '</select>';
           $('.goods').html(out);
           $('.goods select').on('change', selectGoods);

           var out = '';
           out += `<p>Размер: <input type="text" id="" value="" style="width: 10%" class="one-size"> Количество: <input type="text" id="" value="" style="width: 10%" class = "amt"></p>`;
           $('.sizes').html(out);

           //вывод всех поставщиков
           $.ajax({
               type: "post",
               url: "core.php",
               data: {
                   "action": "selectProviders"
               },
                success: function (data) {
                    data = JSON.parse(data);
                   var out = '<select>';
                   for (var id in data){
                       out += `<option data-id = "${id}">${data[id].name}</option>`
                   }
                   out += '</select>';
                    $('.provider-name').html(out);
               }
           });

       }
    });
}

function selectGoods(){
    var id = $('.goods select option:selected').attr('data-id');


    //вывод информации о товаре
    $.ajax({
        type: "post",
        url: "core.php",
        data: {
            "action": "selectOneGood",
            "id" : id
        },
        success: function (data) {
            data = JSON.parse(data);
            // console.log(data);
            if (id == 0){
                $('#gname').val('');
                $('#gprice').val('');
                $('#preview').val('');
                $('#description').val('');
                $('#good_id').val('0');
                var out = '';
                out += `<p>Размер: <input type="text" id="" value="" style="width: 10%" class="one-size"> Количество: <input type="text" id="" value="" style="width: 10%" class = "amt"></p>`;
                $('.sizes').html(out);
            }
            else{
                $('#gname').val(data[id].name);
                $('#gprice').val(data[id].price);
                $('#preview').val(data[id].preview);
                $('#description').val(data[id].description);
                $('#good_id').val(data[id].id);
                if (data[id].gender == "м"){
                    $('.good select option:selected').text('Мужской');
                }
                else{
                    $('.good select option:selected').text('Женский');
                }
                //вывод информации о размерах
                $.ajax({
                    type: "post",
                    url: "core.php",
                    data: {
                        "action": "selectSizes",
                        "id" : id
                    },
                    success : function (data) {
                        data = JSON.parse(data);
                        console.log(data);
                        var out = '';
                        for (var id in data){
                            out += `<p>Размер: <input type="text" id="${id}" value="${data[id].size_name}" style="width: 10%"> Количество: <input type="text" id="${id}" value="${data[id].amount}" style="width: 10%"></p>`;
                        }
                        $('.sizes').html(out);
                    }
                });
                //вывод информации о поставщике
                $.ajax({
                    type: "post",
                    url: "core.php",
                    data: {
                        "action": "selectOneProvider",
                        "id" : id
                    },
                    success : function (data) {
                        // console.log(data);
                        data = JSON.parse(data);
                        $('.provider-name select option:selected').text(data.name);
                    }
                });
                //вывод информации о фото
                $.ajax({
                    type: "post",
                    url: "core.php",
                    data: {
                        "action": "selectPhotos",
                        "id" : id
                    },
                    success : function (data) {
                        data = JSON.parse(data);
                        // console.log(data);
                        var out = '';
                        for (var id in data){
                            out += `<p>Фото - <input type="text" id = "${id}" class='ph' value="${data[id].src}" style="width: 80%"></p>`;
                        }

                        $('.photos').html(out);
                    }
                });
                //вывод информации о категориях
                $.ajax({
                    type: "post",
                    url: "core.php",
                    data: {
                        "action": "selectCategories",
                        "id" : id
                    },
                    success : function (data) {
                        data = JSON.parse(data);
                        // console.log(data);
                        var out = '';
                        for (var id in data){
                            out += `<input type="text" id = "${id}" class='categ' value="${data[id].name}" >`;
                        }
                        $('.categories').html(out);
                    }
                });

//вывод информации о материалах
                $.ajax({
                    type: "post",
                    url: "core.php",
                    data: {
                        "action": "selectMaterials",
                        "id" : id
                    },
                    success : function (data) {
                        data = JSON.parse(data);
                        console.log(data);
                        var out = '';
                        for (var id in data){
                            out += `<input type="text" id = "${id}" class = 'mater' value="${data[id].name}" >`;
                        }

                        $('.materials').html(out);
                    }
                });


            }
        }

    });



    // $('.one-size').find('input').each(function () {
    //     sizes['name'] = $(this).val()
    // });
    // for (var i = 0; i<sz.length; i++){
    //     sizes[i] = sz.val();
    // }


}

function saveToDb(){
    var id = $('#good_id').val();
    var gender = $('.good select option:selected').attr('id');
    var gen;
    if (gender == "wom"){
        gen = 'ж';
    }
    else {
        gen = 'м';
    }
    //берём размеры и их количество
    var sizes = [];
    $('.sizes').find(':input').each(function (i, input) {
        sizes[$(this).attr('id')] = $(input).val();
    });
    console.log(sizes);
    //берём фотки
    var photo = [];
    $('.photos').find(':input').each(function (i, input) {
        photo.push($(input).val())
    });
    console.log(photo);
    //берём категории
    var category = [];
    $('.categories').find(':input').each(function (i, input) {
        category.push($(input).val())
        // category[$(this).attr('id')] = $(input).val();
    });
    console.log(category);
    //берём материалы
    var material = [];
    $('.materials').find(':input').each(function (i, input) {
        material.push($(input).val())
    });
    console.log(material);

    $.ajax({
            type: "post",
            url: "core.php",
            data: {
                "action": "updateDB",
                "id" : id,
                "name" : $('#gname').val(),
                "price" : $('#gprice').val(),
                "description" : $('#description').val(),
                "gender" : gen,
                "preview" :  $('#preview').val(),
                "sizes" : sizes,
                "photo" : photo,
                "category" : category,
                "material" : material
            },
            success: function (data) {
                alert(data);
                $('#gname').val('');
                $('#gprice').val('');
                $('#preview').val('');
                $('#description').val('');
                $('#good_id').val('0');
                $('.materials, .categories, .photos').find(':input').each(function (i, input) {
                    ($(input).val(''));
                });
                init();
            }
        });





}

$(document).ready(function () {
	init();
    $('.add-to-db').on('click', saveToDb);
});