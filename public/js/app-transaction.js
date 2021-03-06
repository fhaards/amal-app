// define table of transcations
var modalTrans = document.querySelector("#detail-trans-modal");

document.querySelectorAll("#table-trans tbody .detail-trans").forEach((e) =>
    e.addEventListener("click", function (b) {
        b.preventDefault();
        var getId = this.getAttribute("thisid");
        var transUrl = APP_URL + "/api/transaction/" + getId;
        loadTransaction(transUrl);
    })
);

async function loadTransaction(transUrl) {
    const respTrans = await fetch(transUrl);
    const dataTrans = await respTrans.json();
    const getIds = dataTrans.data[0].id_transaction;
    var transProof = dataTrans.data[0].proofment;
    // console.log(transProof);
    // Owner Information
    modalTrans.querySelector(".detail-trans-id").innerHTML = getIds;
    modalTrans.querySelector(".detail-trans-input-id").value = getIds;

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
        ` text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md">Status :  ` +
        setStatusText +
        `</span>`;

    var formUpdateTrans     = document.getElementById("update-transaction");
    var imageProofmentElem  = document.querySelector("#img-proofment");
    var imageProofmentFile  = imageProofmentElem.querySelector(".img-proofment-file");
    var printButton         = document.querySelector("#print-trans");
    formUpdateTrans.setAttribute("action", APP_URL + "/transaction/" + getIds);
    printButton.setAttribute("href",APP_URL + "/transaction/" + getIds + "/print-invoice");
    
    if (setStatusText != "Unpaid") { //IF not unpaid status
        printButton.classList.remove("hidden");
        formUpdateTrans.classList.add("hidden");
        imageProofmentElem .classList.remove("hidden");
        imageProofmentFile.innerHTML = `<img class="w-32 rounded-lg" src="`+APP_URL + '/storage/transaction_proofment/' + transProof +`">`;
    } else { //If this status is unpaid
        printButton.classList.add("hidden");
        formUpdateTrans.classList.remove("hidden");
        imageProofmentElem.classList.add("hidden");
        imageProofmentFile.innerHTML = '';
    }
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
