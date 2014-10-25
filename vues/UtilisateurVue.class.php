<?php
class UtilisateurVue extends Vue {
    
/*====================*/
/*== afficheAccueil ==*/
/*====================*/

  
    public function afficheAccueil(){ 
    ?>
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
        
        
        <div class="row">
            <!-------------->
            <!-- CAROUSEL -->
            <!-------------->


            <div class="hidden-xs col-sm-12 col-md-8">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Conteneur des diapositives -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="<?php echo WEB_ROOT;?>/images/bad_student_01.png" alt="bad_student">
                        </div>
                        <div class="item">
                            <img src="<?php echo WEB_ROOT;?>/images/scheme.png" alt="Schéma">
                        </div>
                        <div class="item">
                            <img src="<?php echo WEB_ROOT;?>/images/finissants.png" alt="Finissants">
                        </div>
                    </div><!-- .carousel-inner -->
                </div><!-- .carousel.slide -->
            </div><!-- .hidden-xs.col-sm-12.col-md-8 -->


            <!----------------------------->
            <!-- FORMULAIRE DE CONNEXION -->
            <!----------------------------->


            <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-0 login-form">
                <h2 class="col-sm-offset-1 col-sm-10">Connexion</h2>
                <form method="post" action="<?php echo WEB_ROOT;?>/utilisateur/accueil" class="form-horizontal" role="form">
                    <div class="form-group">
                        <div class="input-group login-input">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user">
                                </span>
                            </span>
                            <input type="text" class="form-control" id="txtPseudo" name="txtPseudo" placeholder="Pseudo">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group login-input">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-lock">
                                </span>
                            </span>
                            <input type="password" class="form-control" id="pwdPass" name="pwdPass" placeholder="Mot de passe">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-1 col-sm-10">
                            <a href="<?php echo WEB_ROOT;?>/utilisateur/inscription" class="btn btn-primary">
                                Inscription
                            </a>
                            <input type="submit" class="btn btn-success" name="subLogin" value="Connexion">
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="col-sm-offset-1 col-sm-10">
                            <a href="#" id='recuperer_mdp' class="">Récupérer un mot de passe</a><br />
                            <a href="#" id='aide' class="">Signaler un problème</a>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- .row -->


        <!------------->
        <!-- "PANEL" -->
        <!------------->


        <div class="row">

            <!-- PANEL 1 -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Aide aux devoirs
                    </div>
                    <div class="panel-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas erat id volutpat scelerisque. Donec ut risus lorem. Nam quis efficitur eros. Praesent efficitur est sit amet dui scelerisque, eget tempor felis tristique. Duis sit amet nunc eu odio vestibulum lobortis eget vel lectus. Curabitur viverra quam massa, eget tincidunt nisi convallis ut. In tellus elit, malesuada vel vehicula eu, egestas sit amet est.
                        </p>
                    </div>
                </div>
            </div>

            <!-- PANEL 2 -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Aide aux devoirs
                    </div>
                    <div class="panel-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas erat id volutpat scelerisque. Donec ut risus lorem. Nam quis efficitur eros. Praesent efficitur est sit amet dui scelerisque, eget tempor felis tristique. Duis sit amet nunc eu odio vestibulum lobortis eget vel lectus. Curabitur viverra quam massa, eget tincidunt nisi convallis ut. In tellus elit, malesuada vel vehicula eu, egestas sit amet est.
                        </p>
                    </div>
                </div>
            </div>

            <!-- PANEL 3 -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Aide aux devoirs
                    </div>
                    <div class="panel-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas erat id volutpat scelerisque. Donec ut risus lorem. Nam quis efficitur eros. Praesent efficitur est sit amet dui scelerisque, eget tempor felis tristique. Duis sit amet nunc eu odio vestibulum lobortis eget vel lectus. Curabitur viverra quam massa, eget tincidunt nisi convallis ut. In tellus elit, malesuada vel vehicula eu, egestas sit amet est.
                        </p>
                    </div>
                </div>
            </div>

            <!-- PANEL 4 -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Aide aux devoirs
                    </div>
                    <div class="panel-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas erat id volutpat scelerisque. Donec ut risus lorem. Nam quis efficitur eros. Praesent efficitur est sit amet dui scelerisque, eget tempor felis tristique. Duis sit amet nunc eu odio vestibulum lobortis eget vel lectus. Curabitur viverra quam massa, eget tincidunt nisi convallis ut. In tellus elit, malesuada vel vehicula eu, egestas sit amet est.
                        </p>
                    </div>
                </div>
            </div>

            <!-- PANEL 5 -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Aide aux devoirs
                    </div>
                    <div class="panel-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas erat id volutpat scelerisque. Donec ut risus lorem. Nam quis efficitur eros. Praesent efficitur est sit amet dui scelerisque, eget tempor felis tristique. Duis sit amet nunc eu odio vestibulum lobortis eget vel lectus. Curabitur viverra quam massa, eget tincidunt nisi convallis ut. In tellus elit, malesuada vel vehicula eu, egestas sit amet est.
                        </p>
                    </div>
                </div>
            </div>

            <!-- PANEL 6 -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Aide aux devoirs
                    </div>
                    <div class="panel-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas erat id volutpat scelerisque. Donec ut risus lorem. Nam quis efficitur eros. Praesent efficitur est sit amet dui scelerisque, eget tempor felis tristique. Duis sit amet nunc eu odio vestibulum lobortis eget vel lectus. Curabitur viverra quam massa, eget tincidunt nisi convallis ut. In tellus elit, malesuada vel vehicula eu, egestas sit amet est.
                        </p>
                    </div>
                </div>
            </div>

        </div><!-- .row -->
        
    <?php
    }
     
/*======================*/
/*== afficheBienvenue ==*/
/*======================*/
    
