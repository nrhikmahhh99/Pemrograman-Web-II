<?php
$jari_jari = 4.2;
$tinggi = 5.4;
$panjang = 8.9;
$lebar = 14.7;
$sisi = 7.9;

// NIM saya 2310817120010, jadi menggunakan bangun ruang tabung
 $volume = pi() * pow($jari_jari, 2) * $tinggi;

echo number_format($volume, 3, ".", " ") . " m3\n";
?>