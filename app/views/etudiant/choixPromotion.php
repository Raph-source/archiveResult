<?php
$title = 'choix promotion';
$style = ASSETS_CSS.'etudiant/choixPromotion.css';
$bootstrap = ASSETS_BOOTSTRAP;
require_once(HEADER);

if(isset($notif))
    echo $notif;
?>

<section>
    <p>Choix Promotion</p>
<?php
foreach($trouver as $promotion){
    echo '<a href="promotion?id='.$promotion["id"].'" class="'.$promotion["nom"].'">'.$promotion["nom"].'</a><br>';
}
?>
</section>

<div>
    <p>Archive Result 2023</p>
</div>
<?php
require_once(FOOTER);
?>
 