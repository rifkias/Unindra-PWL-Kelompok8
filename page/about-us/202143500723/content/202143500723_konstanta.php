<?php 

define("JUDUL","Hitung Luas Lingkaran");
define("PHI",3.41);

echo JUDUL;

$r = 10;
echo "<br> Jari - Jari : $r <br>";

$luas = PHI * $r * $r;

echo "Luas Lingkaran = $luas";