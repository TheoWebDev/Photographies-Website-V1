<?php

require_once "../models/database.php";
require_once "../models/image.php";

$messages = [];
$errorMessages = [];

$regexName = "/^[a-zA-Z0-9ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\-\ ']+$/";

// Mise en place d'une variable permettant de savoir si l'image a bien été modifiée
$updateImageInBase = false;

// Test pour savoir si j'ai bien une valeur non NULL dans le $_POST modifyImage ce qui signifie que je viens de la page adminImgInAlbum
if (!empty($_POST['modifyImage'])) {
    // Création de l'objet
    $imageObj = new Image;
    // Récupération des informations de l'image me permettant de pré-remplir le formulaire ainsi que l'album dans lequel elle se trouve
    $detailsImages = $imageObj->getDetailsImages($_POST['modifyImage']);
    $selectAlbumsForUpload = $imageObj->getAlbumsNameForSelect();
    // Pour plus de sécurité, je stocke l'id de l'album à modifier dans une variable de session
    $_SESSION['idImageToUpdate'] = $detailsImages['img_ID'];
}

if (isset($_POST['modifyImageBtn'])) {

    if(isset($_POST["titleImg"])){
        if(!preg_match($regexName, $_POST["titleImg"])){
            $errorMessages["titleImg"] = "Veuillez respecter le format.";
        }
        if(empty($_POST["titleImg"])){
            $errorMessages["titleImg"] = "Veuillez saisir un titre d'album.";
        }
    }

    if(empty($_POST["selectAlbum"])){
        $errorMessages["selectAlbum"] = "Veuillez sélectionner un album.";
    }

    if(empty($errorMessages)){
        $imageObj = new Image;

        // Création d'un tableau contenant toutes les informations du formuulaire
        $imagesDetails = [
            "imgTitle" => htmlspecialchars($_POST["titleImg"]),
            "album_ID" => htmlspecialchars($_POST["selectAlbum"]),
            "imgVisibility" => array_key_exists("checkAlbum", $_POST) ? $_POST["checkAlbum"] : 0,
            "imgSpotlight" => array_key_exists("checkUne", $_POST) ? $_POST["checkUne"] : 0,
            // Recupération de l'id que j'ai stocké dans ma variable de session
            'id' => $_SESSION['idImageToUpdate']
        ];
        
        if(!empty($_FILES["uploadFile"]['name'])) {
            $imagesDetails["uploadFile"] = htmlspecialchars($_FILES["uploadFile"]['name']);
        }

        // J'injecte la variable du tableau $imagesDetails dans la fonction updateImages
        if ($imageObj->updateImages($imagesDetails)) {
            $updateImageInBase = true;
        } else {
            $messages['modifyImageBtn'] = 'Erreur de connexion lors de la modification';
        }
    }
}