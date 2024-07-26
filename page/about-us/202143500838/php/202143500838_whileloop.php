<!DOCTYPE html>
<html>
<head>
    <title>While Loop</title>
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

            while ($i < 10) //lakukan selama memenuhi syarat
            {
                //jalankan blok program
                echo $i;
                $i++;
            }
            //0123456789
        ?>
        </section>
        
    </main>
    <?php require "../202143500838_footer.php" ?>