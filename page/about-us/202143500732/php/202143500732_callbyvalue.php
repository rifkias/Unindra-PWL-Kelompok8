<!DOCTYPE html>
<html>
<head>
    <title>Call By Referrence</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<?php require "../202143500732_header.php"; ?>
<main>
<?php require "../202143500732_menu.php"; ?> 
        <div class="separator"></div>
        <section>
        <?php
                 function jumlahkan($x,$y) {
                    $hasil = $x + $y;
                    return $hasil;
                 }

                 echo "Hasilnya = ".jumlahkan(10,2);
                 $bil = 0;
                 $bil = jumlahkan(9,9);
                 echo "<br>Hasilnya = ".$bil;
        ?>
        </section>
        
    </main>
    <?php require "../202143500732_footer.php" ?>