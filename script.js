(function () {
  "use strict";

  // Form validation
  var forms = document.querySelectorAll(".needs-validation");

  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener(
      "submit",
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });
})();

const bDate = document.getElementById("inputBirthday");
const date1 = new Date();
bDate.setAttribute("max", 1900 + date1.getYear() - 16 + "-08-01");

let largeSize = true;
let textSize = 25;
let btnVal = "Збільшити";
const form = document.getElementsByTagName("form")[0];
const btnCng = document.getElementById("changeSize");
const inputs = document.getElementsByTagName("input");
const options = document.getElementsByTagName("option");
const submitBtn = document.getElementById("submit");
function easyMode() {
  if (largeSize) {
    textSize = 25;
    btnVal = "Зменшити";
  } else {
    textSize = 16;
    btnVal = "Збільшити";
  }
  for (i of inputs) {
    i.style.fontSize = textSize + "px";
  }
  for (i of options) {
    i.style.fontSize = textSize + "px";
  }
  btnCng.textContent = btnVal + " розмір полів";
  form.style.fontSize = textSize + "px";
  submitBtn.style.fontSize = textSize + "px";
  largeSize = !largeSize;
}

let err = document.querySelector("#err");
let inpObl = document.querySelector("#oblId");
inpObl.addEventListener("change", onInput);
function onInput(e) {
  var val = document.querySelector("#oblId").value;

  if (regions[val]) {
    err.textContent = "";
    inpObl.textContent = "";
    getApi(regions[val]);
  } else {
    err.textContent = "Виберіть назву зі списку";
  }
}

let obl = document.getElementById("obl");
Object.keys(regions).forEach(function (key) {
  var valueC = regions[key];
  console.log(key);
  console.log(valueC);

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
        console.log(resp[0]["university_name"]);
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
