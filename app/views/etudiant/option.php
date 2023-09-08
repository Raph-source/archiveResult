<?php
$title = 'choix promotion';
$style = ASSETS_CSS.'etudiant/option.css';
require_once(HEADER);

if(isset($notif))
    echo $notif.'<br>';

?>

<a href="voir-resultat">voir resultatt</a><br>
<a href="<?php echo $archive ?>">voir archive</a><br>
<?php
require_once(FOOTER);
?>
 