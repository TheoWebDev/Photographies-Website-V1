<?php

require_once "../models/database.php";
require_once "../models/album.php";

$albumObj = new Album;
$showAlbumsVisitor = $albumObj->getShowAlbumsGallery();