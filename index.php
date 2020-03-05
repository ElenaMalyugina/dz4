<?php
require_once "BaseTariff.php";
require_once "HoursTariff.php";
require_once "DailyTariff.php";
require_once "StudentsTariff.php";

$tariffBase = new BaseTariff();
$tariffHours = new HoursTariff();
$tariffDaily = new DailyTariff();
$tariffStudents = new StudentsTariff();

echo $tariffBase->countPaymentForTravel(10, 2, 50);
echo "<br>";
echo $tariffHours->countPaymentForTravel(5, 90, 50);
echo "<br>";
echo $tariffDaily->countPaymentForTravel(5, 90, 50);
echo "<br>";
echo $tariffDaily->countPaymentForTravel(5, 24*60+29, 50, true, false);
echo "<br>";
echo $tariffDaily->countPaymentForTravel(5, 90, 50, true, true);
echo "<br>";
echo $tariffStudents->countPaymentForTravel(5, 90, 20);