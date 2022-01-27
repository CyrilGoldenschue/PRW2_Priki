var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        this.classList.toggle("active");

        /* Toggle between hiding and showing the active panel */
        var panels = document.getElementsByClassName("panel");

        for (x = 0; x < panels.length; x++) {
            if (panels[x].dataset['opinion_comment'] == this.dataset['opinion']) {
                if (panels[x].style.display === "table-row") {
                    panels[x].style.display = "none";
                } else {
                    panels[x].style.display = "table-row";
                    panels[x].style.colspan = "3";
                }
            }
        }
    });
}
