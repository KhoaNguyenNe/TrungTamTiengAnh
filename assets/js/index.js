// Đọc file JSON và thêm vào HTML
function docJSON(file) {
  fetch("../json/" + file)
    .then(function (docFileJS) {
      return docFileJS.json();
    })
    .then(function (comments) {
      let place = document.querySelector("#list");
      let out = "";
      for (let comment of comments) {
        out += `<div class="comment">
            <div class="cmts">
                <h3 class="heading">Great platform</h3>
                <div class="observe">
                    <img
                        src="../assets/img/comments_open.svg"
                        alt="open"
                        class="open"
                    />
                    <div class="info">
                        <p class="obs">
                            ${comment.content}
                        </p>
                        <div class="avatar">
                            <img
                                src="../assets/img/${comment.avatar}"
                                alt="avatar"
                                class ="avt"
                            />
                            <div class="name-stars">
                                <p class="name">
                                    ${comment.name}
                                </p>
                                <img
                                    src="../assets/img/5Stars.svg"
                                    alt="5stars"
                                    class="stars"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>`;
      }
      place.innerHTML = out;
    });
}

docJSON("comment.json");
// Nút di chuyển
document.getElementById("next").onclick = function () {
  var widthcmt = document.querySelector(".comment").offsetWidth;
  document.getElementById("form-List").scrollLeft += widthcmt + 30;
};

document.getElementById("prev").onclick = function () {
  var widthcmt = document.querySelector(".comment").offsetWidth;
  document.getElementById("form-List").scrollLeft -= widthcmt + 30;
};

// Đếm thời gian

const numbers = [
  { id: "daily-count", value: 5000 },
  { id: "star-count", value: 120 },
  { id: "app-count", value: 20000 },
  { id: "sub-count", value: 30000 },
];

numbers.forEach((number) => {
  const element = document.getElementById(number.id);
  element.setAttribute("final-number", number.value);
});

function animateNumber(
  elementId,
  finalNumber,
  duration = 3000,
  startNumber = 0
) {
  let currentNumber = startNumber;
  const increment = Math.ceil(finalNumber / (duration / 17));
  const element = document.getElementById(elementId);
  const interval = setInterval(() => {
    currentNumber = Math.min(currentNumber + increment, finalNumber);
    element.innerText = currentNumber.toLocaleString();
    if (currentNumber >= finalNumber) {
      clearInterval(interval);
    }
  }, 17);
}

function isElementInViewport(element) {
  const rect = element.getBoundingClientRect();
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <=
      (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
}

let animationTriggered = false;

function checkElementsVisibility() {
  const elementsToAnimate = document.querySelectorAll(".count-animate");

  elementsToAnimate.forEach((element) => {
    if (isElementInViewport(element)) {
      if (!element.classList.contains("animated")) {
        const finalNumber = parseInt(element.getAttribute("final-number"));
        animateNumber(element.id, finalNumber);
        element.classList.add("animated");
      }
    }
  });

  if (
    !animationTriggered &&
    isElementInViewport(document.getElementById("daily-count"))
  ) {
    numbers.forEach(({ id, value }) => {
      animateNumber(id, value);
    });
    animationTriggered = true;
  }
}

document.addEventListener("DOMContentLoaded", function () {
  window.addEventListener("scroll", checkElementsVisibility);
  checkElementsVisibility();
});

// Thêm text cho phần more information
var btn = document.querySelector(".continute");
var info = document.querySelectorAll(".not-first");

btn.onclick = function () {
  if (btn.innerText === "Xem thêm") {
    for (var i = 0; i < info.length; i++) info[i].classList.remove("none");
    btn.innerText = "Ẩn bớt";
  } else {
    for (var i = 0; i < info.length; i++) info[i].classList.add("none");
    btn.innerHTML = "Xem thêm";
  }
};
