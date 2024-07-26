<!DOCTYPE html>
<html>
<head>
    <title>Switch Case</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<?php require "../202143500838_header.php"; ?>
<main>
<?php require "../202143500838_menu.php"; ?> 
        <div class="separator"></div>
        <section>
        <?php
            $bulan = 2;
            Switch ($bulan)
            {
                case 1 : echo "Januari"; break;
                case 2 : echo "Februari"; break;
                case 3 : echo "Maret"; break;
                case 4 : echo "April"; break;
                case 5 : echo "Mei"; break;
                case 6 : echo "Juni"; break;
                case 7 : echo "Juli"; break;
                case 8 : echo "Agustus"; break;
                case 9 : echo "September"; break; 
                case 10:  echo "Oktober"; break; 
                case 11 : echo "November"; break; 
                case 12 : echo "Desember"; break;
            }
        ?>
        </section>
        
    </main>
    <?php require "../202143500838_footer.php" ?>
