<?php

require_once "../controllers/controllerUpload.php";

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
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
                <a class="colorBlack" href="/vues/adminAccueil.php">accueil administrateur</a>
            </li>
        </ul>
    </div>
</nav>

<!-- END NAVBAR -->

<!-- MENU BURGER -->

<div class="row dropdown bgnav d-flex d-sm-noned-none d-sm-block d-md-none fixed-top justify-content-between">
    <img class="col-3 logoAccueil" src="">
    <button class="btn col-3" type="button" data-toggle="dropdown">
    <i class="fa col-3 fa-bars fa-1x colorgay"></i>
    </button>
    <div class="dropdown-menu text-uppercase">
      <a class="dropdown-item" href="/index.php">accueil visiteur</a>
      <a class="dropdown-item" href="/vues/adminAccueil.php">accueil admin</a>
    </div>
</div>

<div class="container-fluid">

<?php if(isset($message)) { ?>
    <p class="alert-success mt-3 d-flex justify-content-center"><?= $message ?></p>
        
<?php } else if (isset($errorMessage)) { ?>
    <p class="alert-danger mt-3 d-flex justify-content-center"><?= $errorMessage ?></p>

<?php } else { ?>

<?php } ?>

<div class="row justify-content-center align-items-center">
        
<form novalidate method="POST" enctype="multipart/form-data" action="adminImgUpload.php" name="uploadImg" class="col-12 col-sm-8 col-md-4 pb-3 d-flex flex-column">
            
	<legend class="pt-3 text-uppercase text-center titleForm">Créer un nouvel album</legend>

    <div class="form-group">
        <label class="text-center" for="uploadFile">Ajouter une photo d'album</label>
        <input type="file" id="uploadFile" name="uploadFile" aria-label="img" class="form-control text-center" value="<?= isset($_POST["titleImg"]) ? htmlspecialchars($_POST["titleImg"]) : "" ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["titleImg"]) ? $errorMessages["titleImg"] : "" ?></span>
        </div>
    </div>
	
	<div class="form-group">
        <label for="titleImg"></label>
        <input type="text" id="titleImg" name="titleImg" aria-label="titleImg" class="form-control text-center inputAdmin" placeholder="TITRE ALBUM" value="<?= isset($_POST["titleImg"]) ? htmlspecialchars($_POST["titleImg"]) : "" ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["titleImg"]) ? $errorMessages["titleImg"] : "" ?></span>
        </div>
    </div>

    <div class="form-group">
        <label for="titleImg"></label>
        <input type="text" id="titleImg" name="titleImg" aria-label="titleImg" class="form-control text-center inputAdmin" placeholder="LOCALISATION" value="<?= isset($_POST["titleImg"]) ? htmlspecialchars($_POST["titleImg"]) : "" ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["titleImg"]) ? $errorMessages["titleImg"] : "" ?></span>
        </div>
    </div>
    
    <button class="btn btnConnexion mx-auto w-50 mt-3" type="submit" name="buttonSubmit">créer</button>

</form>

</div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>