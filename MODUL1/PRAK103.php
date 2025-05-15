<?php
$celcius = 37.841;
$reamur = (4/5) * $celcius;
$fahrenheit = (9/5) * $celcius + 32;
$kelvin = $celcius + 273.15;

echo "Fahrenheit (F) = " . number_format($fahrenheit, 4) . "<br>";
echo "Reamur (R) = " . number_format($reamur, 4) . "<br>";
echo "Kelvin (K) = " . rtrim(number_format($kelvin, 4), "0") . "<br>";
?>
