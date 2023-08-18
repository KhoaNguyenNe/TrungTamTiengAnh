let numOfArr;

function docJSON(file, id) {
    fetch("../json/" + file)
        .then(function (docFileJS) {
            return docFileJS.json();
        })
        .then(function (blogs) {
            let place = document.querySelector("#" + id);
            let hold = "";
            let out = "";
            numOfArr = blogs.length;
            blogs.forEach(function (blog, index) {
                hold += `<div class="blg">
                    <div
                        class="img"
                        title="${blog.title}"
                    >
                        <img
                            src="./assets/img/${blog.img}"
                            alt="${blog.title}"
                            class="blg-img"
                        />
                    </div>

                    <div class="info">
                        <h3 class="inf-title">
                            ${blog.title}
                        </h3>
                        <p class="time">${blog.time}</p>
                        <p class="desc">
                            ${blog.desc}
                        </p>
                        <a href="#" class="blg-btn">
                            <span class="txt"
                                >Read more
                                <i class="fa-solid fa-arrow-right"></i
                            ></span>
                        </a>
                    </div>
                </div>`;

                // Khi đã thêm 6 thẻ .blg, thêm thẻ .item và reset hold
                if ((index + 1) % 6 === 0 || index === blogs.length - 1) {
                    let itemClass = index === 5 ? "item" : "item none";
                    let item = `<div class="${itemClass}">${hold}</div>`;
                    out += item;
                    hold = "";
                }
            });
            place.innerHTML = out;
        });
}

docJSON("blog.json", "blog-list");
