const form = document.forms[0],
    SBtn = form.querySelector("[type=submit]"),
    errorText = form.querySelector(".error-txt");



form.onsubmit = () => {
    return false;
}
SBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            let data = xhr.response;
            if (data === "success") {
                window.location.href = "users.php";
            } else {
                errorText.classList.add("active");
                errorText.textContent = data;
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}