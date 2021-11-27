var currencyInput = document.querySelector('input[type="currency"]');
var currency = "IDR"; // https://www.currency-iso.org/dam/downloads/lists/list_one.xml
var formBeramalId = document.getElementById("form-beramal");
var formBeramal = document.querySelector("#form-beramal");
var submitBeramal = formBeramal.querySelector(".submitForm");

//
var aliases = formBeramal.querySelector(".aliases");
var amount = formBeramal.querySelector(".amount");
var detailAliases = document.getElementById("detail-aliases");
var detailAmounts = document.getElementById("detail-amount");
var detailPayment = document.getElementById("detail-payment");
var setAliases,
    setAmount = 0;

// format inital value
onBlur({ target: currencyInput });

// bind event listeners
currencyInput.addEventListener("focus", onFocus);
currencyInput.addEventListener("blur", onBlur);

function localStringToNumber(s) {
    return Number(String(s).replace(/[^0-9.-]+/g, ""));
}

function onFocus(e) {
    var value = e.target.value;
    e.target.value = value ? localStringToNumber(value) : "";
}

function onBlur(e) {
    var value = e.target.value;

    var options = {
        maximumFractionDigits: 0, //number at the end currency
        currency: currency,
        style: "currency",
        currencyDisplay: "symbol",
    };

    e.target.value =
        value || value === 0
            ? localStringToNumber(value).toLocaleString(undefined, options)
            : "";
}

submitForm();
formSummary();

//Defining the values

function submitForm() {
    async function loadPayment() {
        const response = await fetch("api/payments/getall");
        var payment = await response.json();
        var getImagesUrl = STORAGE_URL + "payment_method/";
        var totalData = payment.total;
        var selval = "";
        var selectPayment = formBeramal.querySelector(".select-payment");
        let i = 0;
        for (i; i < totalData; i++) {
            // var element = data[i];
            selval +=
                `<label class="mb-2 flex justify-start items-center text-truncate rounded-lg border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 pl-4 pr-6 py-3">
                            <div class="text-green-400 mr-3">
                                <input type="radio" id="paymethods" name="method_id" value="` +
                payment.data[i].payment_name +
                `" class="payments-methods form-radio focus:outline-green-400 focus:shadow-outline" />
                            </div>
                            <div class="select-none text-gray-700 font-bold text-md flex justify-between w-full items-center">
                                <img class="max-h-8 ml-5" src="` +
                getImagesUrl +
                payment.data[i].image +
                `">
                                <div class="w-1/2 text-right">
                                ` +
                payment.data[i].payment_name +
                `
                                </div>
                            </div>
                        </label>`;

            selectPayment.innerHTML = selval;
            // if (document.getElementById("paymethods").checked) {
            //     rate_value = document.getElementById("paymethods").value;
            //     console.log(rate_value);
            // }

            // var checkRadio = document.querySelector(
            //     'input[name="method_id"]:checked'
            // );

            // if (checkRadio != null) {
            //     detailPayment.innerHTML =
            //         checkRadio.value + " radio button checked";
            // } else {
            //     detailPayment.innerHTML = "No one selected";
            // }
        }
    }

    loadPayment();

    submitBeramal.addEventListener("click", function (event) {
        event.preventDefault;
        var sendAliases = getValuesAliases();
        var sendAmount = getValuesAmount();
        var payMethod = formBeramal.querySelector(".payments-methods").value;
        console.log(sendAliases + sendAmount + payMethod);
    });
}

function formSummary() {
    aliases.addEventListener("change", function (event) {
        event.preventDefault();
        setAliases = this.value;
        detailAliases.innerHTML = setAliases;
    });

    amount.addEventListener("change", function (event) {
        event.preventDefault();
        setAmount = this.value;
        detailAmounts.innerHTML = setAmount;
    });

    // detailPayment.innerHTML = val;
}

function app() {
    return {
        step: 1,
        payment: "",
        complete: "",
    };
}

// const response = await fetch("api/payment/getall");
// const data = await response.json();
// return data;

// loadPayment().then((data) => {
//     console.log(data);
// });

// let token = document
//     .querySelector('meta[name="csrf-token"]')
//     .getAttribute("content");

// const response = await fetch("api/payments/getall", {
//     method: "GET",
//     headers: {
//         "Content-Type": "application/json",
//         "X-CSRF-TOKEN": token,
//     },
// });
// const responsejson = await response.json();
// console.log(responsejson.payment_name);
