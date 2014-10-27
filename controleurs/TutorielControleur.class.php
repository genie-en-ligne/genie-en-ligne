<?php
    class TutorielControleur extends Controleur {
        
        public function __construct($reqAction="erreur404", $reqId="", $oUtilisateurSession){            
            $this->setReqAction($reqAction);
            $this->setReqId($reqId);
            $this->oUtilisateurSession = $oUtilisateurSession;
        }

        public function gerer(){
            switch ($this->getReqAction()) {                

                case 'consulter':
                    $this -> consulter();
                    break;
                case 'gerer':
                    $this -> gestion();
                    break;
                case 'modifier-texte':
                    $this -> modifierTexte();
                    break;
                case 'modifier-video':
                    $this -> modifierVideo();
                    break;
                case 'supprimer':
                    $this -> supprimer();
                    break;
                case 'ajouter-video':
                    $this -> ajouterVideo();
                    break;
                case 'ajouter-texte':
                    $this -> ajouterTexte();
                    break;
                case 'approuver':
                    $this->approuver();
                    break;

                //TODO: Ajouter des cas au besoin

                default:
                    $this->erreur404();
                    break;
            }
        }
        
    
        
		private function consulter() {
			$oVue = new TutorielVue();
            $oMatiere = new Matiere();
            
            try{
                if($_GET['matiere'] != 0 && $_GET['niveau'] != 0){
                    $oTutoriel = new Tutoriel();
                    $oTutoriel->setMatiereId($_GET['matiere']);
                    $oTutoriel->setNiveauScolaire($_GET['niveau']);
                    $oVue->aListeTutos = $oTutoriel->rechercherListeTutosParEleve();
                }
                else{
                    $oVue->setMessage(array("Veuillez spécifier vos critères de recherche", "warning"));
                }
                
                $oVue->aMatieres = $oMatiere->rechercherListeMatieres();
    			$oVue -> afficheListeConsulter();
            }
            catch(Exception $e){
                $oVue->setMessage(array($e->getMessage(), "danger"));

                $oVue->aMatieres = $oMatiere->rechercherListeMatieres();
                $oVue -> afficheListeConsulter();
            }
		}

		private function gestion() {
			$oVue = new TutorielVue();
            $oTutoriel = new Tutoriel();

            if($this->oUtilisateurSession->getRole() == 2){
                $oTutoriel->setSoumisPar($this->oUtilisateurSession->getId());
                $oVue -> aListeTutos = $oTutoriel->rechercherListeTutosParTuteur();                
    			$oVue -> afficheListeGererTuteur();
            }
            elseif($this->oUtilisateurSession->getRole() == 3 || $this->oUtilisateurSession->getRole() == 4){
                $oVue -> aListeTutos = $oTutoriel->rechercherListeTutosParCommission($this->oUtilisateurSession->getCommission());
                $oVue -> afficheListeGerer();
            }
		}

		private function modifierVideo() {
			$oVue = new TutorielVue();
            $oMatiere = new Matiere();

            try{
                if(isset($_POST['subModifierVideo'])){
                    print_r($_POST);
                    $oTutoriel = new Tutoriel($this->getReqId(), $_POST['txtTitre'], date("Y-m-d"), "0000-00-00", $this->oUtilisateurSession->getId(), 0, 0, 1, $_POST['sltMatiere'], $_POST['sltNiveau'], 0, $_POST['sltEcole'], $_POST['txtUrl']);
                    $oTutoriel->modifierTuto();
                    if($this->oUtilisateurSession->getRole() == 2){
                        header('location:'.WEB_ROOT.'/tutoriel/gerer');
                    }
                    else{
                        header('location:'.WEB_ROOT.'/admin/tutoriel/gerer');
                    }
                }
                else{
                    $oTutoriel = new Tutoriel($this->getReqId());
                    $oTutoriel->chargerTutoriel();
                    $oVue->oTutoriel = $oTutoriel;
                }
                
                $oVue->aMatieres = $oMatiere->rechercherListeMatieres();
                $oVue->aEcoles = $this->oUtilisateurSession->getListeEcoles();
                $oVue -> afficheFormulaireModificationVideo();
            }
            catch(Exception $e){
                $oTutoriel = new Tutoriel($this->getReqId());
                $oTutoriel->chargerTutoriel();
                $oVue->oTutoriel = $oTutoriel;
                $oVue->setMessage(array($e->getMessage(), "danger"));
                $oVue->aMatieres = $oMatiere->rechercherListeMatieres();
                $oVue->aEcoles = $this->oUtilisateurSession->getListeEcoles();
                $oVue -> afficheFormulaireModificationVideo();
            }  
		}

        private function modifierTexte() {
            $oVue = new TutorielVue();
            $oMatiere = new Matiere();

            try{
                if(isset($_POST['subModifierTexte'])){
                    $oTutoriel = new Tutoriel($this->getReqId(), $_POST['txtTitre'], date("Y-m-d"), "0000-00-00", $this->oUtilisateurSession->getId(), 0, 0, 2, $_POST['sltMatiere'], $_POST['sltNiveau'], 0, $_POST['sltEcole'], $_POST['txtContenu']);
                    $oTutoriel->modifierTuto();
                    if($this->oUtilisateurSession->getRole() == 2){
                        header('location:'.WEB_ROOT.'/tutoriel/gerer');
                    }
                    else{
                        header('location:'.WEB_ROOT.'/admin/tutoriel/gerer');
                    }
                }
                else{
                    $oTutoriel = new Tutoriel($this->getReqId());
                    $oTutoriel->chargerTutoriel();
                    $oVue->oTutoriel = $oTutoriel;
                }
                
                $oVue->aMatieres = $oMatiere->rechercherListeMatieres();
                $oVue->aEcoles = $this->oUtilisateurSession->getListeEcoles();
                $oVue -> afficheFormulaireModificationTexte();
            }
            catch(Exception $e){
                $oTutoriel = new Tutoriel($this->getReqId());
                $oTutoriel->chargerTutoriel();
                $oVue->oTutoriel = $oTutoriel;
                $oVue->setMessage(array($e->getMessage(), "danger"));
                $oVue->aMatieres = $oMatiere->rechercherListeMatieres();
                $oVue->aEcoles = $this->oUtilisateurSession->getListeEcoles();
                $oVue -> afficheFormulaireModificationTexte();
            }  
        }

		private function supprimer() {
			$oVue = new TutorielVue();
            try{
                if(isset($_POST['subSupprimer'])){
                    $oTutoriel = new Tutoriel($_POST['hidContenuId']);
                    $oTutoriel->supprimerTuto();
                    if($this->oUtilisateurSession->getRole() == 2){
                        header('location:'.WEB_ROOT.'/tutoriel/gerer');
                    }
                    else{
                        header('location:'.WEB_ROOT.'/admin/tutoriel/gerer');
                    }
                }
                else{
                    $oTutoriel = new Tutoriel($this->getReqId());
                    $oTutoriel->chargerTutoriel();

                    $oVue -> oTutoriel = $oTutoriel;
        			$oVue -> afficheSupprimerTuto();
                }
            }
            catch(Exception $e){
                if($this->oUtilisateurSession->getRole() == 2){
                    header('location:'.WEB_ROOT.'/tutoriel/gerer');
                }
                else{
                    header('location:'.WEB_ROOT.'/admin/tutoriel/gerer');
                }
            }
		}

		private function ajouterVideo() {
			$oVue = new TutorielVue();
            $oMatiere = new Matiere();

            try{
                if(isset($_POST['subAjouterVideo'])){
                    $approuve = 0;
                    $approuve_par = 0;
                    if($this->oUtilisateurSession->getRole() > 2){
                        $approuve = 1;
                        $approuve_par = $this->oUtilisateurSession->getId();
                    }

                    $oTutoriel = new Tutoriel(0, $_POST['txtTitre'], date("Y-m-d"), "0000-00-00", $this->oUtilisateurSession->getId(), $approuve_par, $approuve, 1, $_POST['sltMatiere'], $_POST['sltNiveau'], 0, $_POST['sltEcole'], $_POST['txtUrl']);
                    $oTutoriel->ajouterTuto();
                    if($this->oUtilisateurSession->getRole() == 2){
                        header('location:'.WEB_ROOT.'/tutoriel/gerer');
                    }
                    else{
                        header('location:'.WEB_ROOT.'/admin/tutoriel/gerer');
                    }
                }
                
                $oVue->aMatieres = $oMatiere->rechercherListeMatieres();
                $oVue->aEcoles = $this->oUtilisateurSession->getListeEcoles();
    			$oVue -> afficheFormulaireCreationVideo();
            }
            catch(Exception $e){
                $oVue->setMessage(array($e->getMessage(), "danger"));
                $oVue->aMatieres = $oMatiere->rechercherListeMatieres();
                $oVue->aEcoles = $this->oUtilisateurSession->getListeEcoles();
                $oVue -> afficheFormulaireCreationVideo();
            }  
		}

        private function ajouterTexte() {
            $oVue = new TutorielVue();
            $oMatiere = new Matiere();

            try{
                if(isset($_POST['subAjouterTexte'])){
                    $approuve = 0;
                    $approuve_par = 0;
                    if($this->oUtilisateurSession->getRole() > 2){
                        $approuve = 1;
                        $approuve_par = $this->oUtilisateurSession->getId();
                    }

                    $oTutoriel = new Tutoriel(0, $_POST['txtTitre'], date("Y-m-d"), "0000-00-00", $this->oUtilisateurSession->getId(), $approuve_par, $approuve, 2, $_POST['sltMatiere'], $_POST['sltNiveau'], 0, $_POST['sltEcole'], $_POST['txtContenu']);
                    $oTutoriel->ajouterTuto();
                    if($this->oUtilisateurSession->getRole() == 2){
                        header('location:'.WEB_ROOT.'/tutoriel/gerer');
                    }
                    else{
                        header('location:'.WEB_ROOT.'/admin/tutoriel/gerer');
                    }
                }
                
                $oVue->aMatieres = $oMatiere->rechercherListeMatieres();
                $oVue->aEcoles = $this->oUtilisateurSession->getListeEcoles();
                $oVue -> afficheFormulaireCreationTexte();
            }
            catch(Exception $e){
                $oVue->setMessage(array($e->getMessage(), "danger"));
                $oVue->aMatieres = $oMatiere->rechercherListeMatieres();
                $oVue->aEcoles = $this->oUtilisateurSession->getListeEcoles();
                $oVue -> afficheFormulaireCreationTexte();
            }  
        }

        private function approuver(){
            $oVue = new TutorielVue();
            try{
                if(isset($_POST['subApprouver'])){
                    $oTutoriel = new Tutoriel($_POST['hidContenuId']);
                    $oTutoriel->setApprouvePar($this->oUtilisateurSession->getId());
                    $oTutoriel->setDateApprouve(date("Y-m-d"));
                    $oTutoriel->approuverTuto();
                    header('location:'.WEB_ROOT.'/admin/tutoriel/gerer');
                }
                else{
                    $oTutoriel = new Tutoriel($this->getReqId());
                    $oTutoriel->chargerTutoriel();

                    $oVue -> oTutoriel = $oTutoriel;
                    $oVue -> afficheApprouverTuto();
                }
            }
            catch(Exception $e){
                header('location:'.WEB_ROOT.'/admin/tutoriel/gerer');
            }
        }
       
		//TODO:  Placer les autres méthodes du controleur ici.
    }
?>