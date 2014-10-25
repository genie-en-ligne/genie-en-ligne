<?php
    class AdminControleur extends Controleur {
        
        public function __construct($reqAction="erreur404", $reqId="", $oUtilisateurSession){            
            $this->setReqAction($reqAction);
            $this->setReqId($reqId);
            $this->oUtilisateurSession = $oUtilisateurSession;
        }

        public function gerer(){
            switch ($this->getReqAction()) {                

                case 'gererTuteurs':
                    $this -> gererTuteurs();
                    break;
                case 'gererProfs':
                    $this -> gererProfs();
                    break;
                case 'gererCommissions':
                    $this -> gererCommissions();
                    break;
                case 'gererModulesCommissions':
                    $this -> gererModulesCommissions();
                    break;
                case 'gererMatieres':
                    $this -> gererMatieres();
                    break;

                //TODO: Ajouter des cas au besoin

                default:
                    $this->erreur404();
                    break;
            }
        }
        
    
        
		private function gererTuteurs() {
			$oVue = new UtilisateurVue();
			$oVue -> afficheAccueil();
		}     
       
		//TODO:  Placer les autres méthodes du controleur ici.
    }
?>