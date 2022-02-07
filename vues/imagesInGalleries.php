<?php

require_once "../controllers/controller_imagesInGalleries.php";

?>

<!doctype html>
<html lang="fr">

<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-LL2V8CRFZS"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-LL2V8CRFZS');
    </script>

    <title>Album <?= $albumsName["albumName"] ?> - TD Photographies</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Photographies de l&#039;album sélectionné.">
    <meta name="robots" content="index, nofollow">
    <meta name="googlebot" content="index, nofollow, max-snippet:-1, max-image-preview:large">
    <meta name="author" content="TH Photographies">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Théophile DEMARLE Photographies | Paysages de Normandie et de voyages">
    <meta property="og:description" content="Photographe de paysages naturels et urbains basé en Normandie. Reportages de voyage et partage de conseils.">
    <meta property="og:url" content="https://theowebdev.fr/">
    <meta property="og:site_name" content="TH Photographies">
    <meta property="og:image" content="https://theowebdev.fr/assets/img/uploaded/Normandie106049ed8c1ec5d.jpg">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,600;1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css">
</head>

<body>

    <div class="row dropdown d-flex d-sm-block d-md-none fixed-top">
        <button class="btn col-3" type="button" data-toggle="dropdown">
            <i class="fa col-3 fa-bars fa-2x"></i>
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="../index.php">accueil</a>
            <a class="dropdown-item" href="galleries.php">galeries</a>
            <a class="dropdown-item" href="galleriesTravelbook.php">carnets de voyage</a>
            <a class="dropdown-item" href="aboutme.php">à propos</a>
            <a class="dropdown-item" href="contact.php">contact</a>
        </div>
    </div> -->

    <div class="navWithoutImg">
		<div class="container-fluid">
			<div class="logo">
				<p class="titleName"><span class="firstLetter">TD</span></p>
			</div>
			<div id="mainListDiv" class="main_list">
				<ul class="navlinks">
					<li><a href="../index.php">accueil</a></li>
					<li><a href="galleries.php">galeries</a></li>
					<li><a href="galleriesTravelbook.php">carnet de voyage</a></li>
					<li><a href="aboutme.php">à propos</a></li>
					<li><a href="contact.php">contact</a></li>
				</ul>
			</div>
			<span class="navTriggerTwo">
				<i></i>
				<i></i>
				<i></i>
			</span>
		</div>
	</div>

    <div class="container-fluid containerFixMobile">

        <div class="row">
            <div class="col-12">
                <h2 class="mt-4 titleSectionGallery"><?= $albumsName["albumName"] ?></h2>
            </div>
        </div>

        <div class="row">
            <div class="demo-gallery">
                <ul id="lightgallery">

                    <?php foreach ($showImageVisitor as $image) {
                        $exifs = exif_read_data("../assets/img/uploaded/" . $image["imgUniqueID"]); ?>

                        <li data-aos="zoom-in" data-aos-duration="1000" data-src="../assets/img/uploaded/<?= $image["imgUniqueID"] ?>" data-sub-html="<h5><?= $image["imgTitle"] ?></h5>
                        <p><?= $exifs["Model"] ?? "Non disponible" ?> + <?= $exifs["UndefinedTag:0xA434"] ?? "Non disponible" ?></p><p>Ouverture : <?= $exifs["COMPUTED"]["ApertureFNumber"] ?? "" ?> | Temps : <?= $exifs["ExposureTime"] ?? "" ?> | ISO : <?= $exifs["ISOSpeedRatings"] ?? "" ?> | <?= $exifs["FocalLength"] ?? "" ?>mm</p>">
                            <a href="">
                                <img class="imgSection" src="../assets/img/uploaded/<?= $image["imgUniqueID"] ?>">
                                <div class="demo-gallery-poster">
                                    <img src="../assets/img/zoom.png">
                                </div>
                            </a>
                        </li>

                    <?php } ?>

                </ul>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <a href="galleries.php"><i class="far fa-arrow-alt-circle-left d-sm-none backToAlbum"></i></a>
        </div>

        <?= count($showImageVisitor) == 0 ? "<p class='h4 mt-3 text-center text-info'>Il n'y a pas d'images dans cet album.<p>" : "" ?>

        <footer>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-center pt-3 pb-3">
                        <a href="https://www.flickr.com/photos/thphotographies/" target="_blank"><i class="fab fa-flickr m-3 logoSocialNetwork"></i></a>
                        <a href="https://www.instagram.com/td.photographies/" target="_blank"><i class="fab fa-instagram m-3 logoSocialNetwork"></i></a>
                        <a href="https://www.youtube.com/user/Theo76150" target="_blank"><i class="fab fa-youtube m-3 logoSocialNetwork"></i></a>
                        <a href="/vues/contact.php"><i class="far fa-envelope m-3 logoSocialNetwork"></i></a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <p class="textFooter">&#xA9; 2022 Théophile DEMARLE Photographies</p>
                    </div>
                    <div class="d-flex justify-content-center pb-4">
                        <p class="textFooter">Tous droits réservés.</p>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
    <script src="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/js/lightgallery.js"></script>
    <script src="https://cdn.rawgit.com/sachinchoolur/lg-pager.js/master/dist/lg-pager.js"></script>
    <script src="https://cdn.rawgit.com/sachinchoolur/lg-autoplay.js/master/dist/lg-autoplay.js"></script>
    <script src="https://cdn.rawgit.com/sachinchoolur/lg-fullscreen.js/master/dist/lg-fullscreen.js"></script>
    <script>
        lightGallery(document.getElementById('lightgallery'))
    </script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init()
    </script>
</body>

</html>