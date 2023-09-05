<?php
    require_once(MODEL.'Etudiant.php');
    require_once(BIBLIOTHEQUE.'vendor/autoload.php');
    use PhpOffice\PhpSpreadsheet\IOFactory;
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
                session_start();

                if($this->model->checkEtudiant()){
                    //mise en session
                    $_SESSION['matricule'] = $matricule;
                    $_SESSION['code'] = $code;

                    $trouver = $this->model->promotion->getAllPromotion();
                    include(VIEW_ETUDIANT.'choixPromotion.php');
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

        public function voirResultat(){
            $spreadsheet = IOFactory::load(UPLOADS.'14 Formulas.xlsx');
            $worksheet = $spreadsheet->getActiveSheet();
            $value = $worksheet->getCell('b2')->getValue();

            echo $value;

            require_once(BIBLIOTHEQUE.'tcpdf/tcpdf.php');
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->SetTitle('Titre du PDF');
            $pdf->AddPage();
            $pdf->writeHTML('<h1>Mon premier PDF avec TCPDF</h1>');

            $pdf->Output(STORAGE.'test.pdf', 'F');

        }

        public function getOption(){
            $idPromotion = $_GET['id'];
            $_SESSION['idPromotion'] = $idPromotion;
            
            require_once(VIEW_ADMIN.'option.php');
        }
    }