     <h2 class="judul-tengah">Operator Perbandingan</h2>
        <div class="main-php">
            <?php
                        $bil1 = 110;
                        $bil2 = 25;
                        $teks1 = "PHP";
                        $teks2 = "php";

                        printf("%d == %d hasilnya %d<br>",$bil1, $bil2, $bil1 == $bil2);
                        //100 == 20 hasilnya 0
                        printf("%d != %d hasilnya %d<br>",$bil1, $bil2, $bil1 != $bil2);
                        //100 != 20 hasilnya 1
                        printf("%d >= %d hasilnya %d<br>",$bil1, $bil2, $bil1 >= $bil2);
                        //100 >= 20 hasilnya 1
                        printf("%s == %s hasilnya %s<br>",$teks1, $teks2, $teks1 == $teks2);
                        //PHP == php hasilnya 0
                        printf("%s != %s hasilnya %s<br>",$teks1, $teks2, $teks1 != $teks2);
                        //PHP != php hasilnya 1
            ?>  
        </div>