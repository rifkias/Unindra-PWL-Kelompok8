<!DOCTYPE html>
<html>
<head>
    <title>If Else</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<?php require "../202143500838_header.php"; ?>
<main>
<?php require "../202143500838_menu.php"; ?> 
        <div class="separator"></div>
        <section>
        <?php
            $nilai = 60;
            if ($nilai >= 50)
                echo "Anda Lulus";
            else
                echo "Anda tidak lulus";
        ?>
        </section>
        
    </main>
    <?php require "../202143500838_footer.php" ?>
