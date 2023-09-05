<?php
$title = 'choix promotion';
$style = ASSETS_CSS.'etudiant/choixPromotion.css';
require_once(HEADER);

if(isset($notif))
    echo $notif;

foreach($trouver as $promotion){
    echo '<a href="promotion?id='.$promotion["id"].'" class="'.$promotion["nom"].'">'.$promotion["nom"].'</a><br>';
}
?>

<?php
require_once(FOOTER);
?>
 