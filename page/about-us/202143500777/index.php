<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../TUGAS_PWL-5_Y6G_202143500777_Mohammad lutfy Firmansyah/css/style.css" rel="stylesheet" />
</head>
<body>
    <?php $uri = "/kelompok1/page/about-us/202143500732/index.php"; ?>
        <?php include_once('_header.php') ?>
<div class="container-fluid text-center bg-light col-12">
    <div class="row align-items-start">
        <?php include_once('_sidebar.php') ?>
    <div class="col">
        <?php
                $npm = "202143500777";
                if (!isset($_GET['page']))
                {
                    include $npm."_helloworld.php";
                } else
                {
                    switch ($_GET['page']) {
                        case "biodata":
                            include $npm."_biodata.php";
                            break;
                        case "variable":
                            include $npm."_variable.php";
                            break;
                        case "object":
                            include $npm."_object.php";
                            break;
                        case "konstanta":
                            include $npm."_konstanta.php";
                            break;
                        case "aritmatika":
                            include $npm."_aritmatika.php";
                            break;
                        case "perbandingan":
                            include $npm."_perbandingan.php";
                            break;
                        case "string":
                            include $npm."_string.php";
                            break;
                        case "kondisiIf":
                            include $npm."_if.php";
                            break;
                        case "kondisiIfElse":
                            include $npm."_ifElse.php";
                            break;
                        case "switch":
                            include $npm."_switch.php";
                            break;
                        case "whileLoop":
                            include $npm."_whileLoop.php";
                            break;
                        case "doWhile":
                            include $npm."_doWhile.php";
                            break;
                        case "forLoop":
                            include $npm."_forLoop.php";
                            break;
                        case "foreachLoop":
                            include $npm."_foreachLoop.php";
                            break;
                        case "optionalargument":
                            include $npm."_optionalargument.php";
                            break;
                        case "functionParameter":
                            include $npm."_functionParameter.php";
                            break;
                        case "function":
                            include $npm."_function.php";
                            break;
                        case "callByValue":
                            include $npm."_callByValue.php";
                            break;        
                        default:
                        include $npm."_helloworld.php";
                    };
                }
            ?>
    </div>
    <?php include_once('_footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>