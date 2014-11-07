<?php
class UtilisateurVue extends Vue {    
/*====================*/
/*== afficheAccueil ==*/
/*====================*/

  
    public function afficheAccueil() {?>
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

            <!-- -------- -->
            <!-- CAROUSEL -->
            <!-- -------- -->

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


            <!-- ----------------------- -->
            <!-- FORMULAIRE DE CONNEXION -->
            <!-- ----------------------- -->


            <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-0 login-form">
                <p class="col-sm-offset-1 col-sm-10">Connexion</p>
                <form id="frmLogin" method="post" action="<?php echo WEB_ROOT;?>/utilisateur/accueil" class="form-horizontal" role="form">
                    <div class="form-group">
                        <div class="input-group login-input">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user">
                                </span>
                            </span>
                            <input type="text" class="form-control" id="txtPseudo" name="txtPseudo" placeholder="Pseudo">
                            <div class="divErreur" id="txtPseudoErreur"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group login-input">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-lock">
                                </span>
                            </span>
                            <input type="password" class="form-control" id="pwdPass" name="pwdPass" placeholder="Mot de passe">
                            <div class="divErreur" id="pwdPassErreur"></div>
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

        <!-- ----------------------- -->
        <!---- CONTENU PRINCIPAL ------>
        <!-- ----------------------- -->

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
       <script src="<?php echo WEB_ROOT;?>/js/Utilisateur.js"></script>
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
                    <video controls>
                        <source src="<?php echo WEB_ROOT;?>/videos/BienvenuePublic.mp4" type="video/mp4">
                        <source src="<?php echo WEB_ROOT;?>/videos/BienvenuePublic.ogv" type="video/ogg">
                        Votre fureteur ne supporte pas ce vidéo<br>
                    </video>

                    <div class="col-md-12 espace-avant">
                    </div>
                    
                    <p>Regardez cette vidéo pour un départ rapide</p>
                </div>
            </div><!-- .col-md-12 -->
        </div><!-- .row -->
        <script type="text/javascript" src="../js/Utilisateur.js"> </script> 
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
            <div class="col-sm-12 text-center">
                <h1>
                    <span class="label label-default">Modifier le mot de passe</span>
                </h1>
            </div>        
            <div class="col-sm-12 col-sm-offset-0">   
                <form id="frmProfilUtilisateur" method="POST" action="<?php echo WEB_ROOT;?>/utilisateur/modifier-mdp" class="form-horizontal" role="form">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="col-sm-12 page-header">
                            <div class="form-group"></div>
                        </div>
                        <div>  
                            <p class="text-center">
                                <strong>Votre mot de passe doit contenir de huit à quinze caractères et au moins 
                                une minuscule, une majuscule et un chiffre.</strong>
                            </p>
                        </div> 
                    </div>
                    <div class="col-sm-5 col-sm-offset-3">
                        <div class="form-group"></div>
                        <div class="form-group"></div>
                        <div class="form-group"></div> 
                    
                        <div class="form-group">
                            <label for="pwdPass1" class="col-sm-4 control-label">Mot de passe :</label>
                            <div class="col-sm-7">
                                <input type="password" id="pwdPass1" class="form-control" name="pwdMdp1" placeholder="Mot de passe">
                                <div class="divErreur" id="pwdPass1Erreur"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pwdPass2" class="col-sm-4 control-label">Mot de passe :</label>
                            <div class="col-sm-7">
                                <input type="password" id="pwdPass2" class="form-control" name="pwdMdp2" placeholder="Mot de passe">
                                <div class="divErreur" id="pwdPass2Erreur"></div>
                            </div>
                        </div>
                        <div class="form-group"></div>
                        <div class="form-group"></div>
                        <div class="form-group text-center">
                            <div class="col-sm-7 col-sm-offset-4">
                                <button type="refresh" class="btn btn-primary col-sm-5">
                                    Effacer
                                </button>
                                <button type="submit" name="subProfil" id="btnProfilUtil" class="btn btn-success col-sm-5 col-sm-offset-2">
                                    Soumettre
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div> <!-- col-sm-12 col-sm-offset-0 -->
        </div> <!-- row -->

        <script src="<?php echo WEB_ROOT;?>/js/Utilisateur.js"></script>
    <?php 
    }

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
                <h1 class="col-sm-offset-2 col-sm-6">
                    <span class="label label-default">Paramètres d'accès Génie en ligne</span>
                </h1>
                <div class="col-sm-offset-4 col-sm-8 page-header">
                    <ol>
                        <li>Entrez un pseudo et un mot de passe.</li>
                        <li>Ces informations vous permettront de vous connecter au site.</li>
                        <li>Votre mot de passe doit contenir de huit à quinze caractères et au moins une minuscule, une majuscule et un chiffre.</li>
                    </ol>             
                </div>
                <div class="col-sm-12 col-sm-offset-1">
                    <form id="frmCreerLogin" class="form-horizontal" action="<?php echo WEB_ROOT;?>/utilisateur/creer-login/<?php echo $this->oUtilisateur->getId();?>" method="POST" enctype= "" role="form">
                        <div class="form-group">
                            <label for="txtLoginPseudo" class="col-sm-4 control-label">Pseudo :</label>
                            <div class="col-sm-6">
                                <input type="text" id="txtLoginPseudo" name="txtPseudo" class="form-control" placeholder="Pseudo">
                                <div class="divErreur" id="txtLoginPseudoErreur"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtLoginMdp1" class="col-sm-4 control-label">Mot de passe :</label>
                            <div class="col-sm-6">
                                <input type="password" id="txtLoginMdp1" class="form-control" name="pwdMdp1" placeholder="Mot de passe">
                                 <div class="divErreur" id="txtLoginMdp1Erreur"></div>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="txtLoginMdp2" class="col-sm-4 control-label">Mot de passe :</label>
                            <div class="col-sm-6">
                                <input type="password" id="txtLoginMdp2" class="form-control" name="pwdMdp2" placeholder="Mot de passe">
                                <div class="divErreur" id="txtLoginMdp2Erreur"></div>
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
        <script src="<?php echo WEB_ROOT;?>/js/Utilisateur.js"></script>
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
                <h1 class="col-sm-offset-6 col-sm-6">
                    <strong>Succès!</strong>
                </h1>
                <h3 class="col-sm-offset-3 col-sm-12 bold">
                    <strong>Votre compte est maintenant actif.</strong>
                </h3>
                <div class="col-sm-offset-2 col-sm-12 page-header">       
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
        <script src="<?php echo WEB_ROOT;?>/js/Utilisateur.js"></script>
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
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center page-header">
                    <h1>
                        <span class="label label-default">Formulaire de pré-inscription</span>
                    </h1>
                </div>
                <div class="col-sm-6 col-sm-offset-3">
                    <ol class="col-sm-offset-1">
                        <strong>
                            <li>Pour t'inscrire, tu dois avoir en main ton code permament.</li>
                            <li>Entre l'information dans les champs appropriés.</li>
                            <li>Une fois l'information validée, tu seras invité à créer ton compte Génie en ligne.</li>
                        </strong>
                    </ol> 
                </div>  
                <div class="col-sm-6 col-sm-offset-2">
                    <form id="frmPreInscription" class="form-horizontal" action="<?php echo WEB_ROOT;?>/utilisateur/pre-inscription" method="POST" role="form">
                        <div class="form-group"></div>
                        <div class="form-group"></div>
                       <div class="form-group">
                            <label for="txtCodePerm" class="col-sm-4 control-label">Code permanent :</label>
                            <div class="col-sm-8">
                                <input type="text" id="txtCodePerm" class="form-control" name="txtCodePerm" placeholder="Code permanent">
                                <div class="divErreur" id="txtCodePermErreur"></div>
                            </div>
                        </div>
                        <div class="form-group"></div>
                        <div class="form-group">
                            <label for="txtNom" class="col-sm-4 control-label">Nom de famille :</label>
                            <div class="col-sm-8">
                                <input type="text" id="txtNom" class="form-control" name="txtNom" placeholder="Nom de famille">
                                <div class="divErreur" id="txtNomErreur"></div>
                            </div>
                        </div>
                        <div class="form-group"></div>
                        <div class="form-group"></div>
                        <div class="form-group text-center">
                            <div class="col-sm-8 col-sm-offset-4">
                                <a href="<?php echo WEB_ROOT;?>" class="btn btn-primary col-sm-5">
                                    Déjà inscrit?
                                </a>

