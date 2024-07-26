<!DOCTYPE html>
<html>
<head>
    <title>Variables</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<?php require "../202143500732_header.php"; ?>
<main>
<?php require "../202143500732_menu.php"; ?> 
        <div class="separator"></div>
        <section>
        <?php
            $nama = "Fizi";
            $usia = 5;
            $hobi = array("Bermain Sepak Bola", "Menggambar");

            echo "$nama berusia $usia tahun <br/>";
            // FIzi berusia 5 tahun

            echo "Hobinya : $hobi[0], $hobi[1]"; 
            // Hobinya Bermain Sepak Bola, Menggambar
        ?>
        </section>
        
    </main>
    <?php require "../202143500732_footer.php" ?>