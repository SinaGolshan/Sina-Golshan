<?php

use CRUD\Controller\PersonController;

include ("loader.php");

$controller = new PersonController();
$controller->switcher(explode("?",$_SERVER['REQUEST_URI'])[0],$_REQUEST);