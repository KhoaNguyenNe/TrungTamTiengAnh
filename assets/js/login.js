// Nút di chuyển
document.getElementById("next").onclick = function () {
    var widthcmt = document.querySelector(".wrap").offsetWidth;
    document.getElementById("form-login").scrollLeft += widthcmt + 30;
};

document.getElementById("prev").onclick = function () {
    var widthcmt = document.querySelector(".wrap").offsetWidth;
    document.getElementById("form-login").scrollLeft -= widthcmt + 30;
};

const myInput = document.getElementById("psw");
const letter = document.getElementById("letter");
const capital = document.getElementById("capital");
const number = document.getElementById("number");
const length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function () {
    document.getElementById("pass-error").style.display = "block";
};

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function () {
    document.getElementById("pass-error").style.display = "none";
};

myInput.addEventListener("keyup", function () {
    validatePasswordComplexity();
    validatePasswordsMatch();
});

const dfpass = document.getElementById("df-psw");
const err_pass = document.querySelector(".df-pass");
const btn = document.getElementById("dangky"); // Đặt ID cho nút đăng ký

dfpass.addEventListener("keyup", function () {
    validatePasswordsMatch();
});

function validatePasswordComplexity() {
    var lowerCaseLetters = /[a-z]/g;
    var upperCaseLetters = /[A-Z]/g;
    var numbers = /[0-9]/g;

    var hasLowerCase = myInput.value.match(lowerCaseLetters);
    var hasUpperCase = myInput.value.match(upperCaseLetters);
    var hasNumbers = myInput.value.match(numbers);
    var hasMinimumLength = myInput.value.length >= 8;

    letter.classList.toggle("valid", hasLowerCase);
    letter.classList.toggle("invalid", !hasLowerCase);
    capital.classList.toggle("valid", hasUpperCase);
    capital.classList.toggle("invalid", !hasUpperCase);
    number.classList.toggle("valid", hasNumbers);
    number.classList.toggle("invalid", !hasNumbers);
    length.classList.toggle("valid", hasMinimumLength);
    length.classList.toggle("invalid", !hasMinimumLength);
}

function validatePasswordsMatch() {
    if (myInput.value === dfpass.value) {
        err_pass.style.visibility = "hidden";
        btn.style.opacity = "1";
        btn.disabled = false;
    } else {
        err_pass.style.visibility = "visible";
        btn.style.opacity = "0.7";
        btn.disabled = true;
    }
}

function signup(e) {
    event.preventDefault();
    var username = document.getElementById("name").value;
    var email = document.getElementById("mail-signup").value;
    localStorage.setItem("islog", "false");
    var password = document.getElementById("psw").value;
    var user = {
        username: username,
        email: email,
        password: password,
    };
    var json = JSON.stringify(user);
    localStorage.setItem(email, json);
    var prev = document.getElementById("prev");
    prev.click();
}

function login(e) {
    event.preventDefault();
    var email = document.getElementById("mail-log").value;
    var password = document.getElementById("pass-log").value;
    var user = localStorage.getItem(email);
    var data = JSON.parse(user);
    if (email === data.email && password === data.password) {
    localStorage.setItem("islog", "true")
        window.location.href = "./index.html";
    } else {
        var text = document.querySelector(".nhap_sai_mk");
        text.style.visibility = "visible";
    }
}
