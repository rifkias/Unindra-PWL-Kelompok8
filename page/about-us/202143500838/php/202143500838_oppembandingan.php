<!DOCTYPE html>
<html>
<head>
    <title>Operator Pembandingan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<?php require "../202143500838_header.php"; ?>
<main>
<?php require "../202143500838_menu.php"; ?> 
        <div class="separator"></div>
        <section>
        <?php
                $bil1 = 100;
                $bil2 = 20;
                $teks1 = "PHP";
                $teks2 = "php";

                printf("%d == %d hasilnya %d<br/>", $bil1, $bil2, $bil1 == $bil2); 
                //100 == 20 hasilnya 0

                printf("%d != %d hasilnya %d<br/>", $bil1, $bil2, $bil1 != $bil2); 
                //100 != 20 hasilnya 1

                printf("%d >= %d hasilnya %d<br/>", $bil1, $bil2, $bil1 >= $bil2); 
                //100 >= 20 hasilnya 1

                printf("%s == %s hasilnya %d<br/>", $teks1, $teks2, $teks1 == $teks2); 
                //PHP == php hasilnya 0

                printf("%s != %s hasilnya %d<br/>", $teks1, $teks2, $teks1 != $teks2); 
                //PHP != php hasilnya 1
        ?>
        </section>
        
    </main>
    <?php require "../202143500838_footer.php" ?>
