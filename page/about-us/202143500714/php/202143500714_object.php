     <h2 class="judul-tengah">Object</h2>
        <div class="main-php">
            <?php
                        $murid = new \stdClass;
                        $murid->nama = "Upin";
                        $murid->usia = 5;
                        $murid->hobi = array("membaca", "mewarnai");

                        echo "$murid->nama berusia $murid->usia tahun <br>";

                        echo "Hobinya : ";
                        echo $murid->hobi[0];
                        echo " dan ";
                        echo $murid->hobi[1];
            ?> 
        </div>