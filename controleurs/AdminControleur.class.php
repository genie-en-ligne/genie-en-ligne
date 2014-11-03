<?php
    class AdminControleur extends Controleur {
        
        public function __construct($reqAction="erreur404", $reqId="", $oUtilisateurSession){            
            $this->setReqAction($reqAction);
            $this->setReqId($reqId);
            $this->oUtilisateurSession = $oUtilisateurSession;
        }

        public function gerer(){
            switch ($this->getReqAction()) { 
                case 'gerer-commissions':
                    $this -> gererCommissions();
                    break;
                case 'ajouter-commission':
                    $this -> ajouterCommission();
                    break;
                case 'modifier-commission':
                    $this -> modifierCommission();
                    break;
                case 'supprimer-commission':
                    $this -> supprimerCommission();
                    break;


                case 'gerer-ecoles':
                    $this->gererEcoles();
                    break;
                case 'ajouter-ecole':
                    $this->ajouterEcole();
                    break;
                case 'modifier-ecole':
                    $this->modifierEcole();
                    break;
                case 'supprimer-ecole':
                    $this->supprimerEcole();
                    break;


                case 'gerer-matieres':
                    $this->gererMatieres();
                    break;
                case 'ajouter-matiere':
                    $this->ajouterMatiere();
                    break;
                case 'modifier-matiere':
                    $this->modifierMatiere();
                    break;
                case 'supprimer-matiere':
                    $this->supprimerMatiere();
                    break;

                default:
                    $this->erreur404();
                    break;
            }
        }
        
        private function gererCommissions(){
            $oVue = new AdminVue();
            $oCommission = new Commission();

            $oVue->aListeCommissions = $oCommission->rechercherListeCommissions();
            $oVue->afficheListeCommissions();
        }

        private function ajouterCommission(){
            $oVue = new AdminVue();
            $oCommission = new Commission();

            try{
                if(isset($_POST['subAjouterCommission'])){
                    $oCommission->setRegion($_POST['sltRegion']);
                    $oCommission->setNom($_POST['txtNom']);
                    $oCommission->ajouterCommission();

                    header("location:".WEB_ROOT."/admin/admin/gerer-commissions");
                }
                $oVue->aListeRegions = $oCommission->rechercherListeRegions();

                $oVue->afficheAjouterCommission();
            }
            catch(Exception $e){
                $oVue->setMessage(array($e->getMessage(), "danger"));
                $oVue->aListeRegions = $oCommission->rechercherListeRegions();

                $oVue->afficheAjouterCommission();
            }
        }

        private function modifierCommission(){
            $oVue = new AdminVue();
            $oCommission = new Commission($this->getReqId());
            if($oCommission->chargerCommission() == false){
				$this->erreur404();
			}

            try{
                if(isset($_POST['subModifierCommission'])){
                    $oCommission->setRegion($_POST['sltRegion']);
                    $oCommission->setNom($_POST['txtNom']);
                    $oCommission->modifierCommission();

                    header("location:".WEB_ROOT."/admin/admin/gerer-commissions");
                }
                $oVue->aListeRegions = $oCommission->rechercherListeRegions();
                $oVue->oCommission = $oCommission;

                $oVue->afficheModifierCommission();
            }
            catch(Exception $e){
                $oVue->setMessage(array($e->getMessage(), "danger"));
                $oVue->aListeRegions = $oCommission->rechercherListeRegions();
                $oVue->oCommission = $oCommission;

                $oVue->afficheModifierCommission();
            }
        }

        private function supprimerCommission(){
            $oVue = new AdminVue();
            $oCommission = new Commission($this->getReqId());
            if($oCommission->chargerCommission() == false){
				$this->erreur404();	
			}

            try{
                if(isset($_POST['subSupprimerCommission'])){
                    $oCommission->supprimerCommission();

                    header("location:".WEB_ROOT."/admin/admin/gerer-commissions");
                }
                $oVue->oCommission = $oCommission;

                $oVue->afficheSupprimerCommission();
            }
            catch(Exception $e){
                $oVue->setMessage(array($e->getMessage(), "danger"));
                $oVue->oCommission = $oCommission;

                $oVue->afficheSupprimerCommission();
            }
        }

        private function gererEcoles(){
            $oVue = new AdminVue();

            $oCommission = new Commission();
            $oVue->aListeCommissions = $oCommission->rechercherListeCommissions();

            $oEcole = new Ecole();
            $oVue->aListeEcoles = $oEcole->rechercherListeEcoles();

            $oVue->afficheListeEcoles();
        }

        public function ajouterEcole(){
            $oVue = new AdminVue();
            $oCommission = new Commission();
            $oVue->aListeCommissions = $oCommission->rechercherListeCommissions();

            try{
                if(isset($_POST['subAjouterEcole'])){
                    $oEcole = new Ecole(0, $_POST['txtNom'], $_POST['sltCommissions']);
                    $oEcole->ajouterEcole();

                    header("location:".WEB_ROOT."/admin/admin/gerer-ecoles");
                }

                $oVue->afficheAjouterEcole();
            }
            catch(Exception $e){
                $oVue->setMessage(array($e->getMessage(), "danger"));

                $oVue->afficheAjouterEcole();
            }
        }

        public function modifierEcole(){
            $oVue = new AdminVue();
            $oCommission = new Commission();
            $oVue->aListeCommissions = $oCommission->rechercherListeCommissions();

            $oEcole = new Ecole($this->getReqId());
            if($oEcole->chargerEcole() == false){
				$this->erreur404();	
			}
            $oVue->oEcole = $oEcole;

            try{
                if(isset($_POST['subModifierEcole'])){
                    $oEcole = new Ecole($this->getReqId(), $_POST['txtNom'], $_POST['sltCommissions']);
                    $oEcole->modifierEcole();

                    header("location:".WEB_ROOT."/admin/admin/gerer-ecoles");
                }

                $oVue->afficheModifierEcole();
            }
            catch(Exception $e){
                $oVue->setMessage(array($e->getMessage(), "danger"));

                $oVue->afficheModifierEcole();
            }
        }

        public function supprimerEcole(){
            $oVue = new AdminVue();

            $oEcole = new Ecole($this->getReqId());
            if($oEcole->chargerEcole() == false){
				$this->erreur404();	
			}
            $oVue->oEcole = $oEcole;

            try{
                if(isset($_POST['subSupprimerEcole'])){
                    $oEcole->supprimerEcole();

                    header("location:".WEB_ROOT."/admin/admin/gerer-ecoles");
                }

                $oVue->afficheSupprimerEcole();
            }
            catch(Exception $e){
                $oVue->setMessage(array($e->getMessage(), "danger"));

                $oVue->afficheSupprimerEcole();
            }
        }

        private function gererMatieres(){
            $oVue = new AdminVue();

            $oMatiere = new Matiere();
            $oVue->aListeMatieres = $oMatiere->rechercherListeMatieres();

            $oVue->afficheListeMatieres();
        }

        public function ajouterMatiere(){
            $oVue = new AdminVue();

            try{
                if(isset($_POST['subAjouterMatiere'])){
                    $oMatiere = new Matiere(0, $_POST['txtNom']);
                    $oMatiere->ajouterMatiere();

                    header("location:".WEB_ROOT."/admin/admin/gerer-matieres");
                }

                $oVue->afficheAjouterMatiere();
            }
            catch(Exception $e){
                $oVue->setMessage(array($e->getMessage(), "danger"));

                $oVue->afficheAjouterMatiere();
            }
        }

        public function modifierMatiere(){
            $oVue = new AdminVue();
            $oMatiere = new Matiere($this->getReqId());
            if($oMatiere->chargerMatiere() == false){
				$this->erreur404();	
			}

            $oVue->oMatiere = $oMatiere;

            try{
                if(isset($_POST['subModifierMatiere'])){
                    $oMatiere = new Matiere(0, $_POST['txtNom']);
                    $oMatiere->ajouterMatiere();

                    header("location:".WEB_ROOT."/admin/admin/gerer-matieres");
                }

                $oVue->afficheModifierMatiere();
            }
            catch(Exception $e){
                $oVue->setMessage(array($e->getMessage(), "danger"));
                $oVue->afficheModifierMatiere();
            }
        }

        public function supprimerMatiere(){
            $oVue = new AdminVue();
            $oMatiere = new Matiere($this->getReqId());
            if($oMatiere->chargerMatiere() == false){
				$this->erreur404();
			}

            $oVue->oMatiere = $oMatiere;

            try{
                if(isset($_POST['subSupprimerMatiere'])){
                    $oMatiere->supprimerMatiere();

                    header("location:".WEB_ROOT."/admin/admin/gerer-matieres");
                }

                $oVue->afficheSupprimerMatiere();
            }
            catch(Exception $e){
                $oVue->setMessage(array($e->getMessage(), "danger"));
                $oVue->afficheSupprimerMatiere();
            }
        }
       
		//TODO:  Placer les autres méthodes du controleur ici.
    }
?>