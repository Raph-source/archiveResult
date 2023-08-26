<?php
    class EtudiantController{
        private $model;

        public function __construct(){
            $this->model = new Etudiant();
        }
        //renvoi le formulaire d'authentification
        public function getFormAuth(){
            require_once(VIEW_ETUDIANT.'authentification.php');
        }

        public function authentification(){
            if(!empty($_POST['matricule']) && !empty($_POST['code'])){
                $matricule = htmlspecialchars($_POST['matricule']);
                $code = htmlspecialchars($_POST['code']);

                $this->model->setAtribut($matricule, $code);
                if($this->model->checkEtudiant()){
                    include(VIEW_ETUDIANT.'home.php');
                }else{
                    $notif = "mot de passe ou pseudo incorrecte";
                    include(VIEW_ETUDIANT.'authentification.php');
                }
            }
            else{
                $notif = "Pas de champ vide";
                include(VIEW_ETUDIANT.'authentification.php');
            }
        }
    }