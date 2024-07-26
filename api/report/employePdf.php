<?php
require('../../vendor/autoload.php');
require('../../config/koneksi.php');
$con = new Connection();

$where = "";
$params = $_GET;
if (@$params['nama']) {
    $like = "'%" . $params['nama'] . "%'";
    if ($where == "") {
        $where .= "WHERE name LIKE " . $like;
    } else {
        $where .= "AND name LIKE " . $like;
    }
}
if (@$params['provinsi']) {
    $like = "'%" . $params['provinsi'] . "%'";
    if ($where == "") {
        $where .= "WHERE province LIKE " . $like;
    } else {
        $where .= "AND province LIKE " . $like;
    }
}
if (@$params['city']) {
    $like = "'%" . $params['city'] . "%'";
    if ($where == "") {
        $where .= "WHERE city LIKE " . $like;
    } else {
        $where .= "AND city LIKE " . $like;
    }
}
$query = "SELECT employe.* ,location.name as location_name FROM employe LEFT JOIN location on location.location_id = employe.location_id $where ";

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
                <h3>Report Karyawan</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
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
                                <td><?= $d['date_of_birth'] ?></td>
                                <td><?= $d['nik'] ?></td>
                                <td><?= $d['username'] ?></td>
                                <td><?= $d['location_name'] ?></td>
                                <td><?= $d['role'] ?></td>
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