<?php

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

$galleryArray = [
    "Normandie",
    "Presqu'Île de Crozon",
    "Belgique",
    "New-York City",
    "Canada",
    "Miami-Beach"
];

if(isset($_POST["submit"])){

if(isset($_POST["titleImg"])){
    if(!empty($_POST["titleImg"])){
        $errorMessages["titleImg"] = "Veuillez saisir un titre valide.";
    }
    if(empty($_POST["titleImg"])){
        $errorMessages["titleImg"] = "Veuillez saisir un titre.";
    }
}

if (!isset($_POST["gallery"])) {
    $errorMessages["gallery"] = "Veuillez sélectionner une galerie.";
}

if (isset($_POST["gallery"])) {
    if(!array_search($_POST["gallery"], $galleryArray)){
        $errorMessages["gallery"] = "NOPE !";
    }
}

}

if(isset($_POST["submit"]) && count($errorMessages) == 0){
    $titleImg = htmlspecialchars($_POST["titleImg"]);
    $gallery = htmlspecialchars($galleryArray[$_POST["gallery"]]);
}

?>