<?php

?>

<?php
require('lemburController.php');
$controller = new lemburController($con);

if(isset($_GET)){
    if(isset($_GET['employe_id']) && isset($_GET['nameMonth'])){
        $employeId = $_GET['employe_id'];
        $nameMonth = $_GET['nameMonth'];
        $data = $controller->getDetail($employeId,$nameMonth);
        if (!$data['status']) {
            $_SESSION['fail_message'] = "Invalid Data";
            header('Location:' . $uri . '/lembur');
        } else {
            $value = $data['data'];
        }
    }else{
        $_SESSION['fail_message'] = "Invalid Lembur Id";
    }
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
                    <li class="breadcrumb-item"><a href="<?= $uri . '/lembur' ?>">Transaksi Lembur</a></li>
                    <li class="breadcrumb-item active">Detail Lembur</li>
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
                        <h3 class="card-title">Detail Data Lembur</h3>
                    </div>
                    <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tanggal Absen</th>
                                    <th>Nama Karyawan</th>
                                    <th>Mulai Lembur</th>
                                    <th>Selesai Lembur</th>
                                    <th>Mengajukan</th>
                                    <th>Dibuat Pada</th>
                                    <th>Dibuat Oleh</th>
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
                                        <td><?= $d['nameMonth'] ?></td>
                                        <td><?= $d['employe_name'] ?></td>
                                        <td><?= $d['total_lembur'] ?></td>
                                        <td>Rp. <?= $d['cost_overtime'] ?>,-</td>
                                        <td>Rp. <?= $d['amount_overtime'] ?>,-</td>
                                        <td><?= $d['district'] ?></td>
                                        <td><?= $d['address_1'] ?></td>
                                        <td>
                                            <a href="<?= $uri . '/lembur/detail/' . $d['lembur_id'] ?>"><button class="btn btn-sm btn-primary mr-1">Detail</button></a>
                                            <a href="<?= $uri . '/lembur/edit/' . $d['lembur_id'] ?>"><button class="btn btn-sm btn-warning mr-1">Edit</button></a>
                                            <!-- <button class="btn btn-sm btn-warning mr-1">Edit</button> -->
                                            <button class="btn btn-sm btn-danger mr-1" onclick="deleteValue(<?= $d['lembur_id'] ?>)">Delete</button>
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
                    
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->