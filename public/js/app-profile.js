var profilePages = document.querySelector("#profile-pages");
var totalAmal = profilePages.querySelector(".total-amal");

async function loadTotalAmal() {
    var token = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    const responetotal = await fetch(APP_URL + "/count/count-amal", {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": token,
        },
    });

    var getTotalAmal = await responetotal.json();
    console.log(getTotalAmal);
    totalAmal.innerHTML = getTotalAmal;
}

loadTotalAmal();
