<?php

/**
 * @date 2014-10-25
 * @author Silvia Popa
 * @brief Classe Statistique (classe fille de la classe Modele ) 
 */

    class Statistique extends Modele {
        
        //Toutes les fonctions retournent un résultat en fonction de la commission ou de l'école à laquelle ils appartiennent.
        
    /**
	 * Recherche nombre de visites par mois pour un utilisateur
	 * @param integer $user_id (id de l'utilisateur)
	 * @return array $aNombreVisites
	 */
        //Personnel - pour tous les type des utilisateurs
		
        public function rechercherNbVisitesParMois($user_id){
			
			//On détermine si le paramètre est une valeur entière
			TypeException::estInteger($user_id);
			
			//Déclaration de deux variables et affectation à elles des chaînes vides
            $annee_debut = "";
			$annee_fin = "";
			//Si le mois est <= 6 (ça veut dire pour les mois de janvier jusqu'à juin inclusive)
			if(date("n") <= 6){
				$annee_debut = date("Y")-1;
				$annee_fin = date("Y"); //Année courante
			}
			//sinon
			else{
				$annee_debut = date("Y"); //Année courante
				$annee_fin = date("Y")+1;
			}
			//Connexion à la base de données
            $oConnexion = new MySqliLib();
			//Exécuter la requête de recherche de nombre d'enregistrements de nombre de visites par mois pour un utilisateur donné et evenement = 'login' pour l'année courante dans la table activite_login dans la base de donnée
            $oResultat = $oConnexion->executer("SELECT COUNT(*) as nbVisites, MONTH(timestamp) as mois FROM activite_login al 
												WHERE al.utilisateur_ID = '".$user_id."' AND evenement = 'login'
												AND ((YEAR(timestamp) = '".$annee_debut."' AND MONTH(timestamp) >= '8') OR (YEAR(timestamp) = '".$annee_fin."' AND MONTH(timestamp) <= '6')) 
												GROUP BY MONTH(timestamp)
												ORDER BY YEAR(timestamp) ASC, MONTH(timestamp) ASC");
            //Récupérer le array des résultats
			$aResultats = $oConnexion->recupererTableau($oResultat);
			
			//Déclaration d'une variable où on va stocker tous les mois de l'année
    		$aNomMois = array('', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
			
			//Déclaration d'une variable, affectation à elle un tableau vide
            $aNombreVisites = array();

            $currRes = 0;
			//Pour les mois de août jusqu'à decembre inclusive
            for($i = 8; $i <= 12; $i++){
            	if(isset($aResultats[$currRes]['mois']) && $aResultats[$currRes]['mois'] == $i){
            		$aNombreVisites[] = array($aNomMois[$aResultats[$currRes]['mois']], $aResultats[$currRes]['nbVisites']);
            		$currRes++;
            	}
				//Sinon
            	else{
            		$aNombreVisites[] = array($aNomMois[$i], 0); //Si le résultat n'éxiste pas pour un mois on met un résultat vide pour ce mois
            	}
            }
			//Pour les mois de janvier jusqu'à juin inclusive
            for($i = 1; $i <= 6; $i++){
            	if(isset($aResultats[$currRes]['mois']) && $aResultats[$currRes]['mois'] == $i){
            		$aNombreVisites[] = array($aNomMois[$aResultats[$currRes]['mois']], $aResultats[$currRes]['nbVisites']);
            		$currRes++;
            	}
				//Sinon
            	else{
            		$aNombreVisites[] = array($aNomMois[$i], 0); //Si le résultat n'éxiste pas pour un mois on met un résultat vide pour ce mois
            	}
            }
            //retourner le tableau $aNombreVisites
            return $aNombreVisites;
        
		} //fin de la fonction rechercherNbVisitesParMois($user_id)
        
    /**
	 * Recherche nombre de tutoriels créé par utilisateur
	 * @param integer $utilisateur_ID (id de l'utilisateur)
	 * @return array $aNombreTutorats
	 */
		//Personnel -  pour les Tuteurs et Profs
		
        public function rechercherNbTutorielsCreesUtilisateur($utilisateur_ID){
		
			//On détermine si le paramètre est une valeur entière
			TypeException::estInteger($utilisateur_ID);
			
			//Déclaration de deux variables et affectation à elles des chaînes vides
			$annee_debut = "";
			$annee_fin = "";
			
			//Si le mois est <= 6 (ça veut dire pour les mois de janvier jusqu'à juin inclusive)
			if(date("n") <= 6){
				$annee_debut = date("Y")-1;
				$annee_fin = date("Y"); //Année courante
			}
			//Sinon
			else{
				$annee_debut = date("Y"); //Année courante
				$annee_fin = date("Y")+1;
			}
			
			//Connexion à la base de données
			$oConnexion = new MySqliLib();
			//Exécuter la requête de recherche de nombre d'enregistrements pour les tutoriels créés par matière pour un utilisateur donné pour l'année courante dans la base de donnée
			$oResultat = $oConnexion->executer("SELECT COUNT(*) as NbTutorats, m.nom as matiere
												FROM contenu c, ecoles e, matieres m
												WHERE c.ecole_ID = e.ecole_ID
												AND m.matiere_ID = c.matiere_ID
												AND c.soumis_par = '".$utilisateur_ID."'
												AND ((YEAR(c.date_soumis) = '".$annee_debut."' AND MONTH(c.date_soumis) >= '8') OR (YEAR(c.date_soumis) = '".$annee_fin."' AND MONTH(c.date_soumis) <= '6')) 
												GROUP BY c.matiere_ID
												ORDER BY m.nom ASC");
			//Récupérer le array des résultats									
			$aResultats = $oConnexion->recupererTableau($oResultat);
			
			//Déclaration d'une variable, affectation à elle un tableau vide
			$aNombreTutorats = array();
			
			//Pour chaque ligne de résultat
			foreach ($aResultats as $rangee){
				//On ramasse dans notre tableau le nom de matière et le nombre de tutoriels
				$aNombreTutorats[] = array($rangee['matiere'], $rangee['NbTutorats']);
			}
			//retourner le tableau $aNombreTutorats
			return $aNombreTutorats;
        
		} //fin de la fonction rechercherNbTutorielsCreesUtilisateur($utilisateur_ID)
        
		
	/**
	 * Recherche nombre de tutoriels approuvés par un prof
	 * @param integer $professeur_ID (id de l'utilisateur)
	 * @return array $aNombreTutorats
	 */
        //Personnel - pour les Profs
		
        public function rechercherNbTutorielsApprouves($professeur_ID){
			
			//On détermine si le paramètre est une valeur entière
			TypeException::estInteger($professeur_ID);
			
			//Déclaration de deux variables et affectation à elles des chaînes vides
			$annee_debut = "";
			$annee_fin = "";
			
			//Si le mois est <= 6 (ça veut dire pour les mois de janvier jusqu'à juin inclusive)
			if(date("n") <= 6){
				$annee_debut = date("Y")-1;
				$annee_fin = date("Y"); //Année courante
			}
			//Sinon
			else{
				$annee_debut = date("Y"); //Année courante
				$annee_fin = date("Y")+1;
			}
			
			//Connexion à la base de données
			$oConnexion = new MySqliLib();
			
			//Exécuter la requête de recherche de nombre d'enregistrements pour les tutoriels approuvés par un utilisateur donné pour l'année courante (groupé par mois) dans la base de donnée
			$oResultat = $oConnexion->executer("SELECT 
													COUNT(*) as NbTutorats, 
													MONTH(date_approuve) as mois
												FROM
													contenu c
												WHERE
													c.approuve_par = '".$professeur_ID."'
													AND ((YEAR(date_approuve) = '".$annee_debut."' AND MONTH(date_approuve) >= '8') OR (YEAR(date_approuve) = '".$annee_fin."' AND MONTH(date_approuve) <= '6')) 
												GROUP BY
													MONTH(date_approuve)
												ORDER BY
													YEAR(date_approuve) ASC, 
													MONTH(date_approuve) ASC
												");
			//Récupérer le array des résultats
			$aResultats = $oConnexion->recupererTableau($oResultat);
			
			//Déclaration d'une variable où on va stocker tous les mois de l'année
			$aNomMois = array('', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
			
			//Déclaration d'une variable, affectation à elle un tableau vide
            $aNombreTutorats = array();

            $currRes = 0;
			//Pour les mois de août jusqu'à decembre inclusive
            for($i = 8; $i <= 12; $i++){
            	if(isset($aResultats[$currRes]['mois']) && $aResultats[$currRes]['mois'] == $i){
            		$aNombreTutorats[] = array($aNomMois[$aResultats[$currRes]['mois']], $aResultats[$currRes]['NbTutorats']);
            		$currRes++;
            	}
				//Sinon
            	else{
            		$aNombreTutorats[] = array($aNomMois[$i], 0); //Si le résultat n'éxiste pas pour un mois on met un résultat vide pour ce mois
            	}
            }
			//Pour les mois de janvier jusqu'à juin inclusive
            for($i = 1; $i <= 6; $i++){
            	if(isset($aResultats[$currRes]['mois']) && $aResultats[$currRes]['mois'] == $i){
            		$aNombreTutorats[] = array($aNomMois[$aResultats[$currRes]['mois']], $aResultats[$currRes]['NbTutorats']);
            		$currRes++;
            	}
				//Sinon
            	else{
            		$aNombreTutorats[] = array($aNomMois[$i], 0); //Si le résultat n'éxiste pas pour un mois on met un résultat vide pour ce mois
            	}
            }
			//retourner le tableau $aNombreTutorats
			return $aNombreTutorats;
        
		} //fin de la fonction rechercherNbTutorielsApprouves($professeur_ID)

		
		
	/**
	 * Recherche nombre de tutoriels consultés par un utilisateur
	 * @param integer $user_id (id de l'utilisateur)
	 * @return array $aNombreTutos
	 */
        //Personnel - pour les Eleves
		
        public function rechercherNbTutorielsConsultes($user_id){
        	
			//On détermine si le paramètre est une valeur entière
			TypeException::estInteger($user_id);
			
			//Déclaration de deux variables et affectation à elles des chaînes vides
            $annee_debut = "";
			$annee_fin = "";
			
			//Si le mois est <= 6 (ça veut dire pour les mois de janvier jusqu'à juin inclusive)
			if(date("n") <= 6){
				$annee_debut = date("Y")-1;
				$annee_fin = date("Y"); //Année courante
			}
			//Sinon
			else{
				$annee_debut = date("Y"); //Année courante
				$annee_fin = date("Y")+1;
			}
			//Connexion à la base de données
            $oConnexion = new MySqliLib();
			
			//Exécuter la requête de recherche de nombre d'enregistrements pour les tutoriels consultés par un utilisateur donné pour l'année courante (groupé par mois) dans la base de donnée
            $oResultat = $oConnexion->executer("SELECT COUNT(*) as nbTutos, MONTH(timestamp) as mois FROM activite_services a 
												WHERE a.utilisateur_ID = '".$user_id."' AND a.type_service = '1'
												AND ((YEAR(timestamp) = '".$annee_debut."' AND MONTH(timestamp) >= '8') OR (YEAR(timestamp) = '".$annee_fin."' AND MONTH(timestamp) <= '6')) 
												GROUP BY MONTH(timestamp)
												ORDER BY YEAR(timestamp) ASC, MONTH(timestamp) ASC");
            //Récupérer le array des résultats
			$aResultats = $oConnexion->recupererTableau($oResultat);
			
			//Déclaration d'une variable où on va stocker tous les mois de l'année
    		$aNomMois = array('', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');

			//Déclaration d'une variable, affectation à elle un tableau vide
            $aNombreTutos = array();

            $currRes = 0;
			//Pour les mois de août jusqu'à decembre inclusive
            for($i = 8; $i <= 12; $i++){
            	if(isset($aResultats[$currRes]['mois']) && $aResultats[$currRes]['mois'] == $i){
            		$aNombreTutos[] = array($aNomMois[$aResultats[$currRes]['mois']], $aResultats[$currRes]['nbTutos']);
            		$currRes++;
            	}
				//Sinon
            	else{
            		$aNombreTutos[] = array($aNomMois[$i], 0); //Si le résultat n'éxiste pas pour un mois on met un résultat vide pour ce mois
            	}
            }
			//Pour les mois de janvier jusqu'à juin inclusive
            for($i = 1; $i <= 6; $i++){
            	if(isset($aResultats[$currRes]['mois']) && $aResultats[$currRes]['mois'] == $i){
            		$aNombreTutos[] = array($aNomMois[$aResultats[$currRes]['mois']], $aResultats[$currRes]['nbTutos']);
            		$currRes++;
            	}
				//Sinon
            	else{
            		$aNombreTutos[] = array($aNomMois[$i], 0); //Si le résultat n'éxiste pas pour un mois on met un résultat vide pour ce mois
            	}
            }
            //retourner le tableau $aNombreTutos
            return $aNombreTutos;
        
		} //fin de la fonction rechercherNbTutorielsConsultes($user_id)
        
        
	/**
	 * Recherche nombre de tuteurs par école
	 * @param integer $commission_ID (id de commission scolaire)
	 * @return array $aNombreTuteurs
	 */	
		//General -  pour les Profs et Responsable de commission scolaire
       
	   public function rechercherNbTuteursParEcole($commission_ID){
		
			//On détermine si le paramètre est une valeur entière
			TypeException::estInteger($commission_ID);
			
			//Connexion à la base de données
			$oConnexion = new MySqliLib();
			
			//Exécuter la requête de recherche de nombre de valeurs distinctes de colonnes spécifiées (epu.utilisateur_ID et e.nom) dans deux tables (ecoles et ecoles_par_utilisateur)
			//pour une commission donnée, par école, pour l'utilisateur avec le role = 2 (c'est tuteur) dans la base de donnée
			$oResultat = $oConnexion->executer("SELECT
													COUNT(DISTINCT epu.utilisateur_ID) as NbTuteurs, 
													e.nom as ecole
												FROM
													ecoles e, 
													ecoles_par_utilisateur epu
													
												WHERE												
													e.commission_ID = '".$commission_ID."' AND
													epu.ecole_ID = e.ecole_ID AND
													epu.utilisateur_ID IN (
																			SELECT 
																				utilisateur_ID 
																			FROM 
																				utilisateurs u 
																			WHERE 
																				u.role = 2 AND
																				u.est_detruit = 0
																			)
												ORDER BY
													e.nom ASC
												");
			//Récupérer le array des résultats
			$aResultats = $oConnexion->recupererTableau($oResultat);
            
			//Déclaration d'une variable, affectation à elle un tableau vide
			$aNombreTuteurs = array();

            //Pour chaque ligne de résultat
			foreach ($aResultats as $rangee) {
				//On ramasse dans notre tableau le nom de l'école et nombre de tuteurs
            	$aNombreTuteurs[] = array($rangee['ecole'], $rangee['NbTuteurs']);
            }
			//retourner le tableau $aNombreTuteurs
			return $aNombreTuteurs;
        
		} //fin de la fonction rechercherNbTuteursParEcole($commission_ID)
		
		
    /**
	 * Recherche nombre de profs par école
	 * @param integer $commission_ID (id de commission scolaire)
	 * @return array $aNombreProfs
	 */	    
        //General - pour Prof et Responsable
		
        public function rechercherNbProfsParEcole($commission_ID){
			
			//On détermine si le paramètre est une valeur entière
			TypeException::estInteger($commission_ID);
			
			//Connexion à la base de données
			$oConnexion = new MySqliLib();
			
			//Exécuter la requête de recherche de nombre de valeurs distinctes de colonnes spécifiées (epu.utilisateur_ID et e.nom) dans deux tables (ecoles et ecoles_par_utilisateur)
			//pour une commission donnée, par école, pour l'utilisateur avec le role = 3 (c'est prof) dans la base de donnée
			$oResultat = $oConnexion->executer("SELECT
													COUNT(DISTINCT epu.utilisateur_ID) as NbProfs, 
													e.nom as ecole
												FROM
													ecoles e, 
													ecoles_par_utilisateur epu
													
												WHERE												
													e.commission_ID = '".$commission_ID."' AND
													epu.ecole_ID = e.ecole_ID AND
													epu.utilisateur_ID IN (
																			SELECT 
																				utilisateur_ID 
																			FROM 
																				utilisateurs u 
																			WHERE 
																				u.role = 3 AND
																				u.est_detruit = 0
																			)
												ORDER BY
													e.nom ASC
												");
			//Récupérer le array des résultats
			$aResultats = $oConnexion->recupererTableau($oResultat);
            
			//Déclaration d'une variable, affectation à elle un tableau vide
			$aNombreProfs = array();

            //Pour chaque ligne de résultat
			foreach ($aResultats as $rangee) {
				//On ramasse dans notre tableau le nom de l'école et nombre de profs
            	$aNombreProfs[] = array($rangee['ecole'], $rangee['NbProfs']);
            }
			//retourner le tableau $aNombreProfs
			return $aNombreProfs;
        
		} //fin de la fonction rechercherNbProfsParEcole($commission_ID)
        
       

	/**
	 * Recherche nombre d'élèves par école
	 * @param integer $commission_ID (id de commission scolaire)
	 * @return array $aNombreEleves
	 */	
	   //General - pour Prof et Responsable
		
        public function rechercherNbElevesParEcole($commission_ID){
		
			//On détermine si le paramètre est une valeur entière
			TypeException::estInteger($commission_ID);
			
			//Connexion à la base de données
			$oConnexion = new MySqliLib();
			
			//Exécuter la requête de recherche de nombre de valeurs distinctes de colonnes spécifiées (epu.utilisateur_ID et e.nom) dans deux tables (ecoles et ecoles_par_utilisateur)
			//pour une commission donnée, par école, pour l'utilisateur avec le role = 1 (c'est élève) dans la base de donnée
			$oResultat = $oConnexion->executer("SELECT
													COUNT(DISTINCT epu.utilisateur_ID) as NbEleves, 
													e.nom as ecole
												FROM
													ecoles e, 
													ecoles_par_utilisateur epu
													
												WHERE												
													e.commission_ID = '".$commission_ID."' AND
													epu.ecole_ID = e.ecole_ID AND
													epu.utilisateur_ID IN (
																			SELECT 
																				utilisateur_ID 
																			FROM 
																				utilisateurs u 
																			WHERE 
																				u.role = 1 AND
																				u.est_detruit = 0
																			)
												ORDER BY
													e.nom ASC
												");
			//Récupérer le array des résultats
			$aResultats = $oConnexion->recupererTableau($oResultat);
            
			//Déclaration d'une variable, affectation à elle un tableau vide
			$aNombreEleves = array();

            //Pour chaque ligne de résultat
			foreach ($aResultats as $rangee) {
				//On ramasse dans notre tableau le nom de l'école et le nombre des élèves
            	$aNombreEleves[] = array($rangee['ecole'], $rangee['NbEleves']);
            }
			//retourner le tableau $aNombreEleves
			return $aNombreEleves;
        
		} //fin de la fonction rechercherNbElevesParEcole($commission_ID)
        
        
		
	/**
	 * Recherche nombre de tutoriels par école
	 * @param integer $commission_ID (id de commission scolaire)
	 * @return array $aNombreTutoriels
	 */		
		//General - pour Prof et Responsable
		
        public function rechercherNbTutosParEcole($commission_ID){
		
			//On détermine si le paramètre est une valeur entière
			TypeException::estInteger($commission_ID);
			
			//Connexion à la base de données
			$oConnexion = new MySqliLib();
			
			//Exécuter la requête de recherche de nombre d'enregistrements pour les tutoriels crées par école pour une commission donné dans la base de donnée
			$oResultat = $oConnexion->executer("SELECT
													COUNT(*) as NbTutoriels, 
													e.nom as ecole
												FROM
													contenu c, ecoles e
												WHERE
													c.est_detruit = '0' AND
													e.ecole_ID = c.ecole_ID AND
													e.commission_ID = '".$commission_ID."'
												ORDER BY 
													e.nom ASC
												");
			//Récupérer le array des résultats
			$aResultats = $oConnexion->recupererTableau($oResultat);
			
			//Déclaration d'une variable, affectation à elle un tableau vide
			$aNombreTutoriels = array();

			//Pour chaque ligne de résultat
			foreach ($aResultats as $rangee) {
				//On ramasse dans notre tableau le nom de l'école et le nombre de tutoriels
				$aNombreTutoriels[] = array($rangee['ecole'], $rangee['NbTutoriels']);
			}
			//retourner le tableau $aNombreTutoriels
			return $aNombreTutoriels;
        
		} //fin de la fonction rechercherNbTutosParEcole($commission_ID)

        
		
	/**
	 * Recherche nombre de visites par commission
	 * @return array $aNombreVisites
	 */		
		//General - pour Super Admin
		
        public function rechercherVisitesParCommission(){
            
			//Déclaration de deux variables et affectation à elles des chaînes vides
			$annee_debut = "";
			$annee_fin = "";
			
			//Si le mois est <= 6 (ça veut dire pour les mois de janvier jusqu'à juin inclusive)
			if(date("n") <= 6){
				$annee_debut = date("Y")-1;
				$annee_fin = date("Y"); //Année courante
			}
			//Sinon
			else{
				$annee_debut = date("Y"); //Année courante
				$annee_fin = date("Y")+1;
			}
			
			//Connexion à la base de données
            $oConnexion = new MySqliLib();
			
			//Exécuter la requête de recherche de nombre d'enregistrements de nombre de visites par commissions
            $oResultat = $oConnexion->executer("SELECT 
            										COUNT(*) as nbVisites, 
            										c.nom as commission
        										FROM 
        											activite_login al, 
        											utilisateurs u, 
        											ecoles_par_utilisateur epu, 
        											ecoles e,
        											commissions c
            									WHERE 
            										al.utilisateur_ID = u.utilisateur_ID AND
            										al.evenement = 'login' AND
            										u.utilisateur_ID = epu.utilisateur_ID AND 
            										epu.ecole_ID = e.ecole_ID AND
            										c.commission_ID = e.commission_ID
            									GROUP BY
            										c.nom
            									ORDER BY
            										c.nom ASC
												");
            //Récupérer le array des résultats
			$aResultats = $oConnexion->recupererTableau($oResultat);
            
			//Déclaration d'une variable, affectation à elle un tableau vide
			$aNombreVisites = array();

            //Pour chaque ligne de résultat
			foreach ($aResultats as $rangee){
				//On ramasse dans notre tableau le nom de commission et le nombre de visites
            	$aNombreVisites[] = array($rangee['commission'], $rangee['nbVisites']);
            }
            //retourner le tableau $aNombreVisites
            return $aNombreVisites;
        
		} //fin de la fonction rechercherVisitesParCommission()

       
		
	/**
	 * Recherche nombre de tutoriels par commission
	 * @return array $aNombreTutos
	 */
		//General - pour Super Admin
		
	    public function rechercherTutosParCommission(){
        	
			//Déclaration de deux variables et affectation à elles des chaînes vides
			$annee_debut = "";
			$annee_fin = "";
			
			//Si le mois est <= 6 (ça veut dire pour les mois de janvier jusqu'à juin inclusive)
			if(date("n") <= 6){
				$annee_debut = date("Y")-1;
				$annee_fin = date("Y"); //Année courante
			}
			//Sinon
			else{
				$annee_debut = date("Y"); //Année courante
				$annee_fin = date("Y")+1;
			}
			//Connexion à la base de données
            $oConnexion = new MySqliLib();
			
			//Exécuter la requête de recherche de nombre d'enregistrements de nombre de tutoriels par commissions
            $oResultat = $oConnexion->executer("SELECT 
            										COUNT(*) as nbTutos, 
            										co.nom as commission
        										FROM 
        											contenu c,  
        											ecoles e,
        											commissions co
            									WHERE 
            										c.est_detruit = '0' AND
            										c.ecole_ID = e.ecole_ID AND
            										co.commission_ID = e.commission_ID
            									GROUP BY
            										co.nom
            									ORDER BY
            										co.nom ASC
												");
												
            //Récupérer le array des résultats
			$aResultats = $oConnexion->recupererTableau($oResultat);
            
			//Déclaration d'une variable, affectation à elle un tableau vide
			$aNombreTutos = array();

            //Pour chaque ligne de résultat
			foreach ($aResultats as $rangee){
				//On ramasse dans notre tableau le nom de commission et le nombre de tutoriels
            	$aNombreTutos[] = array($rangee['commission'], $rangee['nbTutos']);
            }
             //retourner le tableau $aNombreTutos
            return $aNombreTutos;
        
		} //fin de la fonction rechercherTutosParCommission()
    
	} //fin de la classe Statistique
?>