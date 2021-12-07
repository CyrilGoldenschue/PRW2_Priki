var input = document.getElementById("Days");
var select = document.getElementById("domainList");
var practices = document.getElementsByClassName("Practice")
var table = document.getElementById("tablePractice")


table.addEventListener("load", changeDaysAndDomain)
input.addEventListener("change", changeDaysAndDomain)
select.addEventListener("change", changeDaysAndDomain)

function changeDaysAndDomain(){
    const date = new Date();
    newDate = new Date(date.setDate(date.getDate() - input.value))

    for (i = 0; i < practices.length; i++) {
        let datePractice = new Date(practices[i].dataset.date);
        let domainPractice = practices[i].dataset.domain;



        if ((newDate.getDate() < datePractice.getDate() && select.value == domainPractice)) {
            console.log(domainPractice)
            console.log(practices[i])
            table.style.display = "table";
            practices[i].style.display = "table-row";
            document.getElementById("noPractice").style.display = "none";
        }else if((newDate.getDate() < datePractice.getDate() && select.value == 0)){
            practices[i].style.display = "table-row";
            table.style.display = "table";
            document.getElementById("noPractice").style.display = "none";
        }else{
            practices[i].style.display = "none";
            table.style.display = "none";
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
