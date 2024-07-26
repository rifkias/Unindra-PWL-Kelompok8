<!DOCTYPE html>
<html>
<head>
    <title>Variables</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<?php require "../202143500838_header.php"; ?>
<main>
<?php require "../202143500838_menu.php"; ?> 
        <div class="separator"></div>
        <section>
        <?php
            $nama = "Upin";
            $usia = 5;
            $hobi = array("membaca", "mewarnai");

            echo "$nama berusia $usia tahun <br/>";
            // Upin berusia 5 tahun

            echo "Hobinya : $hobi[0], $hobi[1]"; 
            // Hobinya membaca, mewarnai
        ?>
        </section>
        
    </main>
    <?php require "../202143500838_footer.php" ?>