<?php

require_once "../models/database.php";
require_once "../models/image.php";

if(isset($_GET["imageID"])){

    $image_ID = $_GET["imageID"];
}

if (isset($_POST["modifyImage"])) {

    $detailsAlbumsArray = $albumsObj->getDetailsImages($_POST["modifyImage"]);
    
} else {

    $detailsAlbumsArray = false;

}