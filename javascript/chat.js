const form = document.forms[0],
    input = form.querySelector("#input"),
    sendBtn = form.querySelector("button"),
    chatBox = document.querySelector(".chat-box");

form.onsubmit = () => {
    return false;
}
sendBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            chatBox.innerHTML += `<div class="chat outgoing">
                    <div class="details">
                        <p>${input.value}</p>
                    </div>
                </div>`;
            input.value = "";
        }
        scrollToBottom();
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            let data = xhr.response;
            if (data.length > 0) {
                chatBox.innerHTML = data;
            } else {
                chatBox.innerHTML = '<div class="placeholder">Send something</div>';
            }
            scrollToBottom();
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}, 500)

function scrollToBottom() {
    if (!chatBox.classList.contains("active")) {
        chatBox.scrollTop = chatBox.scrollHeight;
    }
}
function active() {
    chatBox.classList.add("active")
}
chatBox.addEventListener("scroll", active);
chatBox.addEventListener("mouseenter", active)
chatBox.addEventListener("mouseleave", () => {
    chatBox.classList.remove("active");
})