<?php
require('KaryawanController.php');
$controller = new KaryawanController($con);
$data = $controller->getData($_GET);
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
                    <li class="breadcrumb-item active">Master Karyawan</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <a href="<?= $uri . '/karyawan/add' ?>"><button class="btn btn-primary float-right">Tambah Data</button></a>
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
                        <h3 class="card-title">Search</h3>
                        <div class="card-tools">

                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Nama Karyawan</label>
                                        <input type="text" name="nama" class="form-control" value="<?= @$_GET['nama'] ?>" placeholder="Location Name">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>
                                            Lokasi
                                        </label>
                                        <input type="text" name="provinsi" class="form-control" value="<?= @$_GET['provinsi'] ?>" placeholder="Provinsi">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Nik</label>
                                        <input type="text" name="city" class="form-control" value="<?= @$_GET['city'] ?>" placeholder="Kota">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-group">
                                        <label>Perpage</label>
                                        <select name="perPage" id="" class="form-control">
                                            <option <?= @$_GET['perPage'] == '10' ? "selected" : ""  ?> value="10">10</option>
                                            <option <?= @$_GET['perPage'] == '20' ? "selected" : ""  ?> value="20">20</option>
                                            <option <?= @$_GET['perPage'] == '30' ? "selected" : ""  ?> value="30">30</option>
                                            <option <?= @$_GET['perPage'] == '40' ? "selected" : ""  ?> value="40">40</option>
                                            <option <?= @$_GET['perPage'] == '50' ? "selected" : ""  ?> value="50">50</option>
                                            <option <?= @$_GET['perPage'] == '100' ? "selected" : ""  ?> value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary float-right mr-2">Search</button>
                                    <a href="<?= $uri . '/karyawan' ?>"><button type="button" class="btn btn-warning float-right mr-2">Clear</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Karyawan</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Nik</th>
                                    <th>Username</th>
                                    <th>Lokasi</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($d = $data->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $d['employe_name'] ?></td>
                                        <td><?= $d['date_of_birth'] ?></td>
                                        <td><?= $d['nik'] ?></td>
                                        <td><?= $d['username'] ?></td>
                                        <td><?= $d['location_name'] ?></td>
                                        <td><?= $d['role'] ?></td>
                                        <td>
                                            <a href="<?= $uri . '/karyawan/detail/' . $d['employe_id'] ?>"><button class="btn btn-sm btn-primary mr-1">Detail</button></a>
                                            <a href="<?= $uri . '/karyawan/edit/' . $d['employe_id'] ?>"><button class="btn btn-sm btn-warning mr-1">Edit</button></a>
                                            <!-- <button class="btn btn-sm btn-warning mr-1">Edit</button> -->
                                            <button class="btn btn-sm btn-danger mr-1" onclick="deleteValue(<?= $d['employe_id'] ?>)">Delete</button>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                        <?php
                        $paginateData = $controller->getPagination();
                        ?>
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item <?= $paginateData['currentPage'] == '1' ? "disabled" : "" ?> "><a class="page-link" href="<?= $paginateData['params'] . "&page=" . $paginateData['currentPage'] - 1 ?>">«</a></li>
                            <?php
                            for ($x = 1; $x <= $paginateData['totalPage']; $x++) {
                            ?>
                                <li class="page-item <?= $paginateData['currentPage'] == $x ? "disabled" : "" ?> "> <a class="page-link" href="<?= $paginateData['params'] . "&page=" . $x ?>"><?= $x ?></a> </li>
                            <?php
                            }
                            ?>
                            <li class="page-item <?= $paginateData['currentPage'] == $paginateData['totalPage'] ? "disabled" : "" ?>"><a class="page-link" href="<?= $paginateData['params'] . "&page=" . $paginateData['currentPage'] + 1 ?>">»</a></li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div><!-- /.container-fluid -->
</section>
<form action="<?=$uri?>/karyawan/delete" method="POST" id="formDelete">
</form>
<script>
    function deleteValue(id) {
        Swal.fire({
            title: 'Apakah Kamu Yakin ?',
            text: 'Data yang dihapus tidak bisa dikembalikan',
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes!",
        }).then((result) => {
            if (result.value) {
                $('form#formDelete').append('<input type="text" name="id" id="id" hidden readonly value="'+id+'" />');
                $("form#formDelete").submit();
            }
        });

        // console.log(id);
    }
</script>
<!-- /.content -->