<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once './CrudOperation.php';

$carId = filter_input(INPUT_POST, 'carId');

$crud = new CrudOperation();

$location = $crud->getCarLocation($carId);

echo $location;