<?php
    class Bulletin{
        private $bdd;
        public function __construct(){
            $this->bdd = new PDO("mysql:host=localhost;dbname=archive", "root", '');
        }
        public function addChemin($chemin):void{
            $requette = $this->bdd->prepare("INSERT INTO bulletin(chemin) VALUES(?)");
            $requette->execute([$chemin]);
        }

        public function checkChemin($chemin):bool{

            $requete = $this->bdd->prepare("SELECT * FROM bulletin WHERE chemin = ?");
            $requete->execute([$chemin]);
            $trouver = $requete->fetchAll();

            if(count($trouver) == 0){
                return true;
            }
            return false;
        }
        public function getId($chemin):int{
            $requete = $this->bdd->prepare("SELECT id FROM bulletin WHERE chemin = ?");
            $requete->execute([$chemin]);

            return $requete->fetch()['id'];
        }
    }