<!DOCTYPE html>
<html>
<head>
    <title>Do While Loop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<?php require "../202143500838_header.php"; ?>
    <main>
    <?php require "../202143500838_menu.php"; ?> 
        <div class="separator"></div>
        <section>
        <?php
            //inisialisasi nilai awal
            $i = 0;

            do 
            {
                //jalankan blok program
                echo $i;
                $i++;
            } while ($i < 20) //ulangi selama memenuhi syarat
            //0123456789
        ?>
        </section>
    </main>
    <?php require "../202143500838_footer.php" ?>
