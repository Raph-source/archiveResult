<?php 
    $title = 'authentification';
    $style = ASSETS_CSS.'etudiant/authentification.css';
    require_once(HEADER); 
?>

<section class="section">
        <p class="title">EsisSalama</p>
        <form action="authEtudiant" method="post" class="form-group">
            <label for="">Email</label>
            <input type="text" name="matricule" placeholder="Entrez le matricule" id=""><br>

            <label for="">Mot de passe</label>
            <input type="password" name="code" placeholder="Entrez le code d'accès" id=""><br>
            <input type="submit" value="Envoyer">
        </form>
</section>


<?php 
$script = ASSETS_JS.'etudiant/authentification.js';
require_once(FOOTER); 
?>