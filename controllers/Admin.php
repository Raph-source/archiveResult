<?php
    class Admin{

        public function getFormAuth(){
            include(VIEW_ADMIN.'authentification.php');
        }
        public function authentification(){
            var_dump($_POST);
        }
    }