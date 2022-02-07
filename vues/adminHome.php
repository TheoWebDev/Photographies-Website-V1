<?php

require_once "../controllers/controller_adminHome.php";

?>

<!doctype html>
<html lang="fr">

<head>
    <title>DASHBOARD - Admin</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=100%; initial-scale=1; maximum-scale=1; minimum-scale=1; user-scalable=no;">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,600;1,300&display=swap">
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
        </div>
    </div>

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <p class="titleWelcolme mt-4">tableau de bord</p>
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-danger btnDeconnexion mb-2" data-toggle="modal" data-target="#modalDeco">déconnexion</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="row justify-content-center justify-content-around">
                    <div class="col-sm-4 p-3 text-center">
                        <a class="d-inline-block adminLogoLink" href="/vues/adminCreateAlbum.php"><img src="../assets/img/newAlbumLogo.png" title="Nouvel album" class="adminLogoAccueil"></a>
                        <p class="text-center pt-2 legendLogoAdmin">Nouvel album</p>
                    </div>
                    <div class="col-sm-4 p-3 text-center">
                        <a class="d-inline-block adminLogoLink" href="/vues/adminCreateImage.php"><img src="../assets/img/newImgLogo.png" title="Nouvelle image" class="adminLogoAccueil"></a>
                        <p class="text-center pt-2 legendLogoAdmin">Nouvelle image</p>
                    </div>
                    <div class="col-sm-4 p-3 text-center">
                        <a class="d-inline-block adminLogoLink" href="/vues/adminSettingsAlbum.php?gestionAlbums"><img src="../assets/img/gestionAlbumLogo.png" title="Gestions albums" class="adminLogoAccueil"></a>
                        <p class="text-center pt-2 legendLogoAdmin">Gestion albums</p>
                    </div>
                    <div class="col-sm-4 pt-5 p-3 text-center">
                        <a class="d-inline-block adminLogoLink" href="/vues/adminCreateTravelbook.php"><img src="../assets/img/newTravelbookLogo.png" title="Nouveau récit" class="adminLogoAccueil"></a>
                        <p class="text-center pt-2 legendLogoAdmin">Nouveau récit</p>
                    </div>
                    <div class="col-sm-4 pt-5 p-3 text-center">
                        <a class="d-inline-block adminLogoLink" href="/vues/adminCreateTinymce.php"><img src="../assets/img/newTravelbookLogo.png" title="Écrire un récit" class="adminLogoAccueil"></a>
                        <p class="text-center pt-2 legendLogoAdmin">Écrire un nouveau récit</p>
                    </div>
                    <div class="col-sm-4 pt-5 p-3 text-center">
                        <a class="d-inline-block adminLogoLink" href="/vues/adminSettingsTravelbook.php"><img src="../assets/img/gestionTravelbook.png" title="Gestion des récits" class="adminLogoAccueil"></a>
                        <p class="text-center pt-2 legendLogoAdmin">Gestion récits</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="modalDeco" tabindex="-1" aria-labelledby="modalDelete" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-center">
                <div class="modal-header d-flex justify-content-center">
                    <h5 class="modal-title" id="modalDeco">Voulez-vous vraiment vous déconnecter ?</h5>
                </div>
                <div class="modal-body">
                    <i class="fas fa-exclamation-triangle reddanger"></i>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <a href="deconnexion.php"><button type="button" class="btn btn-danger">Oui</button></a>
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">NON</button>
                </div>
            </div>
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