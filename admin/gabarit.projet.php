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
		<link rel="stylesheet" href="<?php echo WEB_ROOT;?>/admin/css/main.css" type="text/css" media="screen">
		
		<script src="<?php echo WEB_ROOT;?>/js/main.js"></script>            
	</head>

	<body>
        <div id="wrapper">
    <!--------------------->
    <!-- MENU HORIZONTAL -->
    <!--------------------->
        <!-- Navigation -->
        <nav id="menu-horizontal" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"> <img src="<?php echo WEB_ROOT;?>/images/genieenligne.png"></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user"></i>Admin École
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">
                                <i class="fa fa-fw fa-user"></i>Compte</a>
                        </li>

                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <i class="fa fa-fw fa-power-off"></i>Déconnexion</a>
                        </li>
                    </ul>
                </li>
            </ul>
           </nav>  
    <!------------------->
    <!-- MENU VERTICAL -->
    <!------------------->
         <nav id="menu-vertical" class="navbar navbar-inverse side-nav">
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                <?php 
                    $oUtilisateurSession = new Utilisateur($_SESSION['user_id']);

                    if($oUtilisateurSession->utilisateurEstConnecte()){
                        $oUtilisateurSession->chargerCompteParId();
                    }
                    else{
                        //Rediriger au login
                        header("location:".WEB_ROOT);
                    }
                    
                    //Professeur
                    if($oUtilisateurSession->getRole() == 3){?>
                
                        <!--------------------->
                        <!-- MENU PROFESSEUR -->
                        <!--------------------->
                
                        <li class="nav-title">
                            Professeurs
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-fw fa-edit"></i>Gérer les tuteurs</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-fw fa-edit"></i>Gérer les tutoriels</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-fw fa-bar-chart-o"></i>Statistiques</a>
                        </li>
                    <?php
                    }
                    //Responsable
                    elseif($oUtilisateurSession->getRole() == 4){?>
                
                        <!---------------------->
                        <!-- MENU RESPONSABLE -->
                        <!---------------------->
                
                        <li class="nav-title">
                            Responsables
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-fw fa-edit"></i>Gérer les professeurs</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-fw fa-edit"></i>Gérer les tutoriels</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-fw fa-bar-chart-o"></i>Statistiques</a>
                        </li>
                    <?php
                    }
                    //Super Admin
                    elseif($oUtilisateurSession->getRole() == 5){?>
                
                        <!---------------------->
                        <!-- MENU SUPER ADMIN -->
                        <!---------------------->
                
                        <li class="nav-title">
                            Super admin
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-fw fa-edit"></i>Gérer les commissions</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-fw fa-edit"></i>Gérer les écoles</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-fw fa-edit"></i>Gérer les matières</a>
                        </li>
                        <li>
                            <a href="../statistique/statistiques-professeur.html">
                                <i class="fa fa-fw fa-bar-chart-o"></i>Statistiques</a>
                        </li>                       
                    <?php
                    }
                ?>
                </ul>
            </div>
        </nav>
            
        <!----------------------->
        <!-- CONTENU PRINCIPAL -->
        <!----------------------->
            
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="contenu">
            
                    <?php
                        $oControleur = new Controleur($oUtilisateurSession);	
                        $oControleur->gerer();
                    ?>
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
        </script>

        <!-- Include all compiled bootstrap plugins -->
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/bootstrap/js/bootstrap.js">
        </script>
    </body>

</html>
