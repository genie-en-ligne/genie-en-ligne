<!DOCTYPE html>
<html lang="fr">
    <!-- Certains droits réservés @ Jonathan Martel (2013) Sous licence Creative Commons (BY-NC 3.0) -->
	<head>
		<title>Génie en ligne | Aide aux devoirs</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">
		
		<link rel="stylesheet" href="<?php echo WEB_ROOT;?>/lib/bootstrap/css/bootstrap.css" type="text/css" media="screen">
		<link rel="stylesheet" href="<?php echo WEB_ROOT;?>/css/main.css" type="text/css" media="screen">
		
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
        </script>

		<script src="<?php echo WEB_ROOT;?>/js/main.js"></script>            
	</head>

	<body>
        <div id="wrapper">
            
        <!-------------------->
        <!-- ENTETE DU SITE -->
        <!-------------------->            
            
            <header class="container">
                <?php 
                    $oUtilisateurSession = new Utilisateur($_SESSION['user_id']);

                    if($oUtilisateurSession->utilisateurEstConnecte()){
                        $oUtilisateurSession->chargerCompteParId();
                    }
                    
                    //Utilisateur non connecté
                    if($oUtilisateurSession->getRole() == 0){?>
                
                        <!----------------------->
                        <!-- MENU NON CONNECTÉ -->
                        <!----------------------->
                
                        <!-- Entête visible sur tous les écrans sauf les mobiles -->
                        <div class="row">
                            <div class="col-sm-3 logo">
                                <a href="index.html">
                                    <img src="<?php echo WEB_ROOT;?>/images/genieenligne.png">
                                </a>
                            </div>
                            <div class="col-sm-9 text-right banniere">

                            </div>
                            <div class="col-sm-9">
                                <nav class="navbar navbar-default" role="navigation">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li>
                                            <a href="<?php echo WEB_ROOT;?>">
                                                Accueil
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo WEB_ROOT;?>/utilisateur/pre-inscription/" id="inscriptionEntete">
                                                Inscrivez-vous!
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div><!-- .row -->
                    <?php
                    }
                    //Élève
                    elseif($oUtilisateurSession->getRole() == 1){?>
                
                        <!---------------->
                        <!-- MENU ÉLÈVE -->
                        <!---------------->
                
                        <div class="row">
                            <div class="col-sm-3 logo">
                                <img src="<?php echo WEB_ROOT;?>/images/genieenligne.png">
                            </div>
                            <div class="col-sm-9 text-right banniere">
                                <span>
                                    Connecté en tant que <?php echo $oUtilisateurSession->getPrenom().' '.$oUtilisateurSession->getNom();?> |
                                </span>
                                <a href="<?php echo WEB_ROOT?>/utilisateur/logout">
                                    Déconnexion
                                </a>
                            </div>

                            <div class="col-sm-9">
                                <nav class="navbar navbar-default" role="navigation">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li>
                                            <a href="#">Accueil</a>
                                        </li>
                                        <li class="dropdown">
                                            <a id="nav-tutoriels" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                                                Tutoriels
                                                <span class="caret">
                                                </span>
                                            </a>
                                            <ul class="dropdown-menu" role="menu" aria-labelledby="nav-tutoriels">
                                                <li role="presentation">
                                                    <a href="<?php echo WEB_ROOT;?>/tutoriel/consulter">
                                                        Consulter
                                                    </a>
                                                </li>
                                            </ul>
                                        </li><!-- .dropdown -->
                                        <!--
                                        <li class="dropdown">
                                            <a id="nav-messagerie" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                                                Messagerie
                                                <span class="caret">
                                                </span>
                                            </a>
                                            <ul class="dropdown-menu" role="menu" aria-labelledby="nav-messagerie">
                                                <li role="presentation">
                                                    <a href="#">
                                                        Trouver un tuteur
                                                    </a>
                                                </li>
                                                <li role="presentation">
                                                    <a href="#">
                                                        Historique
                                                    </a>
                                                </li>
                                            </ul>
                                        </li><!-- .dropdown -->

                                        <li class="dropdown">
                                            <a id="nav-compte" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                                                Mon compte
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu" role="menu" aria-labelledby="nav-compte">
                                                <li role="presentation">
                                                    <a href="#">
                                                        Statistiques
                                                    </a>
                                                </li>
                                                <li role="presentation">
                                                    <a href="<?php echo WEB_ROOT;?>/utilisateur/modifier-mdp">
                                                        Changer mot de passe
                                                    </a>
                                                </li>
                                                <li class="divider">
                                                </li>
                                                <li role="presentation">
                                                    <a href="<?php echo WEB_ROOT?>/utilisateur/logout">
                                                        Déconnexion
                                                    </a>
                                                </li>
                                            </ul>
                                        </li><!-- .dropdown -->

                                    </ul><!-- .nav.navbar-nav.navbar-right -->
                                </nav><!-- .navbar.navbar-default -->
                            </div><!-- .col-sm-9 -->
                        </div><!-- .row -->
                    <?php
                    }
                    //Tuteur
                    elseif($oUtilisateurSession->getRole() == 2){?>
                
                        <!----------------->
                        <!-- MENU TUTEUR -->
                        <!----------------->
                
                        <div class="row">
                            <div class="col-sm-3 logo">
                                <img src="<?php echo WEB_ROOT;?>/images/genieenligne.png">
                            </div>
                            <div class="col-sm-9 text-right banniere">
                                <span>
                                    Connecté en tant que <?php echo $oUtilisateurSession->getPrenom().' '.$oUtilisateurSession->getNom();?> |
                                </span>
                                <a href="<?php echo WEB_ROOT?>/utilisateur/logout">
                                    Déconnexion
                                </a>
                            </div>

                            <div class="col-sm-9">
                                <nav class="navbar navbar-default" role="navigation">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li>
                                            <a href="#">Accueil</a>
                                        </li>
                                        <li class="dropdown">
                                            <a id="nav-tutoriels" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                                                Tutoriels
                                                <span class="caret">
                                                </span>
                                            </a>
                                            <ul class="dropdown-menu" role="menu" aria-labelledby="nav-tutoriels">
                                                <li role="presentation">
                                                    <a href="<?php echo WEB_ROOT;?>/tutoriel/gerer">
                                                        Gérer
                                                    </a>
                                                </li>
                                            </ul>
                                        </li><!-- .dropdown -->
                                        <!--
                                        <li class="dropdown">
                                            <a id="nav-messagerie" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                                                Messagerie
                                                <span class="caret">
                                                </span>
                                            </a>
                                            <ul class="dropdown-menu" role="menu" aria-labelledby="nav-messagerie">
                                                <li role="presentation">
                                                    <a href="#">
                                                        Historique
                                                    </a>
                                                </li>
                                            </ul>
                                        </li><!-- .dropdown -->

                                        <li class="dropdown">
                                            <a id="nav-compte" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                                                Mon compte
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu" role="menu" aria-labelledby="nav-compte">
                                                <li role="presentation">
                                                    <a href="#">
                                                        Statistiques
                                                    </a>
                                                </li>
                                                <li role="presentation">
                                                    <a href="<?php echo WEB_ROOT;?>/utilisateur/modifier-mdp">
                                                        Changer mot de passe
                                                    </a>
                                                </li>
                                                <li class="divider">
                                                </li>
                                                <li role="presentation">
                                                    <a href="<?php echo WEB_ROOT?>/utilisateur/logout">
                                                        Déconnexion
                                                    </a>
                                                </li>
                                            </ul>
                                        </li><!-- .dropdown -->

                                    </ul><!-- .nav.navbar-nav.navbar-right -->
                                </nav><!-- .navbar.navbar-default -->
                            </div><!-- .col-sm-9 -->
                        </div><!-- .row -->                       
                    <?php
                    }
                ?>
            </header>
            
        <!----------------------->
        <!-- CONTENU PRINCIPAL -->
        <!----------------------->
            
            <main class="container">
            
            <?php
                $oControleur = new Controleur($oUtilisateurSession);	
                $oControleur->gerer();
            ?>
			
            <!-------------------------->
            <!-- PIED DE PAGE DU SITE -->
            <!-------------------------->
                
                <footer>
                    <div class="navbar navbar-default">
                        <p class="navbar-text">
                            Génie en ligne &copy;2014
                        </p>
                        <p class="navbar-text navbar-right">
                            <a href="<?php echo WEB_ROOT;?>/utilisateur/envoyer-message" class="navbar-link">
                                Contact
                            </a>
                        </p>
                    </div>
                </footer>
            </main>
        </div>

        <!-- Include all compiled bootstrap plugins -->
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/bootstrap/js/bootstrap.js">
        </script>
    </body>

</html>
