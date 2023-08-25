<?php 
$title = 'authentification';
require_once(HEADER); 
?>
    <h1>page d'authentification de l'etudiant</h1>
    <form action="authEtudiant" method="post">
        <input type="text" name="matricule" placeholder="Entrez le matricule" id=""><br>
        <input type="password" name="code" placeholder="Entrez le code d'accès" id=""><br>
        <input type="submit" value="Envoyer">
    </form>
<?php require_once(FOOTER); ?>