<?php

session_start();

require_once "../models/database.php";
require_once "../models/travelbook.php";
require_once "../models/tinymce.php";

$travelbookObj = new Travelbook;
$readTravelbookIndex = $travelbookObj->showTravelbookForIndex();

$tinyObj = new TinyMCE;
$readTiny = $tinyObj->getTinymceTravelbook();