function checkRegistration() {
    if(getCookie("login") == undefined){
        alert("Зарегистрируйтесь, чтобы добавлять предметы в избранное!");
    }
    else {
        window.location = "account.php";
    }
}
// возвращает cookie с именем name, если есть, если нет, то undefined
function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}