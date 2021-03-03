<?php

class Album extends DataBase
{
    // Méthode permettant de rajouter un album dans la bdd

    public function addAlbum(array $albumDetails)
    {   
        // Stockage de la requête dans une varible $query
        $query = "INSERT INTO `thp_album` (`albumScreen`, `albumName`, `albumLocation`)
        VALUES (:imgAlbum, :titleAlbum, :albumPlace)";

        // Préparation de la requête avec la fonction prepare (premunir des injections SQL) et on cible la variable $query
        $addAlbumQuery = $this->database->prepare($query);

        // Récupération de la requète $addAlbumQuery et on relie les valeurs avec la fonction "binhValue"
        $addAlbumQuery->bindValue(":imgAlbum", $albumDetails["imgAlbum"], PDO::PARAM_STR);
        $addAlbumQuery->bindValue(":titleAlbum", $albumDetails["titleAlbum"], PDO::PARAM_STR);
        $addAlbumQuery->bindValue(":albumPlace", $albumDetails["albumPlace"], PDO::PARAM_STR);

        // Test et exécution de la requête pour afficher un message d'erreur
        if($addAlbumQuery->execute()){
            return true;
        } else {
            return false;
        }
    }


    // Méthode pour afficher les albums sur la page Galerie pour les visiteurs

    public function getShowAlbumsGallery()
    {
        $query = "SELECT `album_ID`, `albumScreen`, `albumName`, `albumLocation` FROM `thp_album` ORDER BY `albumName`";

        // Utilisation de la méthode query pour exécuter la requête
        $queryObj = $this->database->query($query);

        // Utilisation de la méthode fetchAll pour obtenir un tableau de la requête
        $result = $queryObj->fetchAll(); // Retourne un tableau associatif par défaut

        return $result; // Retourne le tableau
    }


    // Méthode pour afficher les albums sur la page administrateur

    public function getShowAlbumsAdmin()
    {
        $query = "SELECT `album_ID`, `albumScreen`, `albumName`, `albumLocation` FROM `thp_album` ORDER by `albumName`";

        $queryObj = $this->database->query($query);

        $result = $queryObj->fetchAll();

        return $result;
    }


    // Méthode pour récupérer et afficher le nom de l'album côté administrateur et visiteur

    public function getAlbumNameForAlbums($album_ID)
    {
        $query = "SELECT `album_ID`, `albumName`, `albumLocation` FROM `thp_album` WHERE `album_ID` = :album_ID";

        $showAlbumNameQuery = $this->database->prepare($query);

        $showAlbumNameQuery->bindValue('album_ID', $album_ID, PDO::PARAM_STR);

        if($showAlbumNameQuery->execute()){
            return $showAlbumNameQuery->fetchAll();
        } else {
            return false;
        }
    }

    
    // Méthode permettant de récupérer l'album selon l'ID

    public function getDetailsAlbums(string $gestionAlbums)
    {
        $query = "SELECT `album_ID`, `albumScreen`, `albumName`, `albumLocation` FROM `thp_album` WHERE id = :gestionAlbums";

        $getDetailsAlbumsQuery = $this->dataBase->prepare($query);

        $getDetailsAlbumsQuery->bindValue(":gestionAlbums", $gestionAlbums, PDO::PARAM_STR);

        if ($getDetailsAlbumsQuery->execute()) {
            return $getDetailsAlbumsQuery->fetch();
        } else {
            return false;
        }
    }


    // Méthode pour les informations de l'album

    public function updateAlbum(array $albumsDetails)
    {
        // requete me permettant de modifier mon user
        $query = "UPDATE `thp_album` SET
        `albumScreen` = :imgAlbum,
        `albumName` = :titleAlbum,
        `albumLocation` = :albumPlace
        WHERE id = :album_ID";

        // je prepare requête à l'aide de la methode prepare pour me premunir des injections SQL 
        $updateAlbumsQuery = $this->dataBase->prepare($query);

        // On bind les values pour renseigner les marqueurs nominatifs
        $updateAlbumsQuery->bindValue(":imgAlbum", $albumsDetails["imgAlbum"], PDO::PARAM_STR);
        $updateAlbumsQuery->bindValue(":titleAlbum", $albumsDetails["titleAlbum"], PDO::PARAM_STR);
        $updateAlbumsQuery->bindValue(":albumPlace", $albumsDetails["albumPlace"], PDO::PARAM_STR);

        if ($updateAlbumsQuery->execute()) {
            return true;
        } else {
            return false;
        }
    }
}