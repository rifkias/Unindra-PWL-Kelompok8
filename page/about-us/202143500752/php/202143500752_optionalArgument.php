     <h2 class="judul-tengah">Optional Arguments</h2>
        <div class="main-php">
            <?php
                 function salam($nama = "php\n") {
                    echo "Halo Kawan ".$nama;
                 }

                 salam("Mahasiswa\n");
                 salam();
            ?> 
        </div>