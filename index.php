<?php
//inclusion de ficher config
include('config.php');


if(!isset($_GET['r']))
    $request = 'home';
else
    $request = $_GET['r'];

require(ROUTEUR);
$routeur = new Routeur($request);
$routeur->goToController();
