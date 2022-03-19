let userList = document.querySelector(".users-list");

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/users.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            let data = xhr.response;
            if (!inputBar.classList.contains("active")) {
                userList.innerHTML = data;
            }
        }
    }
    xhr.send();
}, 500)