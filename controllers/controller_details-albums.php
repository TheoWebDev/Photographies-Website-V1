<?php

require_once "../models/database.php";
require_once "../models/album.php";
require_once "../models/image.php";

if(isset($_GET["albumID"])){
    $album_ID = $_GET["albumID"];

    $albumsObj = new Album;
    $showAlbums = $albumsObj->getShowAlbumsAdmin();

    $albumName = $albumsObj->getAlbumNameForAlbums($album_ID);

    $imageObj = new Image;
    $selectAlbumsForUpload = $imageObj->getAlbumsNameForSelect();

    $showImage = $imageObj->showImage($album_ID);
}

if (isset($_GET["gestionAlbums"])) {

    $detailsAlbumsArray = $albumsObj->getDetailsAlbums($_GET["gestionAlbums"]);
    
} else {

    $detailsAlbumsArray = false;

}