<div class="row">
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-12">
                <h3>Konversi Nilai</h3>
            </div>
        </div>
        <form method="GET" action="">
            <div class="form-group row my-2">
                <label for="nilai" class="col-sm-2 col-form-label">Masukan Nilai</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="nilai" value="<?php echo @$_GET['nilai'] ?>"
                        name="nilai" placeholder="Input Nilai">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        <div class="row mt-4">
            <?php 
                if(isset($_GET['nilai'])){
                    $nilai = $_GET['nilai'];

                    if($nilai){
                        $resNilai = "";
                        if($nilai >= 85){
                            $resNilai = "A";
                        }elseif($nilai >= 75){
                            $resNilai = "B";
                        }elseif($nilai >= 60){
                            $resNilai = "C";
                        }elseif($nilai >= 50){
                            $resNilai = "D";
                        }else{
                            $resNilai = "E";
                        }
            ?>
            <div class="col-sm-12">
                <h3>Hasil Nilai : <?php echo $resNilai; ?> </h3>
            </div>
            <?php 
                    }
                }

            ?>
        </div>
    </div>
</div>

<?php 
    if(isset($_GET['kolom']) && isset($_GET['baris'])){
        
        echo "<hr><br><h3>Hasil Table</h3>";
        $baris = $_GET['baris'];
        $kolom = $_GET['kolom'];
        
        echo "<table class='table table-bordered'>";
        for ($i=0; $i < $baris; $i++) { 
            echo "<tr>";
            for ($j=0; $j < $kolom; $j++) { 
                echo '<td> Baris '.($i+1).' Kolom '. ($j+1) .'  </td>';
            }
            echo "</tr>";
        }
        echo "</table>";
    }
?>