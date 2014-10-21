<?php
    class Statistique extends Modele {
        
        //toutes les fonctions retournent un résultat en fonction de la commission ou de l'école à laquelle ils appartiennent.
        
        public function __construct(){
            
        }
        
        public function rechercherNbVisitesParMois(){
            $oUtilisateur = new Utilisateur();
            $user_id = $oUtilisateur -> getUserId();
            
            
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT COUNT(*) FROM activite_login al WHERE al.utilisateur_ID = '".$user_id."' AND evenement = 'login' AND ((YEAR(timestamp) = '".$annee_debut."' AND MONTH(timestamp) >= '8') OR (YEAR(timestamp) = '".$annee_fin."' AND MONTH(timestamp) <= '6')) GROUP BY MONTH(timestamp) ORDER BY YEAR(timestamp) ASC, MONTH(timestamp) ASC");
            $aNombreVisites = $oResultat->recupererTableau($oResultat);
            
            return $aNombreVisites;
        }
        
        public function rechercherNbTutoratsCrees(){
        
        }
        
        public function rechercherNbTutoratsApprouves(){
        
        }
        
        public function rechercherNbTuteursConversation(){
            //par mois, avec combien de tuteurs l'élève a communiqué (section messagerie)
        }
        
        public function rechercherTempsConnecte(){
            //par mois, duree de connexion
        }
        
        public function rechercherNbElevesConversation(){
            //par mois, avec combien d'eleves un tuteur a communiqué
        }
        
        public function rechercherFrequenceConnexion(){
            //par mois, combien de temps (jours) entre les connexions
        }
        
        public function rechercherNbTuteursParEcole(){
        
        }
        
        public function rechercherNbProfsParEcole(){
            
        }
        
        public function rechercherNbElevesParEcole(){
            
        }
        
        public function rechercherNbTutorielsParEcole(){
        
        }
    }
?>