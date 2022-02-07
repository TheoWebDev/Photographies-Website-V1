<?php

require_once "../controllers/controller_adminSettingsTiny.php";

?>

<!doctype html>
<html lang="fr">

<head>
    <title>SETTINGS Tiny MCE - Admin</title>

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
            <a class="dropdown-item" href="../index.php">accueil</a>
            <a class="dropdown-item" href="/vues/adminHome.php">tableau de bord</a>
        </div>
    </div>

    <div class="container">

        <div class="row">
            <div class="col-12">
                <p class="d-flex justify-content-center mt-4 titleForm">Récits :</p>
            </div>
        </div>

        <div class="row justify-content-center">

            <button type="button" class="btn btn-danger deleteAlbum" data-toggle="modal" data-target="#deleteModal" data-del-id=""><i class="far fa-trash-alt"></i></button>

            <form action="adminUpdateAlbum.php" method="POST">
                <button class="btn btn-secondary ml-2" type="submit" name="modifyAlbum" value=""><i class="fas fa-cog"></i></button></a>
            </form>

        </div>

        <div class="showTiny">
            <?php foreach ($readTiny as $value) { ?>
                <?= $value["tinyContent"] ?>
            <?php } ?>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="row">


                    <div class="col-sm-3 p-3 contentImgGaleries" data-aos="zoom-in" data-aos-duration="1000">
                        <div class="hoverSettingsImg">
                            <img src="../assets/img/uploaded/" alt="" class="imgInAlbum">
                            <p class="text-center pt-2"></p>
                            <div class="buttonSettingsImg">
                                <form action="adminUpdateImage.php" method="POST">
                                    <a href="../vues/adminUpdateImage.php"><button type="submit" value="" name="modifyImage" class="btn btn-sm btn-primary mt-2">Modifier</button></a>
                                </form>
                                <form action="" method="POST">
                                    <button type="button" class="btn btn-sm btn-danger mt-2 deleteImage" data-toggle="modal" data-target="#deleteModalImage" data-del-id="" data-del-image="" data-del-title="">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <!-- Ternaire pour afficher un message quand il n'y a pas d'images dans l'album -->


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
                        <p>Voulez-vous vraiment supprimer l'album <span class="font-weight-bold"> <?= $albumName["albumName"] ?></span> ?</p>
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
</body>

</html>