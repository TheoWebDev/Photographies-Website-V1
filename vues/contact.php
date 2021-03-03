<?php

require_once "../controllers/controller_contact.php";

?>

<!doctype html>
<html lang="fr">
<head>

    <title>TH_Photographies_Contact</title>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel='stylesheet' type='text/css' media='screen' href='../assets/css/style.css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,600;1,300&display=swap" rel="stylesheet">
</head>
<body id="contactPage">

<nav class="navbar navbar-expand-lg navbar-dark sticky-top navbarHome d-none d-sm-block d-sm-none d-md-block">
    
    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
        <ul class="navbar-nav text-uppercase pl-5">
            <li class="nav-item">
                <a class="navitemColor" href="/index.php">accueil</a>
            </li>
            <li class="nav-item">
                <a class="navitemColor" href="/vues/galeries.php">galeries</a>
            </li>
            <li class="nav-item">
                <a class="navitemColor" href="/vues/travelbook.php">carnet de voyage</a>
            </li>
            <li class="nav-item">
                <a class="navitemColor" href="/vues/aboutme.php">à propos</a>
            </li>
            <li class="nav-item">
                <a class="navitemColor" href="/vues/contact.php">contact</a>
            </li>
        </ul>
    </div>
</nav>

<div class="row dropdown bgnav d-flex d-sm-noned-none d-sm-block d-md-none fixed-top justify-content-between">
    <img class="col-3 logoAccueil" src="">
    <button class="btn col-3" type="button" data-toggle="dropdown">
        <i class="fa col-3 fa-bars fa-2x"></i>
    </button>
    <div class="dropdown-menu text-uppercase">
        <a class="dropdown-item" href="/index.php">accueil</a>
        <a class="dropdown-item" href="/vues/galeries.php">galeries</a>
        <a class="dropdown-item" href="/vues/travelbook.php">carnet de voyage</a>
        <a class="dropdown-item" href="/vues/aboutme.php">à propos</a>
        <a class="dropdown-item" href="/vues/contact.php">contact</a>
    </div>
</div>

<div class="container">

<div class="row justify-content-center align-items-center">

<?php if ($showForm) { ?>
        
    <form novalidate method="POST" action="/vues/contact.php" name="signUp" class="col-12 col-sm-5 pb-3 d-flex flex-column">
            
    <legend class="pt-3 text-uppercase text-center titleForm">formulaire de contact</legend>
        
        <div class="form-group">
            <label for="name"></label>
            <input type="text" id="name" name="name" aria-label="nom" class="form-control text-center inputContact" placeholder="Nom" value="<?= isset($_POST["name"]) ? htmlspecialchars($_POST["name"]) : "" ?>" required>
            <div>
                <span class="textError"><?= isset($errorMessages["name"]) ? $errorMessages["name"] : "" ?></span>
            </div>
        </div>

        <div class="form-group">
            <label for="email"></label>
            <input type="email" id="email" name="email" aria-label="email" class="form-control text-center inputContact" placeholder="E-mail" value="<?= isset($_POST["email"]) ? $_POST["email"] : "" ?>" required>
            <div>
                <span class="textError"><?= isset($errorMessages["email"]) ? $errorMessages["email"] : "" ?></span>
            </div>
        </div>

        <div class="form-group">
            <label for="subject"></label>
            <input type="text" id="subject" name="subject" aria-label="sujet" class="form-control text-center inputContact" placeholder="Sujet" value="<?= isset($_POST["subject"]) ? htmlspecialchars($_POST["subject"]) : "" ?>" required>
            <div>
                <span class="textError"><?= isset($errorMessages["subject"]) ? $errorMessages["subject"] : "" ?></span>
            </div>
        </div>
               
        <div class="form-group">
            <label for="textContent"></label>
            <textarea class="form-control textareatest" id="textContent" aria-label="contenu" name="textContent" rows="3" placeholder="Votre demande..." required><?= isset($_POST["textContent"]) ? htmlspecialchars($_POST["textContent"]) : "" ?></textarea>
            <div>
                <span class="textError"><?= isset($errorMessages["textContent"]) ? $errorMessages["textContent"] : "" ?></span>
            </div>
        </div>
    
    <button class="btn btnConnexion mx-auto w-50 mt-3" type="submit" name="submitContact">Envoyer</button>

    </form>
            
    <?php } ?>

</div>

    <footer>
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center pt-3 pb-3">
                    <a href="https://www.flickr.com/photos/thphotographies/" target="_blank"><i class="fab fa-flickr m-3 logoSocialNetwork"></i></a>
                    <a href="https://www.instagram.com/th_photographies/" target="_blank"><i class="fab fa-instagram m-3 logoSocialNetwork"></i></a>
                    <a href="https://www.youtube.com/user/Theo76150" target="_blank"><i class="fab fa-youtube m-3 logoSocialNetwork"></i></a>
                    <a href="/vues/contact.php" target="_blank"><i class="far fa-envelope m-3 logoSocialNetwork"></i></a>
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
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</body>
</html>