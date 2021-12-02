var input = document.getElementById("Days");
var practices = document.getElementsByClassName("Practice")
var table = document.getElementById("tablePractice")


table.addEventListener("load", changeDays)
input.addEventListener("change", changeDays)


function changeDays(){
    const date = new Date();
    newDate = new Date(date.setDate(date.getDate() - input.value))
    for (i = 0; i < practices.length; i++) {
        let datePractice = new Date(practices[i].dataset.date);

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
