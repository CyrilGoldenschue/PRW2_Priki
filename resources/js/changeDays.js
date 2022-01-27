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
            table.style.display = "table";
            practices[i].style.display = "table-row";
            document.getElementById("noPractice").style.display = "none";
            document.getElementsByClassName("Domain")[0].style.display = "none";
            document.getElementsByClassName("Domain")[i+1].style.display = "none";
        }else if((newDate.getDate() < datePractice.getDate() && select.value == 0)){
            practices[i].style.display = "table-row";
            table.style.display = "table";
            document.getElementById("noPractice").style.display = "none";
            for(x = 0; x <= document.getElementsByClassName("Domain").length; x++){
                document.getElementsByClassName("Domain")[i].style.display = "table-cell";
            }

        }else if(select.options[select.selectedIndex].dataset.count == 0){
            practices[i].style.display = "none";
            table.style.display = "none";
            document.getElementById("noPractice").style.display = "block";
        }else{
            practices[i].style.display = "none";
        }
    }
}
