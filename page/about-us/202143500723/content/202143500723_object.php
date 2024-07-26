<?php 

$murid = new stdClass();
$murid->nama = "Udin";
$murid->usia = 5;
$murid->hobi = ["membaca","mewarnai"];

echo $murid->nama." berusia $murid->usia tahun <br>";
echo "Hobinya :  ";

foreach($murid->hobi as $key => $d){
    echo $d;
    if($key !== count($murid->hobi) -1){
        echo " dan ";
    }
    
}

