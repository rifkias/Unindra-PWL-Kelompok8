<h2 class="judul-tengah">Konversi Nilai ke Huruf</h2>
<div class="main-php">
        <form action="http://localhost/202143500732_Y6G/php/202143500732_konversinilai.php" method="POST">
            <div class="form-group">
                <label for="nilai">Masukan Nilai :</label>
                <input type="number" id="nilai" name="nilai" required>
            </div>
            <input type="Submit" value="Submit">
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
    
    
    