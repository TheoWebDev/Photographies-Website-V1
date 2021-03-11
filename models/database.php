<?php

class DataBase{
    protected $database;

    private $user = "Theo92DBqc";
    private $password = "cod92highlanderdb";
    private $dbName = "thphoto";

    public function __construct()
    {   
        // try and catch pour obtenir un message d'erreur en cas de non connexion
        try {
            // Instance PDO pour nous connecter à la base de données
	        $this->database = new PDO("mysql:host=localhost;dbname=$this->dbName;charset=utf8", $this->user, $this->password);
            // Nous allons activer le mode erreur de PDO
            $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }  catch (Exception $errorMessage) {
            die('Erreur : ' . $errorMessage->getMessage());
        }
    }
}