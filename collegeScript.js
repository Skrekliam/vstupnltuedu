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
    "КИЇВ": "80",
    "м.Севастополь": "85",
  };

const err = document.querySelector("#err");
const inpObl = document.querySelector("#oblId");
const inpUniv = document.querySelector("#univId");
inpUniv.disabled = true;
inpObl.addEventListener("change", onInput);
function onInput(e) {
  var val = document.querySelector("#oblId").value;

  if (regions[val]) {
    err.textContent = "";
    inpUniv.textContent = "";
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
        err.textContent =
          "Помилка бази данних, введіть дані самостійно " + xhr.status;
      } else {
        let resp = JSON.parse(xhr.responseText);
        let univ = document.getElementById("univ");
        for (var els of resp) {
          let optionU = document.createElement("option");
          optionU.value = els["university_name"];
          univ.append(optionU);
        }
      }
    }
  };

  xhr.send();
}





