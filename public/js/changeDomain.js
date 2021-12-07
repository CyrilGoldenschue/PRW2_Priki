/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/changeDomain.js ***!
  \**************************************/
var select = document.getElementById("domainList");
var practices = document.getElementsByClassName("Practice");
var table = document.getElementById("tablePractice");
table.addEventListener("load", changeDomain);
select.addEventListener("change", changeDomain);

function changeDomain() {
  for (i = 0; i < practices.length; i++) {
    var domainPractice = practices[i].dataset.domain;

    if (select.value == domainPractice) {
      console.log(domainPractice);
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