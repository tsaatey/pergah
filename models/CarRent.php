<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Customer
 *
 * @author ARTLIB
 */
class CarRent {
    
    private $rentId;
    private $carId;
    private $customerName;
    private $customerPhone;
    private $customerEmail;
    private $carLocation;
    private $customerAddress;
    private $pickUpDate;
    private $transactionDate;
    private $appendedDateTime;


    public function __construct() {
        
    }
    
    public function getRentId() {
        return $this->rentId;
    }

    public function getCarId() {
        return $this->carId;
    }

    public function getCustomerName() {
        return $this->customerName;
    }

    public function getCustomerPhone() {
        return $this->customerPhone;
    }

    public function getCustomerEmail() {
        return $this->customerEmail;
    }

    public function getCarLocation() {
        return $this->carLocation;
    }

    public function getCustomerAddress() {
        return $this->customerAddress;
    }

    public function getPickUpDate() {
        return $this->pickUpDate;
    }

    public function getTransactionDate() {
        return $this->transactionDate;
    }

    public function getAppendedDateTime() {
        return $this->appendedDateTime;
    }

    public function setRentId($rentId) {
        $this->rentId = $rentId;
    }

    public function setCarId($carId) {
        $this->carId = $carId;
    }

    public function setCustomerName($customerName) {
        $this->customerName = $customerName;
    }

    public function setCustomerPhone($customerPhone) {
        $this->customerPhone = $customerPhone;
    }

    public function setCustomerEmail($customerEmail) {
        $this->customerEmail = $customerEmail;
    }

    public function setCarLocation($carLocation) {
        $this->carLocation = $carLocation;
    }

    public function setCustomerAddress($customerAddress) {
        $this->customerAddress = $customerAddress;
    }

    public function setPickUpDate($pickUpDate) {
        $this->pickUpDate = $pickUpDate;
    }

    public function setTransactionDate($transactionDate) {
        $this->transactionDate = $transactionDate;
    }

    public function setAppendedDateTime($appendedDateTime) {
        $this->appendedDateTime = $appendedDateTime;
    }


}
