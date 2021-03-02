<?php


require_once "../models/database.php";
require_once "../models/album.php";

$errorMessages = [];
$messages = [];

$regexName = "/^[a-zA-ZÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\-\ ']+$/";

// mise en place d'une variable permettant de savoir si nous avons inscrit le patient dans la base
$addNewAlbumInBase = false;

$albumsObj = new Album;
$showAlbums = $albumsObj->getShowAlbumsAdmin();

$imageAlbumName = "";

if (isset($_POST["addNewAlbum"])) {

    if (isset($_FILES["uploadFile"]) && $_FILES["uploadFile"]["error"] == 0) {
        
        $extensionsAllowed = ["image/jpeg", "image/png", "image/jpg"];
        $mimeTypeUploadedFile = mime_content_type($_FILES["uploadFile"]["tmp_name"]);
        if (in_array($mimeTypeUploadedFile, $extensionsAllowed)) {
            
            if ($_FILES["uploadFile"]["size"] <= 10000000000000000000000000) {
                
                $pathInfoUploadedFile = pathinfo($_FILES["uploadFile"]["name"]);
                $newUploadedFileName = uniqid($pathInfoUploadedFile["filename"]);
                $fileExtension = $pathInfoUploadedFile["extension"];
                $targetDirectory = "../assets/img/albumScreen/";
                $newUploadedFileNamePlusTargetDirectory = $targetDirectory . $newUploadedFileName . "." . $fileExtension;

                if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $newUploadedFileNamePlusTargetDirectory)) {
                    $imageAlbumName = $newUploadedFileName . "." . $fileExtension;
                } else {
                    $errorMessages["uploadFileErrorUndefined"] = "Une erreur est survenue lors du téléchargement du fichier, veuillez réessayer";
                }
            } else {
                $errorMessages["uploadFileErrorFileSize"] = "Votre fichier est trop lourd, la taille maximale est de 5MB.";
            }
        } else {
            $errorMessages["uploadFileErrorFileType"] = "Veuillez choisir un fichier image (jpg, jpeg ou png).";
        }
    } else {
        $errorMessages["uploadFileErrorUpload"] = "Votre image n'a pu être envoyé, veuillez réessayer.";
    }
}

    if (isset($_FILES["uploadFile"]['name'])) {
        if (empty($_FILES["uploadFile"]['name'])) {
            $errorMessages["uploadFileError"] = "Veuillez sélectionner un fichier.";
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
        $albumObj = new Album;

        // Création d'un tableau contenant toutes les infos du formuulaire
        $albumDetails = [
            "imgAlbum" => $imageAlbumName,
            "titleAlbum" => htmlspecialchars($_POST["titleAlbum"]),
            "albumPlace" => htmlspecialchars($_POST["albumPlace"]),
        ];

        // On inject la variable du tableau $albumDetails dans la fonction addPatient
        if ($albumObj->addAlbum($albumDetails)) {
            $addNewAlbumInBase = true;
        } else {
            $errorMessages["addAlbum"] = "Erreur de connexion à la base de données.";
        }
    }
    }