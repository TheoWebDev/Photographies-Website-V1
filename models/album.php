<?php

class Album extends DataBase{

    /**
     * Méthode permettant de un album dans la base de données.
     * 
     * @param array $albumDetails contient toutes les informations de l'album
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
        $query = "SELECT `album_ID`, `albumScreen`, `albumName`, `albumLocation` FROM `thp_album` ORDER BY `albumName`";

        // on utilise la méthode query pour éxectuter notre requête
        $queryObj = $this->database->query($query);

        // on utilise la méthode fetchAll pour obtenir un tableau de notre requête
        $result = $queryObj->fetchAll(); // par défaut va retourner un tableau associatif

        return $result; // on retourne le tableau
    }

    

    public function getShowAlbumsAdmin(){
        // utilisation des magic quote pour indiquer qu'il s'agit de champs et de table
        // on stock la reqête dans une varible ($query)
        $query = "SELECT `album_ID`, `albumScreen`, `albumName`, `albumLocation` FROM `thp_album` ORDER by `albumName`";

        // on utilise la méthode query pour éxectuter notre requête
        $queryObj = $this->database->query($query);

        // on utilise la méthode fetchAll pour obtenir un tableau de notre requête
        $result = $queryObj->fetchAll(); // par défaut va retourner un tableau associatif

        return $result; // on retourne le tableau
    }



    /**
     * Methode permettant de récupérer l'album selon son ID
     *
     * @param string $album_ID
     * @return array ou false si la requête ne passe pas
     */
    public function getDetailsAlbums(string $gestionAlbums)
    {

        // requete me permettant de recup infos user
        $query = "SELECT `album_ID`, `albumScreen`, `albumName`, `albumLocation` FROM `thp_album` WHERE id = :gestionAlbums";

        // je prepare requête à l'aide de la methode prepare pour me premunir des injections SQL 
        $getDetailsAlbumsQuery = $this->dataBase->prepare($query);

        // Je bind ma value album_ID à mon paramètre $album_ID
        $getDetailsAlbumsQuery->bindValue(":gestionAlbums", $gestionAlbums, PDO::PARAM_STR);

        // test et execution de la requête pour afficher message erreur
        if ($getDetailsAlbumsQuery->execute()) {
            // je retourne le resultat sous forme de tableau via la methode fetch car une seule ligne comme résultat
            return $getDetailsAlbumsQuery->fetch();
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