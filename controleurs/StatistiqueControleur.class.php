<?php
    class StatistiqueControleur extends Controleur {
        
        public function __construct($reqAction="erreur404", $reqId="", $oUtilisateurSession){            
            $this->setReqAction($reqAction);
            $this->setReqId($reqId);
            $this->oUtilisateurSession = $oUtilisateurSession;
        }

        public function gerer(){
            switch ($this->getReqAction()) {                

                case 'personel':
                    $this -> consulterStatsPersonnelles();
                    break;

                //TODO: Ajouter des cas au besoin

                default:
                    $this->erreur404();
                    break;
            }
        }
        
    
        
		private function consulterStatsPersonnelle() {
			$oVue = new UtilisateurVue();
                
            //Si utilisateur est élève
                //TODO: Utiliser le modèle pour aller chercher les stats des élèves
                $oVue -> afficheStatsEleve();
            
            //Si utilisateur est tuteur   
                //TODO: Utiliser le modèle pour aller chercher les stats des tuteurs         
                $oVue -> afficheStatsTuteur();
        }
       
		//TODO: Placer les autres méthodes du controleur ici.
    }
?>