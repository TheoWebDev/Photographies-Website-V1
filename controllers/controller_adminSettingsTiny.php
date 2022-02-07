<?php

session_start();
if (empty($_SESSION["admin"])){
    header("Location: ../vues/adminConnexion.php");
    exit;
}

require_once "../models/database.php";
require_once "../models/tinymce.php";

$tinyObj = new TinyMCE;
$readTiny = $tinyObj->getTinymceTravelbook();