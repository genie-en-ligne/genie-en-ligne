<?php
class UtilisateurVue extends Vue {
    
/*====================*/
/*== afficheAccueil ==*/
/*====================*/

  
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
        
        
        <div class="row">
            <!-- ---------- -->
            <!-- CAROUSEL -->
            <!-- ---------- -->


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
            <!-- ------------------------- -->


            <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-0 login-form">
                <p class="col-sm-offset-1 col-sm-10">Connexion</p>
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
                            <a href="<?php echo WEB_ROOT;?>/utilisateur/pre-inscription" class="btn btn-primary">
                                Inscription
                            </a>
                            <input type="submit" class="btn btn-success" name="subLogin" value="Connexion">
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="col-sm-offset-1 col-sm-10">
                            <a href="<?php echo WEB_ROOT;?>/utilisateur/recuperer-mdp" id='recuperer_mdp' class="">Récupérer un mot de passe</a><br />
                            <a href="<?php echo WEB_ROOT;?>/utilisateur/envoyer-message" id='aide' class="">Signaler un problème</a>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- .row -->


    <!----------------------------->
    <!---- CONTENU PRINCIPAL ------>
    <!-- ------------------------- -->

        <div class="row">
            <div class="col-sm-12">
                <!-- PANEL 1 -->
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="text-center">
                                Chat
                            </div>
                        </div>
                        <div class="panel-body descriptions-accueil">
                            <div class="cadre page-header text-center">
                                <a class="lire_plus">
                                    <img src="<?php echo WEB_ROOT;?>/images/chat.png" class="img-circle" alt="chat" />
                                </a>
                            </div>
                            <p>
                                Génie en ligne propose un service de chat adapté aux besoins des étudiants du niveau secondaire de la province de Québec.   
                                Le chat est un service en ligne qui donne accès à un tuteur en temps réel. 
                                Ce service est offert de 16h à 23h les jours de semaine et de 9h à 21h les fins de semaine. 
                            </p>

                            <p>
                                Que ce soit en mathématique, en français, en sciences, en histoire ou en géographie, Génie en ligne offre une aide axée
                                sur les besoins spécifiques du programme d'études du Ministère de l'Éducation, Loisir et Sport du Québec.
                            </p>
                             <p>
                                Les chats pertinents sont sauvegardés et peuvent être consultés ultérieurement par les étudiants qui ne souhaitent 
                                pas faire appel à un tuteur. 
                            </p>
                        </div>
                    </div> <!-- FIN PANEL -->
                </div>

                <!-- PANEL 2 -->
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="text-center">
                                Tutoriels
                            </div>
                        </div>
                        <div class="panel-body descriptions-accueil">
                            <div class="cadre page-header text-center">
                                <a class="lire_plus">
                                    <img src="<?php echo WEB_ROOT;?>/images/contenu.png" class="img-circle" alt="tutoriels" />
                                </a>
                            </div>

