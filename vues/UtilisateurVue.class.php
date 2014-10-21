<?php
class UtilisateurVue extends Vue {
    
    public function afficheAccueil(){?>
        <div class="page-header">
            <h1>Bienvenue à Génie en ligne!</h1>
        </div>
        <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>
        <!-- Le carousel, le login et les panels vont ici. -->
    <?php
    }
    
    public function afficheBienvenue(){?>
    
    <?php
        header("location:".WEB_ROOT."/utilisateur/profil");
    }
    
    public function afficheProfil(){?>
        <div class="page-header">
            <h1>Ceci est le profil</h1>
        </div>
        <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>
        <!-- Form de changement de mot de passe, avec infos sommaires sur l'usager -->
    <?php
    }

    //TODO: Ajouter des méthodes au besoin
}
?>