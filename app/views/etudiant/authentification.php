<?php 
$title = 'authentification';
require_once(HEADER); 
?>
    <h1>page d'authentification de l'etudiant</h1>
    <form action="authentification" method="post">
        <input type="text" name="matricule" placeholder="Entrez le matricule" id=""><br>
        <select name="promotion" id="">
            <option value=""></option>
            <option value="GL">GL</option>
        </select><br>
        <input type="submit" value="Envoyer">
    </form>
<?php require_once(FOOTER); ?>