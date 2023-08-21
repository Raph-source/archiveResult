<?php
    require_once(MODEL_ADMIN);
    class AdminController{
        private $model;
        public function __construct(){
            $this->model = new Admin();
        }
        public function getFormAuth(){
            include(VIEW_ADMIN.'authentification.php');
        }
        public function authentification(){
            if(!empty($_POST['pseudo']) && !empty($_POST['pwd'])){
                $pseudo = htmlspecialchars($_POST['pseudo']);
                $pwd = htmlspecialchars($_POST['pwd']);

                $this->model->setAtribut($pseudo, $pwd);
                if($this->model->checkAdmin()){
                    include(VIEW_ADMIN.'home.php');
                }else{
                    $notif = "Pas de champ vide";
                    include(VIEW_ADMIN.'authentification.php');
                }
            }
            else{
                $notif = "Pas de champ vide";
                include(VIEW_ADMIN.'authentification.php');
            }
        }
    }