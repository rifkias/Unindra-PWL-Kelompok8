<!DOCTYPE html>
<html>
<head>
    <title>Call By Referrence</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<?php require "../202143500838_header.php"; ?>
<main>
<?php require "../202143500838_menu.php"; ?> 
        <div class="separator"></div>
        <section>
        <?php
                 function nilaiKuadrat(&$nilai) {
                    $nilai = $nilai * $nilai;
                 }

                 $bil = 3;
                 echo "Nilai = ".$bil;

                 nilaiKuadrat($bil);
                 echo "Nilai = ".$bil;
        ?>
        </section>
        
    </main>
    <?php require "../202143500838_footer.php" ?>