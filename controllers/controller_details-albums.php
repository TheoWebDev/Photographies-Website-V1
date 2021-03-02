<?php

require_once '../models/database.php';
require_once '../models/album.php';
require_once '../models/image.php';

$albumsObj = new Album;
$showAlbums = $albumsObj->getShowAlbumsAdmin();

$imageObj = new Image;
$selectAlbumsForUpload = $imageObj->getAlbumsNameForSelect();

if(isset($_GET["albumID"])){
    $album_ID = $_GET["albumID"];
    $showImage = $imageObj->showImage($album_ID);
}

if (isset($_GET['gestionAlbums'])) {

    $detailsAlbumsArray = $albumsObj->getDetailsAlbums($_GET["gestionAlbums"]);
    
} else {

    $detailsAlbumsArray = false;

}