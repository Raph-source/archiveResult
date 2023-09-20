<?php
use PhpOffice\PhpSpreadsheet\Reader\Xls\Style\Border;
    session_start();
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
            require_once(VIEW.'etudiant/authentification.php');
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
                    include(VIEW.'etudiant/choixPromotion.php');
                }else{
                    $notif = "mot de passe ou pseudo incorrecte";
                    include(VIEW.'etudiant/authentification.php');
                }
            }
            else{
                $notif = "Pas de champ vide";
                include(VIEW.'etudiant/authentification.php');
            }
        }

        public function voirResultat(){
            //recupération des donnée mises en session
            if(isset($_SESSION['matricule']) && isset($_SESSION['code']) && isset($_SESSION['idPromotion'])){
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
                        require_once(VIEW.'etudiant/choixPromotion.php');
                        exit;
                    }

                    //récuperer la colonne de l'étudiant de la feuille excel
                    $ligne = (int)$id + 1;
                    
                    //les en-tête du relever des côtes
                    $resultat = "<table border=1s
                                style=\" border:;
                                        background-color:;
                                        border-collapse:collapse;
                                    \">
                                <thead  style=\"border:;\">
                                    <tr  style=\" :;\">
                                        <th style=\"padding : 20px; background:green; color:white;\"> Cours</th>
                                        <th style=\"padding : 20px; background:green; color:white;\"> Moyenne</th>
                                        <th style=\"padding : 20px; background:green; color:white;\"> Session</th>
                                    </tr>
                                </thead>
                                <tbody  style=\"border:;\">"; 
                    
                    //création du relever de côte
                    
                    for($i = 2; $i <= 14; $i += 2){
                        //affichage nom des cours
                        $data = $worksheet->getCellByColumnAndRow($i, 1);
                        $resultat .= "<tr>
                                    <td style=\"padding : 20px 5px; boder:none;\">".$data->getValue()."</td>";

                        
                        //affichage des moyennes
                        $data = $worksheet->getCellByColumnAndRow($i, 2);

                        $resultat .= "<td>".$data->getValue()."</td>";

                        //affichage des sessions
                        $ligneCours = $i + 1;
                        $data = $worksheet->getCellByColumnAndRow($ligneCours, 2);

                        $resultat .= "<td>".$data->getValue()."</td>
                                </tr>";
                    }

                    $resultat .= "
                            </tbody>
                            </table>";
                    

                    //verifier si l'archive n'existe pas
                    $lienArchive = STORAGE_LINK.$nomPromotion.$matricule.'.pdf';
                    if($this->model->archive->checkLink($lienArchive)){
                        //génération du pdf (archive)
                        require_once(BIBLIOTHEQUE.'tcpdf/tcpdf.php');
                        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

                        //chemin absolu de l'archive
                        $chemin = STORAGE.$nomPromotion.$matricule.'.pdf';

                        $pdf->SetTitle('archive');
                        $pdf->AddPage();
                        $pdf->writeHTML($resultat);

                        $pdf->Output($chemin, 'F');
                        //ajouter l'archive
                        $this->model->archive->addArchive($lienArchive, $idPromotion);

                        //attribution de l'archive l'étudiant
                        $idEtudiant = $this->model->getId();
                        $this->model->archive->setIdEtudiant($idEtudiant, $lienArchive);

                        require_once(VIEW.'etudiant/voirResultat.php');
                    }
                    else{
                        require_once(VIEW.'etudiant/voirResultat.php');
                    }
            
                }
                else{
                    $notif = "vous n'êtes pas en ordre avec le paiement";

                    $matricule = $_SESSION['matricule'];
                    $code = $_SESSION['code'];

                    $this->model->setAtribut($matricule, $code);
                    $archive = $this->model->getArchive($idPromotion);
                    
                    require_once(VIEW.'etudiant/option.php');
                }
            }
            else{
                $archive = "archive-non-trouvé";
                
                require_once(VIEW.'etudiant/option.php');
            }
                
        }

        public function getOption(){
            $idPromotion = $_GET['id'];
            //l'id de la promotion en session
            $_SESSION['idPromotion'] = $idPromotion;


            if(isset($_SESSION['matricule']) && isset($_SESSION['code'])){
                //recupération des donnée mises en session
                $matricule = $_SESSION['matricule'];
                $code = $_SESSION['code'];

                $this->model->setAtribut($matricule, $code);
                $archive = $this->model->getArchive($idPromotion);
                require_once(VIEW.'etudiant/option.php');
            }
            else{
                $archive = "archive-non-trouvé";
                require_once(VIEW.'etudiant/option.php');
            }
            
        }

        public function getMessageErreurArchive(){
            require_once(VIEW.'etudiant/erreurArchive.php');
        }
    }