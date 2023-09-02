<?php
    require_once(MODEL.'Excel.php');
    require_once(MODEL.'Promotion.php');
    class Admin{
        private $pseudo;
        private $pwd;
        private $bdd;
        public $promotion;
        public $excel;

        public function __construct(){
            $this->bdd = new PDO("mysql:host=localhost;dbname=archive", "root", '');
            $this->promotion = new Promotion();
            $this->excel = new Excel();
        }

        public function setAtribut($pseudo, $pwd){
            $this->pseudo = $pseudo;
            $this->pwd = $pwd;
        }
        //la méthode vérifie si l'admin est dans la bdd
        public function checkAdmin(): bool{
            $requete = $this->bdd->prepare("SELECT pseudo, pwd FROM admin WHERE pseudo = ? AND pwd = ?");
            $requete->execute([$this->pseudo, $this->pwd]);
            $trouver = $requete->fetchAll();

            if(count($trouver) != 0)
                return true;
            return false;
        }
    }