                            <p>
                                Les tutoriels sont produits par notre équipe de tuteurs. 
                                Ils sont conçus sur mesure et proposent des méthodes simples 
                                et efficaces pour résoudre les problèmes les plus fréquents 
                                rencontrés par les étudiants dans le cadre de leur formation.
                            </p>
                              <p>
                                Les élèves peuvent compter sur une banque de tutoriels riches et variés en mathématique, 
                                en français et en sciences. Ils peuvent également consulter les liens pertinents 
                                qui fournissent une information complémentaire. Les tutoriels sont présentés sous forme de vidéo ou de fiches informatives. 
                            </p>
                        </div>
                    </div>
                </div>
                 <!-- PANEL 3 -->
                <div class="col-sm-6 col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="text-center">
                                Communauté
                            </div>
                        </div>
                        <div class="panel-body descriptions-accueil">
                            <div class="cadre page-header text-center">
                                <a class="lire_plus">
                                    <img src="<?php echo WEB_ROOT;?>/images/forum.png" class="img-circle" alt="communauté" />
                                </a>
                            </div>
                            <p>
                                Adhérer à Génie en ligne, c’est faire le choix d’un réseau étendu à tout le Québec. 
                                Les membres peuvent non seulement profiter des ressources mises à leur disposition 
                                par la commission scolaire de leur école, ils peuvent aussi bénéficier des ressources 
                                des autres commissions scolaires de la province.
                            </p>
                            <p>
                                Les tuteurs de votre commission scolaire sont tous occupés ? Il y en a surement un ailleurs qui pourra répondre à vos questions. 
                                En décentralisant les points de services, Génie en ligne permet d'étendre son réseau pour le bénéfice de tous
                                les étudiants du secondaire. 
                            </p>
                        </div>
                    </div>
                </div> <!-- col-sm-12 --> 
            </div> <!-- col-sm-12 --> 
        </div><!-- .row -->
     <?php }
     
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
                    <video width="400" controls>
                    <source src="<?php echo WEB_ROOT;?>/videos/BienvenuePublic.mp4" type="video/mp4">
                    <source src="<?php echo WEB_ROOT;?>/videos/BienvenuePublic.ogv" type="video/ogg">
                        Votre fureteur ne supporte pas ce vidéo<br>
                    </video>

                    <div class="col-md-12 espace-avant">
                        <div class="btn-group">
                          <button type="button" class="glyphicon glyphicon-play"></button>
                          <button type="button" class="glyphicon glyphicon-pause"></button>
                          <button type="button" class="glyphicon glyphicon-stop"></button>
                        </div>
                    </div>
                    
                    <p>Regardez cette vidéo pour un départ rapide</p>
                </div>
            </div><!-- .col-md-12 -->

        </div><!-- .row -->
    <?php }
        
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
                <form id="frmProfilUtil" method="POST" action="<?php echo WEB_ROOT;?>/utilisateur/modifier-mdp" class="form-horizontal" role="form">
                     <div class="form-group">
                        <label for="txtProfilMdp1" class="col-sm-4 control-label">Mot de passe :</label>
                        <div class="col-sm-6">
                            <input type="password" id="txtProfilMdp" class="form-control" name="pwdMdp1" placeholder="Mot de passe">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtProfilMdp2" class="col-sm-4 control-label">Mot de passe :</label>
                        <div class="col-sm-6">
                            <input type="password" id="txtProfilMdp2" class="form-control" name="pwdMdp2" placeholder="Mot de passe">
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

    /*========================================*/
    /*== Création de pseudo et mot de passse==*/
    /*== pour responsables professeurs et ====*/
    /*============tuteurs=====================*/
    /*=========================================*/

    public function afficheCreerLogin() {?>

         <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>

        <div class="row">
            <div class="col-sm-6 col-sm-offset-2">
                <div class="">
                <h1 class="col-sm-offset-2 col-sm-6">
                    <span class="label label-default">Paramètres d'accès Génie en ligne</span>
                </h1>
                <div class="col-sm-offset-4 col-sm-8 page-header">
                    <ol>
                        <li>Entrez un pseudo et un mot de passe.</li>
                        <li>Ces informations vous permettront de vous connecter au site.</li>
                        <li>Votre pseudo doit contenir un minimum de huit caractères et contenir au moins un chiffre.</li>
                    </ol>             
                </div>
                <div class="col-sm-12 col-sm-offset-1">
                    <form id="frmCreerLogin" class="form-horizontal" action="<?php echo WEB_ROOT;?>/utilisateur/creer-login/<?php echo $this->oUtilisateur->getId();?>" method="POST" enctype= "" role="form">
                        <div class="form-group">
                            <label for="txtLoginPseudo" class="col-sm-4 control-label">Pseudo :</label>
                            <div class="col-sm-6">
                                <input type="text" id="txtLoginPseudo" name="txtPseudo" class="form-control" placeholder="Pseudo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtLoginMdp1" class="col-sm-4 control-label">Mot de passe :</label>
                            <div class="col-sm-6">
                                <input type="password" id="txtLoginMdp1" class="form-control" name="pwdMdp1" placeholder="Mot de passe">
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="txtLoginMdp2" class="col-sm-4 control-label">Mot de passe :</label>
                            <div class="col-sm-6">
                                <input type="password" id="txtLoginMdp2" class="form-control" name="pwdMdp2" placeholder="Mot de passe">
                            </div>
                        </div>
                        <div class="form-group"></div>
                        <div class="form-group"></div>
                        <div class="form-group">
                            <div class="col-sm-offset-6 col-sm-8">
                                <button type="submit" name="subCreerCompte" id="btnCreerLogin" class="btn btn-success col-sm-offset-2">
                                    Soumettre
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    }


    public function afficheMessageConfirmation() {?>

         <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>
        <div class="row">
        <div class="col-sm-6 col-sm-offset-2">
            <div class="">

                <h1 class="col-sm-offset-6 col-sm-6">
                    <strong>Succès!</strong>
                </h1>

                <h3 class="col-sm-offset-3 col-sm-12 bold"><strong>Votre compte est maintenant actif.</strong></h3>
            <div class="col-sm-offset-4 col-sm-12 page-header">       
            </div>
            <div class="col-sm-12 col-sm-offset-1">
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group">
                <div class="col-sm-offset-5 col-sm-12">
                    <a href="<?php echo WEB_ROOT;?>" class="btn btn-default btn-lg" title="Genie en ligne">
                       Génie en ligne
                    </a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php
    }


    /*============================*/
    /*== afficherPreInscription ==*/
    /*============================*/

      /* Div erreur fait Donna*/

    public function affichePreInscription() {?>

         <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>
        <div class="row">
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
                    <form id="frmPreInscrition" class="form-horizontal" action="<?php echo WEB_ROOT;?>/utilisateur/pre-inscription" method="POST" enctype="" role="form">
                        <div class="form-group">
                            <label for="txtPreInscCodePerm" class="col-sm-4 control-label">Code permanent :</label>
                            <div class="col-sm-6">
                                <input type="text" id="txtCodePerm" class="form-control" name="txtCodePerm" placeholder="Code permanent">
                                <div class="divErreur" id="txtCodePermErreur"></div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="txtPreInscNom" class="col-sm-4 control-label">Nom de famille :</label>
                            <div class="col-sm-6">
                                <input type="text" id="txtNom" class="form-control" name="txtNom" placeholder="Nom de famille">
                                <div class="divErreur" id="txtNomErreur"></div>
                            </div>
                        </div>
                        <div class="form-group"></div>
                        <div class="form-group"></div>
                        <div class="form-group">
                            <div class="col-sm-offset-0 col-sm-12">
                                <a href="<?php echo WEB_ROOT;?>" class="btn btn-primary col-sm-offset-5">
                                    Déjà inscrit?
                                </a>

                                <button type="submit" name="subPreInscription" class="btn btn-success">
                                    Soumettre
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }

    /*=========================*/
    /*== afficherInscription ==*/
    /*=========================*/
   /* Div erreur fait Donna*/
    public function afficheInscription() {?>

         <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>

        <div class="row">
        <div class="col-sm-6 col-sm-offset-2">
            <div class="col-sm-offset-6">
                <h1 class=""><span class="label label-default">Inscription</span></h1>
            </div>
            <div class="col-sm-offset-4 col-sm-8 page-header">
                     
            </div>
            <div class="col-sm-12 col-sm-offset-1">
                <form id="frmInscription" class="form-horizontal" action="<?php echo WEB_ROOT;?>/utilisateur/inscription" method="POST" enctype="" role="form">
                    <div class="form-group">
                        <label for="txtInscriptionPrenom" class="col-sm-4 control-label">Prénom :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtInscriptionPrenom" class="form-control" name="txtPrenom" placeholder="Prenom">
                            <div class="divErreur" id="txtInscriptionPrenomErreur"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtInscriptionNom" class="col-sm-4 control-label">Nom de famille :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtInscriptionNom" class="form-control" name="txtNom" placeholder="Nom">
                            <div class="divErreur" id="txtInscriptionNomErreur"></div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="txtInscriptionPseudo" class="col-sm-4 control-label">Pseudo :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtInscriptionPseudo" class="form-control" name="txtPseudo" placeholder="Pseudo">
                            <div class="divErreur" id="txtInscriptionPseudoErreur"></div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="txtInscriptionCourriel" class="col-sm-4 control-label">Courriel :</label>
                        <div class="col-sm-6">
                            <input type="email" id="txtInscriptionCourriel" class="form-control" name="txtCourriel" placeholder="Courriel">
                            <div class="divErreur" id="txtInscriptionCourrielErreur"></div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="txtInscriptionMdp1" class="col-sm-4 control-label">Mot de passe :</label>
                        <div class="col-sm-6">
                            <input type="password" id="txtInscriptionMdp1" class="form-control" name="pwdMdp1" placeholder="Mot de passe :">
                            <div class="divErreur" id="txtInscriptionMdp1Erreur"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtInscriptionMdp2" class="col-sm-4 control-label">Mot de passe :</label>
                        <div class="col-sm-6">
                            <input type="password" id="txtInscriptionMdp2" class="form-control" name="pwdMdp2" placeholder="Mot de passe :">
                            <div class="divErreur" id="txtInscriptionMdp2Erreur"></div>
                        </div>
                        
                    </div>
                    <div class="form-group"></div>
                    <div class="form-group"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                             <button type="refresh" class="btn btn-primary col-sm-offset-4">
                                Rafraîchir
                            </button>
                            <button type="submit" id="btnInscription" name="subInscription" class="btn btn-success">
                                Soumettre
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    }

    /*=========================*/
    /*== afficheRecupererMDP ==*/
    /*=========================*/
    /* Div erreur fait Donna*/
    public function afficheRecupererMDP() {?>

         <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>
        <div class="row">
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
                    <form id="frmRecuperer" class="form-horizontal" method="POST" action="<?php echo WEB_ROOT;?>/utilisateur/recuperer-mdp" role="form">
                        <div class="form-group">
                            <label for="nom" class="col-sm-4 control-label">Courriel :</label>
                            <div class="col-sm-6">
                                <input type="email" name="emlCourriel" id="txtRecupMdp" class="form-control" placeholder="Courriel">
                                <div class="divErreur" id="txtRecupPassErreur"></div>
                            </div>
                        </div>
                        <div class="form-group"></div>
                        <div class="form-group"></div>
                        <div class="form-group">
                            <div class="col-sm-offset-7 col-sm-12">
                                <button type="submit" name="subRecupererMdp" class="btn btn-success">
                                    Soumettre
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }

    /*==========================*/
    /*== afficheEnvoyerMessage ==*/
    /*===========================*/
    /*Div erreur fait Donna*/
    public function afficheEnvoyerMessage() {?>

         <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>

        <div class="row">
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
                <form id="frmMessage" class="form-horizontal" role="form" method="POST" action="<?php echo WEB_ROOT;?>/utilisateur/envoyer-message">
                    <div class="form-group">
                        <label for="nom" class="col-sm-4 control-label">Courriel :</label>
                        <div class="col-sm-6">
                            <input type="email" name="emlCourriel" id="txtCourriel" class="form-control" placeholder="Courriel">
                            <div class="divErreur" id="txtCourrielErreur"></div>
                        </div>
                    </div>
                    <section class="form-group">
                        <label for="nom" class="col-md-4 control-label">Message :</label>
                        <div class="col-md-6">
                            <textarea class="col-md-12" name="txtMessage" id="txtCommentaire"></textarea>
                            <div class="divErreur" id="txtCommentaireErreur"></div>
                        </div>
                    </section>
                    <div class="form-group"></div>
                    <div class="form-group">
                    <div class="form-group"></div>
                        <div class="col-sm-offset-3  col-sm-12">
                             <button type="submit" class="btn btn-primary col-sm-offset-2">
                                Rafraichir
                            </button>
                            <button type="submit" name="subMessage" class="btn btn-success ">
                                Soumettre
                            </button>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    }
    //TODO: Ajouter des méthodes au besoin
}
?>