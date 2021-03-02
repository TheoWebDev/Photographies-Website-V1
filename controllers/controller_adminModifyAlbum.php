<?php
session_start();

require_once "../models/database.php";
require_once "../models/album.php";

$errorMessages = [];
$messages = [];

$regexName = "/^[a-zA-ZÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\-\ ]+$/";

$albumsObj = new Album;
$testread = $albumsObj->getShowAlbumsAdmin();

// mise en place d'une variable permettant de savoir si l'album a bien été modifié
$updateAlbumInBase = false;

// Nous testons si nous avons bien une valeur non NULL dans le $_POST ModifyPatient qui signifie que nous venons bien de la page detailsPatient
if (!empty($_POST['modifyAlbum'])) {
    // Création d'un nouvel objet
    $albumsObj = new Album;
    // Nous allons récupérer les informations de notre patient nous permettant de pré-remplir le formulaire
    $detailsAlbumsArray = $albumsObj->getDetailsAlbums($_POST['modifyAlbum']);
    // Pour plus de sécurité, je stocl l'id du patient à modifier dans une variable de session
    $_SESSION['idPatientToUpdate'] = $detailsAlbumsArray['album_ID'];
}

if (isset($_POST['updateAlbumBtn'])) {

    if(isset($_FILES["imgAlbum"]['name'])){
        if(empty($_FILES["imgAlbum"]['name'])){
            $errorMessages["imgAlbum"] = "Veuillez sélectionner un fichier.";
        }
}

    if(isset($_POST["titleAlbum"])){
        if(!preg_match($regexName, $_POST["titleAlbum"])){
            $errorMessages["titleAlbum"] = "Veuillez respecter le format.";
        }
        if(empty($_POST["titleAlbum"])){
            $errorMessages["titleAlbum"] = "Veuillez saisir un titre d'album.";
        }
    }

    if(isset($_POST["albumPlace"])){
        if(!preg_match($regexName, $_POST["albumPlace"])){
            $errorMessages["albumPlace"] = "Veuillez respecter le format.";
        }
        if(empty($_POST["albumPlace"])){
            $errorMessages["albumPlace"] = "Veuillez saisir une localité.";
        }
    }

    if(empty($errorMessages)){
        $albumObj = new Album;

        // Création d'un tableau contenant toutes les infos du formuulaire
        $albumDetails = [
            "imgAlbum" => htmlspecialchars($_FILES["imgAlbum"]['name']),
            "titleAlbum" => htmlspecialchars($_POST["titleAlbum"]),
            "albumPlace" => htmlspecialchars($_POST["albumPlace"]),
            // je recupère mon id que j'ai stocké dans ma variable de session
            'id' => $_SESSION['idPatientToUpdate']
        ];

        // On inject la variable du tableau $albumDetails dans la fonction addPatient
        if ($albumsObj->updateAlbum($albumsDetails)) {
            $updateAlbumInBase = true;
        } else {
            $messages['updateAlbumBtn'] = 'Erreur de connexion lors de la modification';
        }
    }
}