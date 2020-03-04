<?php
require_once "tariff.php";

class TariffStudents extends Tariff
{
    protected $pricePerCm = 4;
    protected $pricePerMinute = 1;
    protected $maxAge = 25;

    public function countPaymentForTravel($distance, $minutes, $age, $gps = false)
    {
        if(!$this->checkAge($age)) {
            return false;
        };

        return $this->getBasePaymentForTravel($distance, $minutes, $age, $gps);
    }    

}