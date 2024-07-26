<!DOCTYPE html>
<html>
<head>
    <title>Operator Aritmatika</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<?php require "../202143500838_header.php"; ?>
<main>
<?php require "../202143500838_menu.php"; ?> 
        <div class="separator"></div>
        <section>
        <?php
                $bil1 = 110;
                $bil2 = 25;

                $hasil = $bil1 + $bil2;
                echo "$bil1 + $bil2 = $hasil<br/>";

                $hasil = $bil1 - $bil2;
                echo "$bil1 - $bil2 = $hasil<br/>";
                
                $hasil = $bil1 * $bil2;
                echo "$bil1 * $bil2 = $hasil<br/>";
                
                $hasil = $bil1 / $bil2;
                echo "$bil1 / $bil2 = $hasil<br/>";
                
                $hasil = $bil1 % $bil2;
                echo "$bil1 % $bil2 = $hasil<br/>";
                
                $hasil = $bil1++;
                echo "$bil1++ = $hasil<br/>";

                $hasil = $bil1--;
                echo "$bil1-- = $hasil<br/>";
        ?>
        </section>
        
    </main>
    <?php require "../202143500838_footer.php" ?>