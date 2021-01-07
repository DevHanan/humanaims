// Validation Code Inputs
let numberForm = document.querySelector(".numbersForm");

numberForm.addEventListener("keyup", inputValidation, false);
function inputValidation(e) {
  "use strict";
  if (e.target !== e.currentTarget) {
    // clicked Element
    let inputElement = e.target;
    if (inputElement.value.length == 1) {
      inputElement.classList.remove("empty");
      inputElement.classList.add("correct");
    } else {
      inputElement.classList.add("empty");
      inputElement.classList.remove("correct");
    }
    // *********
    let checkArray = [];
    if (
      inputElement.classList.contains("last") &&
      inputElement.classList.contains("correct")
    ) {
      Array.from(numberForm.children).forEach(function (element) {
        if (element.classList.contains("correct")) {
          checkArray.push("filled");
        }
      });
    }
  }
}

// Counter Down
const startingMinutes = 30;
let time = startingMinutes * 60;

const countdownEl = document.getElementById("counterDown");

setInterval(updateCountDown, 1000);

function updateCountDown() {
  "use strict";
  const minutes = Math.floor(time / 60);
  let seconds = time % 60;

  seconds = seconds < 10 ? "0" + seconds : seconds;

  countdownEl.textContent = `${minutes}:${seconds}`;
  time--;
  time = time < 0 ? 0 : time;
}
