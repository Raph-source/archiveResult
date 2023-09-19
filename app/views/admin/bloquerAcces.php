<?php 
$title = 'bloquer accés';
$style = ASSETS_CSS.'admin/bloquerAcces.css';
$bootstrap = ASSETS_BOOTSTRAP;
require_once(HEADER);
?>
<section>
    <p>Bloquer Accès</p>
    <form action="formulaire-bloquer-acces" method="post" class="form-group">
        <input type="text" name="matricule" class="form-control" id="" placeholder="Entrez le matricule de l'etudiant"><br>
        <hr>
        <input type="submit" value="valider">
    </form>
    <?php if(isset($notif)) echo $notif;?>
    <a href="retour-home">Retour vers l'acceuil</a>
</section>
<?php 
$srcipt = ASSETS_JS.'admin/bloquerAccer.js';
require_once(FOOTER); 
?>