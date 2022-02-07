<?php

session_start();

require_once "models/database.php";
require_once "models/image.php";
require_once "models/travelbook.php";

$imageObj = new Image;
$showImageIndex = $imageObj->showImageSpotlightIndex();

$travelbookObj = new Travelbook;
$readTravelbookIndex = $travelbookObj->showTravelbookForIndex();