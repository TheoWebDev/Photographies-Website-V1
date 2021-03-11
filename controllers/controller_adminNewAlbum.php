<?php

require_once "../models/database.php";
require_once "../models/album.php";

$albumsObj = new Album;
$showAlbums = $albumsObj->getShowAlbumsAdmin();

$messages = [];
$errorMessages = [];

$regexName = "/^[a-zA-ZÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\-\ ']+$/";

// Mise en place d'une variable permettant de savoir si l'album a bien été enregistré
$addNewAlbumInBase = false;

$imageAlbumName = "";

if (isset($_POST["addNewAlbum"])) {
    
    if (isset($_FILES["uploadFile"]) && $_FILES["uploadFile"]["error"] == 0) {
        $extensionsAllowed = ["image/jpeg", "image/png", "image/jpg"];
        $mimeTypeUploadedFile = mime_content_type($_FILES["uploadFile"]["tmp_name"]);
        
        if (in_array($mimeTypeUploadedFile, $extensionsAllowed)) {
            if ($_FILES["uploadFile"]["size"] <= 50000000000) {
                
                $pathInfoUploadedFile = pathinfo($_FILES["uploadFile"]["name"]);
                $newUploadedFileName = uniqid($pathInfoUploadedFile["filename"]);
                $fileExtension = $pathInfoUploadedFile["extension"];
                $targetDirectory = "../assets/img/uploaded/";
                $newUploadedFileNamePlusTargetDirectory = $targetDirectory . $newUploadedFileName . "." . $fileExtension;

                if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $newUploadedFileNamePlusTargetDirectory)) {
                    $imageAlbumName = $newUploadedFileName . "." . $fileExtension;
                } else {
                    $errorMessages["uploadFileErrorUndefined"] = "Une erreur est survenue lors du téléchargement, veuillez réessayer";
                }
            } else {
                $errorMessages["uploadFileErrorFileSize"] = "Votre fichier est trop lourd, la taille maximale est de 5MB.";
            }
        } else {
            $errorMessages["uploadFileErrorFileType"] = "Veuillez choisir un fichier image (jpg, jpeg ou png).";
        }
    } 

    if (isset($_FILES["uploadFile"]['name'])) {
        if (empty($_FILES["uploadFile"]['name'])) {
            $errorMessages["uploadFileError"] = "Veuillez sélectionner un fichier.";
        }
    }

    if (isset($_POST["titleAlbum"])) {
        if (!preg_match($regexName, $_POST["titleAlbum"])) {
            $errorMessages["titleAlbumErrorFormat"] = "Veuillez respecter le format.";
        }
        if (empty($_POST["titleAlbum"])) {
            $errorMessages["titleAlbumError"] = "Veuillez saisir un titre d'album.";
        }
    }

    if (isset($_POST["albumPlace"])) {
        if (!preg_match($regexName, $_POST["albumPlace"])) {
            $errorMessages["albumPlaceErrorFormat"] = "Veuillez respecter le format.";
        }
        if (empty($_POST["albumPlace"])) {
            $errorMessages["albumPlaceError"] = "Veuillez saisir une localité.";
        }
    }

    if (empty($errorMessages)) {
        $albumsObj = new Album;

        // Création d'un tableau contenant toutes les infos du formuulaire
        $albumDetails = [
            "imgAlbum" => $imageAlbumName,
            "titleAlbum" => htmlspecialchars($_POST["titleAlbum"]),
            "albumPlace" => htmlspecialchars($_POST["albumPlace"]),
        ];

        // On injecte la variable du tableau $albumDetails dans la fonction addAlbum
        if ($albumsObj->addAlbum($albumDetails)) {
            $addNewAlbumInBase = true;
        } else {
            $errorMessages["addAlbum"] = "Erreur de connexion à la base de données.";
        }
    }
}