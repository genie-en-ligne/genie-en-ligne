<?php
/**
 * Class Controleur
 * Gère les requêtes HTTP
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2013-12-10
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */

class Controleur 
{
    private $reqModule = "Utilisateur";
    private $reqAction = "erreur404";
    private $reqId = "";
    
    protected $oUtilisateurSession;
    
        public function __construct($oUtilisateurSession){
            $this->oUtilisateurSession = $oUtilisateurSession;
        }
	
		/**
		 * Traite la requête
		 * @return void
		 */
		public function gerer(){            
            $request = $_GET['request'];
            
            if($request === "" || $request === "/" || $this->oUtilisateurSession->utilisateurEstConnecte() === false) {
                $this->setReqModule("Utilisateur");
                $this->setReqAction("accueil");
            }
            else{                                 
                $parts = explode("/", rtrim($request, '/'));//Remove trailing slash
                
                if(@is_subclass_of(ucfirst(strtolower($parts[0])).'Controleur', 'Controleur')){
                    if(count($parts) == 3){
                        $this->setReqModule(ucfirst(strtolower($parts[0])));
                        $this->setReqAction(strtolower($parts[1]));
                        $this->setReqId($parts[2]);
                    }
                    elseif(count($parts) == 2){
                        $this->setReqModule(ucfirst(strtolower($parts[0])));
                        $this->setReqAction(strtolower($parts[1]));
                    }
                    elseif(count($parts) == 1){
                        $this->setReqModule(ucfirst(strtolower($parts[0])));
                    }
                }
            }
            
            $sSubControleur = $this->getReqModule().'Controleur';
            
            $oSubControleur = new $sSubControleur($this->getReqAction(), $this->getReqId(), $this->oUtilisateurSession);
            $oSubControleur->gerer();
        }
            
        protected function erreur404(){
            $oVue = new Vue();
            $oVue->afficheErreur404();
        }
		
		protected function setReqModule($reqModule){
            $this->reqModule = $reqModule;
        }
        protected function setReqAction($reqAction){
            $this->reqAction = $reqAction;
        }
        protected function setReqId($reqId){
            $this->reqId = $reqId;
        }
    
        protected function getReqModule(){
            return $this->reqModule;
        }
        protected function getReqAction(){
            return $this->reqAction;
        }
        protected function getReqId(){
            return $this->reqId;
        }
}
?>















