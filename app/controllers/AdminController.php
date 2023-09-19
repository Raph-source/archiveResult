<?php
    require_once(MODEL.'Admin.php');
    class AdminController{
        private $model;
        public function __construct(){
            $this->model = new Admin();
        }
        //cette méthode renvoi au formulaire d'authentification de l'admin
        public function getFormAuth(){
            include(VIEW.'admin/authentification.php');
        }
        //cette méthode vérifie l'authentification de l'admin
        public function authentification(){
            if(!empty($_POST['pseudo']) && !empty($_POST['pwd'])){
                $pseudo = htmlspecialchars($_POST['pseudo']);
                $pwd = htmlspecialchars($_POST['pwd']);

                $_SESSION['pseudoAdmin'] = $pseudo;

                $this->model->setAtribut($pseudo, $pwd);
                if($this->model->checkAdmin()){
                    include(VIEW.'admin/home.php');
                }else{
                    $notif = "mot de passe ou pseudo incorrecte";
                    include(VIEW.'admin/authentification.php');
                }
            }
            else{
                $notif = "Pas de champ vide";
                include(VIEW.'admin/authentification.php');
            }
        }

        public function getViewPublication(){
            include_once(VIEW.'admin/publication.php');
        }
        //la méthode effectue l'upload du fichier excel
        public function publication(){
            if(!empty($_FILES['fichierExcel'])){//si le fichier à été uploader
                if($_FILES['fichierExcel']['size'] < 8000000){//si taille est conforme
                    
                    $typeFichier = pathinfo($_FILES['fichierExcel']['name'], PATHINFO_EXTENSION);
                    
                    if($typeFichier == 'xlsx'){//si l'extension est correcte
                        $name = $_FILES['fichierExcel']['name'];
                        $nom = explode('.', $name)[0];//enlever l'extension
                        $this->model->promotion->setNom($nom);

                        if($this->model->promotion->checkNomPromotion()){
                            //l'upload du fichier
                            try{
                                move_uploaded_file($_FILES['fichierExcel']['tmp_name'], UPLOADS.$name);
                                $notif = "le resultat à été publier avec succès<br>";
                                $this->model->excel->setChemin(UPLOADS.$name);//mise du chemin dans la bdd
                                //récuperation de l'id
                                $idExcel = $this->model->excel->getId(UPLOADS.$name);

                                //insertion de l'idExcel dans table promotion
                                $this->model->promotion->setIdExcel($idExcel);

                            }catch(Exception $e){
                                $notif = "échec de publication<br>";
                            }
                            
                        }
                        else{
                            $notif = "cette promotion n'existe pas<br>";
                        }
                        include_once(VIEW.'admin/home.php');
                    }
                    else{
                        $notif = 'Erreur de l\'extension! Veuillez chosir un fichier xlsx';
                        include_once(VIEW.'admin/publication.php');
                    }
                }
                else{
                    $notif = 'la taille du fichier est trop grande';
                    include_once(VIEW.'admin/publication.php');
                }
            }
            else{
                $notif = "Veuillez selectionner le fichier excel";
                include_once(VIEW.'admin/publication.php');
            }
        }

        public function retourHome(){
            require_once(VIEW.'admin/home.php');
        }

        public function getFormNotification(){
            $trouver = $this->model->promotion->getAllPromotion();
            require_once(VIEW.'admin/notification.php');
        }

        public function notifier(){

        }

        public function getFormDonnerAcces(){
            require_once(VIEW.'admin/donnerAcces.php');    
        }

        public function donnerAcces(){
            if(!empty($_POST['matricule'])){
                $matricule = htmlspecialchars($_POST['matricule']);

                if($this->model->donnerAcces($matricule)){
                    $notif = "acces accordé avec succès";
                }
                else{
                    $notif = "ce matricule n'est pas reconnu";
                }

                require_once(VIEW.'admin/donnerAcces.php');
            }
            else{
                $notif = 'pas des champs vides svp !!!';
                require_once(VIEW.'admin/donnerAcces.php');
            }
        }

        public function getBloquerAcces(){
            require_once(VIEW.'admin/bloquerAcces.php');
        }

        public function bloquerAcces(){
            if(!empty($_POST['matricule'])){
                $matricule = htmlspecialchars($_POST['matricule']);

                if($this->model->bloquerAcces($matricule)){
                    $notif = "acces bloqué avec succès";
                }
                else{
                    $notif = "ce matricule n'est pas reconnu";
                }

                require_once(VIEW.'admin/bloquerAcces.php');
            }
            else{
                $notif = 'pas des champs vides svp !!!';
                require_once(VIEW.'admin/bloquerAcces.php');
            }
        }

        public function deconnexion(){
            session_destroy();
            require_once(VIEW.'admin/authentification.php');
        }
    }