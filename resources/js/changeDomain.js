var select = document.getElementById("domainList");
var practices = document.getElementsByClassName("Practice")
var table = document.getElementById("tablePractice")


table.addEventListener("load", changeDomain)
select.addEventListener("change", changeDomain)


function changeDomain(){
    console.log(select.value)

}
