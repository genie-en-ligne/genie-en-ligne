<?php
    class TutorielControleur extends Controleur {
        
        public function __construct($reqAction="erreur404", $reqId=""){            
            $this->setReqAction($reqAction);
            $this->setReqId($reqId);
        }

        public function gerer(){
            switch ($this->getReqAction()) {                

                case 'consulter':
                    $this -> consulter();
                    break;
                case 'gerer':
                    $this -> gererr();
                    break;
                case 'modifier':
                    $this -> modifier();
                    break;
                case 'supprimer':
                    $this -> supprimer();
                    break;
                case 'ajouter':
                    $this -> ajouter();
                    break;

                //TODO: Ajouter des cas au besoin

                default:
                    $this->erreur404();
                    break;
            }
        }
        
    
        
		private function consulter() {
			$oVue = new UtilisateurVue();
                
            //TODO: Utiliser le modèle pour aller chercher la liste de tutoriels affichés selon qui est loggé
            //TODO: Prendre en considération les critères de recherche (année, matière)
            
			$oVue -> afficheListeConsulter();
		}
		private function gerer() {
			$oVue = new UtilisateurVue();
            
            //TODO: Vérifier si l'utilisateur est un tuteur
                //Si non
                    $oVue -> afficheErreur404();
            //TODO: Utiliser le modèle pour aller chercher les tutos de ce tuteur
            
			$oVue -> afficheListeGerer();
		}
		private function modifier() {
			$oVue = new UtilisateurVue();
            
            //TODO: Vérifier si l'utilisateur est tuteur
                //Si non
                    $oVue -> afficheErreur404();
            //TODO: Utiliser le modèle pour enregistrer les changements
            
			$oVue -> afficheListeGerer();
		}
		private function supprimer() {
			$oVue = new UtilisateurVue();
            
            //TODO: Vérifier si l'utilisateur est tuteur
                //Si non
                    $oVue -> afficheErreur404();
            //TODO: Utiliser le modèle pour supprimer de la db
			$oVue -> afficheListeGerer();
		}
		private function ajouter() {
			$oVue = new UtilisateurVue();
            
            //TODO: Vérifier si l'utilisateur est tuteur
                //Si non
                    $oVue -> afficheErreur404();
            //TODO: Utiliser le modèle pour sauvegarder le nouveau tuto
			$oVue -> afficheListeGerer();
		}
        
               
       
		//TODO:  Placer les autres méthodes du controleur ici.
    }
?>