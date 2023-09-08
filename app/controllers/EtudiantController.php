<?php
use PhpOffice\PhpSpreadsheet\Reader\Xls\Style\Border;
    session_start();
    require_once(MODEL.'Etudiant.php');
    require_once(MODEL.'Bulletin.php');
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
            //recupération des donnée mises en session
            $matricule = $_SESSION['matricule'];
            $code = $_SESSION['code'];
            $idPromotion = $_SESSION['idPromotion'];

            $this->model->setAtribut($matricule, $code);
            $id = $this->model->getId();

            //tester si l'étudiant est eligle
            if($this->model->checkIfEligible()){
                //recuperation du nom de la promotion
                $nomPromotion = $this->model->promotion->getNom($idPromotion);
                //instantiation des l'objet spreadsheet
                try{
                    $spreadsheet = IOFactory::load(UPLOADS.$nomPromotion.'.xlsx');
                    $worksheet = $spreadsheet->getActiveSheet();
                }catch(Exception $e){
                    $trouver = $this->model->promotion->getAllPromotion();
                    $notif = "la promotion n'est pas reconnue<br>";
                    require_once(VIEW_ETUDIANT.'choixPromotion.php');
                }

                //récuperer la colonne de l'étudiant de la feuille excel
                $ligne = (int)$id + 1;
                
                //les en-tête du relever des côtes
                $resultat = "<table border=1s
                            style=\" border:solid black;
                                    background-color:cyan;
                                    border-collapse:collapse;
                                \">
                            <thead  style=\"border:solid black;\">
                                <tr  style=\" border:solid black;\">
                                    <th> cours</th>
                                    <th> moyenne</th>
                                    <th> session</th>
                                    <th> total</th>
                                </tr>
                            </thead>
                            <tbody  style=\"border:solid black;\">"; 
                
                //création du relever de côte 
                
                for($i = 2; $i <= 14; $i += 2){
                    //affichage nom des cours
                    $data = $worksheet->getCellByColumnAndRow($i, 1);
                    $resultat .= "<tr>
                                <td>".$data->getValue()."</td>";

                    
                    //affichage des moyennes
                    $data = $worksheet->getCellByColumnAndRow($i, 2);

                    $resultat .=      "<td>".$data->getValue()."</td>";

                    //affichage des sessions
                    $ligneCours = $i + 1;
                    $data = $worksheet->getCellByColumnAndRow($ligneCours, 2);

                    $resultat .=      "<td>".$data->getValue()."</td>
                            </tr>";
                }

                $resultat .= "
                        </tbody>
                        </table>";
                

                //verifier si l'archive n'existe pas
                $lienArchive = STORAGE_LINK.$nomPromotion.$matricule.'.pdf';
                if($this->model->bulletin->checkLink($lienArchive)){
                    //génération du pdf (archive)
                    require_once(BIBLIOTHEQUE.'tcpdf/tcpdf.php');
                    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

                    //chemin absolu de l'archive
                    $chemin = STORAGE.$nomPromotion.$matricule.'.pdf';

                    $pdf->SetTitle('bulletin');
                    $pdf->AddPage();
                    $pdf->writeHTML($resultat);

                    $pdf->Output($chemin, 'F');

                    $this->model->bulletin->addLink($lienArchive);

                    //attribution de l'archive l'étudiant
                    $idBulletin = $this->model->bulletin->getId($lienArchive);
                    $this->model->setIdBulletin($idBulletin);

                }
                require_once(VIEW_ETUDIANT.'voirResultat.php');
            }
            else{
                $notif = "vous n'êtes pas en ordre avec le paiement";
                require_once(VIEW_ETUDIANT.'option.php');
            }
                
        }

        public function getOption(){
            $idPromotion = $_GET['id'];

            $_SESSION['idPromotion'] = $idPromotion;

            //recupération des donnée mises en session
            $matricule = $_SESSION['matricule'];
            $code = $_SESSION['code'];

            $this->model->setAtribut($matricule, $code);
            $archive = $this->model->getArchive();
            require_once(VIEW_ETUDIANT.'option.php');
        }

        public function getMessageErreurArchive(){
            require_once(VIEW_ETUDIANT.'erreurArchive.php');
        }
    }