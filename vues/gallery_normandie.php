<?php

require_once "../controllers/controller_adminNewImg.php";

$scanDir = scandir("../assets/img/uploaded");
$scanDirWithOnlyImages = array_splice($scanDir, 0, 2);

?>

<!doctype html>
<html lang="fr">
  <head>
    <title>TH_Photographies_GL_Normandie</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,600;1,300&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css">
</head>
<body id="glpage">

<nav class="navbar navbar-expand-lg navbar-dark sticky-top navbarGaleries d-none d-sm-block d-sm-none d-md-block">
    
    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
        <ul class="navbar-nav text-uppercase pl-5">
            <li class="nav-item">
                <a class="navitemColor" href="/index.php">accueil</a>
            </li>
            <li class="nav-item">
                <a class="navitemColor" href="/vues/galeries.php">galeries</a>
            </li>
            <li class="nav-item">
                <a class="navitemColor" href="/vues/travelbook.php">carnet de voyage</a>
            </li>
            <li class="nav-item">
                <a class="navitemColor" href="/vues/aboutme.php">à propos</a>
            </li>
            <li class="nav-item">
                <a class="navitemColor" href="/vues/contact.php">contact</a>
            </li>
        </ul>
    </div>
</nav>

<div class="row dropdown bgnav d-flex d-sm-noned-none d-sm-block d-md-none fixed-top justify-content-between">
    <img src="" class="col-3 logoAccueil">
    <button class="btn col-3" type="button" data-toggle="dropdown">
        <i class="fa col-3 fa-bars fa-2x colorgay"></i>
    </button>
    <div class="dropdown-menu text-uppercase">
        <a class="dropdown-item" href="/index.php">accueil</a>
        <a class="dropdown-item" href="/vues/galeries.php">galeries</a>
        <a class="dropdown-item" href="/vues/travelbook.php">carnet de voyage</a>
        <a class="dropdown-item" href="/vues/aboutme.php">à propos</a>
        <a class="dropdown-item" href="/vues/contact.php">contact</a>
    </div>
</div>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <p class="d-flex justify-content-center font-weight-bold text-uppercase mt-4 titleSectionGallery">Normandie</p>
            <div class="d-flex justify-content-center">
                <button class="btndark" id="btndarkmode">dark mode</button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="demo-gallery d-flex justify-content-center">
            <ul id="lightgallery">

        <?php foreach($scanDir as $file) {
            $exifs = exif_read_data("../assets/img/uploaded/" . $file);
        ?>
                <li data-aos="zoom-in" data-aos-duration="1000" data-src="../assets/img/uploaded/<?= $file ?>" data-sub-html="<h4><?= basename($file) ?></h4><p><?= $exifs["Model"] ?> + <?= $exifs["UndefinedTag:0xA434"] ?><p>Ouverture : <?= $exifs["COMPUTED"]["ApertureFNumber"] ?> | Temps : <?= $exifs["ExposureTime"] ?> | ISO : <?= $exifs["ISOSpeedRatings"] ?> | <?= $exifs["FocalLength"] ?>mm</p>">
                    <a href="">
                        <img class="imgSection" src="../assets/img/uploaded/<?= $file ?>">
                    <div class="demo-gallery-poster">
                        <img src="https://sachinchoolur.github.io/lightgallery.js/static/img/zoom.png">
                    </div>
                    </a>
                </li>
        <?php } ?>
            </ul>
        </div>
    </div>

    <footer>
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center pt-3 pb-3">
                    <a href="https://www.flickr.com/photos/thphotographies/" target="_blank"><i class="fab fa-flickr m-3 logoSocialNetwork"></i></a>
                    <a href="https://www.instagram.com/th_photographies/" target="_blank"><i class="fab fa-instagram m-3 logoSocialNetwork"></i></a>
                    <a href="https://www.youtube.com/user/Theo76150" target="_blank"><i class="fab fa-youtube m-3 logoSocialNetwork"></i></a>
                    <a href="/vues/contact.php" target="_blank"><i class="far fa-envelope m-3 logoSocialNetwork"></i></a>
                </div>
            </div>
        </div>
    </footer>

</div> <!-- END container-fluid -->
      
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="../assets/js/script.js"></script>
<script src="../assets/js/darkmode.js"></script>
<script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/js/lightgallery.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-pager.js/master/dist/lg-pager.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-autoplay.js/master/dist/lg-autoplay.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-fullscreen.js/master/dist/lg-fullscreen.js"></script>
<script>lightGallery(document.getElementById('lightgallery'))</script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init()</script>
</body>
</html>