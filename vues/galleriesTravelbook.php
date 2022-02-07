<?php

require_once "../controllers/controller_galleriesTravelbook.php";

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

    <title>Carnet de voyage - TD Photographies</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Vous avez besoin d&#039;évasion dans votre quotidien ? N&#039;hésitez pas à parcourir les différents récits de voyage.">
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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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

    <nav class="nav">
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
			<span class="navTrigger">
				<i></i>
				<i></i>
				<i></i>
			</span>
		</div>
	</nav>

    <section id="accueil" class="travelbook-section">
        <h2 class="helloquatre" data-aos="fade-up" data-aos-duration="2000">carnet de voyage</h2>
	</section>

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1 class="titleSectionPage mt-4">récits de voyage</h1>
            </div>
        </div>

        <div class="row justify-content-center">

        </div>

        <?= count($readTravel) == 0 ? "<p class='h4 mt-3 text-center text-info'>Il n'y a pas de récits enregistrés sur cette page actuellement. Revenez bientôt ! :)<p>" : "" ?>

        <div class="row">
            <div class="col-12">
                <div class="row">

                    <?php foreach ($readTravel as $value) { ?>
                        <div class="col-sm-4 p-3 contentImgGaleries" data-aos="zoom-in" data-aos-duration="1000">
                            <a href="travelbookstories.php?travelbook_ID<?= $value["travelbook_ID"] ?>"><img src="../assets/img/travelbookScreen/<?= $value["travelbookScreen"] ?>" alt="" class="imgSectionCarnet"></a>
                            <p class="text-center pt-2"><?= $value["travelbookName"] ?> | <?= $value["travelbookYear"] ?></p>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>

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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
				console.log("OK");
			} else {
				$('.nav').removeClass('affix');
			}
		});
    </script>
</body>

</html>