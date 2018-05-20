/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
(function () {
    var addCarButton = document.getElementById('add_car_button');
    if (addCarButton) {
        addCarButton.addEventListener('click', function () {
            if (document.getElementById('image').value !== '') {
                // validate image
                var imageExtension = $('#image').val().split('.').pop().toLowerCase();
                if (jQuery.inArray(imageExtension, ['png', 'jpg', 'jpeg']) === -1) {
                    //invalid image
                    swal(
                            "Validation failed",
                            "Please uploaded image must be PNG, JPG or JPEG!.", // had a missing comma
                            "error"
                            );
                    $('#image').val('');
                } else {
                    // all is well
                    swal({
                        title: "Uploading information...",
                        text: "Please wait",
                        imageUrl: "images/ajax_loader_blue_64.gif",
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                    var property = document.getElementById('image').files[0];
                    var carname = document.getElementById('car_name').value;
                    var regnum = document.getElementById('reg_num').value;
                    var location = document.getElementById('location').value;
                    var fuel = document.getElementById('fuel_terms').value;
                    var driver = document.getElementById('driver_terms').value;
                    var accraPrice = '0';
                    var outAccraPrice = '0';

                    if (document.getElementById('within_accra').offsetParent !== null) {
                        accraPrice = document.getElementById('within_accra').value;
                    }

                    if (document.getElementById('outside_accra').offsetParent !== null) {
                        outAccraPrice = document.getElementById('outside_accra').value;
                    }

                    if (carname !== '' && regnum !== '' && location !== '' && fuel !== '' && driver !== '') {
                        var formData = new FormData();
                        formData.append("car_name", carname);
                        formData.append("image", property);
                        formData.append("reg_num", regnum);
                        formData.append("location", location);
                        formData.append('driver_terms', driver);
                        formData.append('fuel_terms', fuel);
                        formData.append('within_accra', accraPrice);
                        formData.append('outside_accra', outAccraPrice);

                        $.ajax({
                            url: 'controllers/save_car_info.php',
                            method: 'POST',
                            data: formData,
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function (response) {
                                //console.log(response);
                                if (response === 'car_added') {
                                    swal({
                                        title: "Success!",
                                        text: 'Information uploaded!',
                                        type: 'success',
                                        showConfirmButton: false,
                                        timer: 2000
                                    });
                                    setTimeout(function () {
                                        window.top.location.reload(true);
                                    }, 2000);
                                } else if (response === 'error') {
                                    swal(
                                            "Error!",
                                            "Database error occured",
                                            "error"
                                            );
                                }
                            },
                            failure: function () {
                                swal(
                                        "Error!",
                                        "Information upload fails",
                                        "error"
                                        );
                            }
                        });
                    } else {
                        swal(
                                "Validation failed",
                                "Please all fields are required!.",
                                "error"
                                );
                    }

                }
            } else {
                // image is empty
                swal(
                        "Validation failed",
                        "Please upload car image!.",
                        "error"
                        );
            }
        });
    }
})();

