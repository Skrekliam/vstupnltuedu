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


let largeSize = true;
let textSize = 25;
let btnVal = "Збільшити";
const form = document.getElementsByTagName("form")[0];
const btnCng = document.getElementById("changeSize");
const inputs = document.getElementsByTagName("input");
const options = document.getElementsByTagName("option");
const submitBtn = document.getElementById("submit");
const prep = document.getElementById("basic-addon1");
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
  prep.fontSize = textSize + "px";
  btnCng.textContent = btnVal + " розмір полів";
  form.style.fontSize = textSize + "px";
  submitBtn.style.fontSize = textSize + "px";
  largeSize = !largeSize;
}
