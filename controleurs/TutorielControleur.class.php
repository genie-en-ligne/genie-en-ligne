<?php
    /**
    * Le controleur pour les tutoriels
    *@param  Void
    *@return Void
    */
    class TutorielControleur extends Controleur {
        
        public function __construct($reqAction="erreur404", $reqId="", $oUtilisateurSession){            
            $this->setReqAction($reqAction);
            $this->setReqId($reqId);
            $this->oUtilisateurSession = $oUtilisateurSession;
        }

        /**
        * Un switch case pour chaque action du menu disponible
        *@param  Void
        *@return Void
        */

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
                case 'visionner':
                    $this->visionner();
                    break;

                //TODO: Ajouter des cas au besoin

                default:
                    $this->erreur404();
                    break;
            }
        }
        

        /**
        * Fonction pour consulter les tutoriels
        *@param  Void
        *@return Void
        */        
		private function consulter() {
			$oVue = new TutorielVue();
            $oMatiere = new Matiere();
            
            try{
                if($_GET['matiere'] != 0 && $_GET['niveau'] != 0){
                    $oTutoriel = new Tutoriel();
                    $oTutoriel->setMatiereId($_GET['matiere']);//Choisir la matière
                    $oTutoriel->setNiveauScolaire($_GET['niveau']);// choisir le niveau de scolarité
                    $oVue->aListeTutos = $oTutoriel->rechercherListeTutosParEleve();
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
        *@param  Void
        *@return Void
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
        *@param  Void
        *@return Void
        */   
		private function modifierVideo() {
			$oVue = new TutorielVue();
            $oMatiere = new Matiere();

            try{
                if(isset($_POST['subModifierVideo'])){
                    $oAncienTuto = new Tutoriel($this->getReqId());
                    $oAncienTuto->chargerTutoriel(); // charger les information du tuto present

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
                    $oTutoriel->chargerTutoriel(); //afficher la vue pour gere les tutoriels
                    $oVue->oTutoriel = $oTutoriel;
                }
                
                //Si il ny a pas d'ection alors la vue affiche formulaire modification va afficher
                $oVue->aMatieres = $oMatiere->rechercherListeMatieres();
                $oVue->aEcoles = $this->oUtilisateurSession->getListeEcoles();
                $oVue -> afficheFormulaireModificationVideo();
            }
            catch(Exception $e){
                $oTutoriel = new Tutoriel($this->getReqId());
                $oTutoriel->chargerTutoriel();
                $oVue->oTutoriel = $oTutoriel;
                $oVue->setMessage(array($e->getMessage(), "danger"));//les erreurs
                $oVue->aMatieres = $oMatiere->rechercherListeMatieres();
                $oVue->aEcoles = $this->oUtilisateurSession->getListeEcoles();
                $oVue -> afficheFormulaireModificationVideo();
            }  
		}

        /**
        * Fonction de vue permetant de modifier un texte
        *@param  Void
        *@return Void
        */   
        private function modifierTexte() {
            $oVue = new TutorielVue();
            $oMatiere = new Matiere();

            try{
                if(isset($_POST['subModifierTexte'])){
                    $oAncienTuto = new Tutoriel($this->getReqId());
                    $oAncienTuto->chargerTutoriel(); // charger tout les infos pour le tuto

                    $oTutoriel = new Tutoriel($this->getReqId(), $_POST['txtTitre'], date("Y-m-d"), "0000-00-00", $this->oUtilisateurSession->getId(), $oAncienTuto->getApprouvePar(), $oAncienTuto->getStatut(), 2, $_POST['sltMatiere'], $_POST['sltNiveau'], 0, $_POST['sltEcole'], $_POST['txtContenu']);
                    $oTutoriel->modifierTuto(); // function pour modifier
                    if($this->oUtilisateurSession->getRole() == 2){
                        header('location:'.WEB_ROOT.'/tutoriel/gerer');
                    }
                    else{
                        header('location:'.WEB_ROOT.'/admin/tutoriel/gerer');
                    }
                }
                else{
                    $oTutoriel = new Tutoriel($this->getReqId());
                    $oTutoriel->chargerTutoriel(); // montrer les tutos
                    $oVue->oTutoriel = $oTutoriel;
                }
                
                $oVue->aMatieres = $oMatiere->rechercherListeMatieres(); // charger les matieres pour le select
                $oVue->aEcoles = $this->oUtilisateurSession->getListeEcoles(); // charger la liste des écoles pour le select
                $oVue -> afficheFormulaireModificationTexte(); // afficher la vue du formulaire
            }
            catch(Exception $e){
                $oTutoriel = new Tutoriel($this->getReqId());
                $oTutoriel->chargerTutoriel();
                $oVue->oTutoriel = $oTutoriel;
                $oVue->setMessage(array($e->getMessage(), "danger")); // les erreurs
                $oVue->aMatieres = $oMatiere->rechercherListeMatieres(); // chercher les matieres dans la basse de donnée
                $oVue->aEcoles = $this->oUtilisateurSession->getListeEcoles();// chercher la liste des écoles
                $oVue -> afficheFormulaireModificationTexte(); // afficher la vue
            }  
        }

         /**
        * Fonction de vue permetant de suprimer un tuto
        *@param  Void
        *@return Void
        */   
		private function supprimer() {
			$oVue = new TutorielVue();
            try{
                if(isset($_POST['subSupprimer'])){
                    $oTutoriel = new Tutoriel($_POST['hidContenuId']); // Va chercher le id cacher dans le html
                    $oTutoriel->supprimerTuto(); // function de supression
                    if($this->oUtilisateurSession->getRole() == 2){ // si c'est un tuteur (2)
                        header('location:'.WEB_ROOT.'/tutoriel/gerer'); // afficher la page géré
                    }
                    else{
                        header('location:'.WEB_ROOT.'/admin/tutoriel/gerer');// sinon afficher la page du coté admin
                    }
                }
                else{
                    $oTutoriel = new Tutoriel($this->getReqId()); // chercher le id du utilisateur
                    $oTutoriel->chargerTutoriel(); // afficher les tutos de l'utilisateur

                    //Affiche la vue suprimer
                    $oVue -> oTutoriel = $oTutoriel;
        			$oVue -> afficheSupprimerTuto();
                }
            }
            catch(Exception $e){
                if($this->oUtilisateurSession->getRole() == 2){// si c'est un tuteur (2)
                    header('location:'.WEB_ROOT.'/tutoriel/gerer');// afficher la page géré
                }
                else{
                    header('location:'.WEB_ROOT.'/admin/tutoriel/gerer');// sinon afficher la page du coté admin
                }
            }
		}


        /**
        * Fonction de vue a ajouter un vidéo
        *@param  Void
        *@return Void
        */   
		private function ajouterVideo() {
			$oVue = new TutorielVue();
            $oMatiere = new Matiere();

            try{
                if(isset($_POST['subAjouterVideo'])){// Bouton submit
                    $approuve = 0; //le variable de defaut qui veut dire pas approuver
                    $approuve_par = 0;// valeur par defaut pour le id du responsable car le video n'est pas encore approuver 
                    if($this->oUtilisateurSession->getRole() > 2){ // si le id n'est pas tuteur(2) mais un prof ou un responsable
                        $approuve = 1; // est automatiquement approuver
                        $approuve_par = $this->oUtilisateurSession->getId(); // le id de la même personne qui soumette le tuto
                    }

                    $oTutoriel = new Tutoriel(0, $_POST['txtTitre'], date("Y-m-d"), "0000-00-00", $this->oUtilisateurSession->getId(), $approuve_par, $approuve, 1, $_POST['sltMatiere'], $_POST['sltNiveau'], 0, $_POST['sltEcole'], $_POST['txtUrl']);
                    $oTutoriel->ajouterTuto();
                    if($this->oUtilisateurSession->getRole() == 2){ // si le id est égal a tuto
                        header('location:'.WEB_ROOT.'/tutoriel/gerer');
                    }
                    else{
                        header('location:'.WEB_ROOT.'/admin/tutoriel/gerer'); // sinon c'est la vue des admins (prof, responsable)
                    }
                }
                
                $oVue->aMatieres = $oMatiere->rechercherListeMatieres(); // charger la liste des matières
                $oVue->aEcoles = $this->oUtilisateurSession->getListeEcoles(); // charger la liste d'école
    			$oVue -> afficheFormulaireCreationVideo(); // Afficher la vue du formulaire
            }
            catch(Exception $e){
                $oVue->setMessage(array($e->getMessage(), "danger"));// Les erreur
                $oVue->aMatieres = $oMatiere->rechercherListeMatieres(); // Charger les matières
                $oVue->aEcoles = $this->oUtilisateurSession->getListeEcoles(); // chager la liste des écoles
                $oVue -> afficheFormulaireCreationVideo(); //afficher vue du formulaire de creation
            }  
		}

        /**
        * Fonction de vue ajouter du texte
        *@param  Void
        *@return Void
        */   
        private function ajouterTexte() {
            $oVue = new TutorielVue();
            $oMatiere = new Matiere();

            try{
                if(isset($_POST['subAjouterTexte'])){// button submit
                    $approuve = 0; // texte n'est pas approuvé
                    $approuve_par = 0;// valeur par defaut pour le id du responsable car le video n'est pas encore approuver 
                    if($this->oUtilisateurSession->getRole() > 2){// si ce n'est pas un tuteur ou un élève
                        $approuve = 1; // approuvé automatiquement
                        $approuve_par = $this->oUtilisateurSession->getId();
                    }

                    $oTutoriel = new Tutoriel(0, $_POST['txtTitre'], date("Y-m-d"), "0000-00-00", $this->oUtilisateurSession->getId(), $approuve_par, $approuve, 2, $_POST['sltMatiere'], $_POST['sltNiveau'], 0, $_POST['sltEcole'], $_POST['txtContenu']);
                    $oTutoriel->ajouterTuto(); // function pour ajouter un tuto
                    if($this->oUtilisateurSession->getRole() == 2){ // si c'est un tuteur
                        header('location:'.WEB_ROOT.'/tutoriel/gerer'); // afficher site public
                    }
                    else{
                        header('location:'.WEB_ROOT.'/admin/tutoriel/gerer');//afficher site coté admin
                    }
                }
                
                $oVue->aMatieres = $oMatiere->rechercherListeMatieres(); // charger la liste de matière
                $oVue->aEcoles = $this->oUtilisateurSession->getListeEcoles();// charger la liste des écoles
                $oVue -> afficheFormulaireCreationTexte();// afficher le formulaire
            }
            catch(Exception $e){
                $oVue->setMessage(array($e->getMessage(), "danger"));//erreur
                $oVue->aMatieres = $oMatiere->rechercherListeMatieres();// charger la liste des matières
                $oVue->aEcoles = $this->oUtilisateurSession->getListeEcoles();//charger la liste des écoles
                $oVue -> afficheFormulaireCreationTexte();// afficher le formulaire
            }  
        }

        /**
        * Fonction qui permet aux responsablex ou prof d'approuver les tutos
        *@param  Void
        *@return Void
        */   
        private function approuver(){
            $oVue = new TutorielVue();
            try{
                if(isset($_POST['subApprouver'])){ //button submit
                    $oTutoriel = new Tutoriel($_POST['hidContenuId']); // prendre le id du video qui est caché dans le html
                    $oTutoriel->setApprouvePar($this->oUtilisateurSession->getId());//prend le id du admin
                    $oTutoriel->setDateApprouve(date("Y-m-d"));// ajouter la date d'aujourd'hui
                    $oTutoriel->approuverTuto();// modifier dans la basse de donnée la valeur 1 dans le champs approuver
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

        /**
        * Fonction qui permet de visionner les tutos
        *@param  Void
        *@return Void
        */   
        private function visionner(){
            $oVue = new TutorielVue();
            try{
                $oTutoriel = new Tutoriel($this->getReqId());// avoir l'id du tuto
                $oTutoriel->chargerTutoriel(); // charger les infos du tuto
                $oVue->oTutoriel = $oTutoriel;

                if($oTutoriel->getType() == 1){// si c'est un vidéo
                    $oVue->afficheLeVideo();//afficher le video
                }
                else{
                    $oVue->afficheLeTexte();//sinon affiche le texte
                }
            }
            catch(Exception $e){
                echo "Une erreur est survenue. Veuillez réessayer plus tard.";
            }
        }
    }
?>