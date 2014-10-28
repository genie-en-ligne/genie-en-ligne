<?php

/**
 * Controleur AJAX. Ce fichier est la porte d'entrée des requêtes AJAX (XHR)
 * @author Jonathan Martel
 * @version 1.0
 * @update 2013-03-11
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */

	session_start();
	require_once("./config.php");
	
	
	// Mettre ici le code de gestion de la requête AJAX

    
	switch($_GET['module']){
		case 'tutoriel':
			if($_GET['action'] == 'visionner'){
				$oVue = new TutorielVue();
	            try{
	                $oTutoriel = new Tutoriel($_GET['id']);
	                $oTutoriel->chargerTutoriel();
	                $oVue->oTutoriel = $oTutoriel;

	                $oUtilisateur = new Utilisateur($_SESSION['user_id']);
	                $oUtilisateur->ajouterActiviteService($oTutoriel->getContenuId());

	                if($oTutoriel->getType() == 1){
	                    $oVue->afficheLeVideo();
	                }
	                else{
	                    $oVue->afficheLeTexte();
	                }
	            }
	            catch(Exception $e){
	                echo "Une erreur est survenue. Veuillez réessayer plus tard.";
	            }
			}
			break;
	}

?>