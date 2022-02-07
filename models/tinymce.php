<?php

class TinyMCE extends DataBase{

    // Méthode permettant de rajouter un article dans la bdd

    public function addTinymceTravelbook(array $tinymceDetails)
    {
        // Les deux points servent de marqueur nominatif récupérer via le formulaire, : remplace le $
        $query = "INSERT INTO `thp_tinymce` (`tinyName`, `tinyContent`, `travelbook_ID`)
        VALUES (:tinyName, :tinyContent, :travelbook_ID)";

        // Préparation de la requête avec la fonction "prepare" et on cible la variable $query
        $addtinymceQuery = $this->database->prepare($query);

        // Récupération de la requète $addNewImageQuery et on relie les valeurs avec la fonction "binhValue"
        $addtinymceQuery->bindValue(":tinyName", $tinymceDetails["tinyName"], PDO::PARAM_STR);
        $addtinymceQuery->bindValue(":tinyContent", $tinymceDetails["tinyContent"], PDO::PARAM_STR);
        $addtinymceQuery->bindValue(":travelbook_ID", $tinymceDetails["travelbook_ID"], PDO::PARAM_INT);

        // Test et exécution de la requête pour afficher un message d'erreur
        if ($addtinymceQuery->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Méthode pour afficher les récits sur la page administrateur et visiteur

    public function getTinymceTravelbook(){
        // utilisation des magic quote pour indiquer qu'il s'agit de champs et de table
        // on stock la reqête dans une varible ($query)
        $query = "SELECT `tiny_ID`, `tinyName`, `tinyContent` FROM `thp_tinymce`";

        // on utilise la méthode query pour éxectuter notre requête
        $queryObj = $this->database->query($query);

        // on utilise la méthode fetchAll pour obtenir un tableau de notre requête
        $result = $queryObj->fetchAll(); // par défaut va retourner un tableau associatif

        return $result; // on retourne le tableau
    }

}