<?php
    require_once(MODEL_ADMIN);
    class AdminController{
        private $model;
        public function __construct(){
            $this->model = new Admin();
        }
        //cette méthode renvoi au formulaire d'authentification de l'admin
        public function getFormAuth(){
            include(VIEW_ADMIN.'authentification.php');
        }
        //cette méthode vérifie l'authentification de l'admin
        public function authentification(){
            if(!empty($_POST['pseudo']) && !empty($_POST['pwd'])){
                $pseudo = htmlspecialchars($_POST['pseudo']);
                $pwd = htmlspecialchars($_POST['pwd']);

                $this->model->setAtribut($pseudo, $pwd);
                if($this->model->checkAdmin()){
                    include(VIEW_ADMIN.'home.php');
                }else{
                    $notif = "mot de passe ou pseudo incorrecte";
                    include(VIEW_ADMIN.'authentification.php');
                }
            }
            else{
                $notif = "Pas de champ vide";
                include(VIEW_ADMIN.'authentification.php');
            }
        }

        public function getViewPublication(){
            include_once(VIEW_ADMIN.'publication.php');
        }
        //la méthode effectue l'upload du fichier excel
        public function publication(){
            if(!empty($_FILES['fichierExcel'])){//si le fichier à été uploader
                if($_FILES['fichierExcel']['size'] < 8000000){//si taille est conforme
                    
                    $typeFichier = pathinfo($_FILES['fichierExcel']['name'], PATHINFO_EXTENSION);
                    
                    if($typeFichier == 'xlsx'){//si l'extension est correcte
                        $name = $_FILES['fichierExcel']['name'];

                        move_uploaded_file($_FILES['fichierExcel']['tmp_name'], UPLOADS.$name);
                        $notif = "le resultat à été publier avec succès";
                        include_once(VIEW_ADMIN.'home.php');
                    }
                    else{
                        $notif = 'Erreur de l\'extension! Veuillez chosir un fichier xlsx';
                        include_once(VIEW_ADMIN.'publication.php');
                    }
                }
                else{
                    $notif = 'la taille du fichier est trop grande';
                    include_once(VIEW_ADMIN.'publication.php');
                }
            }
            else{
                $notif = "Veuillez selectionner le fichier excel";
                include_once(VIEW_ADMIN.'publication.php');
            }
        }
    }