<?php 
    // $uri = "http://pwl.test/p4";
    // $uri =  (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]";
    // $basePath = basename(dirname($_SERVER['PHP_SELF']));
    // if($basePath <> 'index.php'){
    //     $uri = $uri."/".$basePath;
    // }
?>

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Daftar Folder</div>
                <a class="nav-link" href="<?php echo $uri ."/biodata"?>">
                    Biodata
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#p2"
                    aria-expanded="false" aria-controls="p2">
                    P2
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="p2" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo $uri . "/helloWorld" ?>">Hello World</a>
                        <a class="nav-link" href="<?php echo $uri . "/variable" ?>">Variable</a>
                        <a class="nav-link" href="<?php echo $uri . "/object" ?>">Object</a>
                        <a class="nav-link" href="<?php echo $uri . "/konstanta" ?>">Konstanta</a>
                        <a class="nav-link" href="<?php echo $uri . "/aritmatika" ?>">Operator Aritmatika</a>
                        <a class="nav-link" href="<?php echo $uri . "/perbandingan" ?>">Operator Perbandingan</a>
                        <a class="nav-link" href="<?php echo $uri . "/string" ?>">Operator String</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#p3"
                    aria-expanded="false" aria-controls="p3">
                    P3
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="p3" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo $uri . "/kondisiIf" ?>">Kondisi If</a>
                        <a class="nav-link" href="<?php echo $uri . "/kondisiIfElse" ?>">Kondisi ElseIf</a>
                        <a class="nav-link" href="<?php echo $uri . "/switch" ?>">Kondisi Switch</a>
                        <a class="nav-link" href="<?php echo $uri . "/whileLoop" ?>">While Loop</a>
                        <a class="nav-link" href="<?php echo $uri . "/doWhile" ?>">Do While Loop</a>
                        <a class="nav-link" href="<?php echo $uri . "/forLoop" ?>">For Loop</a>
                        <a class="nav-link" href="<?php echo $uri . "/foreachLoop" ?>">Foreach Loop</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#p4"
                    aria-expanded="false" aria-controls="p4">
                    P4
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="p4" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo $uri . "/function" ?>">Function</a>
                        <a class="nav-link" href="<?php echo $uri . "/functionParameter" ?>">Function Dengan Parameter</a>
                        <a class="nav-link" href="<?php echo $uri . "/optionalArugment" ?>">Optional Argument</a>
                        <a class="nav-link" href="<?php echo $uri . "/callByValue" ?>">Call By Value</a>
                        <a class="nav-link" href="<?php echo $uri . "/callByReference" ?>">Call By Reference</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#p5"
                    aria-expanded="false" aria-controls="p5">
                    P5
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="p5" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo $uri . "/formBiodata" ?>">Form Biodata</a>
                        <a class="nav-link" href="<?php echo $uri . "/formTable" ?>">Form Table</a>
                        <a class="nav-link" href="<?php echo $uri . "/convertNilai" ?>">Form Convert Nilai</a>
                    </nav>
                </div>
                <a class="nav-link" href="/">
                    Kembali
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Template By :</div>
            Start Bootstrap
        </div>
    </nav>
</div>