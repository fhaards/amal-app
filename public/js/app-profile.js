var profilePages = document.querySelector("#profile-pages");
var totalAmal = profilePages.querySelector(".total-amal");

async function loadTotalAmal() {
    let tokens = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
    const response = await fetch("api/count/count-amal", {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": tokens,
        },
    });
    const responsejson = await response.json();
    console.log(responsejson);
}
loadTotalAmal();

// async function loadNames() {
//     const response = await fetch("api/count/count-amal");
//     const rs = await response.json();
//     console.log(rs);
// }

// loadNames();
