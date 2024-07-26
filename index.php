<!DOCTYPE html>
<html lang="en">
<?php
session_start();
ob_start();
include('config/route.php');
include('config/koneksi.php');
$con = new Connection();
$route = new phpRouting();
$uri = $route->getUri();
$isCustomPage = $route->requiredAuthPage();
$isAuth = $route->checkAuth();
date_default_timezone_set("Asia/Jakarta");
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payroll App | Magnus Security Service</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= $uri . '/assets/plugins/fontawesome-free/css/all.min.css' ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= $uri . '/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css' ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= $uri . '/assets/css/adminlte.min.css' ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= $uri . '/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css' ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= $uri . '/assets/plugins/daterangepicker/daterangepicker.css' ?>">
    <!-- <link rel="stylesheet" href="< ?= $uri . '/assets/plugins/datepicker/css/datepicker.css' ?>"> -->
    <link rel="stylesheet" href="<?= $uri . '/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css' ?>">
    <link rel="stylesheet" href="<?= $uri . '/assets/plugins/select2/css/select2.min.css' ?>">
    <link rel="stylesheet" href="<?= $uri . '/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css' ?>">
    <!-- DatePicker Jquery -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">

     <!-- jQuery -->
     <script src="<?= $uri . '/assets/plugins/jquery/jquery.min.js' ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= $uri . '/assets/plugins/jquery-ui/jquery-ui.min.js' ?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= $uri . '/assets/plugins/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= $uri . '/assets/plugins/jquery-knob/jquery.knob.min.js' ?>"></script>
    <!-- daterangepicker -->
    <script src="<?= $uri . '/assets/plugins/moment/moment.min.js' ?>"></script>
    <script src="<?= $uri . '/assets/plugins/daterangepicker/daterangepicker.js' ?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?= $uri . '/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js' ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= $uri . '/assets/js/adminlte.min.js' ?>"></script>
    <script src="<?= $uri . '/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js' ?>"></script>
    <!-- Jquery DatePicker -->
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <!-- <script src="< ?= $uri . '/assets/plugins/datepicker/js/bootstrap-datepicker.js' ?>"></script> -->

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= $uri . '/assets/plugins/sweetalert2/sweetalert2.min.js' ?>"></script>
    <script src="<?= $uri . '/assets/plugins/select2/js/select2.full.min.js' ?>"></script>

    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js"></script>


</head>
<?php
if (!$isAuth) {
    if ($route->getPath() !== 'login') {
        header("location:" . $uri . "/login");
    }
} else {
    if ($route->getPath() == 'login') {
        header("location:" . $uri);
    }
}

if ($isCustomPage) {
?>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="<?= $uri . '/assets/img/AdminLTELogo.png' ?>" alt="AdminLTELogo" height="60" width="60">
            </div>
        </div>

        <?php
        include_once('./partials/_navbar.php');
        include_once('./partials/_sidebar.php');
        ?>

        <div class="content-wrapper">
            <?php
            include_once($route->getFilename());
            ?>

        </div>

        <?php
        include_once('./partials/_footer.php');

        ?>
    </body>
    <script>
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
<?php
} else {
    include($route->getFilename());
    // header("location:index");
}


if (isset($_SESSION['success_message'])) {
    echo "<script>
     Toast.fire({
        icon: 'success',
        title: '" . $_SESSION['success_message'] . "'
      })
    </script>";
    // Preventing Alert not showing because was loaded on requested page not redirected page
    if (isset($_SESSION['viewAlert'])) {
        unset($_SESSION['viewAlert']);
        unset($_SESSION['success_message']);
    } else {
        $_SESSION['viewAlert'] = 1;
    }
}

if (isset($_SESSION['fail_message'])) {
    echo "<script>
    Toast.fire({
       icon: 'error',
       title: '" . $_SESSION['fail_message'] . "'
     })
   </script>";
    if (isset($_SESSION['viewAlert'])) {
        unset($_SESSION['viewAlert']);
        unset($_SESSION['fail_message']);
    } else {
        $_SESSION['viewAlert'] = 1;
    }
}
?>

</html>