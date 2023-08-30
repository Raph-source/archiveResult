<?php 
$title = 'authentification';
$style = ASSETS_CSS.'admin/authentification.css';
require_once(HEADER);
?>
    <h1>page d'authentification de l'admin</h1>
    <form action="adminAuth" method="post">
        <input type="text" name="pseudo" id="" placeholder="Entrez votre pseudo"><br>
        <input type="password" name="pwd" id="" placeholder="Entrez le mot de passe"><br>
        <input type="submit" value="valider">
    </form>
    <?php if(isset($notif)) echo $notif;?>
    
<?php 
$srcipt = ASSETS_CSS.'admin/authentification.js';
require_once(FOOTER); 
?>