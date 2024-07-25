<?php 

session_start();
date_default_timezone_set("Asia/Jakarta");
include('../config/koneksi.php');
$con = new Connection();
$datas = [];
if(isset($_GET['employe_id'])){
    $employeId = $_GET['employe_id'];

    
    $query = "SELECT * FROM absensi WHERE employe_id = $employeId";
    $res = $con->query($query);

    while($d = $res->fetch_assoc()){
        $datas[] = $d['absensi_date'];

    }
}

echo json_encode($datas);

header('Content-Type: application/json; charset=utf-8');