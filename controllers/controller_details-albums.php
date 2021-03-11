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

// nous controllons si nous avons appuyé sur notre bouton delete via la methode POST
if(isset($_POST['deleteBtn'])){
    if($albumsObj->deleteAlbum($_POST['deleteBtn'])){
        header("location: adminSettingsAlbum.php");
    } else {
        $messages['delete'] = "L'album n'a pas pu être supprimé";
    }
}

if (isset($_POST["gestionAlbums"])) {

    $detailsAlbumsArray = $albumsObj->getDetailsAlbums($_POST["gestionAlbums"]);
    
} else {

    $detailsAlbumsArray = false;

}