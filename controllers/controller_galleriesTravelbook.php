<?php

require_once "../models/database.php";
require_once "../models/travelbook.php";

$travelbookObj = new Travelbook;
$readTravel = $travelbookObj->getTravelbook();