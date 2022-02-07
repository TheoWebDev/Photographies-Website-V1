<?php

// ini_set('display_errors',1);

require_once "controllers/controller_index.php";

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

    <title>Théophile DEMARLE Photographies | Accueil</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Photographe de paysages naturels et de paysages urbains basé en Normandie. Reportages de voyage et partage de conseils sur la photographique.">
    <meta name="robots" content="index, nofollow">
    <meta name="googlebot" content="index, nofollow, max-snippet:-1, max-image-preview:large">
    <meta name="author" content="TH Photographies">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Théophile DEMARLE Photographies | Paysages de Normandie et de voyages">
    <meta property="og:description" content="Photographe de paysages naturels et de paysages urbains basé en Normandie. Reportages de voyage et partage de conseils sur la photographique.">
    <meta property="og:url" content="https://theowebdev.fr/">
    <meta property="og:site_name" content="TH Photographies">
    <meta property="og:image" content="https://theowebdev.fr/assets/img/uploaded/Normandie106049ed8c1ec5d.jpg">

    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,600;1,300&display=swap">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>

    <nav class="nav">
		<div class="container-fluid">
			<div class="logo">
				<p class="titleName"><span class="firstLetter">TD</span></p>
			</div>
			<div id="mainListDiv" class="main_list">
				<ul class="navlinks">
					<li><a href="index.php">accueil</a></li>
					<li><a href="/vues/galleries.php">galeries</a></li>
					<li><a href="/vues/galleriesTravelbook.php">carnet de voyage</a></li>
					<li><a href="/vues/aboutme.php">à propos</a></li>
					<li><a href="/vues/contact.php">contact</a></li>
				</ul>
			</div>
			<span class="navTrigger">
				<i></i>
				<i></i>
				<i></i>
			</span>
		</div>
	</nav>

    <section id="accueil" class="welcome-section">
		<h1 class="helloun" data-aos="fade-down" data-aos-duration="2000">TD</h1>
        <h2 class="hellodeux" data-aos="fade-up" data-aos-duration="2000">PHOTOGRAHIES</h2>
	</section>

    <div class="container-fluid">

        <main id="presentation">

            <div class="row">
                <div class="col-12">
                    <h1 class="titleSectionPage pt-4">dernier récit</h1>
                    <div class="row justify-content-center">

                        <?php foreach ($readTravelbookIndex as $value) { ?>
                            <div class="col-sm-5 p-3" data-aos="zoom-in" data-aos-duration="1000">
                                <a href="/vues/travelbookstories.php?travelbookID=<?= $value["travelbook_ID"] ?>"><img src="../assets/img/travelbookScreen/<?= $value["travelbookScreen"] ?>" class="imgSectionCarnet" title="Nouveau récit" alt="Nouveau récit"></a>
                                <h2 class="titleNewPhoto pt-2"><?= $value["travelbookName"] ?> | <?= $value["travelbookYear"] ?></h2>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>

            <?= count($readTravelbookIndex) == 0 ? "<p class='h4 mt-3 text-center text-info'>Le dernier récit n'est pas encore disponible.<p>" : "" ?>

            <div class="row">
                <div class="col-12">
                    <h1 class="titleSectionPage pb-4">photographies à la une</h1>
                    <div class="row justify-content-center justify-content-around pb-4">

                        <?php foreach ($showImageIndex as $imageSpotlight) { ?>
                            <div class="col-sm-5 p-3" data-aos="zoom-in" data-aos-duration="1000">
                                <a href="/vues/imagesInGalleries.php?albumID=<?= $imageSpotlight["album_ID"] ?>"><img src="../assets/img/uploaded/<?= $imageSpotlight["imgUniqueID"] ?>" class="newImg" title="Photographies en une" alt="Photographies en une"></a>
                                <h2 class="titleNewPhoto pt-2"><?= $imageSpotlight["imgTitle"] ?></h2>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>

            <?= count($showImageIndex) == 0 ? "<p class='h4 mt-3 text-center pb-5 text-info'>Il n'y a pas d'images à la une.<p>" : "" ?>

        </main>

        <footer>
            <div>
                <div class="imgFooter">
                    <a href="/vues/galleries.php" class="linkGaleries">galeries</a>
                </div>
            </div>
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
    <script src="../assets/js/script.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        AOS.init()
		$(window).scroll(function() {
			if ($(document).scrollTop() > 100) {
				$('.nav').addClass('affix');
			} else {
				$('.nav').removeClass('affix');
			}
		});
    </script>
</body>

</html>