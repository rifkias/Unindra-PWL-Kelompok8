<?php

require('DashboardController.php');
$controller = new DashboardController($con);
$data = $controller->getData();

$type = 'checkin';
$dataAbsen = $data['dataAbsen'];

if ($dataAbsen) {
    $type = 'checkout';
    $absenId = $dataAbsen['absensi_id'];
}
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-4 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <p>Attendance</p>
                        <h5>Check In : <?= @$dataAbsen['check_in'] ?></h5>
                        <h5>Check Out : <?= @$dataAbsen['check_out'] ?></h5>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clock"></i>
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <?php
                    if ($type == 'checkin') {
                    ?>
                        <a href="<?= $uri . "/api/checkInEmploye.php" ?>" class="small-box-footer">Check In <i class="fas fa-arrow-circle-right"></i></a>
                    <?php
                    } else {
                    ?>
                        <a href="<?= $uri . "/api/checkOutEmploye.php?absenId=$absenId" ?>" class="small-box-footer">Check Out <i class="fas fa-arrow-circle-right"></i></a>
                    <?php
                    }
                    ?>
                </div>
            </div>


            <div class="col-lg-4 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= @$data['totalEmploye'] ?></h3>
                        <p>Total Employe</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?= $uri . '/karyawan' ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6">

                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3><?= @$data['totalLokasi'] ?></h3>
                        <p>Total Lokasi</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-map-pin"></i>
                    </div>
                    <a href="<?= $uri . '/lokasi' ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= @$data['totalLembur'] ?></h3>
                        <p>Total Lembur Bulan Ini</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-clock"></i>
                    </div>
                    <a href="<?= $uri . '/lembur' ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
          
            <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= @$data['totalAbsen'] ?></h3>
                        <p>Total Absensi Bulan Ini</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <a href="<?= $uri . '/absensi' ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>


        </div>

    </div>
</section>