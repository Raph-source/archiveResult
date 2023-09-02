<?php
class Excel{
    private $bdd;
    private $chemin;
    public function __construct(){
        $this->bdd = new PDO("mysql:host=localhost;dbname=archive", "root", '');
    }
    public function setChemin($chemin):void{
        $this->chemin = $chemin;
        $requette = $this->bdd->prepare("INSERT INTO excel(chemin) VALUES(?)");
        $requette->execute([$this->chemin]);
    }
    public function getId($chemin):int{
        $requette = $this->bdd->prepare("SELECT id FROM excel WHERE chemin = ?");
        $requette->execute([$this->chemin]);
        $trouver = $requette->fetchAll();

        return $trouver[0]['id'];
    }
}