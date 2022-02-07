<?php

require_once "../models/database.php";
require_once "../models/album.php";

session_start();

$albumObj = new Album;
$showAlbumsVisitor = $albumObj->getShowAlbumsGallery();