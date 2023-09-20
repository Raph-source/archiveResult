<?php
$title = 'choix promotion';
$style = ASSETS_CSS.'etudiant/option.css';
require_once(HEADER);

if(isset($notif))
    echo $notif.'<br>';

?>
<section>
    <a href="voir-resultat">voir resultatt</a>
    <a href="<?php echo $archive ?>">voir archive</a>
</section>
<div>
    <p>Archive Result 2023</p>
</div>

<?php
require_once(FOOTER);
?>
 