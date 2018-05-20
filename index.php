<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!DOCTYPE html>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src = "js/jquery.min.js"></script>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>

        <link href="material-icons-0.2.1/iconfont/material-icons.css" rel="stylesheet" type="text/css"/>
        <link href="node_modules/materialize-css/dist/css/materialize.min.css" rel="stylesheet" type="text/css" media="screen,projection"/>
        <script src="node_modules/sweetalert2/dist/sweetalert2.all.js" type="text/javascript"></script>
        <link href="node_modules/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/alerts.js" type="text/javascript"></script>
        
        <style>
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
            
            #price_div{
                display: none;
            }
            
            #outside_price_div{
                display: none;
            }
            
            #hidden-div{
                display: none;
            }
        </style>
        <script>

        </script>
    </head>
    <body>
        <div class="row">
            <div class="col l4">
            </div>
            <div class="col l4">
                <div class="row">
                    <div class="col l12 m5">
                        <div class="card-panel">
                            <div class="row">
                                <form class="col s12" id="" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">person</i>
                                            <input id="car_name" type="text" name="car_name" class="validate">
                                            <label for="car_name" style="color: #000;">Car name/Type</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">phone</i>
                                            <input id="reg_num" type="text" name="reg_num" class="validate">
                                            <label for="reg_num" style="color: #000;">Reg Number</label>
                                        </div>  
                                    </div>
                                    <div class="row">
                                        <div class="input-field file-field col s12">
                                            <div class="btn file_button">
                                                <span>Car Image</span>
                                                <input type="file" name = "image" id="image">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" id="image1" type="text" placeholder="Upload car image here...">
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12" style="margin-left: 10px;">
                                            <select class="browser-default" name="location" id="location">
                                                <option value="" disabled selected>Available Location</option>
                                                <option value="1">Accra only</option>
                                                <option value="2">Outside Accra only</option>
                                                <option value="3">Available within and outside Accra</option>
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="row" id="price_div">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">monetization_on</i>
                                            <input id="within_accra" type="text" name="within_accra" class="validate">
                                            <label for="within_accra" style="color: #000;">Price per day for Accra</label>
                                        </div>
                                    </div>
                                    <div class="row" id="outside_price_div">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">monetization_on</i>
                                            <input id="outside_accra" type="text" name="outside_accra" class="validate">
                                            <label for="outside_accra" style="color: #000;">Price per day for outside Accra</label>
                                        </div>
                                    </div>
                                    <input id="hidden_input" type="hidden" name="" class="validate">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">add_location</i>
                                            <textarea id="fuel_terms" name="fuel_terms" class="materialize-textarea"></textarea>
                                            <label for="fuel_terms" style="color: #000;">Fuel Terms</label>
                                        </div>  
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">add_location</i>
                                            <textarea id="driver_terms" name="driver_terms" class="materialize-textarea"></textarea>
                                            <label for="driver_terms" style="color: #000;">Driver Terms</label>
                                        </div>  
                                    </div>
                                    <div class="row">
                                        <div class="col m0"></div>
                                        <div class="col l12 l12 modal_button">
                                            <div class="input-field l12" style="padding-left: 40px;">
                                                <button class="btn btn-large submit_button waves-effect waves-light pergah-buttons z-depth-3" type="button" name="add_car_button" id="add_car_button">add car
                                                    <i class="material-icons right">send</i>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l4">
            </div>
        </div>

        <script>

            $(document).ready(function () {
                $('.datepicker').datepicker();
            });
            
        </script>

        <script src = "js/jquery.min.js"></script>
        <script src="js/price_control.js" type="text/javascript"></script>
        <script src="js/add_car.js" type="text/javascript"></script>
        <script src="node_modules/materialize-css/dist/js/materialize.min.js" type="text/javascript"></script>
    </body>
</html>