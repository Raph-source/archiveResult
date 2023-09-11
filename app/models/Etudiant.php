<?php
    require_once(MODEL.'Archive.php');
    require_once(MODEL.'Promotion.php');
    class Etudiant{
        private $matricule;
        private $code;
        public $promotion;
        public $archive;
        private $bdd;

        public function __construct(){
            $this->bdd = new PDO("mysql:host=localhost;dbname=archive", "root", '');
            $this->promotion = new Promotion();
            $this->archive = new Archive();
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
            $requete = $this->bdd->prepare("SELECT lien FROM etudiant AS e INNER JOIN archive AS a
                                            ON e.id = a.idEtudiant WHERE e.matricule = ?");
            $requete->execute([$this->matricule]);
            $trouver = $requete->fetchAll();
            if(count($trouver) != 0)
                return $trouver[0]['lien'];

            return "archive-non-trouvé";
        }
    }