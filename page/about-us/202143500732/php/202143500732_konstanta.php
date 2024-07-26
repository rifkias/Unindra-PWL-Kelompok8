<!DOCTYPE html>
<html>
<head>
    <title>Konstanta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<?php require "../202143500732_header.php"; ?>
<main>
<?php require "../202143500732_menu.php"; ?> 
        <div class="separator"></div>
        <section>
        <?php
            define('JUDUL', 'Hitung Luas Lingkaran'); 
            define ("PHI", 3.14);

            echo JUDUL;

            $r=20;
            echo "<br>Jari-jari : $r<br/>";

            $luas=PHI * $r * $r;
            echo "Luas Lingkaran = $luas";
        ?>
        </section>
        
    </main>
    <?php require "../202143500732_footer.php" ?>

