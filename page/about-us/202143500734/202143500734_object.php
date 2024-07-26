<?php 

$murid = new stdClass();
$murid->nama = "Ridwan";
$murid->usia = 25;
$murid->hobi = ["Nyari Angin","Main"];

echo $murid->nama." berusia $murid->usia tahun <br>";
echo "Hobinya :  ";

foreach($murid->hobi as $key => $d){
    echo $d;
    if($key !== count($murid->hobi) -1){
        echo " dan ";
    }
    
}

