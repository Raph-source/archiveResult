<?php
ini_set('display_errors', 'ON');
error_reporting(E_ALL);

$host = $_SERVER['HTTP_HOST'];
$root = $_SERVER['DOCUMENT_ROOT'];

define('HOST', '//'.$host.'/archiveResult/');//lien absolu du projet
define('ROOT', $root.'/archiveResult/');//adresse absolue du projet

//adresse absolue vers les fichiers app (controllers, models, views) 
define('CONTROLLER_ADMIN', ROOT.'app/controllers/AdminController.php');
define('VIEW_ADMIN', ROOT.'app/views/admin/');

define('CONTROLLER_BULLETIN', ROOT.'app/controllers/BulletinController.php');

define('CONTROLLER_ETUDIANT', ROOT.'app/controllers/EtudiantController.php');
define('VIEW_ETUDIANT', ROOT.'app/views/etudiant/');

define('MODEL', ROOT.'app/models/');
//adresse absolue vers le header et le footer
define('HEADER', ROOT.'app/views/header.php');
define('FOOTER', ROOT.'app/views/footer.php');

//adresse absolue vers routeur
define('ROUTEUR', ROOT.'routeur/routeur.php');

//chemin absolu vers les assets css
define('ASSETS_CSS', HOST.'assets/css/');

//chemin absolu vers les assets js
define('ASSETS_JS', HOST.'assets/js/');

//chemin absolu vers l'assets boostrap 
define('ASSETS_BOOTSTRAP', HOST.'assets/bootstrap/bootstrap.css');

//chemin absolu vers les images
define('ASSETS_IMG', HOST.'assets/img/');

//chemin vers les bibiotheque
define('BIBLIOTHEQUE', ROOT.'bibliotheque/');

//chemin absolu vers les dossiers uploads
define('UPLOADS', ROOT.'uploads/');

//chemin et lien absolu vers le dossier storage
define('STORAGE', ROOT.'storage/');
define('STORAGE_LINK', HOST.'storage/');
