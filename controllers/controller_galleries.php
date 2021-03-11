<?php

require_once "../models/database.php";
require_once "../models/album.php";

session_start();
if (empty($_SESSION["admin"]));

$albumObj = new Album;
$showAlbumsVisitor = $albumObj->getShowAlbumsGallery();