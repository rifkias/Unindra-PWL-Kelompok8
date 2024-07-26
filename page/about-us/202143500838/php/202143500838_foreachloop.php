<!DOCTYPE html>
<html>
<head>
    <title>For Each Loop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<?php require "../202143500838_header.php"; ?>
<main>
<?php require "../202143500838_menu.php"; ?> 
        <div class="separator"></div>
        <section>
        <?php
            $list_hari = array( 
                "Senin",
                "Selasa",
                "Rabu",
                "Kamis",
                "Jumat",
                "Sabtu",
                "Minggu"
             );
            //perulangan menggunakan foreach
            foreach ($list_hari as $hari)
            {
            //array $list_hari dipecah menjadi Shari 
                echo $hari . ", ";
            }
            //Senin, Selasa, Rabu, Kamis, Jumat, Sabtu, Minggu,
        ?>
        </section>
        
    </main>
    <?php require "../202143500838_footer.php" ?>