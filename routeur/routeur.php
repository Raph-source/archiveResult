<?php
    class Routeur{
        private $request;//l'url demandé

        //le tableau des URLs, controleurs et leurs méthodes
        private $allRequest = [
            'EtudiantController' => [
                'home' => 'getFormAuth',
                'auth-etudiant' => 'authentification',
                'voir-resultat' => 'voirResultat',
                'promotion' => 'getOption',
                'archive-non-trouvé' => 'getMessageErreurArchive'
            ],

            'AdminController' => [
                'motCleAdmin' => 'getFormAuth',
                'adminAuth' => 'authentification',
                'publication' => 'getViewPublication',
                'publication-resultat' => 'publication',
                'formulaire-donner-acces' => 'donnerAcces', 
                'retour-home' => 'retourHome',
                'notification' => 'getFormNotification',
                'donnerAcces' => 'getFormDonnerAcces',
                'bloquerAcces' => 'getBloquerAcces',
                'formulaire-bloquer-acces' => 'bloquerAcces',
                'deconnexion-admin' => 'deconnexion'
            ],

            'ArchiveController' => [
                'bulletin' => 'afficher'
            ]
        ];
       
        public function __construct($request){
            $this->request = $request;
        }
        //cette fonction renvoi au controleur demandé
        public function goToController(){
            //inclusion des controleurs
            require_once(CONTROLLER.'EtudiantController.php');
            require_once(CONTROLLER.'AdminController.php');

            //instantiation du controleur et déclanchement de la méthode
            $_404 = false;
            foreach($this->allRequest as $controller => $url_controller){
                if(key_exists($this->request, $url_controller)){
                    $methode = $url_controller[$this->request];
                    $classeController = new $controller();//instantiation du controleur
                    $classeController->$methode();//déclanchement de la méthode
                    $_404 = true;

                    break;
                }
            }

            if(!$_404)
                echo 'Ereur 404';
        }   
    }