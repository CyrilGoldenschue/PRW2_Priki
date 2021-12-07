var input = document.getElementById("Days");
var select = document.getElementById("domainList");
var practices = document.getElementsByClassName("Practice")
var table = document.getElementById("tablePractice")


table.addEventListener("load", changeDays)
input.addEventListener("change", changeDays)
table.addEventListener("load", changeDomain)
select.addEventListener("change", changeDomain)

function changeDaysAndDomain(){
    const date = new Date();
    newDate = new Date(date.setDate(date.getDate() - input.value))



    for (i = 0; i < practices.length; i++) {
        let datePractice = new Date(practices[i].dataset.date);
        let domainPractice = practices[i].dataset.domain;
        if (select.value == domainPractice) {
            console.log(domainPractice)
            practices[i].style.display = "table-row";
            document.getElementById("tablePractice").style.display = "table";
            document.getElementById("noPractice").style.display = "none";
        }else{
            practices[i].style.display = "none";
            document.getElementById("tablePractice").style.display = "none";
            document.getElementById("noPractice").style.display = "block";
        }




        if (newDate.getDate() < datePractice.getDate()) {
            practices[i].style.display = "table-row";
            document.getElementById("tablePractice").style.display = "table";
            document.getElementById("noPractice").style.display = "none";
        }else{
            practices[i].style.display = "none";
            document.getElementById("tablePractice").style.display = "none";
            document.getElementById("noPractice").style.display = "block";
        }


    }
}

function changeDomain(){

    for (i = 0; i < practices.length; i++) {
        let domainPractice = practices[i].dataset.domain;
        if (select.value == domainPractice) {
            console.log(domainPractice)
            practices[i].style.display = "table-row";
            document.getElementById("tablePractice").style.display = "table";
            document.getElementById("noPractice").style.display = "none";
        }else{
            practices[i].style.display = "none";
            document.getElementById("tablePractice").style.display = "none";
            document.getElementById("noPractice").style.display = "block";
        }


    }

}
