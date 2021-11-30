/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/changeDays.js ***!
  \************************************/
var element = document.getElementById("Days");
var practices = document.getElementsByClassName("Practice");
var date = new Date();
element.addEventListener("change", changeDays);
window.onload = changeDays();

function changeDays() {
  for (i = 0; i < practices.length; i++) {
    var datePractice = new Date(practices[i].dataset.date);

    if (date.getDate() - element.value < datePractice.getDate()) {
      practices[i].style.display = "table-row";
      document.getElementById("tablePractice").style.display = "table";
      document.getElementById("noPractice").style.display = "none";
    } else {
      practices[i].style.display = "none";
      document.getElementById("tablePractice").style.display = "none";
      document.getElementById("noPractice").style.display = "block";
    }
  }
}
/******/ })()
;