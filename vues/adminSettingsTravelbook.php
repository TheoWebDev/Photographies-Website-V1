<?php

require_once "../controllers/controller_adminCreateTravelbook.php";

?>

<!doctype html>
<html lang="fr">

<head>

	<title>Settings Travelbooks - Amdin</title>

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

	<div class="container">

		<div class="row">
			<div class="col-12">
				<p class="titleForm mt-4">gestion des récits de voyage</p>
			</div>
		</div>

		<div class="row justify-content-center">

			<div class="row">
				<div class="col-12">
					<div class="row">

						<?php foreach ($readTravel as $value) { ?>
							<div class="col-sm-4 p-3 contentImgGaleries">
								<a href="adminSettingsTiny.php?travelbook_ID<?= $value["travelbook_ID"] ?>"><img src="../assets/img/travelbookScreen/<?= $value["travelbookScreen"] ?>" alt="" class="imgSectionCarnet"></a>
								<p class="text-center pt-2"><?= $value["travelbookName"] . ' - ' . $value["travelbookYear"] ?></p>
							</div>
						<?php } ?>

					</div>
				</div>
			</div>

			<!-- Ternaire pour afficher un message quand il n'y a pas d'images dans l'album -->
			<?= count($readTravel) == 0 ? "<p class='h4 mt-3 text-center text-info'>Vous n'avez pas encore écrit de récits.<p>" : "" ?>

		</div>

	</div>

	<!-- MODAL DELETE -->

	<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="modalDelete" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content text-center">
				<div class="modal-header d-flex justify-content-center">
					<h5 class="modal-title" id="exampleModalLabel">Voulez-vous vraiment supprimer le récit et son contenu ?</h5>
				</div>
				<div class="modal-body">
					<p></p>
					<i class="fas fa-exclamation-triangle reddanger"></i>
				</div>
				<div class="modal-footer d-flex justify-content-center">
					<button type="button" class="btn btn-danger" data-dismiss="modal">NON</button>
					<button type="button" class="btn btn-outline-danger">Oui</button>
				</div>
			</div>
		</div>
	</div>

	<!-- MODAL DELETE -->

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</body>

</html>