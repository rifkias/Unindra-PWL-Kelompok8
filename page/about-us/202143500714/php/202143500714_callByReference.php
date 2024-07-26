<h2 class="judul-tengah">function Call By Reference</h2>
    <div class="main-php">
         <?php
                 function nilaiKuadrat(&$nilai) {
                    $nilai = $nilai * $nilai;
                 }

                 $bil = 3;
                 echo "Nilai = ".$bil;

                 nilaiKuadrat($bil);
                 echo "<br>Nilai = ".$bil;
         ?> 
     </div>

