function sendMessage() {
    var message = document.getElementById("message").value;
    if (message.trim() !== "") {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "save_message.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById("message").value = "";
                fetchMessages();
            }
        };
        xhr.send("message=" + encodeURIComponent(message));
    }
}

function fetchMessages() {
    var messagesDiv = document.getElementById("messages");
    messagesDiv.innerHTML = "";

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_messages.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var messages = JSON.parse(xhr.responseText);
            for (var i = 0; i < messages.length; i++) {
                var messageDiv = document.createElement("div");
                messageDiv.textContent = messages[i];
                messagesDiv.appendChild(messageDiv);
            }
        }
    };
    xhr.send();
}

// Cargar los mensajes al cargar la página
window.onload = function() {
    fetchMessages();
};
