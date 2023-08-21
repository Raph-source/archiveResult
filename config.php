<?php
ini_set('display_errors', 'ON');
error_reporting(E_ALL);

$host = $_SERVER['HTTP_HOST'];
$root = $_SERVER['DOCUMENT_ROOT'];

define('HOST', 'http://'.$host.'/archiveResult/');
define('ROOT', $root.'/archiveResult/');

define('CONTROLLER_ADMIN', ROOT.'controllers/Admin.php');
define('MODEL_ADMIN', ROOT.'models/Admin.php');
define('VIEW_ADMIN', ROOT.'views/admin/');

define('CONTROLLER_BULLETIN', ROOT.'controllers/Bulletin.php');

define('CONTROLLER_ETUDIANT', ROOT.'controllers/Etudiant.php');
define('MODEL_ETUDIANT', ROOT.'models/Etudiant.php');
define('VIEW_ETUDIANT', ROOT.'views/admin/');

define('ROUTEUR', ROOT.'routeur/routeur.php');

define('ASSET', HOST.'assets/');