    public function afficheBienvenue(){?>
        <div class="page-header">
            <h1>Bienvenue <?php echo $this->oUtilisateurSession->getPrenom();?>!</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="bienvenue text-center">
                    <img src="<?php echo WEB_ROOT;?>/images/video.jpg"><br>

                    <div class="col-md-12 espace-avant">
                        <div class="btn-group">
                          <button type="button" class="glyphicon glyphicon-play"></button>
                          <button type="button" class="glyphicon glyphicon-pause"></button>
                          <button type="button" class="glyphicon glyphicon-stop"></button>
                        </div>
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

    /*============================*/
    /*== afficherPreInscription ==*/
    /*============================*/

    public function affichePreInscription() {?>

         <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>

        <div class="col-sm-6 col-sm-offset-2">
            <h1 class="col-sm-offset-5 col-sm-6"><span class="label label-default">Pré-inscription</span></h1>
            <div class="col-sm-offset-4 col-sm-8 page-header">
                <ol>
                    <li>Pour t'inscrire, tu dois avoir en main ton code permament.</li>
                    <li>Entre l'information dans les champs appropriés.</li>
                    <li>Une fois l'information validée, tu seras invité à créer ton compte Génie en ligne.</li>
                </ol>             
            </div>
            <div class="col-sm-12 col-sm-offset-1">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="nom" class="col-sm-4 control-label">Code permanent :</label>
                        <div class="col-sm-6">
                            <input type="text" id="codePermanent" class="form-control" placeholder="Code permanent" pattern="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nom" class="col-sm-4 control-label">Nom de famille :</label>
                        <div class="col-sm-6">
                            <input type="text" id="nom" class="form-control" placeholder="Nom de famille" pattern="">
                        </div>
                    </div>
                    <div class="form-group"></div>
                    <div class="form-group"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-12">
                             <button type="submit" class="btn btn-primary col-sm-offset-1">
                                Déjà inscrit?
                            </button>
                            <button type="submit" class="btn btn-success">
                                Soumettre
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }

    /*=========================*/
    /*== afficherInscription ==*/
    /*=========================*/

    public function afficheInscription() {?>

         <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>

        <div class="col-sm-6 col-sm-offset-2">
            <div class="col-sm-offset-6">
                <h1 class=""><span class="label label-default">Inscription</span></h1>
            </div>
            <div class="col-sm-offset-4 col-sm-8 page-header">
                     
            </div>
            <div class="col-sm-12 col-sm-offset-1">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="nom" class="col-sm-4 control-label">Prénom :</label>
                        <div class="col-sm-6">
                            <input type="text" id="nom" class="form-control" placeholder="Prenom" pattern="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nom" class="col-sm-4 control-label">Nom de famille :</label>
                        <div class="col-sm-6">
                            <input type="text" id="nom" class="form-control" placeholder="Nom de famille" pattern="">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="nom" class="col-sm-4 control-label">Pseudo :</label>
                        <div class="col-sm-6">
                            <input type="text" id="nom" class="form-control" placeholder="Pseudo" pattern="">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="nom" class="col-sm-4 control-label">Courriel :</label>
                        <div class="col-sm-6">
                            <input type="email" id="nom" class="form-control" placeholder="Courriel" pattern="">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="nom" class="col-sm-4 control-label">Mot de passe :</label>
                        <div class="col-sm-6">
                            <input type="password" id="nom" class="form-control" placeholder="Mot de passe :" pattern="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nom" class="col-sm-4 control-label">Mot de passe :</label>
                        <div class="col-sm-6">
                            <input type="password" id="nom" class="form-control" placeholder="Mot de passe :" pattern="">
                        </div>
                    </div>
                    <div class="form-group"></div>
                    <div class="form-group"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                             <button type="submit" class="btn btn-primary col-sm-offset-3">
                                Rafraichir
                            </button>
                            <button type="submit" class="btn btn-success">
                                Soumettre
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    <?php
    }

    /*=========================*/
    /*== afficheRecupererMDP ==*/
    /*=========================*/

    public function afficheRecupererMDP() {?>

         <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>

        <div class="col-sm-6 col-sm-offset-2">
            <h1 class="col-sm-offset-3 col-sm-6"><span class="label label-default">Récupération du mot de passe</span></h1>
            <div class="col-sm-offset-4 col-sm-8 page-header">
                <ol>
                    <li>Saisis ton adresse courriel.</li>
                    <li>Un message te sera automatiquement envoyé dans ta boîte courriel.</li>
                    <li>Suis les instructions à l'écran pour te créer un nouveau mot de passe.</li>
                </ol>            
            </div>
            <div class="col-sm-12 col-sm-offset-1">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="nom" class="col-sm-4 control-label">Courriel :</label>
                        <div class="col-sm-6">
                            <input type="email" id="codePermanent" class="form-control" placeholder="Courriel" pattern="">
                        </div>
                    </div>
                    <div class="form-group"></div>
                    <div class="form-group"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-7 col-sm-12">
                            <button type="submit" class="btn btn-success">
                                Soumettre
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    <?php
    }

    /*==========================*/
    /*== afficheEnvoyerMessage ==*/
    /*===========================*/

    public function afficheEnvoyerMessage() {?>

         <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>

        <div class="col-sm-6 col-sm-offset-2">
             <div class="col-sm-6">
                <h1 class="col-sm-offset-7 col-sm-6"><span class="label label-default">Question ou commentaire</span></h1>
            </div>
            <div class="col-sm-offset-4 col-sm-8 page-header">
                <ol>
                    <li>Entre ton courriel.</li>
                    <li>Soummet ta question ou ton commentaire à notre webmestre.</li>  
                </ol> 
            </div>
           
            <div class="col-sm-12 col-sm-offset-1">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="nom" class="col-sm-4 control-label">Courriel :</label>
                        <div class="col-sm-6">
                            <input type="email" id="codePermanent" class="form-control" placeholder="Courriel" pattern="">
                        </div>
                    </div>
                    <section class="form-group">
                        <label for="nom" class="col-md-4 control-label">Message :</label>
                        <div class="col-md-6">
                            <textarea class="col-md-12" id="commentaire"></textarea>
                        </div>
                    </section>
                    <div class="form-group"></div>
                    <div class="form-group">
                    <div class="form-group"></div>
                        <div class="col-sm-offset-5 col-sm-12">
                             <button type="submit" class="btn btn-primary ">
                                Rafraichir
                            </button>
                            <button type="submit" class="btn btn-success ">
                                Soumettre
                            </button>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>

    <?php
    }
    //TODO: Ajouter des méthodes au besoin
}
?>