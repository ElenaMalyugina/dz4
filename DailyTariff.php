<?php
require_once "tariff.php";
require_once "AddDriverTrait.php";

class DailyTariff extends Tariff
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
    
    public function paymentToString($distance, $minutes, $age, $gps = false, $addedDriiver = false) 
    {
        if(!$this->checkAge($age)) {
            return false;
        };

        $payment = $this->countPaymentForTravel($distance, $minutes, $age, $gps, $addedDriiver);
        return "Тариф суточный ($minutes минут, $distance км, $age лет, " . ($gps ? 'gps': 'без gps') . ", " . ($addedDriiver ? 'доп.водитель' : 'без доп.водителя') . "): $payment р.";
    }
}