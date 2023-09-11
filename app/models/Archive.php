<?php
    class Archive{
        private $bdd;
        public function __construct(){
            $this->bdd = new PDO("mysql:host=localhost;dbname=archive", "root", '');
        }
        public function addArchive($lienArchive, $idPromotion):void{
            $requette = $this->bdd->prepare("INSERT INTO archive(lien, idPromotion) VALUES(?, ?)");
            $requette->execute([$lienArchive, $idPromotion]);
        }

        public function checkLink($lienArchive):bool{

            $requete = $this->bdd->prepare("SELECT * FROM archive WHERE lien = ?");
            $requete->execute([$lienArchive]);
            $trouver = $requete->fetchAll();

            if(count($trouver) == 0){
                return true;
            }
            return false;
        }
        public function setIdEtudiant($idEtudiant, $lienArchive){
            $requete = $this->bdd->prepare("UPDATE archive SET idEtudiant = ? WHERE lien = ?");
            $requete->execute([$idEtudiant, $lienArchive]);
        }
    }