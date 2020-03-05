<?php
require_once "tariff.php";
require_once "AddDriverTrait.php";

class HoursTariff extends Tariff
{
    use AddDriver;
    protected $pricePerCm = 0;
    protected $pricePerMinute = 200 / 60;

    private function roundToHour($minutes){
        return ceil($minutes / 60)*60;
    }

    public function countPaymentForTravel($distance, $minutes, $age, $gps = false, $addedDriiver = false)
    {
        if(!$this->checkAge($age)) {
            return false;
        };

        $minutes = $this->roundToHour($minutes); 

        $finalPrice = $this->getBasePaymentForTravel($distance, $minutes, $age, $gps);

        if($addedDriiver) {
            $finalPrice +=$this->AddDriver();
        }

        return $finalPrice;
    }  
    
    public function paymentToString($distance, $minutes, $age, $gps = false, $addedDriiver = false) 
    {
        if(!$this->checkAge($age)) {
            return false;
        }; 
        
        $payment = $this->countPaymentForTravel($distance, $minutes, $age, $gps, $addedDriiver);
        return "Тариф почасовой ($minutes минут, $distance км, $age лет, " . ($gps ? 'gps': 'без gps') .", " . ($addedDriiver ? 'доп.водитель' : 'без доп.водителя') ."): $payment р.";
    }
}