<?php

session_start();
if (empty($_SESSION["admin"])){
    header("Location: ../vues/adminConnexion.php");
    exit;
}

require_once "../models/database.php";
require_once "../models/travelbook.php";
require_once "../models/tinymce.php";

$travelbookObj = new Travelbook;
$travelNameForSelect = $travelbookObj->getTravelbookNameForSelect();

$errorMessages = [];
$messages = [];

// Mise en place d'une variable permettant de savoir si le récit a bien été enregistré
$addNewTinymce = false;

$regexName = "/^[a-zA-Z0-9ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\-\ ]+$/";

if(isset($_POST["addTinyTravel"])){

    if(isset($_POST["tinyContent"])){
        if(empty($_POST["tinyContent"])){
            $errorMessages["tinyContent"] = "Veuillez saisir un titre de récit.";
        }
    }

    if(isset($_POST["tinyName"])){
        if(!preg_match($regexName, $_POST["tinyName"])){
            $errorMessages["tinyName"] = "Veuillez respecter le format.";
        }
        if(empty($_POST["tinyName"])){
            $errorMessages["tinyName"] = "Veuillez saisir un titre de récit.";
        }
    }

    if(empty($_POST["selectTravelbook"])){
        $errorMessages["selectTravelbook"] = "Veuillez sélectionner un récit.";
    }

    if(empty($errorMessages)){
        $tinyObj = new TinyMCE;

        // Création d'un tableau contenant toutes les infos du formulaire
        $tinymceDetails = [
            "tinyContent" => ($_POST["tinyContent"]),
            "tinyName" => htmlspecialchars($_POST["tinyName"]),
            "travelbook_ID" => htmlspecialchars($_POST["selectTravelbook"])
        ];

        // J'injecte la variable du tableau $tinymceDetails dans la fonction addTinymceTravelbook
        if($tinyObj->addTinymceTravelbook($tinymceDetails)){
            $addNewTinymce = true;
            $messages["addTinyTravel"] = "Nouveau récit crée !";
        } else {
            $errorMessages["addTinyTravel"] = "Erreur de connexion à la base de données.";
        }
    }

}