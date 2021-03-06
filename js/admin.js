
function init(){

    var out = '';
    for (var i=0; i<4; i++){
        out += '<p>Фото - <input type="text" class="ph" style="width: 80%" value=""></p>';
    }
    $('.photos').html(out);

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

           $.ajax({
               type: "post",
               url: "core.php",
               data: {
                   "action": "selectAllSizes"
               },
               success: function (data) {
                   data = JSON.parse(data);
                   out = '<p>Размер: ';
                   // out += `<p>Размер: <input type="text" id="" value="" style="width: 10%" class="one-size"> Количество: <input type="text" id="" value="" style="width: 10%" class = "amt"></p>`;
                   out += `<select>`;
                   for (var id in data){
                       out += `<option data-id="${id}"style="width: 10%" class="one-size">${data[id].size_name}</option>`;
                   }
                   out += '</select> Количество: <input type="text" data-id="amt" value="" style="width: 10%" class = "amt" </p> ';
                   $('.sizes').html(out);
               }
           });


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

           $.ajax({
               type: "post",
               url: "core.php",
               data: {
                   "action": "selectAllCategories"
               },
               success: function (data) {
                   data = JSON.parse(data);
                   var out = '<select>';
                   for (var id in data){
                       out += `<option data-id = "${id}">${data[id].name}</option>`
                   }
                   out += '</select>';
                   $('.categories').html(out);
               }
           });
            $.ajax({
               type: "post",
               url: "core.php",
               data: {
                   "action": "selectAllMaterials"
               },
               success: function (data) {
                   data = JSON.parse(data);
                   var out = '<select>';
                   for (var id in data){
                       out += `<option data-id = "${id}">${data[id].name}</option>`
                   }
                   out += '</select>';
                   $('.materials').html(out);
               }
           });

       }
    });
}

function selectGoods(){
    var id = $('.goods select option:selected').attr('data-id');

    // if (id != 0){
    //     $(".button").append("<a onclick='deleteGood("+id+");' style='cursor: pointer'>Удалить</a>");
    // }

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
                init();
                $('#gname').val('');
                $('#gprice').val('');
                $('#preview').val('');
                $('#description').val('');
                $('#good_id').val('0');

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

                        // var out = '';
                        //
                        // for (var id in data){
                        //     out += `<p>Размер: <input type="text" data-id="${id}" value="${data[id].size_name}" style="width: 10%" readonly="readonly"> Количество: <input type="text" id="${id}" value="${data[id].amount}" style="width: 10%" class="amt"></p>`;
                        // }
                        // $('.sizes').html(out);


                        var out = '';
                        // out += `<p>Размер: <input type="text" id="" value="" style="width: 10%" class="one-size"> Количество: <input type="text" id="" value="" style="width: 10%" class = "amt"></p>`;
                        // out += ``;
                        for (var id in data){
                            out += '<p>Размер: <select>';
                            out += `<option data-id="${id}" style="width: 10%" class="one-size">${data[id].size_name}</option>`;
                            out += `</select> Количество: <input type="text" id="${id}" data-id="amt" value="${data[id].amount}" style="width: 10%" class = "amt" </p>`;

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
                        // var out = '';
                        // for (var id in data){
                        //     out += `<input data-id = "${id}"  class='categ' value="${data[id].name}" readonly="readonly">`;
                        // }
                        // $('.categories').html(out);
                        var out='';
                        for (var id in data){
                            out += '<select>';
                            out += `<option data-id = "${id}">${data[id].name}</option></select>`;
                        }
                        // out += '';
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
                        // for (var id in data){
                        //     out += `<input data-id = "${id}"  class='mater' value="${data[id].name}" readonly="readonly">`;
                        // }
                        // $('.materials').html(out);
                        for (var id in data){
                            out += `<select><option data-id = "${id}">${data[id].name}</option></select>`;
                        }
                        $('.materials').html(out);
                    }
                });
            }
        }
    });
}

function deleteGood(id) {
    // var id = i;
    $.ajax({
        type: "post",
        url: "core.php",
        data: {
            "action": "deleteGood",
            "id": id,
        },
        success: function () {
            alert("GOOD HAS BEEN DELETED!!!!")
        }
    });
}

