<!DOCTYPE html>
<html lang="en">
    <?php 
        session_start();
        ob_start(); 
        include('config/route.php');
        include ('config/koneksi.php');
        $con = new Connection();
        $route = new phpRouting();
        $uri = $route->getUri();
        $isCustomPage = $route->requiredAuthPage();
        $isAuth = $route->checkAuth();
    ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= $uri.'assets/plugins/fontawesome-free/css/all.min.css'?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= $uri.'assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= $uri.'assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css'?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= $uri.'assets/plugins/jqvmap/jqvmap.min.css'?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= $uri.'assets/css/adminlte.min.css'?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= $uri.'assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= $uri.'assets/plugins/daterangepicker/daterangepicker.css'?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= $uri.'assets/plugins/summernote/summernote-bs4.min.css'?>">
</head>
<?php 
    if(!$isAuth){
        if($route->getPath() !== 'login'){
            header("location:login");
        }
    }else{
        if($route->getPath() == 'login'){
            header("location:/");
        }
    }

   
    if($isCustomPage){
?>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= $uri.'assets/img/AdminLTELogo.png'?>" alt="AdminLTELogo" height="60" width="60">
        </div>
    </div>
        
    <?php
    include_once('./partials/_navbar.php');
    include_once('./partials/_sidebar.php');
    ?>

    <div class="content-wrapper">
        <?php 
            include($route->getFilename());
        ?>

    </div>

    <?php 
    include_once('./partials/_footer.php');

    ?>

    <!-- jQuery -->
    <script src="<?= $uri.'assets/plugins/jquery/jquery.min.js'?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= $uri.'assets/plugins/jquery-ui/jquery-ui.min.js'?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= $uri.'assets/plugins/bootstrap/js/bootstrap.bundle.min.js'?>"></script>
    <!-- ChartJS -->
    <script src="<?= $uri.'assets/plugins/chart.js/Chart.min.js'?>"></script>
    <!-- Sparklin -->
    <script src="<?= $uri.'assets/plugins/sparklines/sparkline.js'?>"></script>
    <!-- JQVMap -->
    <script src="<?= $uri.'assets/plugins/jqvmap/jquery.vmap.min.js'?>"></script>
    <script src="<?= $uri.'assets/plugins/jqvmap/maps/jquery.vmap.usa.js'?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= $uri.'assets/plugins/jquery-knob/jquery.knob.min.js'?>"></script>
    <!-- daterangepicker -->
    <script src="<?= $uri.'assets/plugins/moment/moment.min.js'?>"></script>
    <script src="<?= $uri.'assets/plugins/daterangepicker/daterangepicker.js'?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= $uri.'assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'?>"></script>
    <!-- Summernote -->
    <script src="<?= $uri.'assets/plugins/summernote/summernote-bs4.min.js'?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?= $uri.'assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= $uri.'assets/js/adminlte.js'?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= $uri.'assets/js/demo.js'?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= $uri.'assets/js/pages/dashboard.js'?>"></script>
</body>
<?php 
    }else{
        include($route->getFilename());
        // header("location:index");
    }
?>
</html>