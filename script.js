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

const bDate = document.getElementById('inputBirthday');
const date1 = new Date();
bDate.setAttribute('max', (1900+date1.getYear()-16) +  '-08-01')


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
