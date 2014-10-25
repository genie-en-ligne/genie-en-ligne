<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">

	<head>

		<title>Tests unitaires</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link href="<?php echo WEB_ROOT?>/lib/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo WEB_ROOT?>/test?mod=utilisateur">
                    Tests Unitaires
                  </a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li <?php echo ($_GET['mod']=='utilisateur')?'class="active"':'';?>>
                        <a href="<?php echo WEB_ROOT?>/test?mod=utilisateur">Utilisateur</a>
                    </li>
                    <li <?php echo ($_GET['mod']=='tutoriel')?'class="active"':'';?>>
                        <a href="<?php echo WEB_ROOT?>/test?mod=tutoriel">Tutoriel</a>
                    </li>
                    <li <?php echo ($_GET['mod']=='statistique')?'class="active"':'';?>>
                        <a href="<?php echo WEB_ROOT?>/test?mod=statistique">Statistique</a>
                    </li>
                    <li <?php echo ($_GET['mod']=='matiere')?'class="active"':'';?>>
                        <a href="<?php echo WEB_ROOT?>/test?mod=matiere">Matière</a>
                    </li>
                    <li <?php echo ($_GET['mod']=='ecole')?'class="active"':'';?>>
                        <a href="<?php echo WEB_ROOT?>/test?mod=ecole">École</a>
                    </li>
                    <li <?php echo ($_GET['mod']=='commission')?'class="active"':'';?>>
                        <a href="<?php echo WEB_ROOT?>/test?mod=commission">Commission</a>
                    </li>
                </ul>
            </div>
        </nav>
        
        <div class="container">
            <div class="row">
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
                    }
                ?>
            </div>
		</div>
		<div id="footer">

		</div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
        </script>

        <!-- Include all compiled bootstrap plugins -->
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/bootstrap/js/bootstrap.js">
        </script>
	</body>
</html>