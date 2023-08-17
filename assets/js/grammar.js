// Đọc file JSON và thêm vào HTML
function docJSON1(file, id) {
    fetch("../json/" + file)
        .then(function (docFileJS) {
            return docFileJS.json();
        })
        .then(function (khoaHoc) {
            let place = document.querySelector("#" + id);
            let out = "";
            for (let motKhoaHoc of khoaHoc) {
                out += `<div class="item">
                <div class="item-left">
                    <div class="item-icon-grammar">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAdtJREFUaEPtWFluwyAQJSdre7K2J2t7s+pJmYhgZmVccEWkfCTG8LYZsG/l4p/bxfGXTWC2g9uB7cCgAleI0Med40sp5bOU8l1zXpkAgL93DHrCvBoBUrsHnLgsSYBTuzUA8XlbJUIAjVy/Oup4OgFLRCQ+UH9KEVsjQl3mi2HxpwS8agM87gF4LlaHpnNGF7KqTSITcPyWwB/yjxuyCHjVxtoUFwCD4lxsiGg6ASyKr9SzuYKsVbeAxzyH/Ecd8EakJlEDx/+euYYIRCLSqj8CnhVbqwGPQpa40BjvvN38SxHyLtADj0V/7jGpr0fmbt17zNdzQGpl1l2fWzACni1gzoHoItQaqV5asiPCsFGXaoBapPWwxdqsbFCaq2z+PW1UIiMBt/Z4iUQKgXqBevPqFSmNzQCvxTLtKNEqOFJH7VzdDYwGafuAls/e9UzwasyzCWTFRjzA1aptAk2GsuMj5l/NV6AA/i0BemjxaqJGXB3gXLF3XKCNzuuOuIGd1UZbAu0u7TmeTCcgHTEsbqgFfEYRkwMSeOtDzRQCUBbWP709E+pIipSpPk2DnIUcGd5GypT/MyIUAV+fXvGKRjrhHuZfxYEw8U0gLF3SjduBJCHD02wHwtIl3fgLtFNlMeuotM0AAAAASUVORK5CYII="/>
                    </div>
                    <div class="item-name">${motKhoaHoc.desc}</div>
                </div>
            </div>`;
            }
            place.innerHTML = out;
        });
}

function docJSON2(file, id) {
    fetch("../json/" + file)
        .then(function (docFileJS) {
            return docFileJS.json();
        })
        .then(function (practices) {
            let place = document.querySelector("#" + id);
            let out = "";
            for (let practice of practices) {
                out += `<a href="#">
                <div class="list-item">
                    <div class="list-item-name">${practice.desc}</div>
                    <div class="list-item-icon"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAOZJREFUaEPtmEsOwjAUA92bcTPgZHA0lEU2iE8kv3koyF110aQeT6Q0PbT5dWyeXwH4tcEYiAGzgSwhs0B7eAzYFZoTxMCbAk+S7ma5S8MJAxdJZ0lXSeMevaoBZvgZGoeoBBjL5vaibhSiEmBkfzaAm6gGaIcgAFohKIA2CBKgBYIGwCE6AFCILgAMIgCLHzrYBtdhAAs/yqMB0PA0AB6eBGgJTwG0hScAWsNXA/zlgQY9jVUbmHva1of6CbH1b5XFr4uax+iduCblh1kCgFf85QUxEANmA1lCZoH28BiwKzQn2N7AAwEtLjELaN2HAAAAAElFTkSuQmCC"/></div>
                </div>
            </a>`;
            }
            place.innerHTML = out;
        });
}

docJSON1("grammar-left.json", "grammar-items-left");
docJSON1("grammar-right.json", "grammar-items-right");
docJSON2("practices.json", "list-practices");
