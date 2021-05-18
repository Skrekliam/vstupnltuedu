const regions = {
  "Автономна Республіка Крим": "1",
  "Вінницька область": "05",
  "Волинська область": "07",
  "Дніпропетровська область": "12",
  "Донецька область": "14",
  "Житомирська область": "18",
  "Закарпатська область": "21",
  "Запорізька область": "23",
  "Івано-Франківська область": "26",
  "Київська область": "32",
  "Кіровоградська область": "35",
  "Луганська область": "44",
  "Львівська область": "46",
  "Миколаївська область": "48",
  "Одеська область": "51",
  "Полтавська область": "53",
  "Рівненська область": "56",
  "Сумська область": "59",
  "Тернопільська область": "61",
  "Харківська область": "63",
  "Херсонська область": "65",
  "Хмельницька область": "68",
  "Черкаська область": "71",
  "Чернівецька область": "73",
  "Чернігівська область": "74",
  КИЇВ: "80",
  "м.Севастополь": "85",
};

const err = document.querySelector("#err");
err.style.display = "none";

const inpObl = document.querySelector("#oblId");
const inpUniv = document.querySelector("#univId");
inpUniv.disabled = true;
inpObl.addEventListener("change", onInput);
function onInput(e) {
  var val = document.querySelector("#oblId").value;

  if (regions[val]) {
    err.textContent = "";
    err.style.display = "none";
    inpUniv.value = "";
    inpUniv.disabled = false;
    getApi(regions[val]);
  } else {
    inpUniv.disabled = true;

    err.textContent = "Виберіть область зі списку";
  }
}

let obl = document.getElementById("obl");
Object.keys(regions).forEach(function (key) {
  var valueC = regions[key];
  //   console.log(key);
  //   console.log(valueC);

  let optionC = document.createElement("option");
  optionC.id = valueC;
  optionC.value = key;
  obl.append(optionC);
});

function getApi(idObl) {
  var url = `https://registry.edbo.gov.ua/api/universities/?ut=1&lc=${idObl}&exp=json`;

  var xhr = new XMLHttpRequest();
  xhr.open("GET", url);

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      console.log(xhr.status);
      if (xhr.status !== 200) {
        err.style.display = "block";
        err.textContent =
          "Помилка бази данних, введіть дані самостійно (" + xhr.status + ")";
      } else {
        let univ = document.getElementById("univ");
        univ.innerHTML = "";
        let resp = JSON.parse(xhr.responseText);
        for (var els of resp) {
          let optionU = document.createElement("option");
          optionU.textContent = els["university_name"];
          univ.appendChild(optionU);
        }
      }
    }
  };

  xhr.send();
}

function clearF() {
  inpObl.value = "";
}

const yearEnd = document.getElementById("yearEnd");
const date = new Date().getFullYear();
for (let i = 0; i <= 6; i++) {
  let el = document.createElement("option");
  let curVal = date - i;
  el.text = curVal;
  el.setAttribute('value',curVal);
  yearEnd.appendChild(el);
}
