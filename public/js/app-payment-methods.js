// function clickHandler(event) {
//     event.preventDefault();
//     var dataAttr = this.getAttribute('data-id');
//     console.log(dataAttr)
// }

// document.querySelectorAll('#table-paymethod tbody .edit-paymethod')
// .forEach(e => e.addEventListener("click", clickHandler));

document.querySelectorAll('#table-paymethod tbody .edit-paymethod')
.forEach(e => e.addEventListener("click", function(event) {
    // Here, `this` refers to the element the event was hooked on
    event.preventDefault();
    var id = this.getAttribute('data-id');

    let url = 'payment/'+ id + '/edit';
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    fetch(url, {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json, text-plain, */*",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": token
            },
        method: 'get',
        credentials: "same-origin",
        data:{
            id : id,
        },
    })
    .then((response,data) => {
        console.log('success!', data);
    })
    .catch(function(error) {
        console.log(error);
    });

    // fetch('payment/'+ id + '/edit', {
    //     method: 'GET'
    // }).then(function (response) {
    //     console.log('success!', response.data);
    // }).catch(function (err) {
    //     console.warn('Something went wrong.', err);
    // });

}));

// var notes = null;
// for (var i = 0; i < paymentMethodEdit.childNodes.length; i++) {
//     if (paymentMethodEdit.childNodes[i].className == "edit") {
//         notes = paymentMethodEdit.childNodes[i];
//         console.log(notes);
//         break;
//     }
// }
