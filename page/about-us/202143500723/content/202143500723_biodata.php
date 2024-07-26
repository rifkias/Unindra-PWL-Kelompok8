<?php 
$uri =  parse_url((empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]",PHP_URL_PATH);
$date = new DateTime("2003-08-03");
$now = new DateTime();
$interval = $now->diff($date);
?>

<div class="mx-3">

    <div class="row">
        <div class="col-12 text-center">
            <img src="<?php echo $uri . "dist/assets/img/foto.jpeg" ?>" alt="Profile Picture" class="profile-pic">
            <h1>Rifki Alfariz Shidiq</h1>
            <p class="lead">Junior System Developer</p>
        </div>
    </div>
    <div class="row biodata-section">
        <div class="col-12">
            <h2>Personal Information</h2>
            <ul class="list-group">
                <li class="list-group-item"><strong>Nama :</strong> Rifki Alfariz Shidiq</li>
                <li class="list-group-item"><strong>NIM :</strong> 202143500723</li>
                <li class="list-group-item"><strong>Kelas :</strong> Y6G</li>
                <li class="list-group-item"><strong>Tanggal Lahir :</strong> 08 Maret 2003</li>
                <li class="list-group-item"><strong>Umur :</strong> <?php echo $interval->y ?></li>
                <li class="list-group-item"><strong>Jenis Kelamin :</strong> Laki - Laki</li>
                <li class="list-group-item"><strong>Email :</strong> <a href="mailto:rifkialfarizshidiq.1@gmailcom">rifkialfarizshidiq.1@gmail.com</a></li>
                <li class="list-group-item"><strong>Github :</strong> <a href="https://github.com/rifkias">Rifki Alfariz Shidiq (rifkias)</a></li>
            </ul>
        </div>
    </div>

</div>