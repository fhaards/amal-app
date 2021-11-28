// define table of transcations
var modalTrans = document.querySelector("#detail-trans-modal");

document.querySelectorAll("#table-trans tbody .detail-trans").forEach((e) =>
    e.addEventListener("click", function () {
        var getId = this.getAttribute("thisid");
        var transUrl = APP_URL + "/api/transaction/" + getId;
        loadTransaction(transUrl);
    })
);

async function loadTransaction(transUrl) {
    const respTrans = await fetch(transUrl);
    const dataTrans = await respTrans.json();

    // Owner Information
    modalTrans.querySelector(".detail-owner-name").innerHTML =
        dataTrans.data[0].owner_name;

    modalTrans.querySelector(".detail-owner-phone").innerHTML =
        dataTrans.data[0].owner_phone;

    modalTrans.querySelector(".detail-owner-address").innerHTML =
        dataTrans.data[0].owner_address;

    // Payment Information
    modalTrans.querySelector(".detail-trans-aliases").innerHTML =
        dataTrans.data[0].aliases;

    modalTrans.querySelector(".detail-trans-amount").innerHTML =
        dataTrans.data[0].amount;

    modalTrans.querySelector(".detail-trans-created").innerHTML =
        dataTrans.data[0].created;

    var setStatusText = dataTrans.data[0].status;
    var setStatusStyle = dataTrans.data[0].status_style;
    modalTrans.querySelector(".detail-trans-status").innerHTML =
        `<span class="` +
        setStatusStyle +
        `text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md">Status :  ` +
        setStatusText +
        `</span>`;

}

// looping through table row

// for (let i = 0; i < detailel.length; i++) {
//     (function () {
//         detailel[i].addEventListener("click", function (event) {
//             event.preventDefault();
//             var getId = detailel[i].getAttributeNode("thisid").value;
//             loadTranscation(getId);
//         },false);

//         async function loadTranscation(getId) {
//             var token = document
//             .querySelector('meta[name="csrf-token"]')
//             .getAttribute("content");
//             const responetrans = await fetch("api/transaction/" + getId , {
//                 method: "GET",
//                 headers: {
//                     "Content-Type": "application/json",
//                     "X-CSRF-TOKEN": token,
//                 },
//             });

//             var detailResponse = await responetrans.json();
//             console.log(detailResponse);
//         }
//     })();
// }
