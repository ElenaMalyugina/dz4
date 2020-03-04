<?php
require_once 'ITariff.php';
require_once 'gpsTrait.php';

abstract class Tariff implements ITariff
{
    use GPS;
    protected $pricePerCm;
    protected $pricePerMinute;
    protected $minAge = 18;
    protected $maxAge = 65;
    protected $maxCoefAge = 21;

    abstract public function countPaymentForTravel($distance, $minutes, $age);

    protected function getBasePaymentForTravel($distance, $minutes, $age, $gps = false) {
        if($gps) {
           $gpsPrice = $this->setGPS($minutes);           
        } else {
           $gpsPrice = 0;
        }

        return (($this->pricePerCm * $distance) + ($this->pricePerMinute * $minutes)) * $this->getCoeff($age) + $gpsPrice;
    }

    protected function checkAge($age){
        if($age < $this->minAge || $age > $this->maxAge) {
            echo "Ваш возраст недопустим";
            return false;            
        } else {
            return true;
        } 
    }

    protected function getCoeff($age){
        if($age < $this->maxCoefAge) {
            return 1.1;
        } else {
            return 1;
        }
    }
}