<?php
    class TutorielControleur extends Controleur {
        
        public function __construct($reqAction="erreur404", $reqId="", $oUtilisateurSession){            
            $this->setReqAction($reqAction);
            $this->setReqId($reqId);
            $this->oUtilisateurSession = $oUtilisateurSession;
        }

        /**
        * Un switch case pour chaque action du menu disponible
        * @return un condition que est la fonction appeller plus bas
        */

        public function gerer(){
            switch ($this->getReqAction()) {                

                case 'consulter':
					if($this->oUtilisateurSession->getRole() != 1){
						$this->erreur404();
						break;
					}
                    $this -> consulter();
                    break;
                case 'gerer':
					if($this->oUtilisateurSession->getRole() < 2 || $this->oUtilisateurSession->getRole() > 4){
						$this->erreur404();
						break;
					}
                    $this -> gestion();
                    break;
                case 'modifier-texte':
					if($this->oUtilisateurSession->getRole() < 2 || $this->oUtilisateurSession->getRole() > 4){
						$this->erreur404();
						break;
					}
                    $this -> modifierTexte();
                    break;
                case 'modifier-video':
					if($this->oUtilisateurSession->getRole() < 2 || $this->oUtilisateurSession->getRole() > 4){
						$this->erreur404();
						break;
					}
                    $this -> modifierVideo();
                    break;
                case 'supprimer':
					if($this->oUtilisateurSession->getRole() < 2 || $this->oUtilisateurSession->getRole() > 4){
						$this->erreur404();
						break;
					}
                    $this -> supprimer();
                    break;
                case 'ajouter-video':
					if($this->oUtilisateurSession->getRole() < 2 || $this->oUtilisateurSession->getRole() > 4){
						$this->erreur404();
						break;
					}
                    $this -> ajouterVideo();
                    break;
                case 'ajouter-texte':
					if($this->oUtilisateurSession->getRole() < 2 || $this->oUtilisateurSession->getRole() > 4){
						$this->erreur404();
						break;
					}
                    $this -> ajouterTexte();
                    break;
                case 'approuver':
					if($this->oUtilisateurSession->getRole() < 3 || $this->oUtilisateurSession->getRole() > 4){
						$this->erreur404();
						break;
					}
                    $this->approuver();
                    break;
                case 'visionner':
					if($this->oUtilisateurSession->getRole() > 4){
						$this->erreur404();
						break;
					}
                    $this->visionner();
                    break;

                default:
                    $this->erreur404();
                    break;
            }
        }
        

        /**
        * Fonction pour consulter les tutoriels
        *@param  oVue 
        *@param  oTutoriel
        *@return affiche la liste a consulter
        */        
		private function consulter() {
			$oVue = new TutorielVue();
            $oMatiere = new Matiere();
            
            try{
                if($_GET['matiere'] != 0 && $_GET['niveau'] != 0){
                    $oTutoriel = new Tutoriel();

                    $oTutoriel->setMatiereId($_GET['matiere']);//Choisir la matière
                    $oTutoriel->setNiveauScolaire($_GET['niveau']);// choisir le niveau de scolarité

                    $aEcoles = $this->oUtilisateurSession->getListeEcoles();
                    $ecole = $aEcoles[0]->getId();
                    $oVue->aListeTutos = $oTutoriel->rechercherListeTutosParEleve($ecole);
                }
                else{
                    $oVue->setMessage(array("Veuillez spécifier vos critères de recherche", "warning"));
                }
                
                //Afficher la vue de la liste des tutoriels
                $oVue->aMatieres = $oMatiere->rechercherListeMatieres();
    			$oVue -> afficheListeConsulter();
            }
            catch(Exception $e){
                $oVue->setMessage(array($e->getMessage(), "danger")); // appeller l'erreur
                //afficher la vue
                $oVue->aMatieres = $oMatiere->rechercherListeMatieres();
                $oVue -> afficheListeConsulter();
            }
		}

        /**
        * Fonction de vue permetant au tuteur de gerer leurs videos
        *@param  oVue 
        *@param  oTutoriel
        *@return affiche la liste a consulter
        */    
		private function gestion() {
			$oVue = new TutorielVue();
            $oTutoriel = new Tutoriel();

            if($this->oUtilisateurSession->getRole() == 2){// si c'est le id de role 2 (tuteur)
                $oTutoriel->setSoumisPar($this->oUtilisateurSession->getId());
                $oVue -> aListeTutos = $oTutoriel->rechercherListeTutosParTuteur();                
    			$oVue -> afficheListeGererTuteur();
            }
            elseif($this->oUtilisateurSession->getRole() == 3 || $this->oUtilisateurSession->getRole() == 4){// si c'est le id de role 3 (professeur) et id 4(responsable)
                $oVue -> aListeTutos = $oTutoriel->rechercherListeTutosParCommission($this->oUtilisateurSession->getCommission());
                $oVue -> afficheListeGerer();
            }
		}

        /**
        * Fonction de vue permetant de modifier un video
        *@param  oVue 
        *@param  oTutoriel
        *@param  oMatiere
        *@param  oAncienTuto
        *@return affiche la liste a consulter
        */   
		private function modifierVideo() {
			$oVue = new TutorielVue();
            $oMatiere = new Matiere();

            try{
                if(isset($_POST['subModifierVideo'])){
                    $oAncienTuto = new Tutoriel($this->getReqId());
                    if($oAncienTuto->chargerTutoriel() == false){
						$this->erreur404();
					}

                    $oTutoriel = new Tutoriel($this->getReqId(), $_POST['txtTitre'], date("Y-m-d"), "0000-00-00", $this->oUtilisateurSession->getId(), $oAncienTuto->getApprouvePar(), $oAncienTuto->getStatut(), 1, $_POST['sltMatiere'], $_POST['sltNiveau'], 0, $_POST['sltEcole'], $_POST['txtUrl']);
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

                    if($oTutoriel->chargerTutoriel() == false){
						$this->erreur404();	
					}
                    
                    $oVue->oTutoriel = $oTutoriel;
                }
                
                //Si il ny a pas d'ection alors la vue affiche formulaire modification va afficher
                $oVue->aMatieres = $oMatiere->rechercherListeMatieres();
                $oVue->aEcoles = $this->oUtilisateurSession->getListeEcoles();
                $oVue -> afficheFormulaireModificationVideo();
            }
            catch(Exception $e){
                $oTutoriel = new Tutoriel($this->getReqId());
                if($oTutoriel->chargerTutoriel() == false){
					$this->erreur404();	
				}
				
                $oVue->oTutoriel = $oTutoriel;
                $oVue->setMessage(array($e->getMessage(), "danger"));//les erreurs
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
                    $oAncienTuto = new Tutoriel($this->getReqId());
                    if($oAncienTuto->chargerTutoriel() == false){
						$this->erreur404();
					}

                    $oTutoriel = new Tutoriel($this->getReqId(), $_POST['txtTitre'], date("Y-m-d"), "0000-00-00", $this->oUtilisateurSession->getId(), $oAncienTuto->getApprouvePar(), $oAncienTuto->getStatut(), 2, $_POST['sltMatiere'], $_POST['sltNiveau'], 0, $_POST['sltEcole'], $_POST['txtContenu']);
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
                    if($oTutoriel->chargerTutoriel() == false){
						$this->erreur404();
					}
                    $oVue->oTutoriel = $oTutoriel;
                }
                
                $oVue->aMatieres = $oMatiere->rechercherListeMatieres();
                $oVue->aEcoles = $this->oUtilisateurSession->getListeEcoles();
                $oVue -> afficheFormulaireModificationTexte();
            }
            catch(Exception $e){
                $oTutoriel = new Tutoriel($this->getReqId());
                if($oTutoriel->chargerTutoriel() == false){
					$this->erreur404();
				}
				
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
                    if($oTutoriel->chargerTutoriel() == false){
						$this->erreur404();
					}

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
                    if($oTutoriel->chargerTutoriel() == false){
						$this->erreur404();
					}

                    $oVue -> oTutoriel = $oTutoriel;
                    $oVue -> afficheApprouverTuto();
                }
            }
            catch(Exception $e){
                header('location:'.WEB_ROOT.'/admin/tutoriel/gerer');
            }
        }

        private function visionner(){
            $oVue = new TutorielVue();
            try{
                $oTutoriel = new Tutoriel($this->getReqId());
                if($oTutoriel->chargerTutoriel() == false){
					$this->erreur404();	
				}
                $oVue->oTutoriel = $oTutoriel;

                if($oTutoriel->getType() == 1){
                    $oVue->afficheLeVideo();
                }
                else{
                    $oVue->afficheLeTexte();
                }
            }
            catch(Exception $e){
                echo "Une erreur est survenue. Veuillez réessayer plus tard.";
            }
        }
    }
?>