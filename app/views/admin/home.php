<?php
$title = 'home';
$style = ASSETS_CSS.'admin/home.css';
require_once(HEADER);

if(isset($notif))
    echo $notif;
?>
<section class="header">
    <div class="nom_connecte">
        <p><strong><?php if (isset($_SESSION['pseudoAdmin']))echo ucfirst($_SESSION['pseudoAdmin']);?></strong> est connecté</pack>
    </div>
    <div class="deconnexion">
        <a href="deconnexion-admin">Deconnexion</a>
    </div>
</section>
<?php
include_once('option.php');
?>
<?php
$jquery = ASSETS_JS.'jquery-3.7.0.min.js';
$script = ASSETS_JS.'admin/home.js';
require_once(FOOTER);
?>
 