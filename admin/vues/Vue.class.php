<?php
/**
 * Class Vue
 * Template de classe Vue. Dupliquer et modifier pour votre usage.
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2013-12-11
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */


class Vue {
    
    //Param 1 = Contenu texte à afficher
    //Param 2 = Classe de couleur du message d'alert bootstrap (default, primary, warning, danger, succes, info, etc.)
    private $aMessage;
    
    public function afficheErreur404(){
        //Page qui dit "Soit vous vous êtes trompé de lien ou vous n'avez pas l'autorisation d'aller à cet endroit"
    }
    
    public function setMessage($message){
        //Valider contenu de variable
        $this->aMessage = $message;
    }
    
    public function getMessage(){
        if(!empty($this->aMessage)){
            return $this->aMessage;
        }
        return false;
    }
	

}
?>