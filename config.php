<?php
ini_set('display_errors', 'ON');
error_reporting(E_ALL);

$host = $_SERVER['HTTP_HOST'];
$root = $_SERVER['DOCUMENT_ROOT'];

define('HOST', 'http://'.$host.'/archiveResult/');
define('ROOT', $root.'/archiveResult/');

define('CONTROLLER_ADMIN', ROOT.'controllers/admin/');
define('MODEL_ADMIN', ROOT.'models/admin/');
define('VIEW_ADMIN', ROOT.'views/admin/');

define('CONTROLLER_ETUDIANT', ROOT.'controllers/etudiant/');
define('MODEL_ETUDIANT', ROOT.'models/etudiant/');
define('VIEW_ETUDIANT', ROOT.'views/etudiant/');

define('ROUTEUR', ROOT.'routeur/routeur.php');

define('ASSET', HOST.'assets/');