var conn = new WebSocket('ws://63.142.254.38:3000');

conn.onopen = function(e) {
    var openText = "Вие се свързахте с call центъра на предмета Уеб технологии (СИ), ФМИ, СУ.";
    document.getElementById('chat-on-open').innerHTML += openText;
};

conn.onmessage = function(e) {
    var data = JSON.parse(e.data);
    if (data.error) {
        document.getElementById('error').innerHTML = data.error;
        return;
    } else {
        document.getElementById('error').innerHTML = '';
    }

    data = data.menu;
    document.getElementById('chat-container').innerHTML = '';
    for (var i = 0; i < data.length; i++) {
        document.getElementById('chat-container').innerHTML += '<br>' + data[i];
    }
};

function sendMessage() {
    var messageToBeSent = document.getElementById('inputField').value;
    conn.send(messageToBeSent);
    document.getElementById('inputField').value = '';
}

function loadComplaints() {
    var xhttp = new XMLHttpRequest();
    var serverResponse = '';
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            serverResponse = xhttp.responseText;
            document.getElementById('heading-complaints').className = '';
            document.getElementById('complaints').innerHTML = serverResponse;
        }
    };
    xhttp.open("GET", "http://63.142.254.38/web-chat/showComplaints.php", true);
    xhttp.send();
}

function loadCompliments() {
    var xhttp = new XMLHttpRequest();
    var serverResponse = '';
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            serverResponse = xhttp.responseText;
            document.getElementById('heading-compliments').className = '';
            document.getElementById('compliments').innerHTML = serverResponse;
        }
    };
    xhttp.open("GET", "http://63.142.254.38/web-chat/showCompliments.php", true);
    xhttp.send();
}