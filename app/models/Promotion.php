<?php
class Promotion{
    private $bdd;
    private $nom;
    private $idEtudiant;
    public function __construct(){
        $this->bdd = new PDO("mysql:host=localhost;dbname=archive", "root", '');
    }
    public function setNom($nom):void{
        $this->nom = $nom;
    }
    public function checkNomPromotion():bool{
        $requette = $this->bdd->prepare("SELECT * FROM promotion WHERE nom = ?");
        $requette->execute([$this->nom]);
        $trouver = $requette->fetchAll();
        
        if(count($trouver) != 0)
            return true;
        return false;
    }

    public function setIdExcel($idExcel){
        $requette = $this->bdd->prepare("UPDATE promotion SET idExcel = ? WHERE nom = ?");
        $requette->execute([$idExcel, $this->nom]);
    }
} 