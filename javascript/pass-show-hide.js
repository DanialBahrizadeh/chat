const passInput = document.querySelector("input[type='password']"),
    btn = passInput.nextElementSibling;

function toggle() {
    if (passInput.type === 'password') {
        passInput.type = 'text';
        btn.classList.add("active");
    } else {
        passInput.type = 'password';
        btn.classList.remove("active");
    }
}
btn.onclick = toggle;