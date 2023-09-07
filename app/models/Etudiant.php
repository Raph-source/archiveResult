<?php
    class Etudiant{
        private $matricule;
        private $code;
        public $promotion;
        public $bulletin;
        private $bdd;

        public function __construct(){
            $this->bdd = new PDO("mysql:host=localhost;dbname=archive", "root", '');
            $this->promotion = new Promotion();
            $this->bulletin = new Bulletin();
        }

        public function setAtribut($matricule, $code){
            $this->matricule = $matricule;
            $this->code = $code;
        }
        //la méthode vérifie si l'étudiant est dans la bdd
        public function checkEtudiant(): bool{
            $requete = $this->bdd->prepare("SELECT matricule, code FROM etudiant WHERE matricule = ? AND code = ?");
            $requete->execute([$this->matricule, $this->code]);
            $trouver = $requete->fetchAll();

            if(count($trouver) != 0)
                return true;
            return false;
        }

        public function setIdBulletin($idBulletin):void{
            $requete = $this->bdd->prepare("INSERT INTO etudiant(idBulletin) VALUES(?)");
            $requete->execute([$idBulletin]);
        }

        public function getId():int{
            $requete = $this->bdd->prepare("SELECT id FROM etudiant WHERE matricule = ? AND code = ?");
            $requete->execute([$this->matricule, $this->code]);


            return $requete->fetch()['id'];
        }

        public function checkIfEligible():bool{
            //recupreation de l'id de l'étudiant
            $id = $this->getId();

            $requete = $this->bdd->prepare("SELECT * FROM eligible WHERE idEtudiant = ?");
            $requete->execute([$id]);
            $trouver = $requete->fetchAll();

            if(count($trouver) != 0){
                return true;
            }
            return false;

        }

    }