<?php
ini_set('display_errors', 'ON');
error_reporting(E_ALL);

$host = $_SERVER['HTTP_HOST'];
$root = $_SERVER['DOCUMENT_ROOT'];

define('HOST', 'https://'.$host.'/archiveResult/');//lien absolu du projet
define('ROOT', $root.'/archiveResult/');//adresse absolue du projet

//adresse absolue vers les fichiers app (controllers, models, views) 
define('CONTROLLER_ADMIN', ROOT.'app/controllers/AdminController.php');
define('MODEL_ADMIN', ROOT.'app/models/Admin.php');
define('VIEW_ADMIN', ROOT.'app/views/admin/');

define('CONTROLLER_BULLETIN', ROOT.'app/controllers/BulletinController.php');

define('CONTROLLER_ETUDIANT', ROOT.'app/controllers/EtudiantController.php');
define('MODEL_ETUDIANT', ROOT.'app/models/Etudiant.php');
define('VIEW_ETUDIANT', ROOT.'app/views/etudiant/');

//adresse absolue vers le header et le footer
define('HEADER', ROOT.'app/views/header.php');
define('FOOTER', ROOT.'app/views/footer.php');

//adresse absolue vers routeur
define('ROUTEUR', ROOT.'routeur/routeur.php');

//chemin absolu vers les assets css
define('ASSETS_CSS', HOST.'assets/css/');

//chemin absolu vers les assets js
define('ASSETS_JS', HOST.'assets/js/');