<h2 class="judul-tengah">Membuat Tabel</h2>
<div class="main-php">
        <form action="http://localhost/202143500732_Y6G/php/202143500732_tabel.php" method="POST">
            <div class="form-group">
                <label for="baris">Jumlah Baris :</label>
                <input type="number" id="baris" name="baris" required>
            </div>

            <div class="form-group">
                <label for="kolom">Jumlah Kolom :</label>
                <input type="number" id="kolom" name="kolom" required>
            </div>
            <input type="Submit" value="Create">
        </form>

        <?php
        //proses membuat Tabel nilai
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $baris = $_POST['baris'];
                $kolom = $_POST['kolom'];
                echo '<h2 class="judul-tengah">Hasil Tabel</h2>';
                echo    '<table border="1">';
                //Logika pembuatan Baris dan Kolom Tabel
                for ($rows = 1; $rows <= $baris; $rows++ ) {
                    echo "<tr>";
                    for ($cols = 1 ; $cols <= $kolom; $cols++) {
                        echo "<td>Baris $rows, kolom $cols</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }
        ?>
    </div>
    
    
    
    