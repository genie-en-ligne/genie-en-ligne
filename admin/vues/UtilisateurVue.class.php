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
        <div class="col-sm-offset-0 col-sm-12">
            <div class="text-center">
                <h1>
                    <span class="label label-default">Modifier le mot de passe</span>
                </h1>
            </div>
            <div class="col-sm-6 col-sm-offset-2">
                <div class="col-sm-12 page-header">         
                </div>
                <div class="col-sm-12 col-sm-offset-1">
                    <form id="frmProfilUtil" method="POST" action="<?php echo WEB_ROOT;?>/admin/utilisateur/modifier-mdp" class="form-horizontal" role="form">
                        <div class="form-group"></div>
                        <div class="form-group">
                            <label for="pwdMdp1" class="col-sm-4 control-label">Mot de passe :</label>
                            <div class="col-sm-6">
                                <input type="password" id="pwdMdp1" class="form-control" name="pwdMdp1" placeholder="Mot de passe">
                                <div class="divErreur" id="pwdMdp1Erreur"></div>
                            </div>
                        </div>
                        <div class="form-group"></div>
                        <div class="form-group">
                            <label for="pwdMdp2" class="col-sm-4 control-label">Mot de passe :</label>
                            <div class="col-sm-6">
                                <input type="password" id="pwdMdp2" class="form-control" name="pwdMdp2" placeholder="Mot de passe">
                                 <div class="divErreur" id="pwdMdp2Erreur"></div>
                            </div>
                        </div>
                        <div class="form-group"></div>
                        <div class="form-group"></div>
                        <div class="form-group text-center">
                            <div class="col-sm-6 col-sm-offset-4">
                                <a href="<?php echo WEB_ROOT;?>/admin" class="btn btn-primary col-sm-5">
                                    Retour   
                                </a>
                                <button type="submit" name="subProfil" id="btnProfilUtil" class="btn btn-success col-sm-5 col-sm-offset-2">
                                    Soumettre
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="<?php echo WEB_ROOT;?>/admin/js/Admin.js"></script>
    <?php }
}
?>