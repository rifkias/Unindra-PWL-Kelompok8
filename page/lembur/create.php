<?php
require('lemburController.php');
$controller = new lemburController($con);

if (isset($_POST['submit'])) {
    $res = $controller->addData($_POST);
    $error = "";
    
    if (!$res['status']) {
        $error = $res['message'];
    }else{
        header('Location:'.$uri.'/lembur');
    }

}



?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Lembur</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= $uri ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= $uri . '/lembur' ?>">Transaksi Lembur</a></li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Buat Data Lembur</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="">Nama Karyawan</label>
                                <input type="text" class="form-control <?= isset($error['name']) ? 'is-invalid' : "" ?> " name="name" id="" placeholder="employee Name" value="<?= @$_POST['name'] ?>">
                                <?php
                                if (isset($error['name'])) {
                                    foreach ($error['name'] as $err) {
                                ?>
                                        <span class="error invalid-feedback"><?= $err[0] ?></span>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Lembur</label>
                                <input type="date" class="form-control <?= isset($error['province']) ? 'is-invalid' : "" ?> " name="province" id="" placeholder="Overtime date" value="<?= @$_POST['province'] ?>">
                                <?php
                                if (isset($error['province'])) {
                                    foreach ($error['province'] as $err) {
                                ?>
                                        <span class="error invalid-feedback"><?= $err[0]?></span>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="">Mulai Lembur</label>
                                <input type="datetime-local" class="form-control <?= isset($error['city']) ? 'is-invalid' : "" ?> " name="city" id="" placeholder="Start Overtime" value="<?= @$_POST['city'] ?>">
                                <?php
                                if (isset($error['city'])) {
                                    foreach ($error['city'] as $err) {
                                ?>
                                        <span class="error invalid-feedback"><?= $err[0]?></span>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="">Selesai Lembur</label>
                                <input type="datetime-local" class="form-control <?= isset($error['district']) ? 'is-invalid' : "" ?>" id="" name="district" placeholder="End Overtime" value="<?= @$_POST['district'] ?>">
                                <?php
                                if (isset($error['district'])) {
                                    foreach ($error['district'] as $err) {
                                ?>
                                        <span class="error invalid-feedback"><?= $err[0]?></span>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <!--<div class="form-group">
                                <label for="">Nama Kecamatan</label>
                                <input type="text" class="form-control <?= isset($error['sub_district']) ? 'is-invalid' : "" ?>" id="" name="sub_district" placeholder="Nama Kecamatan" value="<?= @$_POST['sub_district'] ?>">
                                <?php
                                if (isset($error['sub_district'])) {
                                    foreach ($error['sub_district'] as $err) {
                                ?>
                                        <span class="error invalid-feedback"><?= $err[0]?></span>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="">Kode Pos</label>
                                <input type="text" class="form-control <?= isset($error['zip_code']) ? 'is-invalid' : "" ?>" id="" name="zip_code" placeholder="Kode Pos" value="<?= @$_POST['zip_code'] ?>">
                                <?php
                                if (isset($error['zip_code'])) {
                                    foreach ($error['zip_code'] as $err) {
                                ?>
                                        <span class="error invalid-feedback"><?= $err[0]?></span>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat 1</label>
                                <textarea name="address_1" class="form-control <?= isset($error['address_1']) ? 'is-invalid' : "" ?>" placeholder="Alamat 1"><?= @$_POST['address_1'] ?></textarea>
                                <?php
                                if (isset($error['address_1'])) {
                                    foreach ($error['address_1'] as $err) {
                                ?>
                                        <span class="error invalid-feedback"><?= $err[0]?></span>
                                <?php
                                    }
                                }
                                ?>
                            </div> -->
                             <!-- <div class="form-group">
                                <label for="">Alamat 2</label>
                                <textarea name="address_2" class="form-control <?= isset($error['address_2']) ? 'is-invalid' : "" ?>" placeholder="Alamat 2"><?= @$_POST['address_2'] ?></textarea>
                                <?php
                                if (isset($error['address_2'])) {
                                    foreach ($error['address_2'] as $err) {
                                ?>
                                        <span class="error invalid-feedback"><?= $err[0]?></span>
                                <?php
                                    }
                                }
                                ?>
                            </div> -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" name="submit" class="btn btn-primary float-right mr-2">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->