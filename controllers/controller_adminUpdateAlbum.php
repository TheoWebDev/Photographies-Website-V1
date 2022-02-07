<?php

session_start();
if (empty($_SESSION["admin"])){
    header("Location: ../vues/adminConnexion.php");
    exit;
}

require_once "../models/database.php";
require_once "../models/album.php";

$messages = [];
$errorMessages = [];

$regexName = "/^[a-zA-ZÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\-\ ]+$/";

$albumsObj = new Album;
$testread = $albumsObj->getShowAlbumsAdmin();

// Mise en place d'une variable permettant de savoir si l'album a bien été modifié
$updateAlbumInBase = false;

// Test pour savoir si j'ai bien une valeur non NULL dans le $_POST modifyAlbum ce qui signifie que je viens de la page adminImgInAlbum
if (!empty($_POST['modifyAlbum'])) {
    // Création de l'objet
    $albumsObj = new Album;
    // Récupération des informations de l'album me permettant de pré-remplir le formulaire
    $detailsAlbumsArray = $albumsObj->getDetailsAlbums($_POST['modifyAlbum']);
    // Pour plus de sécurité, je stocke l'id de l'album à modifier dans une variable de session
    $_SESSION['idAlbumToUpdate'] = $detailsAlbumsArray['album_ID'];
}

if (isset($_POST['updateAlbumBtn'])) {

    if(isset($_POST["albumName"])){
        if(!preg_match($regexName, $_POST["albumName"])){
            $errorMessages["albumName"] = "Veuillez respecter le format.";
        }
        if(empty($_POST["albumName"])){
            $errorMessages["albumName"] = "Veuillez saisir un titre d'album.";
        }
    }

    if(isset($_POST["albumLocation"])){
        if(!preg_match($regexName, $_POST["albumLocation"])){
            $errorMessages["albumLocation"] = "Veuillez respecter le format.";
        }
        if(empty($_POST["albumLocation"])){
            $errorMessages["albumLocation"] = "Veuillez saisir une localité.";
        }
    }

    if(empty($errorMessages)){
        $albumObj = new Album;

        // Création d'un tableau contenant toutes les informations du formulaire
        $albumDetails = [
            "albumName" => htmlspecialchars($_POST["albumName"]),
            "albumLocation" => htmlspecialchars($_POST["albumLocation"]),
            // Recupération de l'id que j'ai stocké dans ma variable de session
            'id' => $_SESSION['idAlbumToUpdate']
        ];
        
        if(!empty($_FILES["uploadFile"]['name'])) {
            $albumDetails["uploadFile"] = htmlspecialchars($_FILES["uploadFile"]['name']);
        }

        // J'injecte la variable du tableau $albumDetails dans la fonction updateAlbum
        if ($albumObj->updateAlbum($albumDetails)) {
            $updateAlbumInBase = true;
        } else {
            $messages['updateAlbumBtn'] = 'Erreur de connexion lors de la modification';
        }
    }
}