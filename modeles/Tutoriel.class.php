<?php
    class Tutoriel extends Modele {
        private $matiere;
        private $annee;
        
        public function __construct(){
            //TODO: matiere et annee par defaut à 0
        }
        
        public function rechercherListeTutosParEleve(){
            $oUtilisateur = new Utilisateur();
            $ecole = $oUtilisateur -> getUserEcole();
            
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT * FROM contenu c, status s, ecoles e, matieres m, niveaux_scolaires ns WHERE c.statut = s.statut_ID AND c.ecole_ID = e.ecole_ID AND c.matiere_ID = m.matiere_ID AND c.niveau_scolaire_ID = ns.niveau_scolaire_ID AND s.nom = 'approuve' AND c.est_detruit = '0' AND e.ecole_ID = '".$ecole."' ".$this->getSqlMatiere().$this->getSqlAnnee()." ORDER BY c.date_approuve DESC");
            $aTutorielsEcoleEleve = $oResultat->recupererTableau($oResultat);
            
            $oResultat = $oConnexion->executer("SELECT * FROM contenu c, status s, ecoles e WHERE c.statut = s.statut_ID AND c.ecole_ID = e.ecole_ID AND s.nom = 'approuve' AND c.est_detruit = '0' AND e.ecole_ID NOT LIKE '".$ecole."' ".$this->getSqlMatiere().$this->getSqlAnnee()." ORDER BY c.date_approuve DESC");
            $aTutorielsAutresEcoles = $oResultat->recupererTableau($oResultat);
        }
        
        public function rechercherListeTutosParTuteur(){
            
        }
        
        public function ajouterTutoVideo(){
            
        }
        
        public function ajouterTutoTexte(){
            
        }
        
        public function modifierTutoVideo(){
            
        }
        
        public function modifierTutoTexte(){
            
        }
        
        public function approuverTuto(){
            
        }
        
        public function supprimerTuto(){
            //UPDATE DB, SET est_detruit = 0
        }
        
        private function getSqlMatiere(){
            $res = '';
            if($this->matiere != ""){
                $res = " AND c.matiere_ID = '".$this->matiere."'";
            }
            return $res;
        }
        
        private function getSqlAnnee(){
            $res = '';
            if($this->annee != ""){
                $res = " AND c.niveau_scolaire_ID = '".$this->annee."'";
            }
            return $res;
        }
    }
?>