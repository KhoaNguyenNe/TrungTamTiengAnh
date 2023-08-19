// Nút di chuyển
document.getElementById("next").onclick = function () {
    var widthcmt = document.querySelector(".wrap").offsetWidth;
    document.getElementById("form-login").scrollLeft += widthcmt + 30;
};

document.getElementById("prev").onclick = function () {
    var widthcmt = document.querySelector(".wrap").offsetWidth;
    document.getElementById("form-login").scrollLeft -= widthcmt + 30;
};