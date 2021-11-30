const formeEditPayment = document.getElementById("edit-payment");
var paymentEdit = document.querySelector("#edit-payment");
var paymentName = paymentEdit.querySelector(".payment-name");
var paymentCate = paymentEdit.querySelector(".payment-category");
var submitEdit  = paymentEdit.querySelector(".submit");
var editorNotes = document.getElementById("edit-payment-notes");

document
    .querySelectorAll("#table-paymethod tbody .edit-paymethod")
    .forEach((e) =>
        e.addEventListener("click", function (event) {
            event.preventDefault();
            var id = this.getAttribute("data-id");
            let url = "api/payment/" + id + "/edit";

            async function loadNames() {
                const response = await fetch(url);
                const data = await response.json();
                paymentName.value = data.payment_name;
                paymentCate.value = data.category;
                // editorNotes.value = data.payment_notes;

                // CKEDITOR.instances['payment_notes'].setData('aaa');
                CKEDITOR.replace(editorNotes);
                // CKEDITOR.config.allowedContent = true;

                
                // var editor = CKEDITOR.instances['payment_notes'];
                // editor.insertText(data.payment_notes);
                // editor.getData();

                // CKEDITOR.instances.editorNotes.setData(data.payment_notes);

                //CKEDITOR ON EDIT
                // ClassicEditor.create(document.querySelector("#edit-notes"))
                //     .then((editor) => {
                //         editor.setData(data.payment_notes);
                //     })
                //     .catch((error) => {
                //         console.error(error);
                //     });
            }

            loadNames();

            formeEditPayment.addEventListener("submit", function (event) {
                event.preventDefault();
                const object = {
                    payment_name: paymentName.value,
                    category: paymentCate.value,
                    payment_notes: paymentNote.value,
                };
                postName(object);
                location.reload();
            });

            async function postName(object) {
                let token = document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content");

                const response = await fetch("api/payment/" + id, {
                    method: "PUT",
                    body: JSON.stringify(object),
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": token,
                    },
                });
                const responsejson = await response.json();
                return responsejson;
            }

            // submitEdit.addEventListener("click", function (event) {
            //     event.preventDefault();
            //     const formattedFormData = new FormData(paymentEdit);
            //     const object = formattedFormData;

            //     let token = document
            //         .querySelector('meta[name="csrf-token"]')
            //         .getAttribute("content");

            //     const request = new Request("api/payment/update/" + id, {
            //         method: "PUT",
            //         body: JSON.stringify(object),
            //         headers: {
            //             "Content-Type": "application/json",
            //             "X-CSRF-TOKEN": token,
            //         },
            //     });
            //     const response = await fetch(request);
            // });

            // submitEdit.addEventListener("click", function (event) {
            //     event.preventDefault();
            //     var formattedFormData = new FormData(paymentEdit);
            //     postData(formattedFormData);
            // });

            // async function postData(formattedFormData) {
            //     let token = document
            //         .querySelector('meta[name="csrf-token"]')
            //         .getAttribute("content");

            //     const object = formattedFormData;
            //     const response = await fetch("api/payment/" + id, {
            //         method: "PUT",
            //         headers: {
            //             "Content-Type": "application/json",
            //             "X-CSRF-TOKEN": token,
            //         },
            //         body: JSON.stringify(object)
            //     });
            //     const data = await response.text();
            //     console.log(data);
            // }

            // submitEdit.addEventListener("click", function (event) {
            //     event.preventDefault();
            //     const formattedFormData = new FormData(paymentEdit);
            //     const object = formattedFormData;
            //     let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            //     const request = new Request("api/payment/update/" + id, {
            //         method: "PUT",
            //         body: JSON.stringify(object),
            //         headers: {
            //             "Content-Type": "application/json",
            //             "X-CSRF-TOKEN": token,
            //         },
            //     });
            //     const responseto = await fetch(request);
            // });
            // submitEdit.addEventListener("click", function (event) {
            //     event.preventDefault();
            //     updatePayment(paymentName,paymentCate,paymentNote)
            // const formattedFormData = new FormData(paymentEdit);
            // const data = { username: "example" };

            // fetch("api/payment/" + id, {
            //     method: "PUT",
            //     headers: {
            //         "Content-Type": "application/json",
            //         Accept: "application/json, text-plain, */*",
            //         "X-Requested-With": "XMLHttpRequest",
            //         "X-CSRF-TOKEN": token,
            //     },
            //     body: JSON.stringify(formattedFormData),
            // })
            //     .then((response) => response.json())
            //     .then((data) => {
            //         console.log("Success:", data);
            //     })
            //     .catch((error) => {
            //         console.error("Error:", error);
            //     });
            // });

            // async function sendUpdate(paymentName){
            //     const object = { payment_name : paymentName };
            //     const request = new Request("api/payment/" + id , {
            //         method: "PUT",
            //         body: JSON.stringify(object),
            //         headers: {
            //             "Content-Type": "application/json",
            //         },
            //     });
            //     const response = await fetch(request);
            //     return response;
            // }

            // let url = 'api/payment/'+ id + '/edit';
            // let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            // fetch(url, {
            //     headers: {
            //         "Content-Type": "application/json",
            //         "Accept": "application/json, text-plain, */*",
            //         "X-Requested-With": "XMLHttpRequest",
            //         "X-CSRF-TOKEN": token
            //         },
            //     method: 'get',
            //     credentials: "same-origin",
            //     redirect: 'follow',
            // })
            // .then((response) => {
            //     paymentName.value = response;
            //     console.log('success!', response);
            // })
            // .catch(function(error) {
            //     console.log(error);
            // });
        })
    );

// function clickHandler(event) {
//     event.preventDefault();
//     var dataAttr = this.getAttribute('data-id');
//     console.log(dataAttr)
// }

// document.querySelectorAll('#table-paymethod tbody .edit-paymethod')
// .forEach(e => e.addEventListener("click", clickHandler));
