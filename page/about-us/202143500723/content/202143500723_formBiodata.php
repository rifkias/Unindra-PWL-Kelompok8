<div class="row">
    <div class="col-sm-12">
        <h3>Biodata</h3>
    </div>
</div>
<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $nama         = @$_POST['nama'];
  $umur         = @$_POST['umur'];
  $jenisKelamin = @$_POST['jenisKelamin'];
  $hobi         = @$_POST['hobi'];
  $pendidikan   = @$_POST['pendidikan'];
  $alamat       = @$_POST['alamat'];
  print_r($hobi);
  echo "<table>";
    echo "<tr>
      <td>Nama</td>
      <td>:</td>
      <td>$nama</td>
    </tr>";
    echo "<tr>
      <td>Umur</td>
      <td>:</td>
      <td>$umur</td>
    </tr>";
    echo "<tr>
      <td>Jenis Kelamin</td>
      <td>:</td>
      <td>$jenisKelamin</td>
    </tr>";
    echo "<tr>
      <td>Hobi</td>
      <td>:</td>
      <td>";
      if($hobi){
        foreach ($hobi as $data) {
          echo $data."<br>";
        }
      }
    echo "</td></tr>";
    echo "<tr>
      <td>Pendidikan</td>
      <td>:</td>
      <td>$pendidikan</td>
    </tr>";
    echo "<tr>
      <td>Alamat</td>
      <td>:</td>
      <td>$alamat</td>
    </tr>";

  echo "</table>";
}else{

?>

  <form method="POST" action="">
      <div class="form-group row my-2">
          <label for="nama" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Nama">
          </div>
      </div>
      <div class="form-group row my-2">
          <label for="umur" class="col-sm-2 col-form-label">Umur</label>
          <div class="col-sm-10">
              <input type="number" class="form-control" id="umur" name="umur" placeholder="Input Umur">
          </div>
      </div>
      <div class="form-group row my-2">
          <label for="umur" class="col-sm-2 col-form-label">Gender</label>
          <div class="col-sm-10">
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenisKelamin" id="rb1" value="Laki - Laki" checked>
                  <label class="form-check-label" for="rb1">
                      Laki - Laki
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenisKelamin" id="rb2" value="Perempuan">
                  <label class="form-check-label" for="rb2">
                      Perempuan
                  </label>
              </div>
          </div>
      </div>
      <div class="form-group row my-2">
          <label for="umur" class="col-sm-2 col-form-label">Hobi</label>
          <div class="col-sm-10">
              <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="hobi[]" value="Traveling" id="cb1">
                  <label class="form-check-label" for="cb1">
                      Traveling
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="Shopping" name="hobi[]" id="cb2">
                  <label class="form-check-label" for="cb2">
                      Shopping
                  </label>
              </div>
          </div>
      </div>
      <div class="form-group row my-2">
          <label for="umur" class="col-sm-2 col-form-label">Pendidikan</label>
          <div class="col-sm-10">
              <select name="pendidikan" class="form-control" id="pendidikan">
                  <option value="SD">Sekolah Dasar</option>
                  <option value="SMP">Sekolah Menengah Pertama</option>
                  <option value="SMA">Sekolah Menengah Akhir</option>
                  <option value="S1">Strata 1</option>
                  <option value="S2">Strata 2</option>
                  <option value="S3">Strata 3</option>
                  <option value="D3">Diploma 3</option>
              </select>
          </div>
      </div>
      <div class="form-group row my-2">
          <label for="umur" class="col-sm-2 col-form-label">Alamat</label>
          <div class="col-sm-10">
              <textarea name="alamat" class="form-control" id="alamat" name="alamat"></textarea>
          </div>
      </div>
      <div class="row">
          <div class="col-sm-1">
              <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </div>

  </form>
<?php

}