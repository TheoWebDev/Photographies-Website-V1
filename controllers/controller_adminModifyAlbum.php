<?php

session_start();

require_once "../models/database.php";
require_once "../models/album.php";

$errorMessages = [];
$messages = [];

$regexName = "/^[a-zA-ZÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\-\ ]+$/";

$albumsObj = new Album;
$testread = $albumsObj->getShowAlbumsAdmin();

// Variable permettant de savoir si l'album a bien été modifié
$updateAlbumInBase = false;

// Nous testons si nous avons bien une valeur non NULL dans le $_POST ModifyPatient qui signifie que nous venons bien de la page detailsPatient
if (!empty($_POST['modifyAlbum'])) {
    // Création d'un nouvel objet
    $albumsObj = new Album;
    // Nous allons récupérer les informations de notre patient nous permettant de pré-remplir le formulaire
    $detailsAlbumsArray = $albumsObj->getDetailsAlbums($_POST['modifyAlbum']);
    
    // Pour plus de sécurité, je stocl l'id du patient à modifier dans une variable de session
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

        // Création d'un tableau contenant toutes les infos du formuulaire
        $albumDetails = [
            "albumName" => htmlspecialchars($_POST["albumName"]),
            "albumLocation" => htmlspecialchars($_POST["albumLocation"]),
            // je recupère mon id que j'ai stocké dans ma variable de session
            'id' => $_SESSION['idAlbumToUpdate']
        ];
        
        if(!empty($_FILES["uploadFile"]['name'])) {
            $albumDetails["uploadFile"] = htmlspecialchars($_FILES["uploadFile"]['name']);
        }


        // On inject la variable du tableau $albumDetails dans la fonction addPatient
        if ($albumObj->updateAlbum($albumDetails)) {
            $updateAlbumInBase = true;
        } else {
            $messages['updateAlbumBtn'] = 'Erreur de connexion lors de la modification';
        }
    }
}