                                <button type="submit" name="subPreInscription" class="btn btn-success col-sm-5 col-sm-offset-2">
                                    Soumettre
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="<?php echo WEB_ROOT;?>/js/Utilisateur.js"></script>
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

         <div class="row">
            <div class="col-sm-12">
                <div class="text-center page-header">
                    <h1>
                        <span class="label label-default">Formulaire de d'inscription</span>
                    </h1>
                </div>
                <div class="col-sm-6 col-sm-offset-3">
                    <ol class="col-sm-offset-1">
                        <strong>
                           <li>Entrez un pseudo et un mot de passe.</li>
                            <li>Ces informations vous permettront de vous connecter au site.</li>
                            <li>Votre mot de passe doit contenir de huit à quinze caractères et au moins une minuscule, une majuscule et un chiffre.</li>
                        </strong>
                    </ol> 
                </div>  
                <div class="col-sm-6 col-sm-offset-2">
                    <form id="frmInscription" class="form-horizontal" action="<?php echo WEB_ROOT;?>/utilisateur/inscription" method="POST" enctype="" role="form">
                        <div class="form-group"></div>
                        <div class="form-group"></div>
                        <div class="form-group">
                            <label for="txtPrenom" class="col-sm-4 control-label">Prénom :</label>
                            <div class="col-sm-8">
                                <input type="text" id="txtPrenom" class="form-control" name="txtPrenom" placeholder="Prenom">
                                <div class="divErreur" id="txtPrenomErreur"></div>
                            </div>
                        </div>
                        <div class="form-group"></div>
                        <div class="form-group">
                            <label for="txtNom" class="col-sm-4 control-label">Nom de famille :</label>
                            <div class="col-sm-8">
                                <input type="text" id="txtNom" class="form-control" name="txtNom" placeholder="Nom">
                                <div class="divErreur" id="txtNomErreur"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtPseudo" class="col-sm-4 control-label">Pseudo :</label>
                            <div class="col-sm-8">
                                <input type="text" id="txtPseudo" class="form-control" name="txtPseudo" placeholder="Pseudo">
                                <div class="divErreur" id="txtPseudoErreur"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emlCourriel" class="col-sm-4 control-label">Courriel :</label>
                            <div class="col-sm-8">
                                <input type="text" id="emlCourriel" class="form-control" name="txtCourriel" placeholder="Courriel">
                                <div class="divErreur" id="emlCourrielErreur"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pwdMdp1" class="col-sm-4 control-label">Mot de passe :</label>
                            <div class="col-sm-8">
                                <input type="password" id="pwdMdp1" class="form-control" name="pwdMdp1" placeholder="Mot de passe :">
                                <div class="divErreur" id="pwdMdp1Erreur"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pwdMdp2" class="col-sm-4 control-label">Mot de passe :</label>
                            <div class="col-sm-8">
                                <input type="password" id="pwdMdp2" class="form-control" name="pwdMdp2" placeholder="Mot de passe :">
                                 <div class="divErreur" id="pwdMdp2Erreur"></div>
                            </div>
                        </div>
                        <div class="form-group"></div>
                        <div class="form-group"></div>
                        <div class="form-group text-center">
                            <div class="col-sm-8 col-sm-offset-4">
                                <button type="refresh" class="btn btn-primary col-sm-5">
                                    Rafraîchir
                                </button>
                                <button type="submit" id="btnInscription" name="subInscription" class="btn btn-success col-sm-5 col-sm-offset-2">
                                    Soumettre
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="<?php echo WEB_ROOT;?>/js/Utilisateur.js"></script>
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
            <div class="col-sm-12">
                <div class="text-center page-header">
                    <h1>
                        <span class="label label-default">Récupérer un mot de passe</span>
                    </h1>
                </div>
                <div class="col-sm-6 col-sm-offset-3">
                    <ol class="col-sm-offset-1">
                        <strong>
                            <li>Saisis ton adresse courriel.</li>
                            <li>Un message te sera automatiquement envoyé dans ta boîte courriel.</li>
                            <li>Suis les instructions à l'écran pour te créer un nouveau mot de passe.</li>
                        </strong>
                    </ol> 
                </div>  
                <div class="col-sm-6 col-sm-offset-2">
                    <form id="frmRecuperMdp" class="form-horizontal" method="POST" action="<?php echo WEB_ROOT;?>/utilisateur/recuperer-mdp" role="form">
                        <div class="form-group"></div>
                        <div class="form-group"></div>
                        <div class="form-group">
                            <label for="emlCourriel" class="col-sm-4 control-label">Courriel :</label>
                            <div class="col-sm-8">
                                <input type="text" name="emlCourriel" id="emlCourriel" class="form-control" placeholder="Courriel">
                                <div class="divErreur" id="emlCourrielErreur"></div>
                            </div>
                        </div>
                        <div class="form-group"></div>
                        <div class="form-group"></div>
                        <div class="form-group text-center">
                            <div class="col-sm-8 col-sm-offset-4">
                                <a href="<?php echo WEB_ROOT;?>" class="btn btn-primary col-sm-5">
                                    Retour
                                </a>
                                <button type="submit" name="subRecupererMdp" class="btn btn-success col-sm-5 col-sm-offset-2">
                                    Soumettre
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="<?php echo WEB_ROOT;?>/js/Utilisateur.js"></script>
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
            <div class="col-sm-12">
                <div class="text-center page-header">
                    <h1>
                        <span class="label label-default">Question ou commentaire</span>
                    </h1>
                </div>
                <div class="col-sm-6 col-sm-offset-3">
                    <ol class="col-sm-offset-1">
                        <strong>
                            <li>Entre ton courriel.</li>
                            <li>Soummet ta question ou ton commentaire à notre webmestre.</li>  
                        </strong>
                    </ol> 
                </div>  
                <div class="col-sm-6 col-sm-offset-2">
                    <form id="frmMessage" class="form-horizontal" role="form" method="POST" action="<?php echo WEB_ROOT;?>/utilisateur/envoyer-message">
                        <div class="form-group"></div>
                        <div class="form-group"></div>
                        <div class="form-group">
                            <label for="emlCourriel" class="col-sm-4 control-label">Courriel :</label>
                            <div class="col-sm-8">
                                <input type="test" name="emlCourriel" id="emlCourriel" class="form-control" placeholder="Courriel">
                                <div class="divErreur" id="emlCourrielErreur"></div>
                            </div>
                        </div>
                        <div class="form-group"></div>
                        <section class="form-group">
                            <label for="txtCommentaire" class="col-md-4 control-label">Message :</label>
                            <div class="col-md-8">
                                <textarea id="txtCommentaire" class="col-md-12" name="txtMessage" id="txtCommentaire"></textarea>
                                <div class="divErreur" id="txtCommentaireErreur"></div>
                            </div>
                        </section>
                        <div class="form-group"></div>
                        <div class="form-group"></div>
                        <div class="form-group text-center">
                            <div class="col-sm-8 col-sm-offset-4">
                                <a href="<?php echo WEB_ROOT;?>" class="btn btn-primary col-sm-5">
                                    Retour
                                </a>
                                 <button type="submit" name="subMessage" class="btn btn-success col-sm-5 col-sm-offset-2">
                                    Soumettre
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="<?php echo WEB_ROOT;?>/js/Utilisateur.js"></script>
    <?php
    }
}
?>