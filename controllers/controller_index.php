<?php

require_once "models/database.php";
require_once "models/image.php";

session_start();
if (empty($_SESSION["admin"]));

$imageObj = new Image;
$showImageIndex = $imageObj->showImageSpotlightIndex();