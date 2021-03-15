<?php

require_once "../controllers/controller_adminDetailsAlbums.php";

?>

<!doctype html>
<html lang="fr">

<head>
	<title>ADMIN_Pictures_in_Albums</title>

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

	<nav class="navbar navbar-expand-lg navbar-dark d-none d-sm-block d-sm-none d-md-block">
		<div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
			<ul class="navbar-nav text-uppercase pl-5">
				<li class="nav-item">
					<a class="colorBlack" href="/index.php">accueil visiteur</a>
				</li>
				<li class="nav-item">
					<a class="colorBlack" href="/vues/adminHome.php">tableau de bord</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="row dropdown bgnav d-flex d-sm-noned-none d-sm-block d-md-none fixed-top justify-content-between">
		<img class="col-3 logoAccueil">
		<button class="btn col-3" type="button" data-toggle="dropdown">
			<i class="fa col-3 fa-bars fa-2x"></i>
		</button>
		<div class="dropdown-menu text-uppercase">
			<a class="dropdown-item" href="/index.php">accueil visiteur</a>
			<a class="dropdown-item" href="/vues/adminHome.php">tableau de bord</a>
		</div>
	</div>

	<div class="container">

		<div class="row">
			<div class="col-12">
				<p class="d-flex justify-content-center mt-4 titleForm">album : <?= $albumName["albumName"] ?></p>
			</div>
		</div>

		<div class="row justify-content-center">

			<button type="button" class="btn btn-danger deleteAlbum" data-toggle="modal" data-target="#deleteModal" data-del-id="<?= $albumName["album_ID"] ?>"><i class="far fa-trash-alt"></i></button>

			<form action="adminUpdateAlbum.php" method="POST">
				<button class="btn btn-secondary ml-2" type="submit" name="modifyAlbum" value="<?= $albumName["album_ID"] ?>"><i class="fas fa-cog"></i></button></a>
			</form>

			<a href="adminCreateImage.php"><button type="button" class="btn btn-primary ml-2"><i class="fas fa-plus-square"></i></button></a>

		</div>

		<div class="row">
			<div class="col-12">
				<div class="row">

					<?php foreach ($showImage as $image) { ?>
						<div class="col-sm-3 p-3 contentImgGaleries" data-aos="zoom-in" data-aos-duration="1000">
							<div class="hoverSettingsImg">
								<img src="../assets/img/uploaded/<?= $image["imgUniqueID"] ?>" alt="" class="imgInAlbum">
								<p class="text-center pt-2"><?= $image["imgTitle"] ?></p>
								<div class="buttonSettingsImg">
									<form action="adminUpdateImage.php" method="POST">
										<a href="../vues/adminUpdateImage.php"><button type="submit" value="<?= $image["img_ID"] ?>" name="modifyImage" class="btn btn-sm btn-primary mt-2">Modifier</button></a>
									</form>
									<form action="" method="POST">
										<button type="button" class="btn btn-sm btn-danger mt-2 deleteImage" data-toggle="modal" data-target="#deleteModalImage" data-del-id="<?= $image["img_ID"] ?>">Supprimer</button>
									</form>
								</div>
							</div>
						</div>
					<?php } ?>

				</div>
			</div>
		</div>

		<!-- Ternaire pour afficher un message quand il n'y a pas d'images dans l'album -->
		<?= count($showImage) == 0 ? '<p class="h4 mt-3 text-center text-info">Il n\'y a pas d\'images dans cet album.<p>' : '' ?>

	</div>

	<!-- MODAL DELETE ALBUM -->

	<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content text-center">
				<div class="modal-header d-flex justify-content-center">
					<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-triangle reddanger"></i></h5>
				</div>
				<div class="modal-body">
					<div>
						<p>Voulez-vous vraiment supprimer l'album <?= $albumName["albumName"] ?> ?</p>
						<p>Toutes les photos de l'album seront également supprimées !</p>
					</div>
					<img src="../assets/img/uploaded/<?= $albumName["albumScreen"] ?>" class="imgDeleteAlbum" alt="">
				</div>
				<div class="modal-footer d-flex justify-content-center">
					<form action="" method="POST">
						<button type="submit" id="deleteBtnModal" name="deleteBtn" class="btn btn-danger">Oui</button></a>
					</form>
					<button type="button" class="btn btn-outline-danger" data-dismiss="modal">NON</button>
				</div>
			</div>
		</div>
	</div>

	<!-- MODAL DELETE ALBUM -->

	<!-- MODAL DELETE IMAGE -->

	<div class="modal fade" id="deleteModalImage" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content text-center">
				<div class="modal-header d-flex justify-content-center">
					<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-triangle reddanger"></i></h5>
				</div>
				<div class="modal-body">
					<div>
						<p>Voulez-vous vraiment supprimer l'image <?= $image["imgTitle"] ?> ?</p>
					</div>
					<img src="../assets/img/uploaded/<?= $image["imgUniqueID"] ?>" class="imgDeleteAlbum" alt="">
				</div>
				<div class="modal-footer d-flex justify-content-center">
					<form action="" method="POST">
						<button type="submit" id="deleteBtnModalImage" name="deleteBtnImage" class="btn btn-danger">Oui</button></a>
					</form>
					<button type="button" class="btn btn-outline-danger" data-dismiss="modal">NON</button>
				</div>
			</div>
		</div>
	</div>

	<!-- MODAL -->

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<script>
		// Constante visant la classe du boutton supprimer
		const deleteButtonAlbum = document.querySelectorAll('.deleteAlbum');

		// Écouteur d'événement sur chaque bouton à l'aide du foreach
		deleteButtonAlbum.forEach(element => {
			element.addEventListener('click', function() {
				// Attribution de la valeur de l'ID pour supprimer l'album
				deleteBtnModal.value = element.dataset.delId;
			})
		});
	</script>
	<script>
		// Constante visant la classe du boutton supprimer
		const deleteButtonImage = document.querySelectorAll('.deleteImage');

		// Écouteur d'événement sur chaque bouton à l'aide du foreach
		deleteButtonImage.forEach(element => {
			element.addEventListener('click', function() {
				// Attribution de la valeur de l'ID pour supprimer l'album
				deleteBtnModalImage.value = element.dataset.delId;
			})
		});
	</script>
</body>
</html>