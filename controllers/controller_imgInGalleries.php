<?php

session_start();
if (empty($_SESSION["admin"]));

require_once "../models/database.php";
require_once "../models/album.php";
require_once "../models/image.php";

$imageObj = new Image;

if(isset($_GET["albumID"])){
    $album_ID = $_GET["albumID"];
    $showImageVisitor = $imageObj->showImageForVisitor($album_ID);
    $albumObj = new Album;

    $albumsName = $albumObj->getAlbumNameForAlbumsVisitor($album_ID);
}