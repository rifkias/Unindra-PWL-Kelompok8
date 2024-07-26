<?php
require('lemburController.php');
$controller = new lemburController($con);
if (isset($_POST['submit'])) {
    $res = $controller->addData($_POST);
    $error = "";

    if (!$res['status']) {
        $error = $res['message'];
    } else {
        header('Location:' . $uri . '/lembur');
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
                                <label for="employe_id">Nama Karyawan</label>
                                <select name="employe_id" id="employeSelect" class="form-control select2 <?= isset($error['employe_id']) ? 'is-invalid' : "" ?>">
                                </select>
                                <?php
                                if (isset($error['employe_id'])) {
                                    foreach ($error['employe_id'] as $err) {
                                ?>
                                        <span class="error invalid-feedback"><?= $err[0] ?></span>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Lembur</label>
                                <input type="text" name="tanggalLembur" disabled value="<?= @$_POST['tanggalLembur'] ?>" class="form-control  <?= isset($error['tanggalLembur']) ? 'is-invalid' : "" ?>" id="dateRange">
                                <?php
                                if (isset($error['tanggalLembur'])) {
                                    foreach ($error['tanggalLembur'] as $err) {
                                ?>
                                        <span class="error invalid-feedback"><?= $err[0] ?></span>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Lembur</label>
                                <input type="text" name="lembur" disabled id="lemburPicker" value="" class="form-control  <?= isset($error['province']) ? 'is-invalid' : "" ?>">
                            </div>
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

<script>
    $(document).ready(function() {
        var enabledDates = new Array();
        var minDate = new Date();
        var isUpdate = false;
        $('#lemburPicker').daterangepicker({
            timePicker: true,
            locale: {
                format: 'YYYY/MM/DD HH:mm'
            },
            minDate: minDate
        });
        $('#lemburPicker').val('');

        $('#dateRange').datepicker({
            todayHighlight: true,
            dateFormat: 'yy-mm-dd',
            multidate: true,
            startDate: new Date(),
            beforeShowDay: function(date) {
                var sdate = moment(date).format('YYYY-MM-DD');
                if ($.inArray(sdate, enabledDates) !== -1) {
                    return [true];
                } else {
                    return [false];

                }
            },
            onSelect: function(d, i) {
                if (d !== i.lastVal) {
                    $(this).change();
                }
            }
        }).on("change", function() {
            console.log(this.value);
            if (this.value !== "") {
                // $('#lemburPicker').data('daterangepicker').minDate = this.value;
                minDate = new Date(this.value+" 00:00");
                $('#lemburPicker').attr('disabled', false);

                $('#lemburPicker').daterangepicker({
                    timePicker: true,
                    startDate:minDate,
                    locale: {
                        format: 'YYYY/MM/DD HH:mm'
                    },
                    minDate: minDate
                });
            } else {
                $('#lemburPicker').attr('disabled', true);
            }
        });



        var uriAbsensi = "<?= $uri . "/api/absen/getAbsensiDate.php" ?>";

        function getEmployeAttendance(id) {
            var uri = uriAbsensi + "?employe_id=" + id;
            $.ajax({
                type: 'GET',
                url: uri
            }).then(function(data) {

                enabledDates = data;

            });
        }

        $('#employeSelect').select2({
            ajax: {
                delay: 250,
                url: '<?= $uri . "/api/search/searchEmploye.php" ?>',
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
                            id: v.employe_id,
                            text: v.employe_name,
                        });
                    });
                    // Transforms the top-level key of the response object from 'items' to 'results'
                    return {
                        results: results
                    };
                }

            },
            allowClear: true,
            placeholder: 'Select Employe',
        });

        $('#employeSelect').on("select2:select", function(e) {
            let ids = e.params.data.id ? e.params.data.id : e.params.data.employe_id;
            getEmployeAttendance(ids);
            $('#dateRange').attr('disabled', false);
            if(!isUpdate){
                $('#lemburPicker').attr('disabled', true);
                $('#dateRange').val('');
                $('#lemburPicker').val('');
            }else{
                isUpdate = !isUpdate;
            }
        });
        $('#employeSelect').on("select2:unselect", function(e) {
            $('#dateRange').attr('disabled', true);
            $('#lemburPicker').attr('disabled', true);
        });
        <?php
        if (isset($_POST['employe_id'])) {
            $id = $_POST['employe_id'];
        ?>

            function setPeriodeData(uri) {
                $.ajax({
                    type: 'GET',
                    url: uri
                }).then(function(data) {
                    // create the option and append to Select2
                    var option = new Option(data.employe_name, data.employe_id, true, true);

                    $('#employeSelect').append(option).trigger('change');

                    $('#employeSelect').trigger({
                        type: 'select2:select',
                        params: {
                            data: data
                        }
                    });

                });
                isUpdate = true;
            }
            var uri = "<?= $uri . "/api/search/searchEmploye.php?type=detail&id=$id" ?>";
            setPeriodeData(uri);
        <?php
        }

        if(isset($_POST['lembur'])) echo "$('#dateRange').val('".$_POST['tanggalLembur']."'); $('#dateRange').trigger('change');";
        if(isset($_POST['lembur'])){
            if(trim($_POST['lembur']) !== "" || trim($_POST['lembur']) !== null){
                $exploded = explode("-",$_POST['lembur']);
                $start = trim($exploded[0]);
                $end = trim($exploded[1]);
        ?>
        $('#lemburPicker').data('daterangepicker').setStartDate('<?= $start ?>');
        $('#lemburPicker').data('daterangepicker').setEndDate('<?= $end ?>');
        <?php 
            }

        }
        ?>
        
    });
</script>