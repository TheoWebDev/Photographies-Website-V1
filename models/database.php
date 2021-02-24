<?php

class DataBase{
    public $database;

    public function __construct()
    {
        try {
	        $this->database = new PDO('mysql:host=localhost;dbname=thphoto;charset=utf8', 'Theo92DBqc', 'cod92highlanderdb');
        }  catch (Exception $errorMessage) {
            die('Erreur : ' . $errorMessage->getMessage());
        }
    }
}