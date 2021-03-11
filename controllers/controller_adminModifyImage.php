<?php

require_once "../models/database.php";
require_once "../models/album.php";
require_once "../models/image.php";

$messages = [];
$errorMessages = [];

$regexName = "/^[a-zA-ZÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\-\ ']+$/";

// mise en place d'une variable permettant de savoir si l'album a bien été modifié
$updateImageInBase = false;

// Nous testons si nous avons bien une valeur non NULL dans le $_POST ModifyPatient qui signifie que nous venons bien de la page detailsPatient
if (!empty($_POST['modifyImage'])) {
    $id = $_POST['modifyImage'];
    // Création d'un nouvel objet
    $imageObj = new Image;
    
    // Nous allons récupérer les informations de notre patient nous permettant de pré-remplir le formulaire
    $detailsImages = $imageObj->getDetailsImages($id);
    $selectAlbumsForUpload = $imageObj->getAlbumsNameForSelect();
    // Pour plus de sécurité, je stock l'id du patient à modifier dans une variable de session
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

        var_dump($_POST);

        // Création d'un tableau contenant toutes les infos du formuulaire
        $imagesDetails = [
            "imgTitle" => htmlspecialchars($_POST["titleImg"]),
            "album_ID" => htmlspecialchars($_POST["selectAlbum"]),
            "imgVisibility" => array_key_exists("checkAlbum", $_POST) ? $_POST["checkAlbum"] : 0,
            "imgSpotlight" => array_key_exists("checkUne", $_POST) ? $_POST["checkUne"] : 0,
            // je recupère mon id que j'ai stocké dans ma variable de session
            'id' => $_SESSION['idImageToUpdate']
        ];
        var_dump($imagesDetails);
        
        if(!empty($_FILES["uploadFile"]['name'])) {
            $imagesDetails["uploadFile"] = htmlspecialchars($_FILES["uploadFile"]['name']);
        }


        // On inject la variable du tableau $albumDetails dans la fonction addPatient
        if ($imageObj->updateImages($imagesDetails)) {
            $updateImageInBase = true;
        } else {
            $messages['modifyImageBtn'] = 'Erreur de connexion lors de la modification';
        }
    }
}