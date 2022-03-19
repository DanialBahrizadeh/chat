let inputBar = document.querySelector(".search input"),
    searchBtn = document.querySelector(".search button");


searchBtn.onclick = () => {
    inputBar.classList.toggle("active");
    inputBar.focus();
    searchBtn.classList.toggle("active");
    inputBar.value = '';
};

inputBar.onkeyup = () => {
    let searchValue = inputBar.value;
    if (searchValue) {
        inputBar.classList.add("active");
    } else {
        inputBar.classList.remove("active");
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/search.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            let data = xhr.response;
            console.log(data);
            userList.innerHTML = data;
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchValue=" + searchValue);
}