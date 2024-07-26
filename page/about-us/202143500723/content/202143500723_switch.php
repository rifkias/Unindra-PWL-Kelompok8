<?php 
  $uri = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<form action="<?php echo $uri ?>" method="get">
    <input type="hidden" name="page" value="switch">
    <input type="text" name="d">
    <button type="submit">Submit</button>
</form>
<?php 
if(isset($_GET['d']) && (@$_GET['d'] !== null && @$_GET['d'] !== '') ){
    $d = $_GET['d'];
}else{
    $d = 3;
}
echo "var d : $d <br>";
switch ($d) {
    case 0:
      echo "Today is Sunday";
      break;
    case 1:
      echo "Today is Monday";
      break;
    case 2:
      echo "Today is Tuesday";
      break;
    case 3:
      echo "Today is Wednesday";
      break;
    case 4:
      echo "Today is Thursday";
      break;
    case 5:
      echo "Today is Friday";
      break;
    case 6:
        echo "Today is Saturday";
        break;
    default:
      echo "Your Selected Day Not Exists";
  }