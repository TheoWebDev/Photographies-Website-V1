<?php
class Album extends DataBase
{
    // Méthode permettant de rajouter un album dans la base de données

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
        if ($addAlbumQuery->execute()) {
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


    // Méthode pour récupérer et afficher le nom de l'album côté administrateur

    public function getAlbumNameForAlbums($album_ID)
    {
        $query = "SELECT `album_ID`, `albumScreen`, `albumName`, `albumLocation` FROM `thp_album` WHERE `album_ID` = :album_ID";

        $showAlbumNameQuery = $this->database->prepare($query);

        $showAlbumNameQuery->bindValue('album_ID', $album_ID, PDO::PARAM_STR);

        if ($showAlbumNameQuery->execute()) {
            return $showAlbumNameQuery->fetch();
        } else {
            return false;
        }
    }

    // Méthode permettant d'afficher le nom de l'album côté visiteur

    public function getAlbumNameForAlbumsVisitor($album_ID)
    {
        $query = "SELECT `album_ID`, `albumName`, `albumLocation` FROM `thp_album` WHERE `album_ID` = :album_ID";

        $showAlbumNameQuery = $this->database->prepare($query);

        $showAlbumNameQuery->bindValue('album_ID', $album_ID, PDO::PARAM_STR);

        if ($showAlbumNameQuery->execute()) {
            return $showAlbumNameQuery->fetch();
        } else {
            return false;
        }
    }

    // $variableQuery->debugDumpParams();


    // Méthode permettant de récupérer l'album selon l'ID

    public function getDetailsAlbums(int $gestionAlbums)
    {
        $query = "SELECT `album_ID`, `albumScreen`, `albumName`, `albumLocation` FROM `thp_album` WHERE album_ID = :gestionAlbums";

        $getDetailsAlbumsQuery = $this->database->prepare($query);

        $getDetailsAlbumsQuery->bindValue(":gestionAlbums", $gestionAlbums, PDO::PARAM_STR);

        if ($getDetailsAlbumsQuery->execute()) {
            return $getDetailsAlbumsQuery->fetch();
        } else {
            return false;
        }
    }


    // Méthode pour modifier les informations de l'album

    public function updateAlbum(array $albumDetails)
    {
        // Condition dans la requête pour ne pas re upload l'image lors des modifications
        $query = "UPDATE `thp_album` SET";
        $query .= (!empty($albumDetails["uploadFile"])) ? " `albumScreen` = :uploadFile," : '';
        $query .= " `albumName` = :albumName,";
        $query .= " `albumLocation` = :albumLocation";
        $query .= " WHERE `album_ID` = :album_ID";

        $updateAlbumsQuery = $this->database->prepare($query);

        if (!empty($albumDetails["uploadFile"])) {
            $updateAlbumsQuery->bindValue(":uploadFile", $albumDetails["uploadFile"], PDO::PARAM_STR);
        }
        $updateAlbumsQuery->bindValue(":albumName", $albumDetails["albumName"], PDO::PARAM_STR);
        $updateAlbumsQuery->bindValue(":albumLocation", $albumDetails["albumLocation"], PDO::PARAM_STR);
        $updateAlbumsQuery->bindValue(":album_ID", $albumDetails["id"], PDO::PARAM_STR);

        if ($updateAlbumsQuery->execute()) {
            return true;
        } else {
            return false;
        }
    }


    // Méthode pour supprimer un album

    public function deleteAlbum(string $albumID)
    {
        $query = "DELETE FROM `thp_album` WHERE `album_ID` = :id";

        $deleteAlbumQuery = $this->database->prepare($query);

        $deleteAlbumQuery->bindValue(':id', $albumID, PDO::PARAM_STR);

        if ($deleteAlbumQuery->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
