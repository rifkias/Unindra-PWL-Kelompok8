<?php
require('KaryawanController.php');
$controller = new KaryawanController($con);

if (isset($_POST['submit'])) {
    $res = $controller->addData($_POST);
    $error = "";
    if (!$res['status']) {
        $error = $res['message'];
    } else {
        header('Location:' . $uri . '/karyawan');
    }
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
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form action="" method="POST">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Buat Data Karyawan</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Nama Karyawan</label>
                                <input type="text" class="form-control <?= isset($error['employe_name']) ? 'is-invalid' : "" ?> " name="employe_name" placeholder="Nama Karyawan" value="<?= @$_POST['employe_name'] ?>">
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
                                <input type="date" class="form-control <?= isset($error['date_of_birth']) ? 'is-invalid' : "" ?> " name="date_of_birth" placeholder="Tanggal Lahir" value="<?= @$_POST['date_of_birth'] ?>">
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
                                <input type="text" class="form-control <?= isset($error['nik']) ? 'is-invalid' : "" ?> " name="nik" placeholder="NIK" value="<?= @$_POST['nik'] ?>">
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
                                <input type="text" class="form-control <?= isset($error['username']) ? 'is-invalid' : "" ?> " name="username" placeholder="Username" value="<?= @$_POST['username'] ?>">
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
                                <label for="">Password</label>
                                <input type="password" class="form-control <?= isset($error['password']) ? 'is-invalid' : "" ?> " name="password" placeholder="Password" value="<?= @$_POST['password'] ?>">
                                <?php
                                if (isset($error['password'])) {
                                    foreach ($error['password'] as $err) {
                                ?>
                                        <span class="error invalid-feedback"><?= $err[0] ?></span>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="">Lokasi</label>
                                <!-- <input type="text" class="form-control " name="location_id"  placeholder="Nama Lokasi" value="< ?= @$_POST['location_id'] ?>"> -->
                                <select name="location_id" id="locationSelect" class="form-control select2 <?= isset($error['location_id']) ? 'is-invalid' : "" ?>"></select>
                                <?php
                                if (isset($error['location_id'])) {
                                    foreach ($error['location_id'] as $err) {
                                ?>
                                        <span class="error invalid-feedback"><?= $err[0] ?></span>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="">Gaji</label>
                                <input type="number" class="form-control <?= isset($error['salary']) ? 'is-invalid' : "" ?> " name="salary" placeholder="Gaji" value="<?= @$_POST['salary'] ?>">
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
                                <input type="text" class="form-control <?= isset($error['role']) ? 'is-invalid' : "" ?> " name="role" placeholder="Nama Role" value="<?= @$_POST['role'] ?>">
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
                                <select name="is_active" class="form-control <?= isset($error['is_active']) ? 'is-invalid' : "" ?> ">
                                    <option value="" selected>-- Pilih Data --</option>
                                    <option value="1" <?= @$_POST['is_active'] === '1' ? "selected" : "" ?>> Aktif </option>
                                    <option value="0" <?= @$_POST['is_active'] === '0' ? "selected" : "" ?>>Tidak Aktif</option>
                                </select>
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
                                    <a href="<?= $uri ?>/karyawan"><button type="submit" name="submit" class="btn btn-warning float-left mr-2">Back</button></a>
                                    <button type="submit" name="submit" class="btn btn-primary float-right mr-2">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<script>
    $(document).ready(function() {
        $('#locationSelect').select2({
            ajax: {
                delay: 250,
                url: '<?= $uri . "/api/searchLocation.php" ?>',
                data: function(params) {
                    var query = {
                        "search": params.term
                    }
                    return query;
                },
                processResults: function(data) {
                    var results = [];
                    $.each(data, function(k, v) {
                        results.push({
                            id: v.location_id,
                            text: v.name,
                        });
                    });
                    // Transforms the top-level key of the response object from 'items' to 'results'
                    return {
                        results: results
                    };
                }

            },
            allowClear: true,
            placeholder: 'Select Location',
        });
        <?php
        if (isset($_POST['location_id'])) {
            $id = $_POST['location_id'];
        ?>

            function setPeriodeData(uri) {
                $.ajax({
                    type: 'GET',
                    url: uri
                }).then(function(data) {
                    // create the option and append to Select2
                    var option = new Option(data.name, data.location_id, true, true);

                    $('#locationSelect').append(option).trigger('change');

                    $('#locationSelect').trigger({
                        type: 'select2:select',
                        params: {
                            data: data
                        }
                    });

                });
            }
            var uri = "<?= $uri . "/api/searchLocation.php?type=detail&id=$id" ?>";
            setPeriodeData(uri);
        <?php
        }
        ?>
    });
</script>