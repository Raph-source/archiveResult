<?php
    class Routeur{
        private $request;//l'url demandé

        //le tableau des URLs, controleurs et leurs méthodes
        private $allRequest = [
            'EtudiantController' => [
                'home' => 'getFormAuth',
                'authEtudiant' => 'authentification'
            ],

            'AdminController' => [
                'motCleAdmin' => 'getFormAuth',
                'adminAuth' => 'authentification'
            ],

            'bulletin' => [
                'bulletin' => 'afficher'
            ]
        ];
       
        public function __construct($request){
            $this->request = $request;
        }
        //cette fonction renvoi au controleur demandé
        public function goToController(){
            //inclusion des controleurs
            require_once(CONTROLLER_ETUDIANT);
            require_once(CONTROLLER_ADMIN);
            require_once(CONTROLLER_BULLETIN);

            //instantiation du controleur et déclanchement de la méthode
            $trouver = false;
            foreach($this->allRequest as $controller => $url_controller){
                if(key_exists($this->request, $url_controller)){
                    $methode = $url_controller[$this->request];
                    $classeController = new $controller();//instantiation du controleur
                    $classeController->$methode();//déclanchement de la méthode
                    $trouver = true;

                    break;
                }
            }

            if(!$trouver)
                echo 'Erreur 404';
        }   
    }