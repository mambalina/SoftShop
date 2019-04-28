

function checkRegistration() {
    var login = $.cookie('login');
    if(login == undefined){
        alert("Зарегистрируйтесь, чтобы добавлять предметы в избранное!");
    }
    else {
        var id = $(this).attr('data-id');
        if (id != undefined){
            var fav = {};
            if (localStorage.getItem('fav')){
                fav = JSON.parse(localStorage.getItem('fav'))
            }
            alert("Добавлено в желания");


            fav[id]=1;
            localStorage.setItem('fav', JSON.stringify(fav));
            console.log(fav);
        }
        else {
            alert('переход');
        }

        // window.location = "account.php";
    }
}
// возвращает cookie с именем name, если есть, если нет, то undefined
// function getCookie(name) {
//     var matches = document.cookie.match(new RegExp(
//         "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
//     ));
//     return matches ? decodeURIComponent(matches[1]) : undefined;
// }