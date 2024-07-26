<h2 class="judul-tengah">Form Input Biodata</h2>
    <div class="main-php">
        <form action="http://localhost/202143500714/202143500714_index.php?page=formBiodata" method="POST">
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
                <input type="checkbox" id="Futsal" name="hobi[]" value="Futsal"><label for="Futsal">Futsal</label><br>
                <input type="checkbox" id="Sepeda" name="hobi[]" value="Sepeda"><label for="Sepeda">Sepeda</label><br>
                <input type="checkbox" id="Hiking" name="hobi[]" value="Hiking"><label for="Hiking">Hiking</label>
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

                echo '<h2 class="judul-tengah">Biodata</h2>';
                echo "Nama          :$nama <br>";
                echo "Umur          :$umur <br>";
                echo "Gender        :$gender <br>";
                echo "Hobi          :".implode(", ", $hobi)."<br>";
                echo "Pendidikan    :$pendidikan <br>";
                echo "Alamat        :$alamat <br>";
            }
        ?>
    </div>
    


    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=2.0">
  <title>Form Biodata</title>
  <style>
    body {
      font-family: Helvetica, sans-serif;
    }

    form {
      width: 500px;
      margin:  auto;
      padding: 20px;
      border: 5px solid #ccc;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input,
    select,
    textarea {
      width: 100%;
      padding: 8px;
      border: 5px solid #ccc;
      box-sizing: border-box;
    }

    button {
      padding: 10px 20px;
      background-color: #0e4203;
      color: black;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
    