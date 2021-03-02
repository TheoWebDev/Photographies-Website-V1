<?php

class DataBase{
    protected $database;

    private $user = "Theo92DBqc";
    private $password = "cod92highlanderdb";
    private $dbName = "thphoto";

    public function __construct()
    {
        try {
	        $this->database = new PDO("mysql:host=localhost;dbname=$this->dbName;charset=utf8", $this->user, $this->password);
        }  catch (Exception $errorMessage) {
            die('Erreur : ' . $errorMessage->getMessage());
        }
    }
}