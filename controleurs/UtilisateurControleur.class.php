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
                    //TODO: Activer
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
                case 'gerer-tuteurs':
                    $this -> gererTuteurs();
                    break;
                case 'gerer-profs':
                    $this -> gererProfs();
                    break;
                case 'gerer-commissions':
                    $this -> gererCommissions();
                    break;
                case 'ajouter-tuteur':
                    $this->ajouterTuteur();
                    break;

                //TODO: Ajouter des cas au besoin

                //L'inscription des utilisateurs normaux et invités par courriel se fera par AJAX
                //La récupération de mot de passe sera aussi faite par AJAX
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

        private function gererProfs(){
            $oVue = new AdminVue();

            $oVue->aListeProfs = $this->oUtilisateurSession->rechercherListeProfs($this->oUtilisateurSession->getCommission());
            $oVue->afficheListeProfesseurs();
        } 

        private function gererCommissions(){
            $oVue = new AdminVue();
            $oCommission = new Commission();

            $oVue->aListeCommissions = $oCommission->rechercherListeCommissions();
            $oVue->afficheListeCommissions();
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
       
		//TODO:  Placer les autres méthodes du controleur ici.
    }
?>