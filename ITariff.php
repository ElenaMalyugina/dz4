<?php
interface ITariff
{
    public function countPaymentForTravel($distance, $minutes, $age);   
    public function paymentToString($distance, $minutes, $age);
}