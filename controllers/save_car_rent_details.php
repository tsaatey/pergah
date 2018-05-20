<?php

require_once './CrudOperation.php';

$carId = filter_input(INPUT_POST, 'carId');
//$carId = $_SESSION['car_id'];
$customerName = filter_input(INPUT_POST, 'fullname');
$customerPhone = filter_input(INPUT_POST, 'phone');
$customerEmail = filter_input(INPUT_POST, 'email');
$carLocation = filter_input(INPUT_POST, 'location');
$customerAddress = filter_input(INPUT_POST, 'address');
$pickUpDate = filter_input(INPUT_POST, 'pickUpDate');

$carRent = new CarRent();

date_default_timezone_set('Europe/London');
$dateTime = new DateTime();
$appendedDateTime = $dateTime->format('Y-m-d H:i:s');

$carRent->setCarId($carId);
$carRent->setCustomerEmail($customerEmail);
$carRent->setCarLocation($carLocation);
$carRent->setCustomerName($customerName);
$carRent->setCustomerPhone($customerPhone);
$carRent->setCustomerAddress($customerAddress);
$carRent->setPickUpDate($pickUpDate);
$carRent->setTransactionDate(date('Y-m-d'));
$carRent->setAppendedDateTime($appendedDateTime);

$crud = new CrudOperation();

if ($crud->saveCarRentDetails($carRent)) {
    echo 'car_rent_success';
} else {
    echo 'car_rent_failed';
}


