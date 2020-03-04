<?php
trait GPS 
{
    private $price = 15;

    public function setGPS($minutes)
    {
        $hours = ceil($minutes / 60); 
        return $hours * $this->price;
    }

}