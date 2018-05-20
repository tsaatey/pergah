
function displayConfirmAlert() {
    swal({
        title: 'You are about to rent a car',
        text: "The details you have provided will be sent to us",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, rent it',
        cancelButtonText: 'No, cancel!',
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: true,
        reverseButtons: false,
        focusCancel: true,
        showCloseButton: true,
        showLoaderOnConfirm: true,
        preConfirm: function () {
            return new Promise(function (resolve) {
                setTimeout(function () {
                    resolve();
                }, 3000);
            });
        },
        allowOutsideClick: false
    }).then((result) => {
        if (result.value) {
            var data = getUserData();
            var carId = localStorage.getItem('car_id');
            if (data.fullname !== '' && data.phone !== '' && data.email !== '' && data.pickUpDate !== '' && data.location !== '') {
                $.ajax({
                    url: "../controllers/save_car_rent_details.php",
                    method: "POST",
                    data: {fullname: data.fullname, phone: data.phone, email: data.email, pickUpDate: data.pickUpDate, address: data.address,  location: data.location, carId: carId},
                    dataType: "json",
                    complete: function (response) {
                        console.log(response);
                        if (response.responseText === 'car_rent_success') {
                            swal(
                                    'Success!',
                                    'Thank you for renting a car from us, we will contact you for follow-ups',
                                    'success'
                                    );
                            setTimeout(function () {
                                window.top.location.reload(true);
                            }, 3000);
                        }

                        if (response.responseText === 'car_rent_failed') {
                            swal(
                                    "Internal Error",
                                    "Oops, Your details could not be submitted! Please try again.",
                                    "error"
                                    );
                        }
                    }
                });
            } else {
                swal(
                        "Validation error",
                        "Please all fields are required!.",
                        "error"
                        );
            }

        } else if (result.dismiss === swal.DismissReason.cancel) {
            swal(
                    "Cancelled",
                    "Deletion cancelled",
                    "error"
                    );
        }

    });
}

function getUserData() {
    return {
        fullname: document.getElementById('fullname').value,
        phone: document.getElementById('phone').value,
        email: document.getElementById('email').value,
        address: document.getElementById('address').value,
        pickUpDate: document.getElementById('pick_up_date').value,
        location: document.getElementById('location').value
    };
}


