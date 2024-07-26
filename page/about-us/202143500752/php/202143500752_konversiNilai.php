<h2 class="judul-tengah">Konversi Nilai ke Huruf</h2>
    <div class="main-php">
        <form action="http://localhost/Y6G_202143500752/202143500752_index.php?page=konversiNilai" method="POST">
            <div class="form-group">
                <label for="nilai">Masukan Nilai :</label>
                <input type="number" id="nilai" name="nilai" required>
            </div>
            <input class="btn" type="Submit" value="Submit">
        </form>
        <?php
        //proses konversi nilai
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $nilai = $_POST['nilai'];
        
            //Logika Konversi Nilai ke huruf
                if ($nilai >= 85 && $nilai <= 100) {
                    $grade = "A";
                } elseif ($nilai >= 70 && $nilai <= 84) {
                    $grade = "B";
                } elseif ($nilai >= 60 && $nilai < 70) {
                    $grade = "C";
                } elseif ($nilai >= 50 && $nilai < 60) {
                    $grade = "D";
                } else {
                    $grade = "E";
                }

                echo '<h2 class="judul-tengah">Hasil Konversi Nilai</h2>';
                echo "Nilai Anda : $nilai berada pada Grade nilai : $grade <br>";
            }
        ?>
    </div>
    
    