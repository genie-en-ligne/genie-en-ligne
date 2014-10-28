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
    
    public function afficheErreur404(){?>
        <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>
        <div class="row">
            <div class="col-sm-12 col-sm-offset-0">
                <div class="">

                    <h1 class="text-center col-sm-12 text-danger page-header">
                        <strong>Erreur 404</strong>
                    </h1>

                    <h2 class="col-sm-offset-0 col-sm-12 bold">
                        <strong>Vous avez été redirigé ici pour l'une des raisons suivantes:</strong>
                    </h2>
                    <h3 class="col-sm-offset-0 col-sm-12 bold">
                        <strong>Vous ne détenez pas les droits requis pour accéder au contenu de la page recherchée.</strong>
                    </h3>
                    <h3 class="col-sm-offset-0 col-sm-12 bold">
                        <strong>La page que vous recherchez est en construction.</strong>
                    </h3>
                     <h3 class="col-sm-offset-0 col-sm-12 bold">
                        <strong>La page que vous recherchez n'existe pas.</strong>
                    </h3>
                    <div class="col-sm-offset-0 col-sm-12 page-header">       
                    </div>
                        
                </div>
            </div>
        </div>
    <?php
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