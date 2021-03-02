<?php

require_once "../controllers/controller_adminModifyAlbum.php";

?>

<!doctype html>
<html lang="fr">
<head>
	
<title>ADMIN_New_Album</title>

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
// Nous allons afficher le formulaire : 
   //    si modifyAlbum n'est pas vide = nous venons bien de la page detailPatient
   //    si le tableau d'erreurs n'est pas vide = le formulaire contient des erreurs
   if (!empty($_POST['modifyAlbum']) || !empty($errors)) { ?>
      <p class="h5 text-center text-danger"><?= $messages['updatePatient'] ?? '' ?></p>
   <?php
      include 'include/form-modifyAlbum.php';
      // si la requête d'update passe, nous l'indiquons à l'utilisateur via un message
   } else if ($updateAlbumInBase) { ?>
      <div>
         <p class="h4 mt-5 text-center text-info">The changes has been registered.</p>
         <div class="mt-5 d-flex justify-content-center">
            <a type="button" href="../index.php" class="btn btnConnexion mr-1">HOME PAGE</a>
            <a type="button" href="view-listPatients.php" class="btn btnConnexion ml-1">back to patients list</a>
         </div>
      </div>
   <?php
      // si aucune condition n'est remplie, cela nous indique que l'utilisateur a directement saisi l'URL, nous lui indiquons via un message
   } else { ?>
      <div>
         <p class="h4 mt-5 text-center text-info">Please select a patient.</p>
         <div class="mt-5 d-flex justify-content-center">
            <a type="button" href="view-listPatients.php" class="btn btnConnexion ml-1">patients list</a>
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
</body>
</html>