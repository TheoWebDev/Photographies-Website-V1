<?php

session_start();
if (empty($_SESSION["admin"])){
    header("Location: ../vues/adminConnexion.php");
    exit;
}

require_once "../models/database.php";
require_once "../models/travelbook.php";

$travelbookObj = new Travelbook;
$readTravel = $travelbookObj->getTravelbook();

$errorMessages = [];
$messages = [];

// Mise en place d'une variable permettant de savoir si le récit a bien été enregistré
$addNewTravelbookInBase = false;

$regexName = "/^[a-zA-ZÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\-\ ]+$/";
$regexDate = "/^[0-9]{4}+$/";

$imageInAlbum = "";

if(isset($_POST["addNewTravelbook"])) {
    if(isset($_FILES["uploadFile"]) && $_FILES["uploadFile"]["error"] == 0) {
        $extensionsAllowed = ["image/jpeg", "image/png", "image/jpg"];
        $mimeTypeUploadedFile = mime_content_type($_FILES["uploadFile"]["tmp_name"]);
        if(in_array($mimeTypeUploadedFile, $extensionsAllowed)) {
            if($_FILES["uploadFile"]["size"] <= 100000000) {
                $pathInfoUploadedFile = pathinfo($_FILES["uploadFile"]["name"]);
                $newUploadedFileName = uniqid($pathInfoUploadedFile["filename"]);
                $fileExtension = $pathInfoUploadedFile["extension"];
                $targetDirectory = "../assets/img/travelbookScreen/";
                $newUploadedFileNamePlusTargetDirectory = $targetDirectory . $newUploadedFileName . "." . $fileExtension;
                
                if(move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $newUploadedFileNamePlusTargetDirectory)) {
                    $imageInAlbum = $newUploadedFileName . "." . $fileExtension;
                    $message = "Votre fichier a bien été téléchargé !";
                } else {
                    $errorMessage = "Une erreur est survenue lors du téléchargement du fichier, veuillez réessayer";
                }
            } else {
                $errorMessage = "Votre fichier est trop lourd, la taille maximale est de 5MB.";
            }
        } else {
            $errorMessage = "Veuillez choisir un fichier image (jpg, jpeg ou png).";
        }
    } else {
        $errorMessage = "Votre image n'a pu être envoyé, veuillez réessayer.";
    }
}

if(isset($_POST["addNewTravelbook"])){

    if(isset($_FILES["uploadFile"]["name"])){
        if(empty($_FILES["uploadFile"]["name"])){
            $errorMessages["uploadFile"] = "Veuillez sélectionner un fichier.";
        }
}

    if(isset($_POST["titleTravelbook"])){
        if(!preg_match($regexName, $_POST["titleTravelbook"])){
            $errorMessages["titleTravelbook"] = "Veuillez respecter le format.";
        }
        if(empty($_POST["titleTravelbook"])){
            $errorMessages["titleTravelbook"] = "Veuillez saisir un titre de récit.";
        }
    }

    if(isset($_POST["travelbookYear"])){
        if(!preg_match($regexDate, $_POST["travelbookYear"])){
            $errorMessages["travelbookYear"] = "Veuillez respecter le format.";
        }
        if(empty($_POST["travelbookYear"])){
            $errorMessages["travelbookYear"] = "Veuillez saisir une année.";
        }
    }

    if(empty($errorMessages)){
        $travelbookObj = new Travelbook;

        // Création d'un tableau contenant toutes les infos du formulaire
        $travelbookDetails = [
            "imgTravelbook" => $imageInAlbum,
            "titleTravelbook" => htmlspecialchars($_POST["titleTravelbook"]),
            "travelbookYear" => htmlspecialchars($_POST["travelbookYear"]),
        ];

        // J'injecte la variable du tableau $travelbookDetails dans la fonction addTravelbook
        if($travelbookObj->addTravelbook($travelbookDetails)){
            $addNewTravelbookInBase = true;
            $messages["addTravelbook"] = "Nouveau récit crée !";
        } else {
            $errorMessages["addTravelbook"] = "Erreur de connexion à la base de données.";
        }
    }

}