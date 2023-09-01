<?php 
$title = 'authentification';
$style = ASSETS_CSS.'admin/authentification.css';
$bootstrap = ASSETS_BOOTSTRAP;
require_once(HEADER);
?>

<section>
    <p class="title">Admin connexion</p>
    <form action="adminAuth" method="post" class="form-group">
        <label for="">Pseudo</label>
        <input type="text" name="pseudo" class="form-control" id="" placeholder="Entrez votre pseudo"><br>

        <label for="">Mot de passe</label>
        <input type="password" name="pwd" class="form-control" id="" placeholder="Entrez le mot de passe">
        <hr>
        <input type="submit" value="valider" class="btn btn-primary">
    </form>
    <?php if(isset($notif)) echo '<span class="erreurAdmin">'.$notif.'</span>';?>


</section>
<?php 
$srcipt = ASSETS_CSS.'admin/authentification.js';
require_once(FOOTER); 
?>