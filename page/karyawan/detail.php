<?php


?>

<?php
require('KaryawanController.php');
$controller = new KaryawanController($con);
$id = $route->getParams();

$data = $controller->getDetail($id);
if (!$data['status']) {
    header('Location:' . $uri . '/karyawan');
} else {
    $value = $data['data'];
}



?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Karyawan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= $uri ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= $uri . '/karyawan' ?>">Master Karyawan</a></li>
                    <li class="breadcrumb-item active">Detail Karyawan</li>
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
                        <h3 class="card-title">Detail Data Karyawan</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama Karyawan</label>
                            <input type="text" class="form-control <?= isset($error['employe_name']) ? 'is-invalid' : "" ?> " name="employe_name" disabled id="" placeholder="Nama Karyawan" value="<?= @$value['employe_name'] ?>">
                            <?php
                            if (isset($error['employe_name'])) {
                                foreach ($error['employe_name'] as $err) {
                            ?>
                                    <span class="error invalid-feedback"><?= $err[0] ?></span>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="text" class="form-control <?= isset($error['date_of_birth']) ? 'is-invalid' : "" ?> " name="date_of_birth" disabled id="" placeholder="Tanggal Lahir" value="<?= @$value['date_of_birth'] ?>">
                            <?php
                            if (isset($error['date_of_birth'])) {
                                foreach ($error['date_of_birth'] as $err) {
                            ?>
                                    <span class="error invalid-feedback"><?= $err[0] ?></span>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="">NIK</label>
                            <input type="text" class="form-control <?= isset($error['nik']) ? 'is-invalid' : "" ?> " name="nik" disabled id="" placeholder="NIK" value="<?= @$value['nik'] ?>">
                            <?php
                            if (isset($error['nik'])) {
                                foreach ($error['nik'] as $err) {
                            ?>
                                    <span class="error invalid-feedback"><?= $err[0] ?></span>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control <?= isset($error['username']) ? 'is-invalid' : "" ?> " name="username" disabled id="" placeholder="Username" value="<?= @$value['username'] ?>">
                            <?php
                            if (isset($error['username'])) {
                                foreach ($error['username'] as $err) {
                            ?>
                                    <span class="error invalid-feedback"><?= $err[0] ?></span>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="">Lokasi</label>
                            <input type="text" class="form-control <?= isset($error['location_name']) ? 'is-invalid' : "" ?> " name="location_name" disabled id="" placeholder="Nama Lokasi" value="<?= @$value['location_name'] ?>">
                            <?php
                            if (isset($error['location_name'])) {
                                foreach ($error['location_name'] as $err) {
                            ?>
                                    <span class="error invalid-feedback"><?= $err[0] ?></span>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="">Gaji</label>
                            <input type="text" class="form-control <?= isset($error['salary']) ? 'is-invalid' : "" ?> " name="name" disabled id="" placeholder="Gaji" value="Rp. <?= @$value['salary'] ? number_format($value['salary']) : 0 ?>">
                            <?php
                            if (isset($error['salary'])) {
                                foreach ($error['salary'] as $err) {
                            ?>
                                    <span class="error invalid-feedback"><?= $err[0] ?></span>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="">Role</label>
                            <input type="text" class="form-control <?= isset($error['role']) ? 'is-invalid' : "" ?> " name="role" disabled id="" placeholder="Nama Lokasi" value="<?= @$value['role'] ?>">
                            <?php
                            if (isset($error['role'])) {
                                foreach ($error['role'] as $err) {
                            ?>
                                    <span class="error invalid-feedback"><?= $err[0] ?></span>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="">Active</label>
                            <input type="text" class="form-control <?= isset($error['is_active']) ? 'is-invalid' : "" ?> " name="is_active" disabled id="" placeholder="Active Flag" value="<?= @$value['is_active'] ? "Aktif" : "Tidak Aktif" ?>">
                            <?php
                            if (isset($error['is_active'])) {
                                foreach ($error['is_active'] as $err) {
                            ?>
                                    <span class="error invalid-feedback"><?= $err[0] ?></span>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="<?=$uri?>/karyawan"><button type="submit" name="submit" class="btn btn-warning float-left mr-2">Back</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->