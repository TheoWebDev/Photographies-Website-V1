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

// DELETE ALBUM
if(isset($_POST['deleteBtn'])){
    $detailsAlbums = $albumsObj->getDetailsAlbums($_POST['deleteBtn']);
    unlink("../assets/img/uploaded/".$detailsAlbums['albumScreen']);
    $deletedAlbums = $albumsObj->deleteAlbum($_POST['deleteBtn']);
    header("location: adminSettingsAlbum.php");
}

// DELETE IMAGE
if(isset($_POST['deleteBtnImage'])){
    $detailsImages = $imageObj->getDetailsImages($_POST['deleteBtnImage']);
    unlink("../assets/img/uploaded/".$detailsImages['imgUniqueID']);
    $deletedImage = $imageObj->deleteImage($_POST['deleteBtnImage']);
    header("location: adminSettingsAlbum.php");
    }

if (isset($_POST["gestionAlbums"])) {

    $detailsAlbumsArray = $albumsObj->getDetailsAlbums($_POST["gestionAlbums"]);
    
} else {

    $detailsAlbumsArray = false;

}