<?php


?>

<?php
require('LocationController.php');
$controller = new LocationController($con);
$id = $route->getParams();

$data = $controller->getDetail($id);
if (!$data['status']) {
    header('Location:' . $uri . '/lokasi');
} else {
    $value = $data['data'];
}



?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Lokasi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= $uri ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= $uri . '/lokasi' ?>">Master Lokasi</a></li>
                    <li class="breadcrumb-item active">Detail Lokasi</li>
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
                        <h3 class="card-title">Detail Data Lokasi</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama Lokasi</label>
                            <input type="text" class="form-control <?= isset($error['name']) ? 'is-invalid' : "" ?> " name="name" disabled id="" placeholder="Nama Lokasi" value="<?= @$value['name'] ?>">
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
                            <label for="">Nama Provinsi</label>
                            <input type="text" class="form-control <?= isset($error['province']) ? 'is-invalid' : "" ?> " disabled name="province" id="" placeholder="Nama Provinsi" value="<?= @$value['province'] ?>">
                            <?php
                            if (isset($error['province'])) {
                                foreach ($error['province'] as $err) {
                            ?>
                                    <span class="error invalid-feedback"><?= $err[0] ?></span>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kota</label>
                            <input type="text" class="form-control <?= isset($error['city']) ? 'is-invalid' : "" ?> " disabled name="city" id="" placeholder="Nama Kota" value="<?= @$value['city'] ?>">
                            <?php
                            if (isset($error['city'])) {
                                foreach ($error['city'] as $err) {
                            ?>
                                    <span class="error invalid-feedback"><?= $err[0] ?></span>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kabupaten</label>
                            <input type="text" class="form-control <?= isset($error['district']) ? 'is-invalid' : "" ?>" disabled id="" name="district" placeholder="Nama Kabupaten" value="<?= @$value['district'] ?>">
                            <?php
                            if (isset($error['district'])) {
                                foreach ($error['district'] as $err) {
                            ?>
                                    <span class="error invalid-feedback"><?= $err[0] ?></span>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kecamatan</label>
                            <input type="text" class="form-control <?= isset($error['sub_district']) ? 'is-invalid' : "" ?>" disabled id="" name="sub_district" placeholder="Nama Kecamatan" value="<?= @$value['sub_district'] ?>">
                            <?php
                            if (isset($error['sub_district'])) {
                                foreach ($error['sub_district'] as $err) {
                            ?>
                                    <span class="error invalid-feedback"><?= $err[0] ?></span>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="">Kode Pos</label>
                            <input type="text" class="form-control <?= isset($error['zip_code']) ? 'is-invalid' : "" ?>" disabled id="" name="zip_code" placeholder="Kode Pos" value="<?= @$value['zip_code'] ?>">
                            <?php
                            if (isset($error['zip_code'])) {
                                foreach ($error['zip_code'] as $err) {
                            ?>
                                    <span class="error invalid-feedback"><?= $err[0] ?></span>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat 1</label>
                            <textarea name="address_1" class="form-control <?= isset($error['address_1']) ? 'is-invalid' : "" ?>" disabled placeholder="Alamat 1"><?= @$value['address_1'] ?></textarea>
                            <?php
                            if (isset($error['address_1'])) {
                                foreach ($error['address_1'] as $err) {
                            ?>
                                    <span class="error invalid-feedback"><?= $err[0] ?></span>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat 2</label>
                            <textarea name="address_2" class="form-control <?= isset($error['address_2']) ? 'is-invalid' : "" ?>" disabled placeholder="Alamat 2"><?= @$value['address_2'] ?></textarea>
                            <?php
                            if (isset($error['address_2'])) {
                                foreach ($error['address_2'] as $err) {
                            ?>
                                    <span class="error invalid-feedback"><?= $err[0] ?></span>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="<?=$uri?>/lokasi"><button type="submit" name="submit" class="btn btn-warning float-left mr-2">Back</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->