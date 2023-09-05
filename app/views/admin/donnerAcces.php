<?php 
$title = 'donner accés';
$style = ASSETS_CSS.'admin/donnerAcces.css';
require_once(HEADER);
?>
    <form action="formulaire-donner-acces" method="post">
        <input type="text" name="matricule" id="" placeholder="Entrez le matricule de l'etudiant"><br>
        <input type="submit" value="valider">
    </form>
    <?php if(isset($notif)) echo $notif;?>
    
<?php 
$srcipt = ASSETS_JS.'admin/donnerAccer.js';
require_once(FOOTER); 
?>