<?php
    class Etudiant{
        private $matricule;
        private $code;
        private $promotion;
        private $bdd;

        public function __construct(){
            $this->bdd = new PDO("mysql:host=localhost;dbname=archive", "root", '');
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
    }