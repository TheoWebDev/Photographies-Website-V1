<?php

require_once "../models/database.php";
require_once "../models/album.php";

$errorMessages = [];

$regexName = "/^[a-zA-ZÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\-\ ]+$/";

$albumObj = new Album;
$readAlbum = $albumObj->getShowAlbumsGallery();
$readAlbumAdmin = $albumObj->getShowAlbumsGallery();

if(isset($_POST["addNewAlbum"])){

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
        ];

        // On inject la variable du tableau $albumDetails dans la fonction addPatient
        if($albumObj->addAlbum($albumDetails)){
            $errorMessages["addAlbum"] = "Album enregistré.";
        } else {
            $errorMessages["addAlbum"] = "Erreur de connexion à la base de données.";
        }
    }

}