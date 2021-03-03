<?php

class Image extends DataBase
{
    // Méthode permettant de rajouter une image dans la bdd

    public function addNewImage(array $newImage)
    {   
        // Les deux points servent de marqueur nominatif récupérer via le formulaire, : remplace le $
        $query = "INSERT INTO `thp_img` (`imgTitle`, `imgVisibility`, `imgSpotlight`, `album_ID`, `imgUniqueID`)
        VALUES (:imgTitle, :imgVisibility, :imgSpotlight, :album_ID, :imgUniqueID)";

        // Préparation de la requête avec la fonction "prepare" et on cible la variable $query
        $addNewImageQuery = $this->database->prepare($query);

        // Récupération de la requète $addNewImageQuery et on relie les valeurs avec la fonction "binhValue"
        $addNewImageQuery->bindValue(":imgTitle", $newImage["imgTitle"], PDO::PARAM_STR);
        $addNewImageQuery->bindValue(":imgVisibility", $newImage["imgVisibility"], PDO::PARAM_INT);
        $addNewImageQuery->bindValue(":imgSpotlight", $newImage["imgSpotlight"], PDO::PARAM_INT);
        $addNewImageQuery->bindValue(":album_ID", $newImage["album_ID"], PDO::PARAM_STR);
        $addNewImageQuery->bindValue(":imgUniqueID", $newImage["imgUniqueID"], PDO::PARAM_STR);
        
        // Test et exécution de la requête pour afficher un message d'erreur
        if ($addNewImageQuery->execute()) {
            return true;
        } else {
            return false;
        }
    }


    // Méthode permettant de récupérer le nom de l'album et pouvoir choisir dans le formulaire upload image

    public function getAlbumsNameForSelect()
    {
        $query = "SELECT `album_ID`, `albumName` FROM `thp_album` ORDER BY `albumName`";

        $getAlbumsNameForSelectQuery = $this->database->query($query);

        return $getAlbumsNameForSelectQuery->fetchAll();
    }

    
    // Méthode permettant d'afficher TOUTES les images côté administrateur

    public function showImage($album_ID)
    {
        $query = "SELECT `img_ID`, `imgTitle`, `imgVisibility`, `imgSpotlight`, `album_ID`, `imgUniqueID`
        FROM `thp_img`
        WHERE `imgVisibility` IN (0, 1) AND `album_ID` = :album_ID
        ORDER BY `img_ID` DESC";

        $showImageQuery = $this->database->prepare($query);

        $showImageQuery->bindValue('album_ID', $album_ID, PDO::PARAM_STR);

        if($showImageQuery->execute()){
            return $showImageQuery->fetchAll();
        } else {
            return false;
        }
    }

    
    // Méthode permettant d'afficher les images (sauf celles qui ne sont pas dans un album) côté visiteur

    public function showImageForVisitor($album_ID)
    {
        $query = "SELECT `img_ID`, `imgTitle`, `imgVisibility`, `imgSpotlight`, `album_ID`, `imgUniqueID`
        FROM `thp_img`
        WHERE `imgVisibility` = 1 AND `album_ID` = :album_ID
        ORDER BY `img_ID` DESC";

        $showImageVisitorQuery = $this->database->prepare($query);

        $showImageVisitorQuery->bindValue('album_ID', $album_ID, PDO::PARAM_STR);

        if($showImageVisitorQuery->execute()){
            return $showImageVisitorQuery->fetchAll();
        } else {
            return false;
        }
    }


    // Méthode permettant d'afficher les images à la une (Spotlight) sur la page d'accueil

    public function showImageSpotlightIndex()
    {
        $query = "SELECT `img_ID`, `imgTitle`, `imgSpotlight`, `album_ID`, `imgUniqueID`
        FROM `thp_img`
        WHERE `imgSpotlight` = 1
        ORDER BY `img_ID` DESC LIMIT 5";

        $showImageQuery = $this->database->query($query);

        return $showImageQuery->fetchAll();
    }

}