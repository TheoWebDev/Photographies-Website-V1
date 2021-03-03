<?php

require_once "models/database.php";
require_once "models/image.php";

$imageObj = new Image;
$showImageIndex = $imageObj->showImageSpotlightIndex();