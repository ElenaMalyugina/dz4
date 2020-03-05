<?php
require_once "BaseTariff.php";
require_once "HoursTariff.php";
require_once "DailyTariff.php";
require_once "StudentsTariff.php";

$tariffBase = new BaseTariff();
$tariffHours = new HoursTariff();
$tariffDaily = new DailyTariff();
$tariffStudents = new StudentsTariff();

echo $tariffBase->paymentToString(10, 2, 50);
echo "<br>";
echo $tariffHours->paymentToString(5, 90, 50);
echo "<br>";
echo $tariffDaily->paymentToString(5, 90, 50);
echo "<br>";
echo $tariffDaily->paymentToString(5, 24*60+29, 50, true, false);
echo "<br>";
echo $tariffDaily->paymentToString(5, 90, 40, true, true);
echo "<br>";
echo $tariffStudents->paymentToString(5, 90, 20);