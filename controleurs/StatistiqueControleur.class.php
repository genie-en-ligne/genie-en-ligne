<?php

/**
 * @date 2014-11-01
 * @brief Classe StatistiqueControleur (classe fille de la classe Controleur ) 
 */

    class StatistiqueControleur extends Controleur {
        
	/**
	 * Constructeur
	 * @param string $reqAction
	 * @param string $reqId
	 * @param objet $oUtilisateurSession
	 */
        public function __construct($reqAction="erreur404", $reqId="", $oUtilisateurSession){            
            $this->setReqAction($reqAction);
            $this->setReqId($reqId);
            $this->oUtilisateurSession = $oUtilisateurSession;
        }

        
	/**
	 * Gère les Statistiques Personnelles ou Generals
	 */
		public function gerer(){
            //Dépendement de la valeur de l'action (2ème partie de URL)
			switch ($this->getReqAction()) {                
				//1èr cas : personnel
                case 'personnel':
                    $this -> consulterStatsPersonnelles();
                    break;
				//2ème cas : general
                case 'general':
					//Si l'utilisateur est un élève ou tuteur (role = 1, role = 2)
					if($this->oUtilisateurSession->getRole() < 3){
						$this->erreur404(); //On affiche erreure 404 (élève ou tuteur n'ont pas le droit aux statistiques générales)
						break;
					}
                    $this -> consulterStatsGenerales();
                    break;

                default:
                    $this->erreur404();
                    break;
            }
        } // fin de la fonction gerer()   
        
		
		
	/**
	 * Gère tous les Statistiques Personnelles pour tous les types des utilisateurs
	 */
		private function consulterStatsPersonnelles() {
			
			//On instancie la classe StatistiqueVue
			$oVue = new StatistiqueVue();
			//Selon le role de l'utilisateur qui est dans session ouverte
            switch($this->oUtilisateurSession->getRole()){
                //1èr cas : Élève
				case '1':
                    //On instancie la classe Statistique
					$oStatistique = new Statistique();

                    //Déclaration de la variable $aVisitesParMois (array) dans laquelle on va stocker le résultat retourné par la fonction rechercherNbVisitesParMois($user_id) de la classe Statistique
					$aVisitesParMois = $oStatistique->rechercherNbVisitesParMois($this->oUtilisateurSession->getId());
                    
					//On crée une variable publique hGraphiqueVisitesParMois dans laquelle on va générer le graphique
					$oVue->hGraphiqueVisitesParMois = $oVue->genererGraphique('visitesParMois', 300, 1000, $aVisitesParMois);

                    //Déclaration de la variable $aTutosConsultes (array) dans laquelle on va stocker le résultat retourné par la fonction rechercherNbTutorielsConsultes($user_id) de la classe Statistique
					$aTutosConsultes = $oStatistique->rechercherNbTutorielsConsultes($this->oUtilisateurSession->getId());
                    
					//On crée une variable publique hGraphiqueTutorielsConsultes dans laquelle on va générer le graphique
					$oVue->hGraphiqueTutorielsConsultes = $oVue->genererGraphique('tutosParMois', 300, 1000, $aTutosConsultes);

                    $oVue -> afficheStatsPersonnellesEleve(); //On affiche les siatistiques personnelles pour un Élève
                    break;
                //2ème cas : Tuteur
				case '2':
                    //On instancie la classe Statistique
					$oStatistique = new Statistique();

                    //Déclaration de la variable $aVisitesParMois (array) dans laquelle on va stocker le résultat retourné par la fonction rechercherNbVisitesParMois($user_id) de la classe Statistique
					$aVisitesParMois = $oStatistique->rechercherNbVisitesParMois($this->oUtilisateurSession->getId());
                   
					//On crée une variable publique hGraphiqueVisitesParMois dans laquelle on va générer le graphique
				    $oVue->hGraphiqueVisitesParMois = $oVue->genererGraphique('visitesParMois', 300, 1000, $aVisitesParMois);

                    //Déclaration de la variable $aTutosCrees (array) dans laquelle on va stocker le résultat retourné par la fonction rechercherNbTutorielsCreesUtilisateur($utilisateur_ID) de la classe Statistique
					$aTutosCrees = $oStatistique->rechercherNbTutorielsCreesUtilisateur($this->oUtilisateurSession->getId());
                    
					//On crée une variable publique hGraphiqueTutosMatiere dans laquelle on va générer le graphique
					$oVue->hGraphiqueTutosMatiere = $oVue->genererGraphique('tutosParMatiere', 300, 1000, $aTutosCrees);

                    $oVue -> afficheStatsPersonnellesTuteur(); //On affiche les siatistiques personnelles pour le Tuteur
                    break;
                //2ème cas : Prof
				case '3':
                    //On instancie la classe Statistique
					$oStatistique = new Statistique();

                    //Déclaration de la variable $aVisitesParMois (array) dans laquelle on va stocker le résultat retourné par la fonction rechercherNbVisitesParMois($user_id) de la classe Statistique
					$aVisitesParMois = $oStatistique->rechercherNbVisitesParMois($this->oUtilisateurSession->getId());
                    
					//On crée une variable publique hGraphiqueVisitesParMois dans laquelle on va générer le graphique
					$oVue->hGraphiqueVisitesParMois = $oVue->genererGraphique('visitesParMois', 300, 900, $aVisitesParMois);

                    //Déclaration de la variable $aTutosCrees (array) dans laquelle on va stocker le résultat retourné par la fonction rechercherNbTutorielsCreesUtilisateur($utilisateur_ID) de la classe Statistique
					$aTutosCrees = $oStatistique->rechercherNbTutorielsCreesUtilisateur($this->oUtilisateurSession->getId());
                    
					//On crée une variable publique hGraphiqueTutosMatiere dans laquelle on va générer le graphique
					$oVue->hGraphiqueTutosMatiere = $oVue->genererGraphique('tutosParMatiere', 300, 900, $aTutosCrees);

                    //Déclaration de la variable $aTutosApprouves (array) dans laquelle on va stocker le résultat retourné par la fonction rechercherNbTutorielsApprouves($professeur_ID) de la classe Statistique
					$aTutosApprouves = $oStatistique->rechercherNbTutorielsApprouves($this->oUtilisateurSession->getId());
                    
					//On crée une variable publique hGraphiqueTutosApprouves dans laquelle on va générer le graphique
					$oVue->hGraphiqueTutosApprouves = $oVue->genererGraphique('tutosApprouves', 300, 900, $aTutosApprouves);

                    $oVue -> afficheStatsPersonnellesProfesseur(); //On affiche les siatistiques personnelles pour le Prof
                    break;
                //4ème cas : Responsable
				case '4':
                    //On instancie la classe Statistique
					$oStatistique = new Statistique();

                    //Déclaration de la variable $aVisitesParMois (array) dans laquelle on va stocker le résultat retourné par la fonction rechercherNbVisitesParMois($user_id) de la classe Statistique
					$aVisitesParMois = $oStatistique->rechercherNbVisitesParMois($this->oUtilisateurSession->getId());
                    
					//On crée une variable publique hGraphiqueVisitesParMois dans laquelle on va générer le graphique
					$oVue->hGraphiqueVisitesParMois = $oVue->genererGraphique('visitesParMois', 300, 900, $aVisitesParMois);   

                    $oVue -> afficheStatsPersonnellesResponsable(); //On affiche les siatistiques personnelles pour le résponsable
                    break;
                //4ème cas : Super Admin
				case '5':
                    //On instancie la classe Statistique
					$oStatistique = new Statistique();
					
					//Déclaration de la variable $aVisitesParMois (array) dans laquelle on va stocker le résultat retourné par la fonction rechercherNbVisitesParMois($user_id) de la classe Statistique
                    $aVisitesParMois = $oStatistique->rechercherNbVisitesParMois($this->oUtilisateurSession->getId());
                    
					//On crée une variable publique hGraphiqueVisitesParMois dans laquelle on va générer le graphique
					$oVue->hGraphiqueVisitesParMois = $oVue->genererGraphique('visitesParMois', 300, 900, $aVisitesParMois);   

                    $oVue -> afficheStatsPersonnellesSuperAdmin(); //On affiche les siatistiques personnelles pour le SuperAdmin
                    break;
                default:
                    $this->erreur404(); //Par défaut s'affiche erreure 404
                    break;
            }
        }
        
		
		/**
	 * Gère tous les Statistiques Générales pour les Profs, Résponsable de commission et Super Admin
	 */
        private function consulterStatsGenerales() {
            
			//On instancie la classe StatistiqueVue
			$oVue = new StatistiqueVue();
			//Selon le role de l'utilisateur qui est dans session ouverte
            switch($this->oUtilisateurSession->getRole()){
                //Pour Prof et Responsable
				case '3':
                case '4':
                    //On instancie la classe Statistique
					$oStatistique = new Statistique();

                    //Déclaration de la variable $aElevesParEcole (array) dans laquelle on va stocker le résultat retourné par la fonction rechercherNbElevesParEcole($commission_ID) de la classe Statistique
					$aElevesParEcole = $oStatistique->rechercherNbElevesParEcole($this->oUtilisateurSession->getCommission());
                    
					//On crée une variable publique hGraphiqueNbElevesParEcole dans laquelle on va générer le graphique
					$oVue->hGraphiqueNbElevesParEcole = $oVue->genererGraphique('elevesParEcole', 300, 470, $aElevesParEcole);

                    //Déclaration de la variable $aTuteursParEcole (array) dans laquelle on va stocker le résultat retourné par la fonction rechercherNbTuteursParEcole($commission_ID) de la classe Statistique
					$aTuteursParEcole = $oStatistique->rechercherNbTuteursParEcole($this->oUtilisateurSession->getCommission());
                    
					//On crée une variable publique hGraphiqueNbTuteursParEcole dans laquelle on va générer le graphique
					$oVue->hGraphiqueNbTuteursParEcole = $oVue->genererGraphique('tuteursParEcole', 300, 470, $aTuteursParEcole);

                    //Déclaration de la variable $aProfsParEcole (array) dans laquelle on va stocker le résultat retourné par la fonction rechercherNbProfsParEcole($commission_ID) de la classe Statistique
					$aProfsParEcole = $oStatistique->rechercherNbProfsParEcole($this->oUtilisateurSession->getCommission());
                    
					//On crée une variable publique hGraphiqueNbProfsParEcole dans laquelle on va générer le graphique
					$oVue->hGraphiqueNbProfsParEcole = $oVue->genererGraphique('profsParEcole', 300, 470, $aProfsParEcole);

                    $aTutosParEcole = $oStatistique->rechercherNbTutosParEcole($this->oUtilisateurSession->getCommission());
                    
					//On crée une variable publique hGraphiqueNbTutosParEcole dans laquelle on va générer le graphique
					$oVue->hGraphiqueNbTutosParEcole = $oVue->genererGraphique('tutosParEcole', 300, 470, $aTutosParEcole);

                    $oVue -> afficheStatsGeneralesProfesseur(); //On affiche les siatistiques générales pour le Prof et Responsable
                    break;
                    break;
                //Pour Super Admin
				case '5':
                    //On instancie la classe Statistique
					$oStatistique = new Statistique();

                     //Déclaration de la variable $aVisitesParCommission (array) dans laquelle on va stocker le résultat retourné par la fonction rechercherVisitesParCommission() de la classe Statistique
					$aVisitesParCommission = $oStatistique->rechercherVisitesParCommission();
                    
					//On crée une variable publique hGraphiqueVisitesParCommission dans laquelle on va générer le graphique
					$oVue->hGraphiqueVisitesParCommission = $oVue->genererGraphique('visitesParCommission', 300, 470, $aVisitesParCommission); 

                    //Déclaration de la variable $aTutosParCommission (array) dans laquelle on va stocker le résultat retourné par la fonction rechercherTutosParCommission() de la classe Statistique
					$aTutosParCommission = $oStatistique->rechercherTutosParCommission();
                    
					//On crée une variable publique hGraphiqueTutosParCommission dans laquelle on va générer le graphique
					$oVue->hGraphiqueTutosParCommission = $oVue->genererGraphique('tutosParCommission', 300, 470, $aTutosParCommission);  

                    $oVue -> afficheStatsGeneralesSuperAdmin(); //On affiche les siatistiques générales pour le SuperAdmin
                    break;
                default:
                    $this->erreur404();
                    break;
            }
        }
    }
?>