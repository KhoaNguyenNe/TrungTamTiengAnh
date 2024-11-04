function docJSON(file, id) {
    fetch("./json/" + file)
        .then(function (response) {
            return response.json();
        })
        .then(function (blogs) {
            let place = document.querySelector("#" + id);
            let hold = "";
            let out = "";

            blogs.forEach(function (blog, index) {
                hold += `<div class="blg">
                    <div class="img" title="${blog.title}">
                        <img src="./assets/img/${blog.img}" alt="${blog.title}" class="blg-img" />
                    </div>
                    <div class="info">
                        <h3 class="inf-title">${blog.title}</h3>
                        <p class="time">${blog.time}</p>
                        <p class="desc">${blog.desc}</p>
                        <a href="#" class="blg-btn">
                            <span class="txt">Read more <i class="fa-solid fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>`;

                if ((index + 1) % 6 === 0 || index === blogs.length - 1) {
                    let itemClass =
                        index === 5 ? "item-blog" : "item-blog none";
                    let item = `<div class="${itemClass}">${hold}</div>`;
                    out += item;
                    hold = "";
                }
            });

            place.innerHTML = out;

            const loadMoreButton = document.getElementById("load-more");
            const items = document.querySelectorAll(".item-blog");

            let currentItemIndex = 1;

            loadMoreButton.addEventListener("click", function () {
                showMoreItems(currentItemIndex, items, loadMoreButton);
                currentItemIndex++;
            });
        });
}

function showMoreItems(currentItemIndex, items, loadMoreButton) {
    if (currentItemIndex < items.length) {
        items[currentItemIndex].classList.remove("none");

        if (currentItemIndex >= items.length - 1) {
            loadMoreButton.style.display = "none";
        }
    }
}

document.addEventListener("DOMContentLoaded", function () {
    docJSON("blog.json", "blog-list");
});
