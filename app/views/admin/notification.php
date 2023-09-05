<?php
$title = 'notification';
$style = ASSETS_CSS.'admin/home.css';
require_once(HEADER);

?>
<form action="formulaire-notification" method="post">
    <label for="promotion">Promotion</label>
    <select name="promotion" id="">
        <option value=""></option>
        <?php
            foreach($trouver as $promotion){
                echo '<option value='.$promotion["id"].'>'.$promotion["nom"].'</option>';
            }
        ?>
    </select><br>
    <input type="submit" value="notifier"><br>
    <a href="retour-option">Retour vers les options</a>
</form>
<?php
require_once(FOOTER);
?>
 