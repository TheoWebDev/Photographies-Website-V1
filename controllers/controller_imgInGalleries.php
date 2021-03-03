<?php

require_once "../models/database.php";
require_once "../models/album.php";
require_once "../models/image.php";

$imageObj = new Image;

if(isset($_GET["albumID"])){
    $album_ID = $_GET["albumID"];
    $showImageVisitor = $imageObj->showImageForVisitor($album_ID);
    $albumObj = new Album;

    $albumName = $albumObj->getAlbumNameForAlbums($album_ID);
}