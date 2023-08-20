var islog = localStorage.getItem("islog");

if (islog == "true") {
    var log = document.getElementById("log");
    log.style.display = "none";
}

function setTimePut(time) {
    var interval = setInterval(function () {
        localStorage.setItem("islog", "false");
    }, time);
}

setTimePut(60000); // 10 phút
