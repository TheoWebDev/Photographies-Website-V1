<?php

class Travelbook extends DataBase{

    /**
     * Méthode permettant de rajouter un patient dans notre base de données.
     * 
     * @param array $patientDetails contient toutes les informations du patient
     * @return boolean permet de savoir si la requête est bien passée
     */

    public function addTravelbook(array $travelbookDetails)
    {   // :lastname les deux points servent de marqueur nominatif récupérer via le formulaire, : remplace le $
        $query = "INSERT INTO `thp_travelbook` (`travelbookScreen`, `travelbookName`, `travelbookYear`, `travelbookContent`)
        VALUES (:imgTravelbook, :titleTravelbook, :travelbookYear, :travelFile)";
        // Préparation de la requête avec la fonction "prepare" et on cible $query
        $addTravelbookQuery = $this->database->prepare($query);
        // On récupère la requète $addPatientQuery et on relie les valeurs avec la fonction "binhValue"
        $addTravelbookQuery->bindValue(":imgTravelbook", $travelbookDetails["imgTravelbook"], PDO::PARAM_STR);
        $addTravelbookQuery->bindValue(":titleTravelbook", $travelbookDetails["titleTravelbook"], PDO::PARAM_STR);
        $addTravelbookQuery->bindValue(":travelbookYear", $travelbookDetails["travelbookYear"], PDO::PARAM_INT);
        $addTravelbookQuery->bindValue(":travelFile", $travelbookDetails["travelFile"], PDO::PARAM_STR);
        // on test et execute la requête pour afficher un message d'erreur
        if($addTravelbookQuery->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getTravelbook(){
        // utilisation des magic quote pour indiquer qu'il s'agit de champs et de table
        // on stock la reqête dans une varible ($query)
        $query = "SELECT `travelbookScreen`, `travelbookName`, `travelbookYear`, `travelbookContent` FROM `thp_travelbook`";

        // on utilise la méthode query pour éxectuter notre requête
        $queryObj = $this->database->query($query);

        // on utilise la méthode fetchAll pour obtenir un tableau de notre requête
        $result = $queryObj->fetchAll(); // par défaut va retourner un tableau associatif

        return $result; // on retourne le tableau
    }
}