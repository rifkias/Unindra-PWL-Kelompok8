<?php 
session_start();
date_default_timezone_set("Asia/Jakarta");
include('../../config/koneksi.php');
$con = new Connection();
if(isset($_SESSION['userId'])){
    $userId = $_SESSION['userId'];
    $date = date("Y-m-d");
    $dateTime = date("Y-m-d H:i:s");


    $query = "INSERT INTO absensi (employe_id,absensi_date,check_in) VALUES ('$userId','$date','$dateTime');";
    if($con->query($query) === TRUE){
        $_SESSION['success_message'] = "Check In Berhasil";
    }else{
        $_SESSION['fail_message'] = "Check In Gagal";
    }
    header("location:/");
}