<?php 
    function nilaiKuadrat(&$nilai) {
        $nilai = $nilai * $nilai;
        return $nilai;
    }
    
    $bil = 3;
    echo "Nilai = ".$bil."<br>";

    nilaiKuadrat($bil);

    echo "Nilai = ".$bil;
    