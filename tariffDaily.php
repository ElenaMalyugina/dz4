<?php
require_once "tariff.php";
require_once "AddDriverTrait.php";

class TariffDaily extends Tariff
{
    use AddDriver;
    protected $pricePerCm = 1;
    protected $pricePerMinute = 1000 / 60 / 24;

    private function roundToDaily($minutes){
        if(($minutes % (60 * 24)) < 30) {
            return floor($minutes / 60 / 24) * 60 * 24;
        } else {
            return ceil($minutes / 60 / 24) * 60 * 24;
        }        
    }

    public function countPaymentForTravel($distance, $minutes, $age, $gps = false, $addedDriiver = false)
    {
        if(!$this->checkAge($age)) {
            return false;
        };

        $minutes = $this->roundToDaily($minutes);      
        
        $finalPrice = $this->getBasePaymentForTravel($distance, $minutes, $age, $gps);

        if($addedDriiver) {
            $finalPrice +=$this->AddDriver();
        }

        return $finalPrice;
    }    
}