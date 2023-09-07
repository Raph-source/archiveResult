<?php
$title = 'choix promotion';
$style = ASSETS_CSS.'etudiant/option.css';
require_once(HEADER);

if(isset($notif))
    echo $notif.'<br>';

?>

<a href="voir-resultat">voir resultatt</a><br>
<a href="//localhost/archiveResult/storage/test.pdf">voir archive</a><br>
<a href="donnerAcces">Donner l'accès à un étudiant</a><br>
<a href="bloquerAcces">Bloquer l'accès à un étudiant</a><br>

<?php
require_once(FOOTER);
?>
 