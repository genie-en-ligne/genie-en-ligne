<?php
  /**
   * Faire l'assignation des variables POST et SESSION ici avec les isset() ou !empty()
   */
   
   
	if(empty($_GET['request']))	{
		$_GET['request'] = '';
	}

    if(empty($_SESSION['user_id'])){
        $_SESSION['user_id'] = 0;
    }

/* Pour la classe Utilisateur */

    if(empty($_POST['txtPseudo'])){
    	$_POST['txtPseudo'] = '';
    }

    if(empty($_POST['txtNom'])){
    	$_POST['txtNom'] = '';
    }

    if(empty($_POST['pwdMdp1'])){
    	$_POST['pwdMdp1'] = '';
    }

    if(empty($_POST['pwdMdp2'])){
    	$_POST['pwdMdp2'] = '';
    }

    if(empty($_POST['pwdPass'])){
    	$_POST['pwdPass'] = '';
    }

    if(empty($_POST['txtPrenom'])){
    	$_POST['txtPrenom'] = '';
    }

    if(empty($_POST['emlCourriel'])){
    	$_POST['emlCourriel'] = '';
    }

    if(empty($_POST['txtMessage'])){
    	$_POST['txtMessage'] = '';
    }
   
?>