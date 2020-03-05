<?php
require_once "tariff.php";

class StudentsTariff extends Tariff
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
    
    public function paymentToString($distance, $minutes, $age, $gps = false) 
    {
        if(!$this->checkAge($age)) {
            return false;
        }; 
        
        $payment = $this->countPaymentForTravel($distance, $minutes, $age, $gps);
        return "Тариф студенческий ($minutes минут, $distance км, $age лет," .  ($gps ? 'gps': 'без gps') . "): $payment р.";
    }

}