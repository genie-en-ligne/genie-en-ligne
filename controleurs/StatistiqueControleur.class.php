<?php
    class StatistiqueControleur extends Controleur {
        
        public function __construct($reqAction="erreur404", $reqId="", $oUtilisateurSession){            
            $this->setReqAction($reqAction);
            $this->setReqId($reqId);
            $this->oUtilisateurSession = $oUtilisateurSession;
        }

        public function gerer(){
            switch ($this->getReqAction()) {                

                case 'personnel':
                    $this -> consulterStatsPersonnelles();
                    break;

                case 'general':
					if($this->oUtilisateurSession->getRole() <= 3){
						$this->erreur404();
						break;
					}
                    $this -> consulterStatsGenerales();
                    break;

                default:
                    $this->erreur404();
                    break;
            }
        }   
        
		private function consulterStatsPersonnelles() {
			$oVue = new StatistiqueVue();

            switch($this->oUtilisateurSession->getRole()){
                case '1':
                    $oStatistique = new Statistique();

                    $aVisitesParMois = $oStatistique->rechercherNbVisitesParMois($this->oUtilisateurSession->getId());
                    $oVue->hGraphiqueVisitesParMois = $oVue->genererGraphique('visitesParMois', 300, 1000, $aVisitesParMois);

                    $aTutosConsultes = $oStatistique->rechercherNbTutorielsConsultes($this->oUtilisateurSession->getId());
                    $oVue->hGraphiqueTutorielsConsultes = $oVue->genererGraphique('tutosParMois', 300, 1000, $aTutosConsultes);

                    $oVue -> afficheStatsPersonnellesEleve();
                    break;
                case '2':
                    $oStatistique = new Statistique();

                    $aVisitesParMois = $oStatistique->rechercherNbVisitesParMois($this->oUtilisateurSession->getId());
                    $oVue->hGraphiqueVisitesParMois = $oVue->genererGraphique('visitesParMois', 300, 1000, $aVisitesParMois);

                    $aTutosCrees = $oStatistique->rechercherNbTutorielsCreesUtilisateur($this->oUtilisateurSession->getId());
                    $oVue->hGraphiqueTutosMatiere = $oVue->genererGraphique('tutosParMatiere', 300, 1000, $aTutosCrees);

                    $oVue -> afficheStatsPersonnellesTuteur();
                    break;
                case '3':
                    $oStatistique = new Statistique();

                    $aVisitesParMois = $oStatistique->rechercherNbVisitesParMois($this->oUtilisateurSession->getId());
                    $oVue->hGraphiqueVisitesParMois = $oVue->genererGraphique('visitesParMois', 300, 900, $aVisitesParMois);

                    $aTutosCrees = $oStatistique->rechercherNbTutorielsCreesUtilisateur($this->oUtilisateurSession->getId());
                    $oVue->hGraphiqueTutosMatiere = $oVue->genererGraphique('tutosParMatiere', 300, 900, $aTutosCrees);

                    $aTutosApprouves = $oStatistique->rechercherNbTutorielsApprouves($this->oUtilisateurSession->getId());
                    $oVue->hGraphiqueTutosApprouves = $oVue->genererGraphique('tutosApprouves', 300, 900, $aTutosApprouves);

                    $oVue -> afficheStatsPersonnellesProfesseur();
                    break;
                case '4':
                    $oStatistique = new Statistique();

                    $aVisitesParMois = $oStatistique->rechercherNbVisitesParMois($this->oUtilisateurSession->getId());
                    $oVue->hGraphiqueVisitesParMois = $oVue->genererGraphique('visitesParMois', 300, 900, $aVisitesParMois);   

                    $oVue -> afficheStatsPersonnellesResponsable();
                    break;
                case '5':
                    $oStatistique = new Statistique();

                    $aVisitesParMois = $oStatistique->rechercherNbVisitesParMois($this->oUtilisateurSession->getId());
                    $oVue->hGraphiqueVisitesParMois = $oVue->genererGraphique('visitesParMois', 300, 900, $aVisitesParMois);   

                    $oVue -> afficheStatsPersonnellesSuperAdmin();
                    break;
                default:
                    $this->erreur404();
                    break;
            }
        }
        
        private function consulterStatsGenerales() {
            $oVue = new StatistiqueVue();

            switch($this->oUtilisateurSession->getRole()){
                case '3':
                case '4':
                    $oStatistique = new Statistique();

                    $aElevesParEcole = $oStatistique->rechercherNbElevesParEcole($this->oUtilisateurSession->getCommission());
                    $oVue->hGraphiqueNbElevesParEcole = $oVue->genererGraphique('elevesParEcole', 300, 470, $aElevesParEcole);

                    $aTuteursParEcole = $oStatistique->rechercherNbTuteursParEcole($this->oUtilisateurSession->getCommission());
                    $oVue->hGraphiqueNbTuteursParEcole = $oVue->genererGraphique('tuteursParEcole', 300, 470, $aTuteursParEcole);

                    $aProfsParEcole = $oStatistique->rechercherNbProfsParEcole($this->oUtilisateurSession->getCommission());
                    $oVue->hGraphiqueNbProfsParEcole = $oVue->genererGraphique('profsParEcole', 300, 470, $aProfsParEcole);

                    $aTutosParEcole = $oStatistique->rechercherNbTutosParEcole($this->oUtilisateurSession->getCommission());
                    $oVue->hGraphiqueNbTutosParEcole = $oVue->genererGraphique('tutosParEcole', 300, 470, $aTutosParEcole);

                    $oVue -> afficheStatsGeneralesProfesseur();
                    break;
                case '5':
                    $oStatistique = new Statistique();

                    $aVisitesParCommission = $oStatistique->rechercherVisitesParCommission();
                    $oVue->hGraphiqueVisitesParCommission = $oVue->genererGraphique('visitesParCommission', 300, 470, $aVisitesParCommission); 

                    $aTutosParCommission = $oStatistique->rechercherTutosParCommission();
                    $oVue->hGraphiqueTutosParCommission = $oVue->genererGraphique('tutosParCommission', 300, 470, $aTutosParCommission);  

                    $oVue -> afficheStatsGeneralesSuperAdmin();
                    break;
                default:
                    $this->erreur404();
                    break;
            }
        }
    }
?>