<!DOCTYPE html>
<html>
<head>
    <title>Function Parameterrr</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<?php require "../202143500838_header.php"; ?>
<main>
<?php require "../202143500838_menu.php"; ?> 
        <div class="separator"></div>
        <section>
        <?php
                 function salam($nama) {
                    echo "Halo Kawan ".$nama;
                 }

                 salam("Ipin<br>");
                 salam("upin<br>");
                 salam("Ucok");
        ?>
        </section>
        
    </main>
    <?php require "../202143500838_footer.php" ?>