<?php
$title = 'home';
$style = ASSETS_CSS.'admin/publication.css';
$bootstrap = ASSETS_BOOTSTRAP;
require_once(HEADER);
?>

<section>
    <p>Publication du résultat</p>
    <form action="publication-resultat" method="post" class="form-groupe" enctype="multipart/form-data">
        <label for="fichierExcel">Choisissez un fichier</label>
        <input  type="file" name="fichierExcel" id="" class="form-control">

        <hr>

        <input  type="submit" value="Publier" class="btn btn-primary">
        <a href="retour-option">Retour sur les options</a>
        <?php if(isset($notif)) echo $notif; ?>
    </form>
</section>
<?php
require_once(FOOTER);
?>