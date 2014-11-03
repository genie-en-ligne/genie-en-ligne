<?php
    class UtilisateurControleur extends Controleur {
        
        public function __construct($reqAction="erreur404", $reqId="", $oUtilisateurSession){            
            $this->setReqAction($reqAction);
            $this->setReqId($reqId);
            $this->oUtilisateurSession = $oUtilisateurSession;
        }
        
        public function gerer(){            
            switch($this->getReqAction()){                

                case 'accueil':
                    $this -> accueil();
                    break;
                case 'bienvenue':
                    $this -> bienvenue();
                    break;
                case 'pre-inscription':
                    $this -> preInscription();
                    break;
                case 'inscription':
                    $this -> inscription();
                    break;
                case 'creer-login':
                    $this -> creerLogin();
                    break;
                case 'envoyer-message':
                    $this -> envoyerMessage();
                    break;
                case 'recuperer-mdp':
                    $this -> recupererMdp();
                    break;
                case 'logout':
                    $this -> logout();
                    break;
                case 'modifier-mdp':
                    $this -> changerMDP();
                    break;
                case 'creer-login':
                    $this->creerLogin();
                    break;
                case 'gerer-tuteurs':
					if($this->oUtilisateurSession->getRole() != 3){
						$this->erreur404();
						break;
					}
                    $this -> gererTuteurs();
                    break;
                case 'ajouter-tuteur':
					if($this->oUtilisateurSession->getRole() != 3){
						$this->erreur404();
						break;
					}
                    $this->ajouterTuteur();
                    break;
                case 'modifier-tuteur':
					if($this->oUtilisateurSession->getRole() != 3){
						$this->erreur404();
						break;
					}
                    $this->modifierTuteur();
                    break;
                case 'gerer-profs':
					if($this->oUtilisateurSession->getRole() != 4){
						$this->erreur404();
						break;
					}
                    $this -> gererProfs();
                    break;
                case 'ajouter-prof':
					if($this->oUtilisateurSession->getRole() != 4){
						$this->erreur404();
						break;
					}
                    $this->ajouterProf();
                    break;
                case 'modifier-prof':
					if($this->oUtilisateurSession->getRole() != 4){
						$this->erreur404();
						break;
					}
                    $this->modifierProf();
                    break;
                case 'gerer-responsables':
					if($this->oUtilisateurSession->getRole() != 5){
						$this->erreur404();
						break;
					}
                    $this -> gererResponsables();
                    break;
                case 'ajouter-responsable':
					if($this->oUtilisateurSession->getRole() != 5){
						$this->erreur404();
						break;
					}
                    $this->ajouterResponsable();
                    break;
                case 'modifier-responsable':
					if($this->oUtilisateurSession->getRole() != 5){
						$this->erreur404();
						break;
					}
                    $this->modifierResponsable();
                    break;
                case 'supprimer':
					if($this->oUtilisateurSession->getRole() < 3){
						$this->erreur404();
						break;
					}
                    $this->supprimer();
                    break;
					
                default:
                    $this->erreur404();
                    break;
            }
        }
        
    
        
		private function accueil() {
			$oVue = new UtilisateurVue();
            
            try{
                //Si login soumis, gestion du login
                if(isset($_POST['subLogin'])){
                    $sPseudo = $_POST['txtPseudo'];
                    $sPass = $_POST['pwdPass'];
                    
                    $oUtilisateur = new Utilisateur(0, $sPseudo, $sPass);
                    if($oUtilisateur->validerInfosConnexion()){
                        $_SESSION['user_id'] = $oUtilisateur->getId();
                        
                        $oUtilisateur->ajouterActiviteLogin('login');
                        
                        if($oUtilisateur->getRole() < 3){
                            header("location:".WEB_ROOT."/utilisateur/bienvenue");
                        }
                        else{
                            header("location:".WEB_ROOT."/admin/utilisateur/bienvenue");
                        }
                    }
                    else{
                        $oVue -> setMessage(array("On ne retrouve pas ce compte", "danger"));
                        $oVue -> afficheAccueil();
                    }
                }
                //Si rien soumis, afficher l'accueil
                else{
                    $oVue -> afficheAccueil();
                }
            }
            catch(Exception $e){
                $oVue->setMessage(array($e->getMessage(), "danger"));
                $oVue->afficheAccueil();
            }
		}
        
        private function bienvenue(){
            $oVue = new UtilisateurVue();
            
            $oVue->oUtilisateurSession = $this->oUtilisateurSession;
            
            $oVue -> afficheBienvenue();
        }
        
        private function preInscription(){
            $oVue = new UtilisateurVue();
            try{
                if(isset($_POST['subPreInscription'])){
                    if(isset($_POST['txtNom']) && isset($_POST['txtCodePerm'])){
                        $oUtilisateur = new Utilisateur();
                        $oUtilisateur -> setCodePermanent($_POST['txtCodePerm']);
                        $oUtilisateur -> setNom($_POST['txtNom']);
                        if($oUtilisateur->pub_validerCodePermanent()){
                            header("location:".WEB_ROOT."/utilisateur/inscription/".$_POST['txtCodePerm']);
                        }
                        else{
                            $oVue -> setMessage(array("Le code permanent est invalide ou le nom ne correspond pas", "danger"));
                        }
                    }
                    else{
                        $oVue -> setMessage(array("Veuillez saisir les deux champs", "danger"));
                    }
                }
                $oVue -> affichePreInscription();
            }
            catch(Exception $e){
                $oVue -> setMessage(array($e->getMessage(), "danger"));
                $oVue -> affichePreInscription();
            }
        }

        private function inscription(){
            $oVue = new UtilisateurVue();
            try{
                if(isset($_POST['subInscription'])){
                    $oUtilisateur = new Utilisateur(0, $_POST['txtPseudo'], $_POST['pwdMdp1'], $_POST['txtNom'], $_POST['txtPrenom'], $_POST['txtCourriel'], 1);
                    if(!$oUtilisateur->deuxMotsDePasseIdentiques($_POST['pwdMdp1'], $_POST['pwdMdp2'])){
                        $oVue -> setMessage(array("Les deux mots de passe ne correspondent pas", "danger"));
                    }
                    elseif(!$oUtilisateur->motDePasseAssezComplexe($_POST['pwdMdp1'])){
                        $oVue -> setMessage(array("Le mot de passe n'est pas assez complexe", "danger"));
                    }
                    elseif(!$oUtilisateur->estDisponiblePseudo()){
                        $oVue -> setMessage(array("Le pseudo n'est pas disponible", "danger"));
                    }
                    else{
                        $oUtilisateur->ajouterUtilisateur();
                        $_SESSION['user_id'] = $oUtilisateur->getId();
                        header("location:".WEB_ROOT.'/utilisateur/bienvenue');
                    }
                }
                $oVue -> afficheInscription();
            }
            catch(Exception $e){
                $oVue -> setMessage(array($e->getMessage(), "danger"));
                $oVue -> afficheInscription();
            }
        }

        private function envoyerMessage(){
            $oVue = new UtilisateurVue();

            if(isset($_POST['subMessage'])){
                if($_POST['emlCourriel'] != "" && $_POST['txtMessage'] != ""){
                    $oVue->setMessage(array("Votre message a été envoyé aux responsables du site.", "info"));
                }
                else{
                    $oVue->setMessage(array("Veuillez saisir toutes les informations.", "danger"));
                }
            }

            $oVue->afficheEnvoyerMessage();
        }

        private function recupererMdp(){
            $oVue = new UtilisateurVue();

            if(isset($_POST['subRecupererMdp'])){
                if($_POST['emlCourriel'] != ""){
                    $oVue->setMessage(array("Un courriel vous a été envoyé pour réinitialiser votre mot de passe", "info"));
                }
                else{
                    $oVue->setMessage(array("Veuillez saisir toutes les informations.", "danger"));
                }
            }

            $oVue->afficheRecupererMDP();
        }
        
        private function logout(){
            $oVue = new UtilisateurVue();
                        
            $this->oUtilisateurSession->ajouterActiviteLogin('logout');
            $_SESSION = '';
            session_destroy();
            
            header("location:".WEB_ROOT);
        }
        
        private function changerMDP(){
            $oVue = new UtilisateurVue();
            
            try{
                if(isset($_POST['subProfil'])){
                    if(!$this->oUtilisateurSession->deuxMotsDePasseIdentiques($_POST['pwdMdp1'], $_POST['pwdMdp2'])){
                        $oVue -> setMessage(array("Les deux mots de passe ne correspondent pas", "danger"));
                    }
                    elseif(!$this->oUtilisateurSession->motDePasseAssezComplexe($_POST['pwdMdp1'])){
                        $oVue -> setMessage(array("Le mot de passe n'est pas assez complexe", "danger"));
                    }
                    else{
                        $this->oUtilisateurSession->setMDP($_POST['pwdMdp1']);
                        $this->oUtilisateurSession->changerMDP();
                        $oVue -> setMessage(array("Votre mot de passe a été changé", "info"));
                    }
                }
                $oVue->afficheProfil();
            }
            catch(Exception $e){
                $oVue->setMessage(array($e->getMessage(), "danger"));
                $oVue->afficheProfil();
            }
        }   

        private function gererTuteurs(){
            $oVue = new AdminVue();

            $oVue->aListeTuteurs = $this->oUtilisateurSession->rechercherListeTuteurs($this->oUtilisateurSession->getCommission());
            $oVue->afficheListeTuteurs();
        }    

        private function modifierTuteur(){
            $oVue = new AdminVue();
            $oMatiere = new Matiere();
            $oCommission = new Commission();
            $oCommission->setId($this->oUtilisateurSession->getCommission());

            try{
                if(isset($_POST['subModifierTuteur'])){
                    $oUtilisateur = new Utilisateur($this->getReqId(), ' ', ' ', $_POST['txtNom'], $_POST['txtPrenom'], $_POST['emlCourriel'], 2);
                    $oUtilisateur->modifierUtilisateur();

                    $oMatiere->modifierMatieresParUtilisateur($oUtilisateur, $_POST['chkMatieres']);
                    $oEcole = new Ecole();
                    $oEcole->modifierEcolesParUtilisateur($oUtilisateur, array($_POST['sltEcole']));

                    header("location:".WEB_ROOT."/admin/utilisateur/gerer-tuteurs");
                }   

                $oUtilisateur= new Utilisateur($this->getReqId());
                if($oUtilisateur->chargerCompteParId() == false){
					$this->erreur404();
				}

                $oVue->oUtilisateur = $oUtilisateur;

                $oVue->aListeMatieres = $oMatiere->rechercherListeMatieres();
                $oVue->aListeEcoles = $oCommission->rechercherListeEcoles();
                $oVue->aMatieresTuteur = $oMatiere->getMatieresPourUtilisateur($oUtilisateur);

                $oVue->afficheModifierTuteur();
            }
            catch(Exception $e){
                $oVue->setMessage(array($e->getMessage(), "danger"));
                $oVue->aListeMatieres = $oMatiere->rechercherListeMatieres();
                $oVue->aListeEcoles = $oCommission->rechercherListeEcoles();

                $oVue->afficheModifierTuteur();
            }
        }

        private function gererProfs(){
            $oVue = new AdminVue();

            $oVue->aListeProfs = $this->oUtilisateurSession->rechercherListeProfs($this->oUtilisateurSession->getCommission());
            $oVue->afficheListeProfesseurs();
        } 

        private function ajouterTuteur(){
            $oVue = new AdminVue();
            $oMatiere = new Matiere();
            $oCommission = new Commission();
            $oCommission->setId($this->oUtilisateurSession->getCommission());

            try{
                if(isset($_POST['subCreerTuteur'])){
                    $oUtilisateur = new Utilisateur(0, ' ', ' ', $_POST['txtNom'], $_POST['txtPrenom'], $_POST['emlCourriel'], 2);
                    $oUtilisateur->ajouterUtilisateur();

                    $oMatiere->modifierMatieresParUtilisateur($oUtilisateur, $_POST['chkMatieres']);
                    $oEcole = new Ecole();
                    $oEcole->modifierEcolesParUtilisateur($oUtilisateur, array($_POST['sltEcole']));

                    $oVue->setMessage(array("Le compte a été créé et une invitation a été envoyée par courriel", "info"));
                }   
                $oVue->aListeMatieres = $oMatiere->rechercherListeMatieres();
                $oVue->aListeEcoles = $oCommission->rechercherListeEcoles();

                $oVue->afficheAjouterTuteur();
            }
            catch(Exception $e){
                $oVue->setMessage(array($e->getMessage(), "danger"));
                $oVue->aListeMatieres = $oMatiere->rechercherListeMatieres();
                $oVue->aListeEcoles = $oCommission->rechercherListeEcoles();

                $oVue->afficheAjouterTuteur();
            }
        }

        private function creerLogin(){
            $oVue = new UtilisateurVue();
            $oUtilisateur = new Utilisateur($this->getReqId());
            if($oUtilisateur->chargerCompteParId() == false){
				$this->erreur404();	
			}
            $oVue->oUtilisateur = $oUtilisateur;

            try{
                if(isset($_POST['subCreerCompte'])){
                    $oUtilisateur->setPseudo($_POST['txtPseudo']);
                    if(!$oUtilisateur->deuxMotsDePasseIdentiques($_POST['pwdMdp1'], $_POST['pwdMdp2'])){
                        $oVue -> setMessage(array("Les deux mots de passe ne correspondent pas", "danger"));
                        $oVue->afficheCreerLogin();
                    }
                    elseif(!$oUtilisateur->motDePasseAssezComplexe($_POST['pwdMdp1'])){
                        $oVue -> setMessage(array("Le mot de passe n'est pas assez complexe", "danger"));
                        $oVue->afficheCreerLogin();
                    }
                    elseif(!$oUtilisateur->estDisponiblePseudo()){
                        $oVue -> setMessage(array("Ce pseudo est déjà pris", "danger"));
                        $oVue->afficheCreerLogin();
                    }
                    else{
                        $oUtilisateur->setMDP($_POST['pwdMdp1']);
                        $oUtilisateur->creerLogin();
                        $oVue -> afficheMessageConfirmation();
                    }
                }
                else{
                    $oVue->afficheCreerLogin();
                }
            }
            catch(Exception $e){
                $oVue->setMessage(array($e->getMessage(), "danger"));
                $oVue->afficheCreerLogin();
            }
        }

        private function supprimer(){
            $oVue = new AdminVue();
            try{
            $oUtilisateur = new Utilisateur($this->getReqId());
            if($oUtilisateur->chargerCompteParId() == false){
				$this->erreur404();
			}

            if(isset($_POST['subSupprimer'])){
                $oUtilisateur->supprimer();
                switch($oUtilisateur->getRole()){
                    case '2':
                        header("location:".WEB_ROOT.'/admin/utilisateur/gerer-tuteurs');
                        break;
                    case '3':
                        header("location:".WEB_ROOT.'/admin/utilisateur/gerer-profs');
                        break;
                    case '4':
                        header("location:".WEB_ROOT.'/admin/utilisateur/gerer-responsables');
                        break;
                }
            }

            $oVue->oUtilisateur = $oUtilisateur;
            $oVue->afficheSupprimerUtilisateurs();
            }
            catch(Exception $e){
                header("location:".WEB_ROOT.'/admin');
            }
        }

        private function ajouterProf(){
            $oVue = new AdminVue();
            $oMatiere = new Matiere();
            $oCommission = new Commission();
            $oCommission->setId($this->oUtilisateurSession->getCommission());

            try{
                if(isset($_POST['subCreerProf'])){
                    $oUtilisateur = new Utilisateur(0, ' ', ' ', $_POST['txtNom'], $_POST['txtPrenom'], $_POST['emlCourriel'], 3);
                    $oUtilisateur->ajouterUtilisateur();

                    $oMatiere->modifierMatieresParUtilisateur($oUtilisateur, $_POST['chkMatieres']);
                    $oEcole = new Ecole();
                    $oEcole->modifierEcolesParUtilisateur($oUtilisateur, $_POST['sltEcoles']);

                    $oVue->setMessage(array("Le compte a été créé et une invitation a été envoyée par courriel", "info"));
                }   
                $oVue->aListeMatieres = $oMatiere->rechercherListeMatieres();
                $oVue->aListeEcoles = $oCommission->rechercherListeEcoles();

                $oVue->afficheAjouterProfesseur();
            }
            catch(Exception $e){
                $oVue->setMessage(array($e->getMessage(), "danger"));
                $oVue->aListeMatieres = $oMatiere->rechercherListeMatieres();
                $oVue->aListeEcoles = $oCommission->rechercherListeEcoles();

                $oVue->afficheAjouterProfesseur();
            }
        } 

        private function modifierProf(){
            $oVue = new AdminVue();
            $oMatiere = new Matiere();
            $oCommission = new Commission();
            $oCommission->setId($this->oUtilisateurSession->getCommission());

            try{
                if(isset($_POST['subModifierProf'])){
                    $oUtilisateur = new Utilisateur($this->getReqId(), ' ', ' ', $_POST['txtNom'], $_POST['txtPrenom'], $_POST['emlCourriel'], 3);
                    $oUtilisateur->modifierUtilisateur();

                    $oMatiere->modifierMatieresParUtilisateur($oUtilisateur, $_POST['chkMatieres']);
                    $oEcole = new Ecole();
                    $oEcole->modifierEcolesParUtilisateur($oUtilisateur, $_POST['sltEcoles']);

                    header("location:".WEB_ROOT."/admin/utilisateur/gerer-profs");
                }   

                $oUtilisateur= new Utilisateur($this->getReqId());
                if($oUtilisateur->chargerCompteParId() == false){
					$this->erreur404();
				}

                $oVue->oUtilisateur = $oUtilisateur;

                $oVue->aListeMatieres = $oMatiere->rechercherListeMatieres();
                $oVue->aListeEcoles = $oCommission->rechercherListeEcoles();
                $oVue->aMatieresTuteur = $oMatiere->getMatieresPourUtilisateur($oUtilisateur);

                $oVue->afficheModifierProfesseur();
            }
            catch(Exception $e){
                $oVue->setMessage(array($e->getMessage(), "danger"));
                $oVue->aListeMatieres = $oMatiere->rechercherListeMatieres();
                $oVue->aListeEcoles = $oCommission->rechercherListeEcoles();

                $oVue->afficheModifierProfesseur();
            }
        }

        private function gererResponsables(){
            $oVue = new AdminVue();

            $oVue->aListeResponsables = $this->oUtilisateurSession->rechercherListeResponsables();
            $oVue->afficheListeResponsables();
        } 

        private function ajouterResponsable(){
            $oVue = new AdminVue();
            $oCommission = new Commission();
            $oVue->aListeCommissions = $oCommission->rechercherListeCommissions();

            try{
                if(isset($_POST['subCreerResponsable'])){
                    $oUtilisateur = new Utilisateur(0, ' ', ' ', $_POST['txtNom'], $_POST['txtPrenom'], $_POST['emlCourriel'], 4);
                    $oUtilisateur->ajouterUtilisateur();

                    $oCommission = new Commission($_POST['sltCommissions']);
                    if($oCommission->chargerCommission() == false){
						$this->erreur404();	
					}
                    $oCommission->retirerResponsable();
                    $oCommission->setResponsable($oUtilisateur->getId());
                    $oCommission->modifierCommission();

                    header("location:".WEB_ROOT."/admin/utilisateur/gerer-responsables");
                }   

                $oVue->afficheAjouterResponsable();
            }
            catch(Exception $e){
                $oVue->setMessage(array($e->getMessage(), "danger"));

                $oVue->afficheAjouterResponsable();
            }
        }   

        private function modifierResponsable(){
            $oVue = new AdminVue();
            $oCommission = new Commission();
            $oVue->aListeCommissions = $oCommission->rechercherListeCommissions();

            $oUtilisateur = new Utilisateur($this->getReqId());
            if($oUtilisateur->chargerCompteParId() == false){
				$this->erreur404();
			}
            $oVue->oUtilisateur = $oUtilisateur;

            try{
                if(isset($_POST['subModifierResponsable'])){
                    $oUtilisateur = new Utilisateur($this->getReqId(), ' ', ' ', $_POST['txtNom'], $_POST['txtPrenom'], $_POST['emlCourriel'], 4);
                    $oUtilisateur->modifierUtilisateur();

                    $oCommission = new Commission($_POST['sltCommissions']);
                    if($oCommission->chargerCommission() == false){
						$this->erreur404();
					}
                    $oCommission->retirerResponsable();
                    $oCommission->setResponsable($oUtilisateur->getId());
                    $oCommission->modifierCommission();

                    header("location:".WEB_ROOT."/admin/utilisateur/gerer-responsables");
                }   

                $oVue->afficheModifierResponsable();
            }
            catch(Exception $e){
                $oVue->setMessage(array($e->getMessage(), "danger"));

                $oVue->afficheModifierResponsable();
            }
        }
       
		//TODO:  Placer les autres méthodes du controleur ici.
    }
?>