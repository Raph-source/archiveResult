<?php
ini_set('display_errors', 'ON');
error_reporting(E_ALL);

$host = $_SERVER['HTTP_HOST'];
$root = $_SERVER['DOCUMENT_ROOT'];

define('HOST', 'http://'.$host.'/archiveResult/');//lien absolu du projet
define('ROOT', $root.'/archiveResult/');//adresse absolue du projet

//adresse absolue vers les fichiers app (controllers, models, views) 
define('CONTROLLER_ADMIN', ROOT.'app/controllers/Admin.php');
define('MODEL_ADMIN', ROOT.'app/models/Admin.php');
define('VIEW_ADMIN', ROOT.'app/views/admin/');

define('CONTROLLER_BULLETIN', ROOT.'app/controllers/Bulletin.php');

define('CONTROLLER_ETUDIANT', ROOT.'app/controllers/Etudiant.php');
define('MODEL_ETUDIANT', ROOT.'app/models/Etudiant.php');
define('VIEW_ETUDIANT', ROOT.'app/views/admin/');

//adresse absolue vers routeur
define('ROUTEUR', ROOT.'routeur/routeur.php');

//lien absolue vers les assets (css, js, img)
define('ASSET', HOST.'assets/');