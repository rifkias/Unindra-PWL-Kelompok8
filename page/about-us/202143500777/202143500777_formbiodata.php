<h2 class="judul-tengah">Form Input Biodata</h2>
    <div class="main-php">
        <form method="POST">
            <div class="form-group">
                <label for="nama">Nama :</label>
                <input type="text" id="nama" name="nama" required><br>
            </div>

            <div class="form-group">
                <label for="umur">Umur :</label>
                <input type="number" id="umur" name="umur" required>
            </div>

            <div class="form-group">
                <label>Gender :</label>
                <input type="radio" id="pria"  name="gender" value="Pria" required><label for="pria">Pria</label><br>
                <input type="radio" id="wanita" name="gender" value="Wanita" required><label for="wanita">Wanita</label>
            </div>

            <div class="form-group">
                <label>Hobi :</label>
                <input type="checkbox" id="fotografi" name="hobi[]" value="Fotografi"><label for="fotografi">Fotografi</label><br>
                <input type="checkbox" id="videografi" name="hobi[]" value="Videografi"><label for="videografi">Videografi</label><br>
                <input type="checkbox" id="editing" name="hobi[]" value="Editing"><label for="editing">Editing</label>
            </div>

            <div class="form-group">
                <label for="pendidikan">Pendidikan :</label>
                <select id="pendidikan" name="pendidikan">
                    <option value="">Pilih Pendidikan Terakhir</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA/SMK">SMA/SMK</option>
                    <option value="Diploma">Diploma</option>
                    <option value="Sarjana">Sarjana</option>
                    <option value="Pascasarjana">Pascasarjana</option>
                </select>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat :</label>
                <textarea id="alamat" name="alamat" rows="4" cols="50"></textarea>
            </div>

            <input type="Submit" value="Submit">
        </form>

        <?php
        //proses menangani input data
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $nama = $_POST['nama'];
                $umur = $_POST['umur'];
                $gender = $_POST['gender'];
                $hobi = isset($_POST['hobi']) ? $_POST['hobi'] : [] ;
                $pendidikan = $_POST['pendidikan'];
                $alamat = $_POST['alamat'];

                echo '<h2 class="judul-tengah">Form Input Biodata</h2>';
                echo "Nama          : $nama <br>";
                echo "Umur          : $umur <br>";
                echo "Gender        : $gender <br>";
                echo "Hobi          : ".implode(", ", $hobi)."<br>";
                echo "Pendidikan    : $pendidikan <br>";
                echo "Alamat        : $alamat <br>";
            }
        ?>
    </div>
    
    