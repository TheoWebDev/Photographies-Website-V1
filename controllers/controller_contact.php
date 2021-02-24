<?php

$errorMessages = [];

$regexName = "/^[a-zA-ZÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/";

$showForm = true;

// FORMULAIRE CONTACT

if(isset($_POST["submitContact"])){

    if(isset($_POST["name"])){
        if(!preg_match($regexName, $_POST["name"])){
            $errorMessages["name"] = "Veuillez saisir un nom valide.";
        }
        if(empty($_POST["name"])){
            $errorMessages["name"] = "Veuillez saisir votre nom.";
        }
    }
    
    if(isset($_POST["subject"])){
        if(!preg_match($regexName, $_POST["subject"])){
            $errorMessages["subject"] = "Veuillez saisir un sujet valide.";
        }
        if(empty($_POST["subject"])){
            $errorMessages["subject"] = "Veuillez saisir un sujet.";
        }
    }
    
    if(isset($_POST["email"])){
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $errorMessages["email"] = "Veuillez saisir un adresse email valide.";
        }
        if(empty($_POST["email"])){
            $errorMessages["email"] = "Veuillez saisir votre adresse email.";
        }
    }
    
    if(isset($_POST["textContent"])){
        if(!preg_match($regexName, $_POST["textContent"])){
            $errorMessages["textContent"] = "Veuillez saisir un texte valide.";
        }
        if(empty($_POST["textContent"])){
            $errorMessages["textContent"] = "Veuillez saisir un texte.";
        }
    }
        
        echo "Votre message a bien été envoyé.";
    }

    if(isset($_POST["submitContact"]) && count($errorMessages) == 0){
        $name = htmlspecialchars($_POST["name"]);
        $subject = htmlspecialchars($_POST["subject"]);
        $email = htmlspecialchars($_POST["email"]);
        $textContent = htmlspecialchars($_POST["textContent"]);
        $showForm = false;
        $to = "theodphotographe@gmail.com";
        mail($to, $name, $subject, $email, $textContent);
    }
?>