// Đọc file JSON và thêm vào HTML
function docJSON(file, id) {
    fetch("./json/" + file)
        .then(function (docFileJS) {
            return docFileJS.json();
        })
        .then(function (khoaHoc) {
            let place = document.querySelector("#" + id);
            let out = "";
            for (let motKhoaHoc of khoaHoc) {
                out += `<a class="course" href="" title = "${motKhoaHoc.part} - ${motKhoaHoc.title_img}: ${motKhoaHoc.desc}">
                    <div class="subject-img">
                        <img
                            src="./assets/img/${motKhoaHoc.img}"
                            alt="${motKhoaHoc.title_img}"
                            class="img"
                        />
                    </div>
                    <div class="doc">
                        <h3 class="part">${motKhoaHoc.part}</h3>
                        <h2 class="title-img">${motKhoaHoc.title_img}</h2>
                        <p class="desc dots">
                            ${motKhoaHoc.desc}
                        </p>
                    </div>
                </a>`;
            }
            place.innerHTML = out;
        });
}

docJSON("listening.json", "list_listening");
docJSON("reading.json", "list_reading");
docJSON("speaking.json", "list_speaking");
docJSON("writing.json", "list_writing");
