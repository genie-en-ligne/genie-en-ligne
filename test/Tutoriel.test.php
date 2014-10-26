<?php 
    // Placer vos tests unitaires ici...
	//Contenue ID
	echo "<h1><br/>setContenuID</h1>";
    echo "<h4>setContenuID ('bob')-> non integer</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setContenuId('bob'); 
    	echo "<p>".$tuto->getContenuId()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

    echo "<h4>setContenuID (3)-> integer</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setContenuId(3); 
    	echo "<p>".$tuto->getContenuId()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

    //Titre
    echo "<h1><br/>setTitre</h1>";
    echo "<h4>setTitre ('bob')-> string</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setTitre('bob'); 
    	echo "<p>".$tuto->getTitre()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

    echo "<h4>setTitre ('')-> string vide</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setTitre(""); 
    	echo "<p>".$tuto->getTitre()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

    echo "<h4>setTitre (3)-> non string</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setTitre(3); 
    	echo "<p>".$tuto->getTitre()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

    //Date soumis
    echo "<h1><br/>setDateSoumis</h1>";
    echo "<h4>setDateSoumis ('bob')-> non date</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setDateSoumis('bob'); 
    	echo "<p>".$tuto->getDateSoumis()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

    echo "<h4>setDateSoumis ('2014-02-50')-> date éroné</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setDateSoumis('2014-02-50'); 
    	echo "<p>".$tuto->getDateSoumis()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

    echo "<h4>setDateSoumis ('2014-50-10')-> date éroné</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setDateSoumis('2014-50-10'); 
    	echo "<p>".$tuto->getDateSoumis()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

    echo "<h4>setDateSoumis ('2014-02-10')-> bonne date</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setDateSoumis('2014-02-10'); 
    	echo "<p>".$tuto->getDateSoumis()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }


	//Date setDateApprouve
    echo "<h1><br/>setDateApprouve</h1>";
    echo "<h4>setDateApprouve ('bob')-> non date</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setDateApprouve('bob'); 
    	echo "<p>".$tuto->getDateApprouve()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

    echo "<h4>setDateApprouve ('2014-02-50')-> date éroné</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setDateApprouve('2014-02-50'); 
    	echo "<p>".$tuto->getDateApprouve()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

    echo "<h4>setDateApprouve ('2014-50-10')-> date éroné</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setDateApprouve('2014-50-10'); 
    	echo "<p>".$tuto->getDateApprouve()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

    echo "<h4>setDateApprouve ('2014-02-10')-> bonne date</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setDateApprouve('2014-02-10'); 
    	echo "<p>".$tuto->getDateApprouve()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }


    //Date setDateApprouve
    echo "<h1><br/>setSoumisPar</h1>";
    echo "<h4>setSoumisPar ('bob')-> not integer</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setSoumisPar('bob'); 
    	echo "<p>".$tuto->getSoumisPar()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

    echo "<h4>setSoumisPar (3)-> integer</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setSoumisPar(3); 
    	echo "<p>".$tuto->getSoumisPar()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

    //setApprouvePar
    echo "<h1><br/>setApprouvePar</h1>";
    echo "<h4>setApprouvePar ('bob')-> not integer</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setApprouvePar('bob'); 
    	echo "<p>".$tuto->getApprouvePar()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

    echo "<h4>setSoumisPar (3)-> integer</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setApprouvePar(3); 
    	echo "<p>".$tuto->getApprouvePar()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

    //setStatut
    echo "<h1><br/>setStatut</h1>";
    echo "<h4>setStatut ('bob')-> not booléen</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setStatut('bob'); 
    	echo "<p>".$tuto->getStatut()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

    echo "<h4>setStatut (false)-> booléen</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setStatut(false); 
    	echo "<p>";
        var_dump($tuto->getEstDetruit());
        echo "</p>";                 	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

    //setType
    echo "<h1><br/>setType</h1>";
    echo "<h4>setType ('bob')-> not integer</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setType('bob'); 
    	echo "<p>".$tuto->getType()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

    echo "<h4>setType (3)-> integer</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setType(3); 
    	echo "<p>".$tuto->getType()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

    //setMatiereId
    echo "<h1><br/>setMatiereId</h1>";
    echo "<h4>setMatiereId ('bob')-> not integer</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setMatiereId('bob'); 
    	echo "<p>".$tuto->getMatiereId()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

    echo "<h4>setMatiereId (3)-> integer</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setMatiereId(3); 
    	echo "<p>".$tuto->getMatiereId()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

     //setNiveauScolaire
    echo "<h1><br/>setNiveauScolaire</h1>";
    echo "<h4>setNiveauScolaire ('bob')-> not integer</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setNiveauScolaire('bob'); 
    	echo "<p>".$tuto->getNiveauScolaire()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

    echo "<h4>setNiveauScolaire (3)-> integer</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setNiveauScolaire(3); 
    	echo "<p>".$tuto->getNiveauScolaire()."</p>";             	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

     //setEstDetruit
    echo "<h1><br/>setEstDetruit</h1>";
    echo "<h4>setEstDetruit ('bob')-> not booléen</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setEstDetruit('bob'); 
    	echo "<p>".$tuto->getEstDetruit()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

    echo "<h4>setEstDetruit (false)-> booléen</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setEstDetruit(false); 
    	echo "<p>";
    	var_dump($tuto->getEstDetruit());
    	echo "</p>";             	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

    echo "<h4>setEstDetruit (true)-> booléen</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setEstDetruit(true); 
    	echo "<p>";
    	var_dump($tuto->getEstDetruit());
    	echo "</p>";             	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

     //getEcoleId
    echo "<h1><br/>setEcoleId</h1>";
    echo "<h4>setEcoleId ('bob')-> not integer</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setEcoleId('bob'); 
    	echo "<p>".$tuto->getEcoleId()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

    echo "<h4>setEcoleId (3)-> integer</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setEcoleId(3); 
    	echo "<p>".$tuto->getEcoleId()."</p>";             	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

    //setContenu
    echo "<h1><br/>setContenu</h1>";
    echo "<h4>setContenu('bob')-> string</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setContenu('bob'); 
    	echo "<p>".$tuto->getContenu()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

    echo "<h4>setContenu ('')-> string vide</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setContenu(""); 
    	echo "<p>".$tuto->getContenu()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }

    echo "<h4>setContenu (3)-> non string</h4>";
    try {
    	$tuto = new Tutoriel();
    	$tuto->setContenu(3); 
    	echo "<p>".$tuto->getContenu()."</p>";               	
    } catch (Exception $e) {
    	echo "<p>".$e->getMessage()."</p>";
    }


    //Ajouter cotenu
    echo "<h1><br/>Ajouter Contenu</h1>";
    echo "<h4>Ajouter</h4>";
    /*try {
        $tuto = new Tutoriel(0, "Les Science ", "2014-10-21", "0000-00-00", 1, 0, false, 2, 1, 1, false, 1, "Bonjour un text pour les sciences");
        $tuto->ajouterTuto(); 
        echo "<p>".$tuto->getContenuId()."</p>";                  
    } catch (Exception $e) {
        echo "<p>".$e->getMessage()."</p>";
    }*/

     //modifierTutoVideo
    echo "<h1><br/>modifierTutoVideo</h1>";
    echo "<h4>modifier</h4>";
    /*try {
        $tuto = new Tutoriel(6, "Les arts ", "2014-10-21", "0000-00-00", 2, 0, false, 1, 4, 3, false, 2, "www.testModifier.com");
        $tuto->modifierTutoVideo(); 
        echo "<p>".$tuto->getContenuId()."</p>";                  
    } catch (Exception $e) {
        echo "<p>".$e->getMessage()."</p>";
    }*/

    //approuverTuto
    echo "<h1><br/>approuver tuto</h1>";
    echo "<h4>Approuve</h4>";
    try {
        $tuto = new Tutoriel(12, "Les Science ", "2014-10-21", "2014-10-22", 1, 2, true, 2, 1, 1, false, 1, "Bonjour un text pour les sciences");
        $tuto->approuverTuto(); 
        echo "<p>".$tuto->getContenuId()."</p>";                  
    } catch (Exception $e) {
        echo "<p>".$e->getMessage()."</p>";
    }


    //supprimerTuto
    echo "<h1><br/>Supprimer tuto</h1>";
    echo "<h4>Supprimer</h4>";
    try {
        $tuto = new Tutoriel(12, "Les Science ", "2014-10-21", "2014-10-22", 1, 2, true, 2, 1, 1, true, 1, "Bonjour un text pour les sciences");
        $tuto->supprimerTuto(); 
        echo "<p>".$tuto->getContenuId()."</p>";                  
    } catch (Exception $e) {
        echo "<p>".$e->getMessage()."</p>";
    }

    //rechercherListeTutosParTuteur
    echo "<h1><br/>Recherche </h1>";
    echo "<h4>Recherche tuto</h4>";
    try {
        $tuto = new Tutoriel();
        $tuto->setSoumisPar(2);
        $VariableTuto=$tuto->rechercherListeTutosParTuteur(); 
        
        echo "<p>".var_dump($VariableTuto)."</p>";                  
    } catch (Exception $e) {
        echo "<p>".$e->getMessage()."</p>";
    }


    //Vue formulaireModifierTutoVideo
    $oTutoriel = new Tutoriel(1);
    $oTutoriel->chargerTutoriel();

    $oVue = new TutorielVue();
    $oVue->oTutoriel = $oTutoriel;
    $oVue->afficheFormulaireModificationVideo();

    //Vue formulaireModifierTutoVideo
    $oTutoriel = new Tutoriel(11);
    $oTutoriel->chargerTutoriel();

    $oVue = new TutorielVue();
    $oVue->oTutoriel = $oTutoriel;
    $oVue->afficheFormulaireModificationTexte();

    ///vue afficher le formulaire video
    $oVue = new TutorielVue();
    $oVue->afficheFormulaireCreationVideo();

    ///vue afficher le formulaire texte
    $oVue = new TutorielVue();
    $oVue->afficheFormulaireCreationTexte();
?>