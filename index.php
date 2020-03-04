<?php
require_once "tariffBase.php";
require_once "tariffHours.php";
require_once "tariffDaily.php";
require_once "tariffStudents.php";

$tariffBase = new tariffBase();
$tariffHours = new tariffHours();
$tariffDaily = new tariffDaily();
$tariffStudents = new tariffStudents();

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