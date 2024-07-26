     <h2 class="judul-tengah">Kondisi Foreach</h2>
        <div class="main-php">
            <?php
                   $list_hari = array(
                        "Senin",
                        "Selasa",
                        "Rabu",
                        "Kamis",
                        "Jumat",
                        "Sabtu",
                        "Minggu",
                   );
                   //perulangan menggunakan foreach
                   foreach($list_hari as $hari)
                   {
                    //array $list_hari dipecah menjadi $hari
                    echo $hari . ", " ;
                   }

                   //Senin, Selasa, Rabu, Kamis, Jumat Sabtu, Minggu
            ?> 
        </div>