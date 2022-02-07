<?php

class Image extends DataBase
{
    // Méthode permettant de rajouter une image dans la bdd

    public function addNewImage(array $newImage)
    {
        // Les deux points servent de marqueur nominatif récupérer via le formulaire, : remplace le $
        $query = "INSERT INTO `thp_img` (`imgTitle`, `imgVisibility`, `imgSpotlight`, `album_ID`, `imgUniqueID`, `imgVertical`)
        VALUES (:imgTitle, :imgVisibility, :imgSpotlight, :album_ID, :imgUniqueID, :imgVertical)";

        // Préparation de la requête avec la fonction "prepare" et on cible la variable $query
        $addNewImageQuery = $this->database->prepare($query);

        // Récupération de la requète $addNewImageQuery et on relie les valeurs avec la fonction "binhValue"
        $addNewImageQuery->bindValue(":imgTitle", $newImage["imgTitle"], PDO::PARAM_STR);
        $addNewImageQuery->bindValue(":imgVisibility", $newImage["imgVisibility"], PDO::PARAM_INT);
        $addNewImageQuery->bindValue(":imgSpotlight", $newImage["imgSpotlight"], PDO::PARAM_INT);
        $addNewImageQuery->bindValue(":album_ID", $newImage["album_ID"], PDO::PARAM_STR);
        $addNewImageQuery->bindValue(":imgUniqueID", $newImage["imgUniqueID"], PDO::PARAM_STR);
        $addNewImageQuery->bindValue(":imgVertical", $newImage["imgVertical"], PDO::PARAM_INT);

        // Test et exécution de la requête pour afficher un message d'erreur
        if ($addNewImageQuery->execute()) {
            return true;
        } else {
            return false;
        }
    }


    // Méthode permettant d'afficher TOUTES les images côté administrateur

    public function showImage($album_ID)
    {
        $query = "SELECT `img_ID`, `imgTitle`, `imgVisibility`, `imgSpotlight`, `album_ID`, `imgUniqueID`, `imgVertical`
        FROM `thp_img`
        WHERE `imgVisibility` IN (0, 1) AND `album_ID` = :album_ID";

        $showImageQuery = $this->database->prepare($query);

        $showImageQuery->bindValue('album_ID', $album_ID, PDO::PARAM_STR);

        if ($showImageQuery->execute()) {
            return $showImageQuery->fetchAll();
        } else {
            return false;
        }
    }


    // Méthode permettant d'afficher les images (sauf celles qui ne sont pas dans un album) côté visiteur

    public function showImageForVisitor($album_ID)
    {
        $query = "SELECT `img_ID`, `imgTitle`, `imgVisibility`, `imgSpotlight`, `album_ID`, `imgUniqueID`, `imgVertical`
        FROM `thp_img`
        WHERE `imgVisibility` = 1 AND `album_ID` = :album_ID
        ORDER BY `img_ID` ASC";

        $showImageVisitorQuery = $this->database->prepare($query);

        $showImageVisitorQuery->bindValue('album_ID', $album_ID, PDO::PARAM_STR);

        if ($showImageVisitorQuery->execute()) {
            return $showImageVisitorQuery->fetchAll();
        } else {
            return false;
        }
    }


    // Méthode permettant d'afficher les images à la une (Spotlight) sur la page d'accueil

    public function showImageSpotlightIndex()
    {
        $query = "SELECT `img_ID`, `imgTitle`, `imgSpotlight`, `album_ID`, `imgUniqueID`, `imgVertical`
        FROM `thp_img`
        WHERE `imgVertical` = 0
        ORDER BY RAND() LIMIT 5";

        $showImageQuery = $this->database->query($query);

        return $showImageQuery->fetchAll();
    }


    // Méthode permettant de récupérer le nom de l'album et pouvoir choisir dans le formulaire upload image

    public function getAlbumsNameForSelect()
    {
        $query = "SELECT `album_ID`, `albumName` FROM `thp_album` ORDER BY `albumName`";

        $getAlbumsNameForSelectQuery = $this->database->query($query);

        return $getAlbumsNameForSelectQuery->fetchAll();
    }


    // Méthode permettant de récupérer les informations de l'image pour les modifier

    public function getDetailsImages($imagesDetails)
    {
        $query = "SELECT `img_ID`, `imgTitle`, `imgVisibility`, `imgSpotlight`, `album_ID`, `imgUniqueID`, `imgVertical`
        FROM `thp_img`
        WHERE `img_ID` = :modifyImage";

        $getDetailsImagesQuery = $this->database->prepare($query);

        $getDetailsImagesQuery->bindValue(":modifyImage", $imagesDetails, PDO::PARAM_STR);

        if ($getDetailsImagesQuery->execute()) {
            return $getDetailsImagesQuery->fetch();
        } else {
            return false;
        }
    }

    
    // Méthode permettant de modifier les informations d'une image

    public function updateImages(array $imagesDetails)
    {
        $query = "UPDATE `thp_img` SET";
        $query .= (!empty($imagesDetails['uploadFile'])) ? " `imgUniqueID` = :uploadFile," : '';
        $query .= "`imgTitle` = :imgTitle,";
        $query .= "`imgVisibility` = :imgVisibility,";
        $query .= "`imgSpotlight` = :imgSpotlight,";
        $query .= "`imgVertical` = :imgVertical,";
        $query .= "`album_ID` = :album_ID";
        $query .= " WHERE `img_id` = :img_ID";

        $updateImagesQuery = $this->database->prepare($query);

        if (!empty($imagesDetails["uploadFile"])) {
            $updateImagesQuery->bindValue(":uploadFile", $imagesDetails["uploadFile"], PDO::PARAM_STR);
        }
        $updateImagesQuery->bindValue(":imgTitle", $imagesDetails["imgTitle"], PDO::PARAM_STR);
        $updateImagesQuery->bindValue(":imgVisibility", $imagesDetails["imgVisibility"], PDO::PARAM_STR);
        $updateImagesQuery->bindValue(":imgSpotlight", $imagesDetails["imgSpotlight"], PDO::PARAM_STR);
        $updateImagesQuery->bindValue(":imgVertical", $imagesDetails["imgVertical"], PDO::PARAM_STR);
        $updateImagesQuery->bindValue(":album_ID", $imagesDetails["album_ID"], PDO::PARAM_STR);
        $updateImagesQuery->bindValue(":img_ID", $imagesDetails["id"], PDO::PARAM_INT);
    
        if ($updateImagesQuery->execute()) {
            return true;
        } else {
            return false;
        }
    }


    // Méthode pour supprimer une image

    public function deleteImage(string $image_ID)
    {
        $query = "DELETE FROM `thp_img` WHERE `img_ID` = :id";

        $deleteImageQuery = $this->database->prepare($query);

        $deleteImageQuery->bindValue(":id", $image_ID, PDO::PARAM_STR);

        if ($deleteImageQuery->execute()) {
            return true;
        } else {
            return false;
        }
    }
}