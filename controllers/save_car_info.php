<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once './CrudOperation.php';

$priceForAccra = 0;
$priceForOutsideAccra = 0;

$carName = filter_input(INPUT_POST, 'car_name');
$regNum = filter_input(INPUT_POST, 'reg_num');
$fuelTerms = filter_input(INPUT_POST, 'fuel_terms');
$driverTerms = filter_input(INPUT_POST, 'driver_terms');
$availability = filter_input(INPUT_POST, 'location');

if (!empty(filter_input(INPUT_POST, 'within_accra'))) {
    $priceForAccra = filter_input(INPUT_POST, 'within_accra');
}

if (!empty(filter_input(INPUT_POST, 'outside_accra'))) {
    $priceForOutsideAccra = filter_input(INPUT_POST, 'outside_accra');
}


$imageName = $_FILES['image']['name'];
$image = file_get_contents($_FILES['image']['tmp_name']);

$car = new Car();

$car->setCarName($carName);
$car->setImage($image);
$car->setRegNum($regNum);
$car->setPriceForAccra($priceForAccra);
$car->setPriceForOutsideAccra($priceForOutsideAccra);
$car->setAvailability($availability);
$car->setFuelTerms($fuelTerms);
$car->setDriverTerms($driverTerms);

$crud = new CrudOperation();

if ($crud->insertCar($car)) {
    echo 'car_added';
} else {
    echo 'error';
}

