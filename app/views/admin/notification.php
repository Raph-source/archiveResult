<?php
$title = 'notification';
$style = ASSETS_CSS.'admin/notification.css';
require_once(HEADER);

?>
<section>
    <P>Envoie notification</P>
    <form action="formulaire-notification" method="post">
        <label for="promotion">Promotion</label><br>
        <select name="promotion" id="">
            <option value=""></option>
            <?php
                foreach($trouver as $promotion){
                    echo '<option value='.$promotion["id"].'>'.$promotion["nom"].'</option>';
                }
            ?>
        </select><br>
        <hr>
        <input type="submit" value="Notifier"><br>
        <a href="retour-option">Retour vers les options</a>
    </form>
</section>
<?php
require_once(FOOTER);
?>
 