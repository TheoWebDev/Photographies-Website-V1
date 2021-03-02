<?php

require_once "../controllers/controller_adminNewImg.php";

?>

<!doctype html>
<html lang="fr">
<head>
	
<title>ADMIN_New_Img</title>

<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,600;1,300&display=swap">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
</head>
<body class="adminPage">

<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg navbar-dark sticky-top d-none d-sm-block d-sm-none d-md-block">
    
    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
        <ul class="navbar-nav text-uppercase pl-5">
            <li class="nav-item">
                <a class="colorBlack" href="/index.php">accueil visiteur</a>
            </li>
            <li class="nav-item">
                <a class="colorBlack" href="/vues/adminHome.php">accueil administrateur</a>
            </li>
        </ul>
    </div>
</nav>

<!-- END NAVBAR -->

<!-- MENU BURGER -->

<div class="row dropdown bgnav d-flex d-sm-noned-none d-sm-block d-md-none fixed-top justify-content-between">
    <img class="col-3 logoAccueil" src="">
    <button class="btn col-3" type="button" data-toggle="dropdown">
    <i class="fa col-3 fa-bars fa-2x colorgay"></i>
    </button>
    <div class="dropdown-menu text-uppercase">
      <a class="dropdown-item" href="/index.php">accueil visiteur</a>
      <a class="dropdown-item" href="/vues/adminHome.php">accueil admin</a>
    </div>
</div>

<div class="container-fluid">

<div class="row justify-content-center align-items-center">

<?php
   // Mise en place d'une condition pour ne plus afficher le formulaire quand la patient a bien été enregistré
   if (!$addNewImageInBase) { ?>

   <?php
      // Mise en place d'un include pour la mise en place du formulaire
      include "include/form-newImage.php";
   } else { ?>
      <!-- si le patient a bien été enregistré nous indiquons l'utilisateur via un message patient enregistré -->
      <div>
         <p class="h4 mt-5 text-center paraCreateElement"><?= $errorMessages['addNewImage'] ?? '' ?></p>
         <p class="h4 mt-5 text-center paraCreateElement">L'image <span class="font-weight-bold"><?= $_POST['titleImg'] ?></span> a bien été envoyée dans l'album <span class="font-weight-bold">" ? ".</span></p>
         <div class="mt-5 d-flex justify-content-center">
            <a type="button" href="adminHome.php" class="btn btnBackHome mr-1">tableau de bord</a>
            <a type="button" href="vues_adminNewImg.php" class="btn btnAddElement ml-1">voir l'album</a>
         </div>
      </div>

   <?php } ?>

</div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</body>
</html>