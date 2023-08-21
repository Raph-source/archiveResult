<?php
    class Routeur{
        private $request;

        //les URLs de l'étudiant
        private $allRequestEtudiant = [
            'home' => [
                'classe' => 'EtudiantController',
                'methode' => 'getFormAuth'
            ],

            'authentification' => [
                'classe' => 'EtudiantController',
                'methode' => 'authentification'
            ]
        ];

        //les URLs de l'admin
        private $allRequestAdmin = [
            'motCleAdmin' => [
                'classe' => 'AdminController',
                'methode' => 'getFormAuth'
            ],
            'adminAuth' => [
                'classe' => 'AdminController',
                'methode' => 'authentification'
            ]
        ];

        private $allRequestBulletin = [
            'bulletin' => [
                'classe' => 'BulletinController',
                'methode' => 'afficher'
            ]

        ];

        public function __construct($request){
            $this->request = $request;
        }
        //cette fonction renvoi au controleur demandé
        public function renderController(){
            $request = $this->request;

            if (key_exists($request, $this->allRequestEtudiant)){
                //recuperation de la classe et la méthode cherchée
                $classe = $this->allRequestEtudiant[$request]['classe'];
                $methode = $this->allRequestEtudiant[$request]['methode'];
                require_once(CONTROLLER_ETUDIANT);

                $instance = new $classe();
                $instance->$methode();

            }
            else if(key_exists($request, $this->allRequestAdmin)){
                //recuperation de la classe et la méthode cherchée
                $classe = $this->allRequestAdmin[$request]['classe'];
                $methode = $this->allRequestAdmin[$request]['methode'];

                include(CONTROLLER_ADMIN);

                $instance = new $classe();
                $instance->$methode();
            }
            else if(key_exists($request, $this->allRequestBulletin)){
                //recuperation de la classe et la méthode cherchée
                $classe = $this->allRequestBulletin[$request]['classe'];
                $methode = $this->allRequestBulletin[$request]['methode'];

                include(CONTROLLER_BULLETIN);

                $instance = new $classe();
                $instance->$methode();
            }
            else
                echo 'Erreur 404';
        }
    }