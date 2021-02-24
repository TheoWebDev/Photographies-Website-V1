<?php

require_once "../models/database.php";
require_once "../models/uploadImg.php";

if(isset($_POST["buttonSubmit"])) {
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
$scanDirCount = count(scandir("../assets/img/uploaded")) - 2;

// FORMULAIRE UPLOAD

// $newimageObj = new Image;
// $addnewimage = $newimageObj->addNewImage($newImage);

$regexName = "/^[a-zA-ZÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\-\ ]+$/";

if(isset($_POST["addNewImage"])){

    if(isset($_FILES["newImage"]['name'])){
        if(empty($_FILES["newImage"]['name'])){
            $errorMessages["newImage"] = "Veuillez sélectionner un fichier.";
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

    if(isset($_POST["selectAlbum"])){
        if(empty($_POST["selectAlbum"])){
            $errorMessages["selectAlbum"] = "Veuillez sélectionner un album.";
        }
    }

    if(empty($errorMessages)){
        $newimageObj = new Image;

        // Création d'un tableau contenant toutes les infos du formuulaire
        $newImage = [
            "newImage" => htmlspecialchars($_FILES["newImage"]['name']),
            "titleImg" => htmlspecialchars($_POST["titleImg"]),
            "selectAlbum" => htmlspecialchars($_POST["selectAlbum"]),
        ];

        // On inject la variable du tableau $albumDetails dans la fonction addPatient
        if($newimageObj->addNewImage($newImage)){
            $errorMessages["addNewImage"] = "Image enregistrée.";
        } else {
            $errorMessages["addNewImage"] = "Erreur de connexion à la base de données.";
        }
    }

}