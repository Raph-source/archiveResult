<?php 
    $title = 'authentification';
    $style = ASSETS_CSS.'etudiant/authentification.css';
    $bootstrap = ASSETS_BOOTSTRAP;
    require_once(HEADER); 
?>

<section class="section">
        <p class="title">Esis Salama</p>
        <form action="auth-etudiant" method="post" class="form-group">
            <label for="">Matricule</label>
            <input type="text" name="matricule" class="form-control" placeholder="Entrez le matricule" id=""><br>

            <label for="">Code d'accés</label>
            <input type="password" name="code" class="form-control" placeholder="Entrez le code d'accès" id="">
            <hr>
            <input type="submit" value="Envoyer" class="btn btn-primary">
        </form>
        <?php if(isset($notif)) echo '<span class="erreurAdmin">'.$notif.'</span>';?>
</section>


<?php 
$script = ASSETS_JS.'etudiant/authentification.js';
require_once(FOOTER); 
?>