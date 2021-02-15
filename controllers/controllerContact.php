<?php

$errorMessages = [];

$regexName = "/^[a-zA-ZÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/";
$regexSubject = "/^[a-zA-Z0-9]+$/";

$showForm = true;

// FORMULAIRE CONTACT

if(isset($_POST["submitContact"])){

    if(isset($_POST["name"])){
        if(empty($_POST["name"])){
            $errorMessages["name"] = "Veuillez saisir votre nom.";
        }
        if(!preg_match($regexName, $_POST["name"])){
            $errorMessages["name"] = "Veuillez saisir un nom valide.";
        }
    }
    
    if(isset($_POST["subject"])){
        if(empty($_POST["subject"])){
            $errorMessages["subject"] = "Veuillez saisir un sujet.";
        }
        if(!preg_match($regexSubject, $_POST["subject"])){
            $errorMessages["subject"] = "Veuillez saisir un sujet valide.";
        }
    }
    
    if(isset($_POST["email"])){
        if(empty($_POST["email"])){
            $errorMessages["email"] = "Veuillez saisir votre adresse email.";
        }
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $errorMessages["email"] = "Veuillez saisir un adresse email valide.";
        }
    }
    
    if(isset($_POST["textHeroes"])){
        if(empty($_POST["textHeroes"])){
            $errorMessages["textHeroes"] = "Veuillez saisir un texte.";
        }
    }
        
        echo "Votre message a bien été envoyé.";
    }

    if(isset($_POST["submitContact"]) && count($errorMessages) == 0){
        $name = htmlspecialchars($_POST["name"]);
        $subject = htmlspecialchars($_POST["subject"]);
        $email = htmlspecialchars($_POST["email"]);
        $textHeroes = htmlspecialchars($_POST["textHeroes"]);
        $showForm = false;
        $to = "theodphotographe@gmail.com";
        mail($to, $name, $subject, $email, $textHeroes);
    }
?>