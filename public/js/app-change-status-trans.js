var modalChangeStatus = document.querySelector("#change-status-trans-modal");

var changeStatusTrans = document.querySelectorAll("#table-trans tbody .changestatus-trans");
for (let i = 0; i < changeStatusTrans.length; i++) {
    (function () {
        changeStatusTrans[i].addEventListener("click", function (e) {
            e.preventDefault();
            var getIds = changeStatusTrans[i].getAttributeNode("getIds").value;
            loadTranscationToChange(getIds);
        },false);

        async function loadTranscationToChange(getIds) {
            var tokens = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            const responetrans = await fetch("api/transaction/" + getIds , {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": tokens,
                },
            });
            var detailResponse = await responetrans.json();
            var thisIdForChange = detailResponse.data[0].id_transaction;
            var thisStatusForChange = detailResponse.data[0].status;

            modalChangeStatus.querySelector(".detail-trans-id-change").innerHTML = getIds;

            var thisStatusForChange  = detailResponse.data[0].status;
            var setStatusStyle = detailResponse.data[0].status_style;
            modalChangeStatus.querySelector(".detail-trans-status-change").innerHTML =
                `<span class="` +
                setStatusStyle +
                ` text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md">Status :  ` +
                thisStatusForChange +
                `</span>`;

            var formUpdateTransForChange     = document.getElementById("update-transaction-change");
            formUpdateTransForChange.setAttribute("action", APP_URL + "/transaction/" + getIds + "/changeToComplete");
        }
    })();
}

// document.querySelector(".changestatus-trans").forEach((c) =>
//     c.addEventListener("click", function (d) {
//         d.preventDefault();
//         var getIds = this.getAttribute("getIds");
//         var transUrl = APP_URL + "/api/transaction/" + getIds;
//         loadTransaction(getIds);
//     })
// );
