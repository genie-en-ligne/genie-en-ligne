<?php
    class Statistique extends Modele {
        
        //toutes les fonctions retournent un résultat en fonction de la commission ou de l'école à laquelle ils appartiennent.
        
        public function __construct(){
            
        }
        
        //Personnel - tous
        public function rechercherNbVisitesParMois($user_id){
			
			TypeException::estInteger($user_id);
			
            $annee_debut = "";
			$annee_fin = "";
			
			if(date("n") <= 6){
				$annee_debut = date("Y")-1;
				$annee_fin = date("Y");
			}
			else{
				$annee_debut = date("Y");
				$annee_fin = date("Y")+1;
			}
			
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT COUNT(*) as nbVisites, MONTH(timestamp) as mois FROM activite_login al 
												WHERE al.utilisateur_ID = '".$user_id."' AND evenement = 'login'
												AND ((YEAR(timestamp) = '".$annee_debut."' AND MONTH(timestamp) >= '8') OR (YEAR(timestamp) = '".$annee_fin."' AND MONTH(timestamp) <= '6')) 
												GROUP BY MONTH(timestamp)
												ORDER BY YEAR(timestamp) ASC, MONTH(timestamp) ASC");
            $aResultats = $oConnexion->recupererTableau($oResultat);

    		$aNomMois = array('', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');

            $aNombreVisites = array();

            $currRes = 0;
            for($i = 8; $i <= 12; $i++){
            	if(isset($aResultats[$currRes]['mois']) && $aResultats[$currRes]['mois'] == $i){
            		$aNombreVisites[] = array($aNomMois[$aResultats[$currRes]['mois']], $aResultats[$currRes]['nbVisites']);
            		$currRes++;
            	}
            	else{
            		$aNombreVisites[] = array($aNomMois[$i], 0);
            	}
            }

            for($i = 1; $i <= 6; $i++){
            	if(isset($aResultats[$currRes]['mois']) && $aResultats[$currRes]['mois'] == $i){
            		$aNombreVisites[] = array($aNomMois[$aResultats[$currRes]['mois']], $aResultats[$currRes]['nbVisites']);
            		$currRes++;
            	}
            	else{
            		$aNombreVisites[] = array($aNomMois[$i], 0);
            	}
            }
            
            return $aNombreVisites;
        }
        
        //Personnel - Tuteur et Prof
        public function rechercherNbTutorielsCreesUtilisateur($utilisateur_ID){
		
			TypeException::estInteger($utilisateur_ID);

			$annee_debut = "";
			$annee_fin = "";
			
			if(date("n") <= 6){
				$annee_debut = date("Y")-1;
				$annee_fin = date("Y");
			}
			else{
				$annee_debut = date("Y");
				$annee_fin = date("Y")+1;
			}
		
			$oConnexion = new MySqliLib();
			$oResultat = $oConnexion->executer("SELECT COUNT(*) as NbTutorats, m.nom as matiere
												FROM contenu c, ecoles e, matieres m
												WHERE c.ecole_ID = e.ecole_ID
												AND m.matiere_ID = c.matiere_ID
												AND c.soumis_par = '".$utilisateur_ID."'
												AND ((YEAR(c.date_soumis) = '".$annee_debut."' AND MONTH(c.date_soumis) >= '8') OR (YEAR(c.date_soumis) = '".$annee_fin."' AND MONTH(c.date_soumis) <= '6')) 
												GROUP BY c.matiere_ID
												ORDER BY m.nom ASC");
			$aResultats = $oConnexion->recupererTableau($oResultat);
			$aNombreTutorats = array();

			foreach ($aResultats as $rangee) {
				$aNombreTutorats[] = array($rangee['matiere'], $rangee['NbTutorats']);
			}
			
			return $aNombreTutorats;
        }
        
        //Personnel - Prof
        public function rechercherNbTutorielsApprouves($professeur_ID){
		
			TypeException::estInteger($professeur_ID);

			$annee_debut = "";
			$annee_fin = "";
			
			if(date("n") <= 6){
				$annee_debut = date("Y")-1;
				$annee_fin = date("Y");
			}
			else{
				$annee_debut = date("Y");
				$annee_fin = date("Y")+1;
			}
		
			$oConnexion = new MySqliLib();
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
			$aResultats = $oConnexion->recupererTableau($oResultat);

			$aNomMois = array('', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');

            $aNombreTutorats = array();

            $currRes = 0;
            for($i = 8; $i <= 12; $i++){
            	if(isset($aResultats[$currRes]['mois']) && $aResultats[$currRes]['mois'] == $i){
            		$aNombreTutorats[] = array($aNomMois[$aResultats[$currRes]['mois']], $aResultats[$currRes]['NbTutorats']);
            		$currRes++;
            	}
            	else{
            		$aNombreTutorats[] = array($aNomMois[$i], 0);
            	}
            }

            for($i = 1; $i <= 6; $i++){
            	if(isset($aResultats[$currRes]['mois']) && $aResultats[$currRes]['mois'] == $i){
            		$aNombreTutorats[] = array($aNomMois[$aResultats[$currRes]['mois']], $aResultats[$currRes]['NbTutorats']);
            		$currRes++;
            	}
            	else{
            		$aNombreTutorats[] = array($aNomMois[$i], 0);
            	}
            }
			
			return $aNombreTutorats;
        }

        //Personnel - Eleve
        public function rechercherNbTutorielsConsultes($user_id){
        	TypeException::estInteger($user_id);
			
            $annee_debut = "";
			$annee_fin = "";
			
			if(date("n") <= 6){
				$annee_debut = date("Y")-1;
				$annee_fin = date("Y");
			}
			else{
				$annee_debut = date("Y");
				$annee_fin = date("Y")+1;
			}
			
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT COUNT(*) as nbTutos, MONTH(timestamp) as mois FROM activite_services a 
												WHERE a.utilisateur_ID = '".$user_id."' AND a.type_service = '1'
												AND ((YEAR(timestamp) = '".$annee_debut."' AND MONTH(timestamp) >= '8') OR (YEAR(timestamp) = '".$annee_fin."' AND MONTH(timestamp) <= '6')) 
												GROUP BY MONTH(timestamp)
												ORDER BY YEAR(timestamp) ASC, MONTH(timestamp) ASC");
            $aResultats = $oConnexion->recupererTableau($oResultat);

    		$aNomMois = array('', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');

            $aNombreTutos = array();

            $currRes = 0;
            for($i = 8; $i <= 12; $i++){
            	if(isset($aResultats[$currRes]['mois']) && $aResultats[$currRes]['mois'] == $i){
            		$aNombreTutos[] = array($aNomMois[$aResultats[$currRes]['mois']], $aResultats[$currRes]['nbTutos']);
            		$currRes++;
            	}
            	else{
            		$aNombreTutos[] = array($aNomMois[$i], 0);
            	}
            }

            for($i = 1; $i <= 6; $i++){
            	if(isset($aResultats[$currRes]['mois']) && $aResultats[$currRes]['mois'] == $i){
            		$aNombreTutos[] = array($aNomMois[$aResultats[$currRes]['mois']], $aResultats[$currRes]['nbTutos']);
            		$currRes++;
            	}
            	else{
            		$aNombreTutos[] = array($aNomMois[$i], 0);
            	}
            }
            
            return $aNombreTutos;
        }
        
        //General - Prof et Responsable
        public function rechercherNbTuteursParEcole($commission_ID){
		
			TypeException::estInteger($commission_ID);
			
			$oConnexion = new MySqliLib();
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
			$aResultats = $oConnexion->recupererTableau($oResultat);
            $aNombreTuteurs = array();

            foreach ($aResultats as $rangee) {
            	$aNombreTuteurs[] = array($rangee['ecole'], $rangee['NbTuteurs']);
            }
			
			return $aNombreTuteurs;
        }
        
        //General - Prof et Responsable
        public function rechercherNbProfsParEcole($commission_ID){
		
			TypeException::estInteger($commission_ID);
			
			$oConnexion = new MySqliLib();
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
			$aResultats = $oConnexion->recupererTableau($oResultat);
            $aNombreProfs = array();

            foreach ($aResultats as $rangee) {
            	$aNombreProfs[] = array($rangee['ecole'], $rangee['NbProfs']);
            }
			
			return $aNombreProfs;
        }
        
        //General - Prof et Responsable
        public function rechercherNbElevesParEcole($commission_ID){
		
			TypeException::estInteger($commission_ID);
			
			$oConnexion = new MySqliLib();
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
			$aResultats = $oConnexion->recupererTableau($oResultat);
            $aNombreEleves = array();

            foreach ($aResultats as $rangee) {
            	$aNombreEleves[] = array($rangee['ecole'], $rangee['NbEleves']);
            }
			
			return $aNombreEleves;
        }
        
        //General - Prof et Responsable
        public function rechercherNbTutosParEcole($commission_ID){
		
			TypeException::estInteger($commission_ID);
			
			$oConnexion = new MySqliLib();
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
			$aResultats = $oConnexion->recupererTableau($oResultat);
			$aNombreTutoriels = array();

			foreach ($aResultats as $rangee) {
				$aNombreTutoriels[] = array($rangee['ecole'], $rangee['NbTutoriels']);
			}
			
			return $aNombreTutoriels;
        }

        //General - Super Admin
        public function rechercherVisitesParCommission(){
            $annee_debut = "";
			$annee_fin = "";
			
			if(date("n") <= 6){
				$annee_debut = date("Y")-1;
				$annee_fin = date("Y");
			}
			else{
				$annee_debut = date("Y");
				$annee_fin = date("Y")+1;
			}
			
            $oConnexion = new MySqliLib();
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
            $aResultats = $oConnexion->recupererTableau($oResultat);
            $aNombreVisites = array();

            foreach ($aResultats as $rangee){
            	$aNombreVisites[] = array($rangee['commission'], $rangee['nbVisites']);
            }
            
            return $aNombreVisites;
        }

        public function rechercherTutosParCommission(){
        	$annee_debut = "";
			$annee_fin = "";
			
			if(date("n") <= 6){
				$annee_debut = date("Y")-1;
				$annee_fin = date("Y");
			}
			else{
				$annee_debut = date("Y");
				$annee_fin = date("Y")+1;
			}
			
            $oConnexion = new MySqliLib();
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
            $aResultats = $oConnexion->recupererTableau($oResultat);
            $aNombreVisites = array();

            foreach ($aResultats as $rangee){
            	$aNombreVisites[] = array($rangee['commission'], $rangee['nbTutos']);
            }
            
            return $aNombreVisites;
        }
    }
?>