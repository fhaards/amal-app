var formDeleteSlider = document.getElementById("delete-slider");
document.querySelectorAll("#table-slider tbody .delete-slider").forEach((e) =>
    e.addEventListener("click", function (b) {
        b.preventDefault();
        var getId = this.getAttribute("data-id");
        // var transUrl = APP_URL + "/api/homecontent/" + getId;
        formDeleteSlider.setAttribute("action", APP_URL + "/homecontent/" + getId);
    })
);


