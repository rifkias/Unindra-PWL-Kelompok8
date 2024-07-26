<h2 class="judul-tengah">function Call By Value</h2>
        <div class="main-php">
            <?php
                 function jumlahkan($x,$y) {
                    $hasil = $x + $y;
                    return $hasil;
                 }

                 echo "Hasilnya = ".jumlahkan(10,2);
                 $bil = 0;
                 $bil = jumlahkan(9,9);
                 echo "<br>Hasilnya = ".$bil;
            ?> 
        </div>