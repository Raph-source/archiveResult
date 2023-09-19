<?php 
$title = 'donner accés';
$style = ASSETS_CSS.'admin/donnerAcces.css';
$bootstrap = ASSETS_BOOTSTRAP;
require_once(HEADER);
?>
<section>
    <p>Donner Accès</p>
    <form action="formulaire-donner-acces" method="post" class="form-group">
        <input type="text" name="matricule" id="" class="form-control" placeholder="Entrez le matricule de l'etudiant"><br>
        <hr>
        <input type="submit" value="valider" class="btn btn-primary">
    </form>
    <?php if(isset($notif)) echo $notif;?>
    <a href="retour-home">Retour vers l'acceuil</a>
</section>
<?php 
$srcipt = ASSETS_JS.'admin/donnerAccer.js';
require_once(FOOTER); 
?>