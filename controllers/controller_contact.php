<?php

session_start();

$errorMessages = [];

$regexName = "/^[a-zA-Z0-9ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\-\ '.!?]+$/";
$regexMail = "/^[a-z0-9.-]+[@]{1}[a-z0-9]+[.]{1}[a-z]{2,4}$/";

$showForm = true;

if(isset($_POST["submitContact"])){

    if(isset($_POST["name"])){
        if(!preg_match($regexName, $_POST["name"])){
            $errorMessages["name"] = "Veuillez saisir un nom valide.";
        }
        if(empty($_POST["name"])){
            $errorMessages["name"] = "Veuillez saisir votre nom.";
        }
    }
    
    if(isset($_POST["email"])){
        if (!preg_match($regexMail, $_POST["email"])){
            $errorMessages["email"] = "Veuillez saisir un adresse email valide.";
        }
        if(empty($_POST["email"])){
            $errorMessages["email"] = "Veuillez saisir votre adresse email.";
        }
    }
    
    if(isset($_POST["subject"])){
        if(empty($_POST["subject"])){
            $errorMessages["subject"] = "Veuillez saisir un texte.";
        }
    }

    if(isset($_POST["submitContact"]) && count($errorMessages) == 0){
        $to = "theodphotographe@gmail.com";
        $name = htmlspecialchars($_POST["name"]);
        $subject = htmlspecialchars($_POST["subject"]);
        $email = htmlspecialchars($_POST["email"]);
        mail($to, $name, $subject, $email);
        if ($showForm = false){
        $errorMessages["succes"] = "Votre message a bien été envoyé !";
        } else {
            $errorMessages["fail"] = "Votre message a bien été envoyé !";
        }
    }
}