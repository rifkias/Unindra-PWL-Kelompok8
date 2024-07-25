<?php 
session_start();
date_default_timezone_set("Asia/Jakarta");
include('../config/koneksi.php');
$con = new Connection();
if(isset($_SESSION['userId']) && isset($_GET['absenId'])){
    $userId = $_SESSION['userId'];
    $absenId = $_GET['absenId'];
    $dateTime = date("Y-m-d H:i:s");

    $query = "UPDATE absensi SET check_out='$dateTime' WHERE absensi_id='$absenId';";
    if($con->query($query) === TRUE){
        $_SESSION['success_message'] = "Check Out Berhasil";
    }else{
        $_SESSION['fail_message'] = "Check Out Gagal";
    }
    header("location:/");
}else{
        $_SESSION['fail_message'] = "Invalid Data";
        header("location:/");

}