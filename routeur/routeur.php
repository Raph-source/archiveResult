<?php
    class Routeur{
        private $request;

        //les URLs de l'étudiant
        private $allRequestEtudiant = [
            'home' => [
                'classe' => 'Etudiant',
                'methode' => 'getFormAuth'
            ],
            'authentification' => [
                'classe' => 'Etudiant',
                'methode' => 'authentification'
            ]
        ];

        //les URLs de l'admin
        private $allRequestAdmin = [
            'motCleAdmin' => [
                'classe' => 'Admin',
                'methode' => 'authentification'
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
                require_once(CONTROLLER_ETUDIANT.$classe.'.php');

                $instance = new $classe();
                $instance->$methode();

            }
            else if(key_exists($request, $this->allRequestAdmin)){
                //recuperation de la classe et la méthode cherchée
                $classe = $this->allRequestAdmin[$request]['classe'];
                $methode = $this->allRequestAdmin[$request]['methode'];

                include(CONTROLLER_ADMIN.$classe.'.php');

                $instance = new $classe();
                $instance->$methode();
            }
            else
                echo 'Erreur 404';
        }
    }