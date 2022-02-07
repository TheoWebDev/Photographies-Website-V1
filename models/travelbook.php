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
        $query = "INSERT INTO `thp_travelbook` (`travelbookScreen`, `travelbookName`, `travelbookYear`)
        VALUES (:imgTravelbook, :titleTravelbook, :travelbookYear)";
        // Préparation de la requête avec la fonction "prepare" et on cible $query
        $addTravelbookQuery = $this->database->prepare($query);
        // On récupère la requète $addPatientQuery et on relie les valeurs avec la fonction "binhValue"
        $addTravelbookQuery->bindValue(":imgTravelbook", $travelbookDetails["imgTravelbook"], PDO::PARAM_STR);
        $addTravelbookQuery->bindValue(":titleTravelbook", $travelbookDetails["titleTravelbook"], PDO::PARAM_STR);
        $addTravelbookQuery->bindValue(":travelbookYear", $travelbookDetails["travelbookYear"], PDO::PARAM_INT);
        // on test et execute la requête pour afficher un message d'erreur
        if($addTravelbookQuery->execute()){
            return true;
        } else {
            return false;
        }
    }


    // Méthode pour afficher les récits sur la page administrateur et visiteur

    public function getTravelbook(){
        // utilisation des magic quote pour indiquer qu'il s'agit de champs et de table
        // on stock la reqête dans une varible ($query)
        $query = "SELECT `travelbook_ID`, `travelbookScreen`, `travelbookName`, `travelbookYear` FROM `thp_travelbook`
        ORDER BY `travelbook_ID` DESC";

        // on utilise la méthode query pour éxectuter notre requête
        $queryObj = $this->database->query($query);

        // on utilise la méthode fetchAll pour obtenir un tableau de notre requête
        $result = $queryObj->fetchAll(); // par défaut va retourner un tableau associatif

        return $result; // on retourne le tableau
    }


    // Méthode pour afficher le dernier récit sur la page Index

    public function showTravelbookForIndex(){
        // utilisation des magic quote pour indiquer qu'il s'agit de champs et de table
        // on stock la reqête dans une varible ($query)
        $query = "SELECT `travelbook_ID`, `travelbookScreen`, `travelbookName`, `travelbookYear`
        FROM `thp_travelbook`
        ORDER BY `travelbook_ID` DESC LIMIT 1";

        // on utilise la méthode query pour éxectuter notre requête
        $queryObj = $this->database->query($query);

        // on utilise la méthode fetchAll pour obtenir un tableau de notre requête
        $result = $queryObj->fetchAll(); // par défaut va retourner un tableau associatif

        return $result; // on retourne le tableau
    }


    // Méthode pour récupérer le nom du récit dans un select pour TinyMCE

    public function getTravelbookNameForSelect()
    {
        $query = "SELECT `travelbook_ID`, `travelbookName` FROM `thp_travelbook` ORDER BY `travelbookName`";

        $getAlbumsNameForSelectQuery = $this->database->query($query);

        return $getAlbumsNameForSelectQuery->fetchAll();
    }

}