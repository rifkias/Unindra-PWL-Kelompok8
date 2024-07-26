<?php
require('../../vendor/autoload.php');
require('../../config/koneksi.php');
$con = new Connection();

$where = "";
$params = $_GET;

if(@$params['karyawan_id']){
    $like = $params['karyawan_id'];
    if($where == ""){
        $where .= "WHERE absensi.employe_id = '$like'";
    }else{
        $where .= "AND absensi.employe_id  = '$like'";
    }
}

if(@$params['absenDate']){
    $dates = rawurldecode($params['absenDate']);
    $dateExplode = explode("-",$dates);
    $date1 = date("Y-m-d",strtotime(trim(str_replace("/","-",$dateExplode[0]))));
    $date2 = date("Y-m-d",strtotime(trim(str_replace("/","-",$dateExplode[1]))));
    // echo str_replace("/","-",$dateExplode[1]);
    $params = "BETWEEN '$date1' AND '$date2'";
    // $like = $params['karyawan_id'];
    if($where == ""){
        $where .= "WHERE absensi.absensi_date $params";
    }else{
        $where .= "AND absensi.absensi_date $params";
    }
}

$query = "SELECT absensi.*,employe.employe_name as employe_name FROM absensi LEFT JOIN employe on absensi.employe_id = employe.employe_id  $where";

$data = [];

$res = $con->query($query);

while ($d = $res->fetch_assoc()) {
    $data[] = $d;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Magnus Security Service | Employe Report</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../assets/css/adminlte.min.css">
</head>

<body>
    <div class="wrapper">
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <img src="/assets/img/image.png" alt="" style="max-height: 90px; width:auto"> Magnus Sedaya Selaras
                        <small class="float-right">Date: <?= date("d-m-Y") ?></small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
        </section>
        <div class="row">
            <div class="col-12 text-center">
                <h3>Report Absensi</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Karyawan</th>
                                    <th>Tanggal Absen</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data as $d) {
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $d['employe_name'] ?></td>
                                        <td><?= $d['absensi_date'] ?></td>
                                        <td><?= $d['check_in'] ?></td>
                                        <td><?= $d['check_out'] ?></td>
                                    </tr>
                                <?php
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
            </div>
        </div>
    </div>
</body>
<script>
    window.addEventListener("load", window.print());
</script>

</html>