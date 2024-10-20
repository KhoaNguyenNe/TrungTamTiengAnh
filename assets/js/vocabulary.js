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
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAcFJREFUaEPtmTFOxDAQRd+WcALEEWihhwaJngPAGeigARroOAMcgB6Jhu2hpaRE3IASNCgjmcjZTGYnWYycJlrv2J73vx1vZmcUfs0Kz58KsGoHx3BgEzgCDoGtBvAVuAfugPdI6GiAA+AE2O9I8hG4AR6iICIBRPnbBclrzgJxHOVEJMApcGVU9gy4NsYuDIsEeAa2jUm9ADvG2EkANoA3YM2Y1CewboytAFahil5CAln8Ji7+MSouFH2Q6V5Z+U+Jr2TXPgHz1mdps17yeJXrw9oB2Gti5b6b9NP2X2dX7iBLAbrmTcEuBiSXC5XEzpOk+4YLAWhPctk0WGE0aVW1L+n0+1EA0gm6YJZJelIAnUxBZLnJEvGonXNmdAeGLAdPbAXwqBbZpzoQqaZnrOqAR7XIPtWBSDU9Y1UHPKpF9qkORKrpGas64FEtsk91IFJNz1j/3wFVJS1vaJuUOaJeDbvU17KNlHPSEk62nOP9f0AgtG6zLJCWaOQ+pOb0I4AXoK2ellO0vtO3tiVReekfnHB74CiAdFyByYGo0tbaUZ8IoQ7kJtNEZd+EqN1bYzEh/7GgMZbQpIgVYFK5M5N9A0aAVTEXnjtcAAAAAElFTkSuQmCC"/>
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

function docJSON3(file, id) {
  fetch("../json/" + file)
    .then(function (docFileJS) {
      return docFileJS.json();
    })
    .then(function (tuvungs) {
      let place = document.querySelector("#" + id);
      let out = "";
      for (let tuvung of tuvungs) {
        out += `<div class="item">
                <div class="item-left">
                    <div class="item-icon-grammar">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAcFJREFUaEPtmTFOxDAQRd+WcALEEWihhwaJngPAGeigARroOAMcgB6Jhu2hpaRE3IASNCgjmcjZTGYnWYycJlrv2J73vx1vZmcUfs0Kz58KsGoHx3BgEzgCDoGtBvAVuAfugPdI6GiAA+AE2O9I8hG4AR6iICIBRPnbBclrzgJxHOVEJMApcGVU9gy4NsYuDIsEeAa2jUm9ADvG2EkANoA3YM2Y1CewboytAFahil5CAln8Ji7+MSouFH2Q6V5Z+U+Jr2TXPgHz1mdps17yeJXrw9oB2Gti5b6b9NP2X2dX7iBLAbrmTcEuBiSXC5XEzpOk+4YLAWhPctk0WGE0aVW1L+n0+1EA0gm6YJZJelIAnUxBZLnJEvGonXNmdAeGLAdPbAXwqBbZpzoQqaZnrOqAR7XIPtWBSDU9Y1UHPKpF9qkORKrpGas64FEtsk91IFJNz1j/3wFVJS1vaJuUOaJeDbvU17KNlHPSEk62nOP9f0AgtG6zLJCWaOQ+pOb0I4AXoK2ellO0vtO3tiVReekfnHB74CiAdFyByYGo0tbaUZ8IoQ7kJtNEZd+EqN1bYzEh/7GgMZbQpIgVYFK5M5N9A0aAVTEXnjtcAAAAAElFTkSuQmCC"/>
                    </div>
                    <div class="item-name">${tuvung.vocabulary}</div>
                </div>
            </div>`;
      }
      place.innerHTML = out;
    });
}

docJSON1("voca-left.json", "grammar-items-left");
docJSON1("voca-right.json", "grammar-items-right");
docJSON2("practices.json", "list-practices");
docJSON3("vocabularybottomleft.json", "grammar-bottom-left");
docJSON3("vocabularybottomright.json", "grammar-bottom-right");
