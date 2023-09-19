<?php 
$title = 'bloquer accés';
$style = ASSETS_CSS.'admin/bloquerAcces.css';
require_once(HEADER);
?>
    <form action="formulaire-bloquer-acces" method="post">
        <input type="text" name="matricule" id="" placeholder="Entrez le matricule de l'etudiant"><br>
        <input type="submit" value="valider">
    </form>
    <?php if(isset($notif)) echo $notif;?>
    <a href="retour-home">Retour vers l'acceuil</a>
<?php 
$srcipt = ASSETS_JS.'admin/bloquerAccer.js';
require_once(FOOTER); 
?>