<?php 
$uri = "http://localhost/TUGAS_PWL-5_Y6G_202143500777_Mohammad lutfy Firmansyah/index.php";

?>
<form action="<?php echo $uri ?>" method="get">
    <input type="hidden" name="page" value="whileLoop">
    <input type="text" name="digit">
    <button type="submit">Submit</button>
</form>
<?php 
if(isset($_GET['digit']) && (@$_GET['digit'] !== null && @$_GET['digit'] !== '') ){
    $max = $_GET['digit'];
}else{
    $max = 10;
}
if($max >= 100){
  echo "<script>alert('Max Greater Than 100 ')</script>";
  $max = 10;
}
echo "var max : $max <br>";
$i = 1;
while ($i <= $max) {
  echo $i.'<br>';
  $i++;
}