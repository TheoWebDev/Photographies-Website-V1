<?php

session_start();
$errorMessages = [];

$identifiant = "TheoPhotoQC92-14";
$password = "HighlanderExplorer7692";

if(isset($_POST["submit"])){

    if(isset($_POST["adminName"])){
        if(empty($_POST["adminName"])){
            $errorMessages["adminName"] = "Veuillez saisir votre nom d'utilisateur.";
        }
        if ($_POST["adminName"] != $identifiant) {
            $errorMessages["adminName"] = "Vos indentifiants ne sont pas valides.";
        }
    }

    if(isset($_POST["adminPassword"])){

        if(empty($_POST["adminPassword"])){
            $errorMessages["adminPassword"] = "Veuillez saisir votre mot de passe.";
        }
        if($_POST["adminPassword"] != $password){
            $errorMessages["adminPassword"] = "Vos indentifiants ne sont pas valides.";
        }
    }

    if(count($errorMessages) < 1){
        $_SESSION["admin"] = "TheoPhotoQC92-14";
        header("Location: adminHome.php");
    }
}