function saveToDb(){
    var id = $('#good_id').val();
    var gender = $('.good select option:selected').attr('id');
    var provider = $('.provider-name select option:selected').attr('data-id');
    var gen;
    if (gender == "wom"){
        gen = 'ж';
    }
    else {
        gen = 'м';
    }
    var size = [];
    var key = 0;
    $('.sizes').find(':input').each(function (i, input) {
        if ($(input).attr('id') != undefined){
            size[key] = [$(input).val(),$(input).attr('id') ];
            key++;
        }
    });
    // var amt = [];
    // $('.amt').find('select option:selected').each(function (i, input) {
    //     amt.push($(input).attr('data-id'));
    // });

    // var size = [];
    // var key = 0;
    // $('.sizes').find(':input').each(function (i, input) {
    //     if ($(input).attr('id') != undefined){
    //         size[key] = [$(input).val(),$(input).attr('id') ];
    //         key++;
    //     }
    //
    // });


    // var size = [];
    // $('.sizes').find('select option:selected').each(function (i, input) {
    //     size.push($(input).attr('data-id'));
    // });
    //
    // var amt = [];
    // $('.amt').find('select option:selected').each(function (i, input) {
    //     amt.push($(input).attr('data-id'));
    // });
    console.log(size);

    //берём фотки
    var photo = [];
    $('.photos').find(':input').each(function (i, input) {
        photo.push($(input).val())
    });
    console.log(photo);

    var category = [];
    $('.categories').find('select option:selected').each(function (i, input){
        category.push($(input).attr('data-id'));
    });

    var material= [];
    $('.materials').find( 'select option:selected').each(function (i, input) {
        material.push($(input).attr('data-id'));
    });

    // var size = $('.sizes select option:selected').attr('data-id');
    // var amt = $('.amt').val();

    // if (id != 0){
    //
    //     //берём категории
    //     var category = [];
    //     $('.categories').find(':input').each(function (i, input) {
    //         category.push($(input).attr('data-id'))
    //         // category[$(this).attr('id')] = $(input).val();
    //     });
    //     console.log(category);
    //
    //     //берём материалы
    //     var material = [];
    //     $('.materials').find(':input').each(function (i, input) {
    //         material.push($(input).attr('data-id'));
    //
    //     });
    //
    //     //берём размеры и их количество
    //
    //     console.log(material);
    //
    //     // $.ajax({
    //     //     type: "post",
    //     //     url: "core.php",
    //     //     data: {
    //     //         "action": "updateDB",
    //     //         "id" : id,
    //     //         "name" : $('#gname').val(),
    //     //         "price" : $('#gprice').val(),
    //     //         "description" : $('#description').val(),
    //     //         "gender" : gen,
    //     //         "preview" :  $('#preview').val(),
    //     //         "sizes" : sizes,
    //     //         "photo" : photo,
    //     //         "category" : category,
    //     //         "material" : material
    //     //     },
    //     //     success: function (data) {
    //     //         alert(data);
    //     //         $('#gname').val('');
    //     //         $('#gprice').val('');
    //     //         $('#preview').val('');
    //     //         $('#description').val('');
    //     //         $('#good_id').val('0');
    //     //         $('.materials, .categories, .photos').find(':input').each(function (i, input) {
    //     //             ($(input).val(''));
    //     //         });
    //     //         init();
    //     //     }
    //     // });
    // }
    // else{    }

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
            "size" : size,
            // "amt" : amt,
            "photo" : photo,
            "category" : category,
            "material" : material,
            "provider" : provider
        },
        success: function () {

            $('#gname').val('');
            $('#gprice').val('');
            $('#preview').val('');
            $('#description').val('');
            $('#good_id').val('0');

            init();
        }
    });
}

function addSize() {
    $.ajax({
        type: "post",
        url: "core.php",
        data: {
            "action": "selectAllSizes"
        },
        success: function (data) {
            data = JSON.parse(data);
            out = '<p>Размер: ';
            out += `<select>`;
            for (var id in data){
                out += `<option data-id="${id}"style="width: 10%" class="one-size">${data[id].size_name}</option>`;
            }
            out += '</select> Количество: <input type="text" data-id="amt" value="" style="width: 10%" class = "amt" </p> ';
            $('.sizes').append(out);
        }
    });
}

function addCategory(){
    $.ajax({
        type: "post",
        url: "core.php",
        data: {
            "action": "selectAllCategories"
        },
        success: function (data) {
            data = JSON.parse(data);
            var out = '<select>';
            for (var id in data){
                out += `<option data-id = "${id}">${data[id].name}</option>`
            }
            out += '</select>';
            $('.categories').append(out);
        }
    });

}
function addMaterial(){
    $.ajax({
        type: "post",
        url: "core.php",
        data: {
            "action": "selectAllMaterials"
        },
        success: function (data) {
            data = JSON.parse(data);
            var out = '<select>';
            for (var id in data){
                out += `<option data-id = "${id}">${data[id].name}</option>`
            }
            out += '</select>';
            $('.materials').append(out);
        }
    });
}

$(document).ready(function () {
	init();
    $('.add-to-db').on('click', saveToDb);
    $('#add-size').on('click', addSize);
    $('#add-category').on('click', addCategory);
    $('#add-material').on('click', addMaterial);
});