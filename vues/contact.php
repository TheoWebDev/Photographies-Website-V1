<?php

require_once "../controllers/controller_contact.php";

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

    <title>Contact - TD Photographies</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Pour toutes questions, conseils, achats de photo ou tout autre demande, contactez-moi.">
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
    <link rel="stylesheet" type="text/css" media="screen" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,600;1,300&display=swap" rel="stylesheet">
</head>

<body id="contactPage">

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

    <div class="container">

        <div class="row justify-content-center align-items-center">

            <?php if ($showForm) { ?>

                <form method="POST" action="/vues/contact.php" class="col-12 col-sm-5 pb-3 d-flex flex-column">

                    <legend class="titleForm pt-3">formulaire de contact</legend>

                    <div class="form-group">
                        <label for="name"></label>
                        <input type="text" id="name" name="name" aria-label="Votre Nom" class="form-control text-center inputContact" placeholder="Votre nom" value="<?= isset($_POST["name"]) ? htmlspecialchars($_POST["name"]) : "" ?>" required>
                        <div>
                            <span class="textError"><?= isset($errorMessages["name"]) ? $errorMessages["name"] : "" ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email"></label>
                        <input type="email" id="email" name="email" aria-label="Votre adresse e-mail" class="form-control text-center inputContact" placeholder="Votre e-mail" value="<?= isset($_POST["email"]) ? $_POST["email"] : "" ?>" required>
                        <div>
                            <span class="textError"><?= isset($errorMessages["email"]) ? $errorMessages["email"] : "" ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subject"></label>
                        <textarea class="form-control inputTextarea" id="subject" aria-label="Votre demande" name="subject" rows="3" placeholder="Votre demande" required><?= isset($_POST["subject"]) ? htmlspecialchars($_POST["subject"]) : "" ?></textarea>
                        <div>
                            <span class="textError"><?= isset($errorMessages["subject"]) ? $errorMessages["subject"] : "" ?></span>
                        </div>
                    </div>

                    <button class="btn btnConnexion mx-auto w-50 mt-3" type="submit" name="submitContact">Envoyer</button>

                </form>

            <?php } ?>

            <?php
            if (!$showForm = false) { ?>
                <p class="h4 mt-5 paraCreateElement"><?= $errorMessages["fail"] ?? "" ?></p>
            <?php
            } else { ?>
                <p class="h4 mt-5 paraCreateElement"><?= $errorMessages["succes"] ?? "" ?></p>
                <a href="../index.php"><button>retour accueil</button></a>
            <?php } ?>

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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>