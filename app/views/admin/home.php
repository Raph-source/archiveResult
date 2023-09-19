<?php
$title = 'home';
$style = ASSETS_CSS.'admin/home.css';
require_once(HEADER);

if(isset($notif))
    echo $notif;
?>
<section class="header">
    <div class="nom_connecte">
        <p>Admin <strong>Pseudo</strong> est connecté</pack>
    </div>
    <div class="deconnexion">
        <a href="#">Deconnexion</a>
    </div>
</section>
<?php
include_once('option.php');
?>
<?php
require_once(FOOTER);
?>
 