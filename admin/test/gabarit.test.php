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
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo WEB_ROOT?>/test?mod=utilisateur">
                    Tests Unitaires
                  </a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li <?php echo ($_GET['mod']=='utilisateur')?'class="active"':'';?>>
                        <a href="<?php echo WEB_ROOT?>/admin/test?mod=utilisateur">Utilisateur</a>
                    </li>
                    <li <?php echo ($_GET['mod']=='tutoriel')?'class="active"':'';?>>
                        <a href="<?php echo WEB_ROOT?>/admin/test?mod=tutoriel">Tutoriel</a>
                    </li>
                    <li <?php echo ($_GET['mod']=='statistique')?'class="active"':'';?>>
                        <a href="<?php echo WEB_ROOT?>/admin/test?mod=statistique">Statistique</a>
                    </li>
                    <li <?php echo ($_GET['mod']=='matiere')?'class="active"':'';?>>
                        <a href="<?php echo WEB_ROOT?>/admin/test?mod=matiere">Matière</a>
                    </li>
                    <li <?php echo ($_GET['mod']=='ecole')?'class="active"':'';?>>
                        <a href="<?php echo WEB_ROOT?>/admin/test?mod=ecole">École</a>
                    </li>
                    <li <?php echo ($_GET['mod']=='commission')?'class="active"':'';?>>
                        <a href="<?php echo WEB_ROOT?>/admin/test?mod=commission">Commission</a>
                    </li>
                    <li <?php echo ($_GET['mod']=='admin')?'class="active"':'';?>>
                        <a href="<?php echo WEB_ROOT?>/admin/test?mod=admin">Admin</a>
                    </li>
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
                    switch($_GET['mod']){
                        case 'utilisateur':
                            require_once ("Utilisateur.test.php");
                            break;
                        case 'tutoriel':
                            require_once ("Tutoriel.test.php");
                            break;
                        case 'statistique':
                            require_once ("Statistique.test.php");
                            break;
                        case 'matiere':
                            require_once ("Matiere.test.php");
                            break;
                        case 'ecole':
                            require_once ("Ecole.test.php");
                            break;
                        case 'commission':
                            require_once ("Commission.test.php");
                            break;
                        case 'admin':
                            require_once ("AdminVue.test.php");
                            break;
                        }
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
