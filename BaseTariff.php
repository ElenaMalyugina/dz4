<?php
require_once "tariff.php";

class BaseTariff extends Tariff
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
    
    public function paymentToString($distance, $minutes, $age, $gps = false) 
    {
        if(!$this->checkAge($age)) {
            return false;
        };
        
        $payment = $this->countPaymentForTravel($distance, $minutes, $age, $gps);
        return "Тариф базовый ($minutes минут, $distance км, $age лет,". ($gps ? 'gps': 'без дополнительных услуг') . "): $payment р.";
    }

}