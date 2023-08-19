function initializeTabs(tabItemClassName, tabPaneClassName, lineClassName) {
    const $ = document.querySelector.bind(document);
    const $$ = document.querySelectorAll.bind(document);

    const tabs = $$(`.${tabItemClassName}`);
    const panes = $$(`.${tabPaneClassName}`);

    const line = $(`.${lineClassName}`);

    function activateTab(index) {
        const tab = tabs[index];
        const pane = panes[index];

        $(`.${tabItemClassName}.active`).classList.remove("active");
        $(`.${tabPaneClassName}.active`).classList.remove("active");

        line.style.left = tab.offsetLeft + "px";
        line.style.width = tab.offsetWidth + "px";

        tab.classList.add("active");
        pane.classList.add("active");
    }

    tabs.forEach((tab, index) => {
        tab.addEventListener("click", () => {
            activateTab(index);
        });
    });

    // Chỉ định line đầu tiên -> cho tab đầu
    activateTab(0);
}

document.addEventListener("DOMContentLoaded", () => {
    initializeTabs("tab-tips", "tp-tips", "tab-l");

    // Chạy hàm initializeTabs với tab mặc định là "Toeic Listening Tips"
    initializeTabs("tips-listen", "tp-tips-listen", "l-tips-listen");

    const tipsListenTab = document.querySelector(".tab-tips:nth-child(1)");
    const tipsReadTab = document.querySelector(".tab-tips:nth-child(2)");

    tipsListenTab.addEventListener("click", () => {
        initializeTabs("tips-listen", "tp-tips-listen", "l-tips-listen");
    });

    tipsReadTab.addEventListener("click", () => {
        initializeTabs("tips-read", "tp-tips-read", "l-tips-read");
    });
});

function docJSON(file, id) {
    fetch("./json/" + file)
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            const blogs = data[id];
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

                if (index < 5 && index === blogs.length - 1) {
                    let item = `<div class="item-blog it${id}">${hold}</div>`;
                    out += item;
                    hold = "";
                }

                if ((index + 1) % 6 === 0 || index === blogs.length - 1) {
                    let itemClass =
                        index === 5
                            ? "item-blog it" + id
                            : "item-blog it" + id + " none";
                    let item = `<div class="${itemClass}">${hold}</div>`;
                    out += item;
                    hold = "";
                }
            });

            place.innerHTML = out;

            const loadMoreButton = document.getElementById("load-more-" + id);
            const items = document.querySelectorAll(".it" + id);

            let currentItemIndex = 1;

            if (currentItemIndex >= items.length - 1) {
                loadMoreButton.style.display = "none";
            }
            else {
                loadMoreButton.style.display = "flex"
            }

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
    docJSON("tips.json", "part1");
    docJSON("tips.json", "part2");
    docJSON("tips.json", "part3");
    docJSON("tips.json", "part4");
    docJSON("tips.json", "part5");
    docJSON("tips.json", "part6");
    docJSON("tips.json", "part7");
});
