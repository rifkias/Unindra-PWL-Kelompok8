<?php
require('LocationController.php');
$controller = new LocationController($con);
$data = $controller->getData();
?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Lokasi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Master Lokasi</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Provinsi</th>
                                    <th>Kota</th>
                                    <th>Kabupaten</th>
                                    <th>Kecamatan</th>
                                    <th>Address</th>
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
                                        <td><?= $d['name'] ?></td>
                                        <td><?= $d['province'] ?></td>
                                        <td><?= $d['city'] ?></td>
                                        <td><?= $d['district'] ?></td>
                                        <td><?= $d['sub_district'] ?></td>
                                        <td><?= $d['address_1'] ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-primary mr-1">Detail</button>
                                            <button class="btn btn-sm btn-warning mr-1">Edit</button>
                                            <button class="btn btn-sm btn-danger mr-1">Delete</button>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->