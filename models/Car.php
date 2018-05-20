<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Car
 *
 * @author ARTLIB
 */
class Car {
    
    private $id;
    private $carName;
    private $regNum;
    private $image;
    private $availability;
    private $priceForAccra;
    private $priceForOutsideAccra;
    private $fuelTerms;
    private $driverTerms;
    
    public function __construct() {
        
    }
    
    public function getId() {
        return $this->id;
    }

    public function getCarName() {
        return $this->carName;
    }

    public function getRegNum() {
        return $this->regNum;
    }

    public function getImage() {
        return $this->image;
    }

    public function getAvailability() {
        return $this->availability;
    }

    public function getPriceForAccra() {
        return $this->priceForAccra;
    }

    public function getPriceForOutsideAccra() {
        return $this->priceForOutsideAccra;
    }

    public function getFuelTerms() {
        return $this->fuelTerms;
    }

    public function getDriverTerms() {
        return $this->driverTerms;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCarName($carName) {
        $this->carName = $carName;
    }

    public function setRegNum($regNum) {
        $this->regNum = $regNum;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function setAvailability($availability) {
        $this->availability = $availability;
    }

    public function setPriceForAccra($priceForAccra) {
        $this->priceForAccra = $priceForAccra;
    }

    public function setPriceForOutsideAccra($priceForOutsideAccra) {
        $this->priceForOutsideAccra = $priceForOutsideAccra;
    }

    public function setFuelTerms($fuelTerms) {
        $this->fuelTerms = $fuelTerms;
    }

    public function setDriverTerms($driverTerms) {
        $this->driverTerms = $driverTerms;
    }


}
