<?php
$title = 'home';
require_once(HEADER);
?>
<h1>Publication du résultat</h1>
<form action="publication-resultat" method="post" enctype="multipart/form-data">
    <label for="fichierExcel"></label>
    <input type="file" name="fichierExcel" id=""><br>
    <input type="submit" value="publier"><br>
    <?php if(isset($notif)) echo $notif; ?>
</form>
<?php
require_once(FOOTER);
?>