
function init(){
    $.ajax({
       type: "post",
        url: "core.php",
       data: {
           "action": "init"
       },
       success: function (data) {
           data = JSON.parse(data);
           console.log(data);
           var out = '<select>';
           out += '<option data-id ="0">Новый товар</option>';
           for (var id in data){
               out += `<option data-id = "${id}">${data[id].name}</option>`
           }
           out += '</select>';
           $('.goods').html(out);

           $('.goods select').on('change', selectGoods)
       }
    });
}

function selectGoods(){
    var id = $('.goods select option:selected').attr('data-id');
    console.log(id);
    $.ajax({
        type: "post",
        url: "core.php",
        data: {
            "action": "selectOneGood",
            "id" : id
        },
        success: function (data) {
            data = JSON.parse(data);
            if (id == 0){
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
            }

        }
    });
}

function saveToDb(){
    var id = $('#good_id').val();

        $.ajax({
            type: "post",
            url: "core.php",
            data: {
                "action": "updateDB",
                "id" : id,
                "name" : $('#gname').val(),
                "price" : $('#gprice').val(),
                "description" : $('#description').val(),
                "preview" :  $('#preview').val()
            },
            success: function (data) {
                alert(data);
                $('#gname').val('');
                $('#gprice').val('');
                $('#preview').val('');
                $('#description').val('');
                $('#good_id').val('0');
                init();

            }
        });

}

$(document).ready(function () {
	init();
    $('.add-to-db').on('click', saveToDb);
});