<?php

require_once "../controllers/controller_adminCreateImage.php";

?>

<!doctype html>
<html lang="fr">

<head>

    <title>CREATE Image - Admin</title>

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

    <nav class="navbar d-none d-lg-block navbar-expand-lg sticky-top">

        <div class="collapse navbar-collapse d-flex justify-content-center">
            <ul class="navbar-nav pl-5">
                <li class="nav-item">
                    <a class="colorBlack" href="../index.php">accueil visiteur</a>
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
            // Condition pour ne plus afficher le formulaire quand l'image a été téléchargée.
            if (!$addNewImageInBase) { ?>

            <?php
                // Include pour la mise en place du formulaire form-createImage.
                include "include/form-createImage.php";
            } else { ?>
                <!-- Si l'image a bien été enregistrée, je l'indique via un message -->
                <div>
                    <p class="h4 mt-5 paraCreateElement"><?= $errorMessages['addNewImage'] ?? '' ?></p>
                    <p class="h4 mt-5 paraCreateElement">L'image <span class="font-weight-bold"><?= $_POST['titleImg'] ?></span> a bien été téléchargée.</p>
                    <div class="mt-5 d-flex justify-content-center">
                        <a type="button" href="adminHome.php" class="btn btnBackHome mr-1">tableau de bord</a>
                        <a type="button" href="adminCreateImage.php" class="btn btnAddElement ml-1">ajouter une autre image</a>
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
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</body>

</html>