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
        $requete = $this->bdd->prepare("SELECT * FROM promotion WHERE nom = ?");
        $requete->execute([$this->nom]);
        $trouver = $requete->fetchAll();
        
        if(count($trouver) != 0)
            return true;
        return false;
    }

    public function setIdExcel($idExcel){
        $requete = $this->bdd->prepare("UPDATE promotion SET idExcel = ? WHERE nom = ?");
        $requete->execute([$idExcel, $this->nom]);
    }

    public function getAllPromotion():array{
        $requete = $this->bdd->query("SELECT * FROM promotion");
        $trouver = $requete->fetchAll();

        return $trouver;
    }
} 