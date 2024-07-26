<!DOCTYPE html>
<html>
<head>
    <title>Operator String</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<?php require "../202143500732_header.php"; ?>
<main>
<?php require "../202143500732_menu.php"; ?> 
        <div class="separator"></div>
        <section>
        <?php
                $teks1 = "Aku Sedang Belajar ";
                $teks2 = "Pemrograman WEB Lanjut ";
                $teks3 = "Menggunakan PHP ";

                $hasil = $teks1 . $teks2 . $teks3;
                printf("hasil : %s<br/>", $hasil);
                //Hasil : Aku Sedang Belajar Pemrograman WEB Lanjut Menggunakan PHP 
                $hasil = $teks1 . "" . $teks2 . "". $teks3;
                echo "hasil : " . $hasil;
                //Hasil : Aku Sedang Belajar Pemrograman WEB Lanjut Menggunakan PHP
        ?>
        </section>
        
    </main>
    <?php require "../202143500732_footer.php" ?>
