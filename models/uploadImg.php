<?php

class Image extends DataBase{

    /**
     * Méthode permettant de rajouter un patient dans notre base de données.
     * 
     * @param array $patientDetails contient toutes les informations du patient
     * @return boolean permet de savoir si la requête est bien passée
     */

    public function addNewImage(array $newImage)
    {   // :lastname les deux points servent de marqueur nominatif récupérer via le formulaire, : remplace le $
        $query = "INSERT INTO `thp_img` (`imgTitle`, `imgVisibility`, `imgSpotlight`, `album_ID`, `imgUniqueID`)
        VALUES (:newImage, :titleImg, :album)";
        // Préparation de la requête avec la fonction "prepare" et on cible $query
        $addNewImageQuery = $this->database->prepare($query);
        // On récupère la requète $addPatientQuery et on relie les valeurs avec la fonction "binhValue"
        $addNewImageQuery->bindValue(":imgTitle", $newImage["imgTitle"], PDO::PARAM_STR);
        $addNewImageQuery->bindValue(":imgVisibility", $newImage["imgVisibility"], PDO::PARAM_STR);
        $addNewImageQuery->bindValue(":imgSpotlight", $newImage["imgSpotlight"], PDO::PARAM_STR);
        $addNewImageQuery->bindValue(":album_ID", $newImage["album_ID"], PDO::PARAM_INT);
        $addNewImageQuery->bindValue(":imgUniqueID", $newImage["imgUniqueID"], PDO::PARAM_STR);
        // on test et execute la requête pour afficher un message d'erreur
        if($addNewImageQuery->execute()){
            return true;
        } else {
            return false;
        }
    }
}