<?php

class Album extends DataBase{

    /**
     * Méthode permettant de rajouter un patient dans notre base de données.
     * 
     * @param array $patientDetails contient toutes les informations du patient
     * @return boolean permet de savoir si la requête est bien passée
     */

    public function addAlbum(array $albumDetails)
    {   // :lastname les deux points servent de marqueur nominatif récupérer via le formulaire, : remplace le $
        $query = "INSERT INTO `thp_album` (`albumScreen`, `albumName`, `albumLocation`)
        VALUES (:imgAlbum, :titleAlbum, :albumPlace)";
        // Préparation de la requête avec la fonction "prepare" et on cible $query
        $addAlbumQuery = $this->database->prepare($query);
        // On récupère la requète $addPatientQuery et on relie les valeurs avec la fonction "binhValue"
        $addAlbumQuery->bindValue(":imgAlbum", $albumDetails["imgAlbum"], PDO::PARAM_STR);
        $addAlbumQuery->bindValue(":titleAlbum", $albumDetails["titleAlbum"], PDO::PARAM_STR);
        $addAlbumQuery->bindValue(":albumPlace", $albumDetails["albumPlace"], PDO::PARAM_STR);
        // on test et execute la requête pour afficher un message d'erreur
        if($addAlbumQuery->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getShowAlbumsGallery(){
        // utilisation des magic quote pour indiquer qu'il s'agit de champs et de table
        // on stock la reqête dans une varible ($query)
        $query = "SELECT `albumScreen`, `albumName`, `albumLocation` FROM `thp_album`";

        // on utilise la méthode query pour éxectuter notre requête
        $queryObj = $this->database->query($query);

        // on utilise la méthode fetchAll pour obtenir un tableau de notre requête
        $result = $queryObj->fetchAll(); // par défaut va retourner un tableau associatif

        return $result; // on retourne le tableau
    }

    public function getShowAlbumsAdmin(){
        // utilisation des magic quote pour indiquer qu'il s'agit de champs et de table
        // on stock la reqête dans une varible ($query)
        $query = "SELECT `album_ID`, `albumScreen`, `albumName`, `albumLocation` FROM `thp_album`";

        // on utilise la méthode query pour éxectuter notre requête
        $queryObj = $this->database->query($query);

        // on utilise la méthode fetchAll pour obtenir un tableau de notre requête
        $result = $queryObj->fetchAll(); // par défaut va retourner un tableau associatif

        return $result; // on retourne le tableau
    }
}