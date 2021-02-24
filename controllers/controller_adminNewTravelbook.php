<?php

require_once "../models/database.php";
require_once "../models/travelbook.php";

$errorMessages = [];

$regexName = "/^[a-zA-ZÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\-\ ]+$/";
$regexDate = "/^[0-9]{4}+$/";

$travelbookObj = new Travelbook;
$readTravel = $travelbookObj->getTravelbook();

if(isset($_POST["addNewTravelbook"])){

    if(isset($_FILES["imgTravelbook"]["name"])){
        if(empty($_FILES["imgTravelbook"]["name"])){
            $errorMessages["imgTravelbook"] = "Veuillez sélectionner un fichier.";
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

    if(isset($_FILES["travelFile"]["name"])){
        if(empty($_FILES["travelFile"]["name"])){
            $errorMessages["travelFile"] = "Veuillez sélectionner un fichier.";
        }
    }

    if(empty($errorMessages)){
        $travelbookObj = new Travelbook;

        // Création d'un tableau contenant toutes les infos du formuulaire
        $travelbookDetails = [
            "imgTravelbook" => htmlspecialchars($_FILES["imgTravelbook"]['name']),
            "titleTravelbook" => htmlspecialchars($_POST["titleTravelbook"]),
            "travelbookYear" => htmlspecialchars($_POST["travelbookYear"]),
            "travelFile" => htmlspecialchars($_FILES["travelFile"]["name"]),
        ];

        // On inject la variable du tableau $albumDetails dans la fonction addPatient
        if($travelbookObj->addTravelbook($travelbookDetails)){
            $errorMessages["addTravelbook"] = "Récit enregistré.";
        } else {
            $errorMessages["addTravelbook"] = "Erreur de connexion à la base de données.";
        }
    }

}