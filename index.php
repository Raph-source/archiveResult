<?php
include('config.php');
$request = $_GET['r'];

require(ROUTEUR);

$routeur = new Routeur($request);
$routeur->renderController();