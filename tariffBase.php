<?php
require_once "tariff.php";

class TariffBase extends Tariff
{
    protected $pricePerCm = 10;
    protected $pricePerMinute = 3;

    public function countPaymentForTravel($distance, $minutes, $age, $gps = false)
    {
        if(!$this->checkAge($age)) {
            return false;
        };

        return $this->getBasePaymentForTravel($distance, $minutes, $age, $gps);
    }    

}