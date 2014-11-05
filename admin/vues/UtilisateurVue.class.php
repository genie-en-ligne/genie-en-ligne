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
                   <video controls>
                        <source src="<?php echo WEB_ROOT;?>/videos/AdminVideo.mp4" type="video/mp4">
                        <source src="<?php echo WEB_ROOT;?>/videos/AdminVideo.ogv" type="video/ogg">
                        Votre fureteur ne supporte pas ce vidéo<br>
                    </video>

                    <div class="col-md-12 espace-avant">
                    </div>
                    
                    <h2>Regardez cette vidéo pour un départ rapide</h2>
                </div>
            </div><!-- .col-md-12 -->

        </div><!-- .row -->
    <?php
    }
    
    /*===================*/
    /*== afficheProfil ==*/
    /*===================*/
    
    public function afficheProfil(){?>
        
        <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>
        <div class="row">
            <div class="col-sm-offset-3 col-sm-6 text-center">
                <h1>
                    <span class="label label-default">Modifier</span>
                </h1>
            </div>
            <div class="col-sm-offset-4 col-sm-4 page-header">
                           
            </div>            
            <div class="col-sm-6 col-sm-offset-3">
                <form id="frmProfilUtil" method="POST" action="<?php echo WEB_ROOT;?>/admin/utilisateur/modifier-mdp" class="form-horizontal" role="form">
                     <div class="form-group">
                        <label for="txtProfilMdp1" class="col-sm-4 control-label">Mot de passe :</label>
                        <div class="col-sm-6">
                            <input type="password" id="txtProfilMdp" class="form-control" name="pwdMdp1" placeholder="Mot de passe">
                            <div class="divErreur" id="txtProfilMdpErreur"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtProfilMdp2" class="col-sm-4 control-label">Mot de passe :</label>
                        <div class="col-sm-6">
                            <input type="password" id="txtProfilMdp2" class="form-control" name="pwdMdp2" placeholder="Mot de passe">
                             <div class="divErreur" id="txtProfilMdp2Erreur"></div>
                        </div>
                    </div>
                    <div class="form-group"></div>
                    <div class="form-group"></div>
                    <div class="form-group text-center">
                        <button type="refresh" class="btn btn-primary">
                            Recommencer
                        </button>
                        <button type="submit" name="subProfil" id="btnProfilUtil" class="btn btn-success ">
                            Soumettre
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php }
}
?>