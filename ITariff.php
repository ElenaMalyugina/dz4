<?php
interface ITariff
{
    public function countPaymentForTravel($distance, $minutes, $age);   
}