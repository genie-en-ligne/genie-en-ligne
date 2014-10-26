<?php
    class Statistique extends Modele {
        
        //toutes les fonctions retournent un résultat en fonction de la commission ou de l'école à laquelle ils appartiennent.
        
        public function __construct(){
            
        }
        
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
            $oResultat = $oConnexion->executer("SELECT COUNT(*) FROM activite_login al 
												WHERE al.utilisateur_ID = '".$user_id."' AND evenement = 'login'
												AND ((YEAR(timestamp) = '".$annee_debut."' AND MONTH(timestamp) >= '8') OR (YEAR(timestamp) = '".$annee_fin."' AND MONTH(timestamp) <= '6')) 
												GROUP BY MONTH(timestamp)
												ORDER BY YEAR(timestamp) ASC, MONTH(timestamp) ASC");
            $aNombreVisites = $oConnexion->recupererTableau($oResultat);
            
            return $aNombreVisites;
        }
        
        public function rechercherNbTutoratsCrees($commission_ID){
		
			TypeException::estInteger($commission_ID);
		
			$oConnexion = new MySqliLib();
			$oResultat = $oConnexion->executer("SELECT COUNT(*) as NbTutorats
												FROM contenu c,ecoles e
												WHERE c.ecole_ID = e.ecole_ID
												AND e.commission_ID = '".$commission_ID."';");
			$aNombreTutorats = $oConnexion->recupererTableau($oResultat);
			
			return $aNombreTutorats;
        }
        
        public function rechercherNbTutoratsApprouves($commission_ID){
		
			TypeException::estInteger($commission_ID);
		
			$oConnexion = new MySqliLib();
			$oResultat = $oConnexion->executer("SELECT 
													COUNT(*) as NbTutorats
												FROM
													contenu c,ecoles e
												WHERE
													c.approuve = 1 AND
													c.ecole_ID = e.ecole_ID AND
													e.commission_ID = '".$commission_ID."';
												");
			$aNombreTutorats = $oConnexion->recupererTableau($oResultat);
			
			return $aNombreTutorats;
        
        }
        
        public function rechercherNbTuteursConversation($iEleveId){
            //par mois, avec combien de tuteurs l'élève a communiqué (section messagerie)
			
			TypeException::estInteger($iEleveId);
			
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
													COUNT(DISTINCT cc.tuteur_ID) as NbTuteurConversations,
													MONTH(mc.timestamp) as mois,
													YEAR(mc.timestamp) as annee
												FROM 
													conversations_chat cc,
													messages_chat mc
												WHERE 
													mc.conversation_ID = cc.conversation_ID AND
													(
														(YEAR(mc.timestamp) = '".$annee_debut."' AND MONTH(mc.timestamp) >= '8')
														OR
														(YEAR(mc.timestamp) = '".$annee_fin."' AND MONTH(mc.timestamp) <= '6')
													)
													AND
													cc.eleve_ID = '".$iEleveId."'
												GROUP BY
													MONTH(mc.timestamp)
											    ORDER BY 
													YEAR(mc.timestamp) ASC,
													MONTH(mc.timestamp) ASC
												");
			$aNombreTuteursConversation = $oConnexion->recupererTableau($oResultat);
			
			return $aNombreTuteursConversation;
												
        }
        
        public function rechercherTempsConnecte(){
            //par mois, duree de connexion
        }
        
        public function rechercherNbElevesConversation($iTuteurId){
            //par mois, avec combien d'eleves un tuteur a communiqué
			
			TypeException::estInteger($iTuteurId);
			
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
													COUNT(DISTINCT cc.eleve_ID) as NbConversations,
													MONTH(mc.timestamp) as mois,
													YEAR(mc.timestamp) as annee
												FROM 
													conversations_chat cc,
													messages_chat mc
												WHERE 
													mc.conversation_ID = cc.conversation_ID AND
													(
														(YEAR(mc.timestamp) = '".$annee_debut."' AND MONTH(mc.timestamp) >= '8')
														OR
														(YEAR(mc.timestamp) = '".$annee_fin."' AND MONTH(mc.timestamp) <= '6')
													)
													AND
													tuteur_ID = '".$iTuteurId."'
												GROUP BY
													MONTH(mc.timestamp)
											    ORDER BY 
													YEAR(mc.timestamp) ASC,
													MONTH(mc.timestamp) ASC
											  ");
			$aNombreElevesConversation = $oConnexion->recupererTableau($oResultat);
			
			return $aNombreElevesConversation;
        }
        
        public function rechercherFrequenceConnexion(){
            //par mois, combien de temps (jours) entre les connexions
        }
        
        public function rechercherNbTuteursParEcole($ecole_ID){
		
			TypeException::estInteger($ecole_ID);
		
			$oConnexion = new MySqliLib();
			$oResultat = $oConnexion->executer("SELECT 
													COUNT(*) as NbTuteurs
												FROM 
													utilisateurs u,
													ecoles_par_utilisateur epu
												WHERE 
													u.role = 2 AND 
													epu.ecole_ID = '".$ecole_ID."'
												");
			$aNombreTuteurs = $oConnexion->recupererTableau($oResultat);
			
			return $aNombreTuteurs;
			
        }
        
        public function rechercherNbProfsParEcole($ecole_ID){
		
			TypeException::estInteger($ecole_ID);
		
			$oConnexion = new MySqliLib();
			$oResultat = $oConnexion->executer("SELECT
													COUNT(*) as NbProfs
												FROM 
													utilisateurs u,
													ecoles_par_utilisateur epu
												WHERE 
													u.role = 3 AND 
													epu.ecole_ID = '".$ecole_ID."'
												");
            $aNombreProfs = $oConnexion->recupererTableau($oResultat);
			
			return $aNombreProfs;
			
        }
        
        public function rechercherNbElevesParEcole($ecole_ID){
		
			TypeException::estInteger($ecole_ID);
			
			$oConnexion = new MySqliLib();
			$oResultat = $oConnexion->executer("SELECT
													COUNT(*) as NbEleves
												FROM
													utilisateurs u,
													ecoles_par_utilisateur epu
												WHERE
													u.role = 1 AND
													epu.ecole_ID = '".$ecole_ID."'
												");
            $aNombreEleves = $oConnexion->recupererTableau($oResultat);
			
			return $aNombreEleves;
			
        }
        
        public function rechercherNbTutorielsParEcole($ecole_ID){
		
			TypeException::estInteger($ecole_ID);
			
			$oConnexion = new MySqliLib();
			$oResultat = $oConnexion->executer("SELECT
													COUNT(*) as NbTutoriels
												FROM
													contenu c
												WHERE
													ecole_ID = '".$ecole_ID."'
												");
			$aNombreTutoriels = $oConnexion->recupererTableau($oResultat);
			
			return $aNombreTutoriels;
        
        }
		
		
		public function rechercherNbTutoratsParMatiere($tuteur_ID){
		//rechercher nombre de tutoriels par matière soumis par un tuteur pour un mois donné
		
			TypeException::estInteger($tuteur_ID);
		
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
													COUNT(*) as NbTutorielsMatiere, m.nom
												FROM
													contenu c, matieres m
												WHERE
													c.soumis_par = '".$tuteur_ID."' AND
													c.matiere_ID = m.matiere_ID
												AND
													(
														(YEAR(c.date_soumis) = '".$annee_debut."' AND MONTH(c.date_soumis) >= '8')
														OR
														(YEAR(c.date_soumis) = '".$annee_fin."' AND MONTH(c.date_soumis) <= '6')
													)
												GROUP BY
													c.matiere_ID
												ORDER BY m.nom ASC
												");
												
			$aNombreTutorielsMatiere = $oConnexion->recupererTableau($oResultat);
			
			return $aNombreTutorielsMatiere;
		}
		
		
		public function rechercherNbTutoratsApprouvesParProf($prof_ID){
		//rechercher nombre de tutoriels approuvés par matière pour un prof pour un mois donné
		 
			TypeException::estInteger($prof_ID);

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
													COUNT(*) as NbTutorielsApprouve, m.nom
												FROM
													contenu c, matieres m
												WHERE
													c.approuve_par = '".$prof_ID."' AND
													c.matiere_ID = m.matiere_ID
												AND
													(
														(YEAR(c.date_approuve) = '".$annee_debut."' AND MONTH(c.date_approuve) >= '8')
														OR
														(YEAR(c.date_approuve) = '".$annee_fin."' AND MONTH(c.date_approuve) <= '6')
													)
												GROUP BY
													c.matiere_ID
												ORDER BY m.nom ASC
												");
			$aNombreTutosMatiereApprouve = $oConnexion->recupererTableau($oResultat);
			
			return $aNombreTutosMatiereApprouve;
			
		}
		
    }
?>