<?php

class Image extends DataBase
{

    /**
     * Méthode permettant de rajouter un patient dans notre base de données.
     * 
     */

    public function addNewImage(array $newImage)
    {   // :lastname les deux points servent de marqueur nominatif récupérer via le formulaire, : remplace le $
        $query = "INSERT INTO `thp_img` (`imgTitle`, `imgVisibility`, `imgSpotlight`, `album_ID`, `imgUniqueID`)
        VALUES (:imgTitle, :imgVisibility, :imgSpotlight, :album_ID, :imgUniqueID)";
        // Préparation de la requête avec la fonction "prepare" et on cible $query
        $addNewImageQuery = $this->database->prepare($query);
        // On récupère la requète $addPatientQuery et on relie les valeurs avec la fonction "binhValue"
        $addNewImageQuery->bindValue(":imgTitle", $newImage["imgTitle"], PDO::PARAM_STR);
        $addNewImageQuery->bindValue(":imgVisibility", $newImage["imgVisibility"], PDO::PARAM_INT);
        $addNewImageQuery->bindValue(":imgSpotlight", $newImage["imgSpotlight"], PDO::PARAM_INT);
        $addNewImageQuery->bindValue(":album_ID", $newImage["album_ID"], PDO::PARAM_STR);
        $addNewImageQuery->bindValue(":imgUniqueID", $newImage["imgUniqueID"], PDO::PARAM_STR);
        
        // on test et execute la requête pour afficher un message d'erreur
        if ($addNewImageQuery->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Methode permettant de récupérer le nom de l'album pour le mettre dans le select de l'upload image
     *
     * @param array $appointmentDetails
     * @return boolean Permet de savoir si la requête est bien passé
     */

    public function getAlbumsNameForSelect()
    {
        // Nous stockons ici notre requête pour permettre d'obtenir tous nos patients
        $query = "SELECT `album_ID`, `albumName` FROM `thp_album` ORDER BY `albumName`";

        // Nous executons notre requête à l'aide de la méthode query
        $getAllPatientsQuery = $this->database->query($query);

        // j'effectue la methode fetchAll pour obtenir le resultat sous forme de tableau
        return $getAllPatientsQuery->fetchAll();
    }

    public function showImage($album_ID)
    {
        // Nous stockons ici notre requête pour permettre d'obtenir tous nos patients
        $query = "SELECT * FROM `thp_img` WHERE `album_ID` = :album_ID";

        // Nous executons notre requête à l'aide de la méthode query
        $showImageQuery = $this->database->prepare($query);
        $showImageQuery->bindValue('album_ID', $album_ID, PDO::PARAM_STR);
        if($showImageQuery->execute()){
            return $showImageQuery->fetchAll();
        } else {
            return false;
        }

        // j'effectue la methode fetchAll pour obtenir le resultat sous forme de tableau
        return $showImageQuery->fetchAll();
    }


    public function showImageForVisitor($album_ID)
    {
        // Nous stockons ici notre requête pour permettre d'obtenir tous nos patients
        $query = "SELECT * FROM `thp_img` WHERE `album_ID` = :album_ID";

        // Nous executons notre requête à l'aide de la méthode query
        $showImageVisitorQuery = $this->database->prepare($query);
        $showImageVisitorQuery->bindValue('album_ID', $album_ID, PDO::PARAM_STR);
        if($showImageVisitorQuery->execute()){
            return $showImageVisitorQuery->fetchAll();
        } else {
            return false;
        }

        // j'effectue la methode fetchAll pour obtenir le resultat sous forme de tableau
        return $showImageVisitorQuery->fetchAll();
    }
}