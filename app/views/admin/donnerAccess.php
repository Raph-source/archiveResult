<?php 
$title = 'donner accés';
$style = ASSETS_CSS.'admin/donnerAccer.css';
require_once(HEADER);
?>
    <h1>page d'authentification de l'admin</h1>
    <form action="donnerAcces" method="post">
        <input type="text" name="matricule" id="" placeholder="Entrez le matricule de l'etudiant"><br>
        <input type="submit" value="valider">
    </form>
    <?php if(isset($notif)) echo $notif;?>
    
<?php 
$srcipt = ASSETS_JS.'admin/donnerAccer.js';
require_once(FOOTER); 
?>