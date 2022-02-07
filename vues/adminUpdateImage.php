<?php

require_once "../controllers/controller_adminUpdateImage.php";

?>

<!doctype html>
<html lang="fr">

<head>

	<title>UPDATE IMAGE - Admin</title>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,600;1,300&display=swap">
</head>

<body>

	<nav class="navbar d-none d-lg-block navbar-expand-lg sticky-top">

		<div class="collapse navbar-collapse d-flex justify-content-center">
			<ul class="navbar-nav pl-5">
				<li class="nav-item">
					<a class="colorBlack" href="../index.php">accueil visiteur</a>
				</li>
				<li class="nav-item">
					<a class="colorBlack" href="/vues/adminHome.php">tableau de bord</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="row dropdown d-flex d-sm-block d-md-none fixed-top">
        <button class="btn col-3" type="button" data-toggle="dropdown">
            <i class="fa col-3 fa-bars fa-2x"></i>
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="../index.php">accueil visiteur</a>
            <a class="dropdown-item" href="/vues/adminHome.php">tableau de bord</a>
        </div>
    </div>


	<div class="container-fluid">
		<div class="row justify-content-center align-items-center">

			<?php
			if ($updateImageInBase) { ?>
				<div>
					<p class="h4 mt-5 paraCreateElement">Les modifications ont bien été enregistrées.</p>
					<div class="mt-5 d-flex justify-content-center">
						<a type="button" href="adminSettingsAlbum.php?gestionAlbums.php" class="btn btnBackHome mr-1">retour gestion des albums</a>
					</div>
				</div>

			<?php
			} else if (!empty($_POST["modifyImage"])) { ?>
				<p class="h5 text-center text-danger"><?= $messages["modifyImage"] ?? "" ?></p>

			<?php
				include "include/form-updateImage.php";
			} else { ?>
				<div>
					<p class="h4 mt-5 text-center text-info">Veuillez choisir une image à modifier</p>
					<div class="mt-5 d-flex justify-content-center">
						<a type="button" href="../vues/adminSettingsAlbum.php" class="btn btnConnexion ml-1">liste des albums</a>
					</div>
				</div>

			<?php } ?>

		</div>
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</body>

</html>