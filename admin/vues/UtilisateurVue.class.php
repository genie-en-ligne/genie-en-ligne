<?php
class UtilisateurVue extends Vue {
    
/*======================*/
/*== afficheBienvenue ==*/
/*======================*/
    
    public function afficheBienvenue() {?>
        <div class="page-header">
            <h1>Bienvenue <?php echo $this->oUtilisateurSession->getPrenom();?>!</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="bienvenue text-center">
                    <img src="<?php echo WEB_ROOT;?>/images/video.jpg"><br>

                    <div class="col-md-12 espace-avant">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-lg">
                                <span class="glyphicon glyphicon-play"></span>jouer
                            </button>
                            <button type="button" class="btn btn-default btn-lg">
                                <span class="glyphicon glyphicon-pause"></span>pause
                            </button>
                        </div>
                    </div>
                    
                    <h2>Regardez cette vidéo pour un départ rapide</h2>
                </div>
            </div><!-- .col-md-12 -->

        </div><!-- .row -->
    <?php
    }
    
    public function afficheProfil(){
        //Form de changement de mot de passe, avec infos sommaires sur l'usager
    }

    //TODO: Ajouter des méthodes au besoin
}
?>