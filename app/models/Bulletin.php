<?php
    class Bulletin{
        private $bdd;
        public function __construct(){
            $this->bdd = new PDO("mysql:host=localhost;dbname=archive", "root", '');
        }
        public function addLink($lienArchive):void{
            $requette = $this->bdd->prepare("INSERT INTO bulletin(lien) VALUES(?)");
            $requette->execute([$lienArchive]);
        }

        public function checkLink($lienArchive):bool{

            $requete = $this->bdd->prepare("SELECT * FROM bulletin WHERE lien = ?");
            $requete->execute([$lienArchive]);
            $trouver = $requete->fetchAll();

            if(count($trouver) == 0){
                return true;
            }
            return false;
        }
        public function getId($lienArchive):int{
            $requete = $this->bdd->prepare("SELECT id FROM bulletin WHERE lien = ?");
            $requete->execute([$lienArchive]);

            return $requete->fetch()['id'];
        }
    }