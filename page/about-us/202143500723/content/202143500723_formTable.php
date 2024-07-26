<div class="row">
    <div class="col-sm-12">
        <h3>Membuat Table</h3>
    </div>
</div>
<form method="GET" action="">
    <div class="form-group row my-2">
        <label for="baris" class="col-sm-2 col-form-label">Jumlah Baris</label>
        <div class="col-sm-5">
            <input type="number" class="form-control" id="baris" value="<?php echo @$_GET['baris'] ?>" name="baris"
                placeholder="Input Baris">
        </div>
    </div>
    <div class="form-group row my-2">
        <label for="kolom" class="col-sm-2 col-form-label">Jumlah Kolom</label>
        <div class="col-sm-5">
            <input type="number" class="form-control" id="kolom" name="kolom" value="<?php echo @$_GET['kolom'] ?>"
                placeholder="Input Kolom">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-1">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>

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