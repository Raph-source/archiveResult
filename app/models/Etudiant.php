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
            $requete = $this->bdd->prepare("UPDATE etudiant SET idBulletin = ? WHERE matricule = ? AND code = ?");
            $requete->execute([$idBulletin, $this->matricule, $this->code]);
        }

        public function getId():int{
            $requete = $this->bdd->prepare("SELECT id FROM etudiant WHERE matricule = ? AND code = ?");
            $requete->execute([$this->matricule, $this->code]);


            return $requete->fetch()['id'];
        }

        public function getIdByMatricule($matricule):int{
            $requete = $this->bdd->prepare("SELECT id FROM etudiant WHERE matricule = ?");
            $requete->execute([$matricule]);
            
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

        public function checkMatricule($matricule):bool{
            $requete = $this->bdd->prepare("SELECT * FROM etudiant WHERE matricule = ?");
            $requete->execute([$matricule]);
            $trouver = $requete->fetchAll();

            if(count($trouver) != 0){
                return true;
            }
            return false;
        }

        public function getArchive():string{
            $requete = $this->bdd->prepare("SELECT lien FROM etudiant AS e INNER JOIN bulletin AS b
                                            ON e.idBulletin = b.id WHERE e.matricule = ?");
            $requete->execute([$this->matricule]);
            $trouver = $requete->fetchAll();
            
            if(count($trouver) != 0)
                return $trouver[0]['lien'];

            return "archive-non-trouvé";
        }
    }