
$(document).ready(function () {

    $('.dropdown-item').on('click', function () {
        // var a = $('.dropdown-item').text();
        // $('#btnGroupDrop1').html(a);
        $(this).addClass('active');
        // return false;
    });
    $('#filtr').on('click', function () {
        var filtrBy = $("input:checkbox:checked").map(function () {return $(this).attr('id')}).get();

        // var filtrBy = [];
        //
        // $("input:checkbox:checked").each(function () {
        //     filtrBy.push($(this).val());
        //
        // });

        console.log(filtrBy);
        // $.cookie('filtrBy', JSON.stringify(filtrBy));
        $.ajax({
            type: "get",
            url: "maintov.php",
            data: {
                "filtrBy" : filtrBy
            },
            success(){

            }
        });
    });

});