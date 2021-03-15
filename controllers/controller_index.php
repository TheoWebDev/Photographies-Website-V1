<?php

require_once "models/database.php";
require_once "models/image.php";
require_once "models/travelbook.php";

session_start();
if (empty($_SESSION["admin"]));

$imageObj = new Image;
$showImageIndex = $imageObj->showImageSpotlightIndex();

$travelbookObj = new Travelbook;
$readTravel = $travelbookObj->getTravelbook();