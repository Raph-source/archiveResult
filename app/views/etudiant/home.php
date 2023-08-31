<?php
$title = 'home';
$style = ASSETS_CSS.'etudiant/home.css';
require_once(FOOTER);
if(isset($notif))
    echo $notif;

include_once('option.php');
?>

<?php
    $srcipt = ASSETS_JS.'etudiant/home.js';
?>
