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
            $oTutoriel->setSoumisPar($this->oUtilisateurSession->getId());

            //TODO: Utiliser le modèle pour aller chercher les tutos de ce tuteur
            $oVue -> aListeTutos = $oTutoriel->rechercherListeTutosParTuteur();
            
			$oVue -> afficheListeGererTuteur();
		}

		private function modifierVideo() {
			$oVue = new TutorielVue();
            $oMatiere = new Matiere();

            try{
                if(isset($_POST['subModifierVideo'])){
                    $oTutoriel = new Tutoriel(0, $_POST['txtTitre'], date("Y-m-d"), "0000-00-00", $this->oUtilisateurSession->getId(), 0, 0, 1, $_POST['sltMatiere'], $_POST['sltNiveau'], 0, $_POST['sltEcole'], $_POST['txtUrl']);
                    $oTutoriel->ajouterTuto();
                    header('location:'.WEB_ROOT.'/tutoriel/gerer');
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
                    $oTutoriel = new Tutoriel(0, $_POST['txtTitre'], date("Y-m-d"), "0000-00-00", $this->oUtilisateurSession->getId(), 0, 0, 2, $_POST['sltMatiere'], $_POST['sltNiveau'], 0, $_POST['sltEcole'], $_POST['txtContenu']);
                    $oTutoriel->ajouterTuto();
                    header('location:'.WEB_ROOT.'/tutoriel/gerer');
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

		private function supprimer() {
			$oVue = new TutorielVue();
            try{
                if(isset($_POST['subSupprimer'])){
                    $oTutoriel = new Tutoriel($_POST['hidContenuId']);
                    $oTutoriel->supprimerTuto();

                    header('location:'.WEB_ROOT.'/tutoriel/gerer');
                }
                else{
                    $oTutoriel = new Tutoriel($this->getReqId());
                    $oTutoriel->chargerTutoriel();

                    $oVue -> oTutoriel = $oTutoriel;
        			$oVue -> afficheSupprimerTuto();
                }
            }
            catch(Exception $e){
                header('location:'.WEB_ROOT.'/tutoriel/gerer');
            }
		}

		private function ajouterVideo() {
			$oVue = new TutorielVue();
            $oMatiere = new Matiere();

            try{
                if(isset($_POST['subAjouterVideo'])){
                    $oTutoriel = new Tutoriel(0, $_POST['txtTitre'], date("Y-m-d"), "0000-00-00", $this->oUtilisateurSession->getId(), 0, 0, 1, $_POST['sltMatiere'], $_POST['sltNiveau'], 0, $_POST['sltEcole'], $_POST['txtUrl']);
                    $oTutoriel->ajouterTuto();
                    header('location:'.WEB_ROOT.'/tutoriel/gerer');
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
                    $oTutoriel = new Tutoriel(0, $_POST['txtTitre'], date("Y-m-d"), "0000-00-00", $this->oUtilisateurSession->getId(), 0, 0, 2, $_POST['sltMatiere'], $_POST['sltNiveau'], 0, $_POST['sltEcole'], $_POST['txtContenu']);
                    $oTutoriel->ajouterTuto();
                    header('location:'.WEB_ROOT.'/tutoriel/gerer');
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
       
		//TODO:  Placer les autres méthodes du controleur ici.
    }
?>