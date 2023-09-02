<?php
    class Bulletin{
        private $bdd;
        private $chemin;
        public function __construct(){
            $this->bdd = new PDO("mysql:host=localhost;dbname=archive", "root", '');
        }
        public function setChemin($chemin):void{
            $this->chemin = $chemin;
            $requette = $this->bdd->prepare("INSERT INTO bulletin(chemin) VALUES(?)");
            $requette->execute([$this->chemin]);
        }
    }