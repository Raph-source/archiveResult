<?php
    class Etudiant{
        public function getFormAuth(){
            include(VIEW_ETUDIANT.'authentification.php');
        }

        public function authentification(){
            var_dump($_POST);
        }
    }
?>