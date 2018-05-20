<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../controllers/CrudOperation.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src = "../js/jquery.min.js"></script>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>

        <link href="../material-icons-0.2.1/iconfont/material-icons.css" rel="stylesheet" type="text/css"/>
        <link href="../node_modules/materialize-css/dist/css/materialize.min.css" rel="stylesheet" type="text/css" media="screen,projection"/>
        <script src="../node_modules/sweetalert2/dist/sweetalert2.all.js" type="text/javascript"></script>
        <link href="../node_modules/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/alerts.js" type="text/javascript"></script>
        <style>
            table{
                border-collapse: collapse;
                table-layout: auto;
                width: 100%;
            }
            tr, td{
                border: none;
            }

            .pergah-buttons{
                background-color: #688EB3;
            }

            .pergah-buttons:hover{
                background-color: #688EB3;
            }
            .pergah-buttons:selected{
                background-color: #688EB3;
            }
            .pergah-buttons:clicked{
                background-color: #688EB3;
            }

            .submit_button {
                width: 100%;
            }

            body{
                background: #e4ebe9;
            }

            #car_name_row{
                height: 20px;
            }

            .nav-extended{
                background-image: url(../images/bg1.png);
                background-repeat: no-repeat;
                height: 600px;
                background-color: #FFF;
            }
            
            table td.shrink{
                white-space: nowrap;
            }
            
            .card-panel{
                position: absolute;
                margin-left: auto;
                margin-right: auto;
                left: 0;
                right: 0;
                width: 750px;
            }
            
            .nav-extended{
                position: absolute;
                margin-left: auto;
                margin-right: auto;
                left: 0;
                right: 0;
                width: 850px;
            }
        </style>
    </head>
    <body>
        <div class="row" id="container">
            <div class="row" id="header" style="">
                <div class="col l2"></div>
                <div class="col l8" style="">
                    <nav class="nav-extended" style="height: 250px;">
                        <div class="nav-wrapper">
                            <a href="#!" class="brand-logo"><img src="../images/ptl.png"/></a>
                        </div>
                        <div class="nav-content">
                            <span class="nav-title">CAR RENTAL SERVICES</span>
                        </div>
                    </nav>
                </div>
                <div class="col l2"></div>
            </div>
            <div class="row" id="content" style="position: relative; top: 180px; left: 0">
                <div class="col l3">
                </div>
                <div class="col l6">
                    <div class="row">
                        <div class="col l12 m5">
                            <div class="card-panel" style="overflow-x: auto;">
                                <?php
                                $crud = new CrudOperation();
                                $cars = $crud->getCars();
                                if (sizeof($cars) > 0) {
                                    foreach ($cars as $car) {
                                        ?>

                                        <table class="responsive-table" style="border-bottom: 1px solid #688EB3; border-radius: 5px; width: 100%;">
                                            <tr>
                                                <td style="width: 5%; height: 190px; border-right: 0px solid #000; background-color: #FAFAFA; padding-left: 5px;">
                                                    <?php
                                                    echo '<img src="data:image/jpeg;base64,' . base64_encode($car['image']) . '" width = "330" height = "170"/>';
                                                    ?>
                                                </td>
                                                <td style="background-color: #F5F5F5;">
                                                    <div>
                                                        <table>
                                                            <tr id="car_name_row">
                                                                <td colspan="2" style="font-weight: bold; font-size: 18px; font-family: Tahoma; color: #688EB3;">
                                                                    <?php echo $car['car_name'] ?>
                                                                </td>
                                                            </tr>
                                                            <tr style="border-bottom: 1px solid #FFF; border-top: 1px solid #FFF;">
                                                                <td>
                                                                    Availability
                                                                </td>
                                                                <td style="border-left: 2px solid #FFF;">
                                                                    <table>
                                                                        <tr>
                                                                            <th>
                                                                                Within Accra
                                                                            </th>
                                                                            <th>
                                                                                Outside Accra
                                                                            </th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <?php
                                                                                echo $car['accra'];
                                                                                ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                echo $car['outside'];
                                                                                ?>
                                                                            </td>
                                                                        </tr>
                                                                    </table>

                                                                </td>
                                                            </tr>
                                                            <tr style="border-bottom: 1px solid #FFF;">
                                                                <td>
                                                                    Price Per Day
                                                                </td>
                                                                <td style="border-left: 2px solid #FFF;">
                                                                    <table>
                                                                        <tr>
                                                                            <th>Within Accra</th>
                                                                            <th>Outside Accra</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <?php
                                                                                echo $car['price_for_accra'];
                                                                                ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                echo $car['price_for_outside_accra'];
                                                                                ?>
                                                                            </td>
                                                                        </tr>
                                                                    </table>

                                                                </td>
                                                            </tr>
                                                            <tr style="border-bottom: 1px solid #FFF;">
                                                                <td>
                                                                    Fuel
                                                                </td>
                                                                <td style="border-left: 2px solid #FFF;">
                                                                    <?php
                                                                    echo $car['fuel_terms'];
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr style="border-bottom: 1px solid #FFF;">
                                                                <td>
                                                                    Driver
                                                                </td>
                                                                <td style="border-left: 2px solid #FFF;">
                                                                    <?php
                                                                    echo $car['driver_terms'];
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                </td>
                                                                <td>
                                                                    <a class="waves-effect waves-light btn btn-large z-depth-3 modal-trigger pergah-buttons" href="#modal1" onclick="localStorage.setItem('car_id', <?php echo $car['id'] ?>);">Rent this Car</a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>

                                        <?php
                                    }
                                } else {
                                    echo "Sorry, we don't have any cars for rent yet! Come back later";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col l3">
                </div>
            </div>
        </div>


        <!-- Modal Structure -->
        <div id="modal1" class="modal modal-fixed-footer" style="width: 500px; height: 800px;">
            <div class="modal-content">
                <h5 style="color: #688EB3; font-weight: bold; text-align: center">Please Provide Us with Your Details</h5>
                <div class="row">
                    <form class="col s12" id="user_login_form">
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">person</i>
                                <input id="fullname" type="text" name="fullname" class="validate">
                                <label for="fullname" style="color: #000;">Full Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">phone</i>
                                <input id="phone" type="text" name="phone" class="validate">
                                <label for="phone" style="color: #000;">Phone Number</label>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">email</i>
                                <input id="email" type="email" name="email" class="validate">
                                <label for="email" style="color: #000;">Email Address</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">date_range</i>
                                <input id="pick_up_date" type="date" name="pick_up_date" class="validate">
                                <label for="pick_up_date" style="color: #000;">Pick-up Date</label>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="input-field col s12" style="margin-left: 10px;">
                                <select class="browser-default" name="location" id="location">
                                    <option value="" disabled="true" selected="true">Please select location</option>
                                    <option value="1">Accra</option>
                                    <option value="2">Outside Accra</option>
                                </select>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">add_location</i>
                                <input id="address" type="text" name="address" class="validate">
                                <label for="address" style="color: #000;">Current Address</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m0"></div>
                            <div class="col l12 l12 modal_button">
                                <div class="input-field l12" style="padding-left: 40px;">
                                    <button class="btn btn-large submit_button waves-effect waves-light pergah-buttons z-depth-2" type="button" name="login_button" id="login_button" onclick="displayConfirmAlert();">continue
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <p style="text-align: center; font-style: italic; font-size: 14px;">The details you provide will help us at <a href="http://www.pergah.com" target="_blank">pergah.com</a> to identify you</p>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('.modal').modal();
            });

        </script>
        <script src = "../js/jquery.min.js"></script>
        <script src="../node_modules/materialize-css/dist/js/materialize.min.js" type="text/javascript"></script>
    </body>
</html>