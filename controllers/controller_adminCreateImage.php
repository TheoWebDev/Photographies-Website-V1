<?php

session_start();
if (empty($_SESSION["admin"])){
    header("Location: ../vues/adminConnexion.php");
    exit;
}
require_once "../models/database.php";
require_once "../models/album.php";
require_once "../models/image.php";

$regexName = "/^[a-zA-Z0-9ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\-\ ']+$/";

$imageObj = new Image;
$selectAlbumsForUpload = $imageObj->getAlbumsNameForSelect();

$messages = [];
$errorMessages = [];

// Mise en place d'une variable permettant de savoir si l'image a bien été enregistrée
$addNewImageInBase = false;

$imageInAlbum = "";

if(isset($_POST["addNewImageBtn"])) {

    if(isset($_FILES["uploadFile"]) && $_FILES["uploadFile"]["error"] == 0) {
        $extensionsAllowed = ["image/jpeg", "image/png", "image/jpg"];
        $mimeTypeUploadedFile = mime_content_type($_FILES["uploadFile"]["tmp_name"]);

        if(in_array($mimeTypeUploadedFile, $extensionsAllowed)) {
            if($_FILES["uploadFile"]["size"] <= 50000000000) {

                $pathInfoUploadedFile = pathinfo($_FILES["uploadFile"]["name"]);
                $newUploadedFileName = uniqid($pathInfoUploadedFile["filename"]);
                $fileExtension = $pathInfoUploadedFile["extension"];
                $targetDirectory = "../assets/img/uploaded/";
                $newUploadedFileNamePlusTargetDirectory = $targetDirectory . $newUploadedFileName . "." . $fileExtension;
                
                if(move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $newUploadedFileNamePlusTargetDirectory)) {
                    $imageInAlbum = $newUploadedFileName . "." . $fileExtension;
                } else {
                    $errorMessages = "Une erreur est survenue lors du téléchargement, veuillez réessayer";
                }
            } else {
                $errorMessage = "Votre fichier est trop lourd, la taille maximale est de 5MB.";
            }
        } else {
            $errorMessage = "Veuillez choisir un fichier image (jpg, jpeg ou png).";
        }
    }

    if(isset($_FILES["uploadFile"]['name'])){
        if(empty($_FILES["uploadFile"]['name'])){
            $errorMessages["uploadFile"] = "Veuillez sélectionner un fichier.";
        }
    }

    if(isset($_POST["titleImg"])){
        if(!preg_match($regexName, $_POST["titleImg"])){
            $errorMessages["titleImg"] = "Veuillez respecter le format.";
        }
        if(empty($_POST["titleImg"])){
            $errorMessages["titleImg"] = "Veuillez saisir un titre d'image.";
        }
    }

    if(empty($_POST["selectAlbum"])){
        $errorMessages["selectAlbum"] = "Veuillez sélectionner un album.";
    }

    if(empty($errorMessages)){

        $imagesDetails = [
            "imgUniqueID" => $imageInAlbum,
            "imgTitle" => htmlspecialchars($_POST["titleImg"]),
            "album_ID" => htmlspecialchars($_POST["selectAlbum"]),
            "imgVisibility" => empty($_POST["checkAlbum"]) ? 0 : 1,
            "imgSpotlight" => empty($_POST["checkUne"]) ? 0 : 1,
            "imgVertical" => empty($_POST["imgVertical"]) ? 0 : 1
        ];

        $imageObj = new Image;

        if($imageObj->addNewImage($imagesDetails)){
            $addNewImageInBase = true;
            $messages["addNewImage"] = "Image enregistrée.";
        } else {
            $errorMessages["addNewImage"] = "Erreur de connexion à la base de données.";
        }

    }
}