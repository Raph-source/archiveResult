<?php
include('config.php');


if(key_exists('r', $_GET)){
    $request = $_GET['r'];

    require(ROUTEUR);

    $routeur = new Routeur($request);
    $routeur->renderController();
}
else{
    echo 'Erreur 404';
}
