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

/******************************/
/* Pour la classe Utilisateur */
/******************************/

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

    if(empty($_POST['chkMatiere'])){
        $_POST['chkMatiere'] = array();
    }

/***************************/
/* Pour la classe Tutoriel */
/***************************/

    if(empty($_GET['matiere'])){
    	$_GET['matiere'] = 0;
    }

    if(empty($_GET['niveau'])){
    	$_GET['niveau'] = 0;
    }

    if(empty($_POST['txtTitre'])){
    	$_POST['txtTitre'] = '';
    }

    if(empty($_POST['txtUrl'])){
    	$_POST['txtUrl'] = '';
    }

    if(empty($_POST['txtContenu'])){
    	$_POST['txtUrl'] = '';
    }

    if(empty($_POST['sltNiveau'])){
    	$_POST['sltNiveau'] = 0;
    }

    if(empty($_POST['sltMatiere'])){
    	$_POST['sltMatiere'] = 0;
    }

    if(empty($_POST['sltEcole'])){
    	$_POST['sltEcole'] = 0;
    }

    if(empty($_POST['hidContenuId'])){
    	$_POST['hidContenuId'] = 0;
    }
   
?>