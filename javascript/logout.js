let logOut = document.querySelector(".logout");

window.onbeforeunload = function () {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/logout.php", true)
    xhr.onload = () => {
        if (xhr.readyState == 4 && xhr.statusCode == 200) {

        }
    }
    xhr.send();
}
window.onoffline = () => {
    let off = setTimeout(() => {
        window.location.href = logOut.href;
    }, 10000)
    window.ononline = () => {
        clearTimeout(off);
    }
}
