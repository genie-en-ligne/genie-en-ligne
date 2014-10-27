<?php
    class Utilisateur extends Modele {
        private $sPseudo;
        private $sMot_de_passe;
        private $sNom;
        private $sPrenom;
        private $sCourriel;
        private $iRole;
        private $iId;
        private $sCode_permanent;

        public function __construct($iId = 0, $sPseudo = " ", $sMot_de_passe = " ", $sNom = " ", $sPrenom = " ", $sCourriel= " ", $iRole = 0) {
            $this->setId($iId);
            $this->setPseudo($sPseudo);
            $this->setMDP($sMot_de_passe);
            $this->setNom($sNom);
            $this->setPrenom($sPrenom);
            $this->setCourriel($sCourriel);
            $this->setRole($iRole);
        }
        
    /*================================================*/
    /*== FONCTIONS POUR LOGIN ET GESTION DE SESSION ==*/
    /*================================================*/
        
        public function utilisateurEstConnecte(){
            if($this->getId() != 0){
                return true;
            }
            return false;
        }
        
        public function validerInfosConnexion(){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT * FROM utilisateurs WHERE `pseudo` = '".$this->getPseudo()."' AND `mot_de_passe` = '".$this->getMDP()."'");
                        
            $compteExiste = $oConnexion->recupererNombreResultats($oResultat);
            if($compteExiste > 0){
                unset($this->mot_de_passe);
                $this->chargerCompteParPseudo();
                return true;
            }            
            return false;
        }
        
        public function chargerCompteParPseudo(){
            //Cette méthode est appelée après le login et charge le compte à partir du pseudo
            
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT * FROM utilisateurs WHERE `pseudo` = '".$this->getPseudo()."'");
            $aResultats = $oConnexion->recupererTableau($oResultat);
            
            $this->setRole($aResultats[0]['role']);
            $this->setId($aResultats[0]['utilisateur_ID']);
            $this->setPrenom($aResultats[0]['prenom']);
            $this->setNom($aResultats[0]['nom']);
            $this->setCourriel($aResultats[0]['courriel']);
        }
        
        public function chargerCompteParId(){
            //Cette méthode est appelée pour charger les informations de l'utilisateur déjà connecté et ce, à partir de son id, qui est stocké en session.
            
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT * FROM utilisateurs WHERE `utilisateur_ID` = '".$this->getId()."'");
            $aResultats = $oConnexion->recupererTableau($oResultat);
            
            $this->setRole($aResultats[0]['role']);
            $this->setPseudo($aResultats[0]['pseudo']);
            $this->setPrenom($aResultats[0]['prenom']);
            $this->setNom($aResultats[0]['nom']);
            $this->setCourriel($aResultats[0]['courriel']);
        }
        
        public function ajouterActiviteLogin($evenement){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("INSERT INTO activite_login (`utilisateur_ID`, `evenement`) VALUES ('{$this->getId()}', '{$evenement}')");
        }
        
    /*======================*/
    /*== AUTRES FONCTIONS ==*/
    /*======================*/
        
        public function estDisponiblePseudo(){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT * FROM utilisateurs WHERE pseudo = '{$this->sPseudo}'");
            $iNbResultats = $oConnexion->recupererNombreResultats($oResultat);
            if($iNbResultats == 0){
                return true;
            }
            return false;
        }
        
        public function motDePasseAssezComplexe($mdp){
            //minimum majuscule, minuscule, chiffre
            //Tous caractères permis
            //Return true ou false
            if(!preg_match("#.*^(?=.{8,15})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $mdp)){
                return false;
            }
            return true;
        }
        
        public function deuxMotsDePasseIdentiques($mdp1, $mdp2){
            if($mdp1 === $mdp2){
                return true;
            }
            return false;
        }
        
        //TODO: fonctions pour créer tous les niveaux de compte, et chaque étape de chaque création
        
        public function ajouterUtilisateur() {
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("INSERT INTO utilisateurs (`pseudo`, `mot_de_passe`, `nom`, `prenom`, `courriel`, `role`) VALUES ('{$this->sPseudo}', '{$this->sMot_de_passe}', '{$this->sNom}', '{$this->sPrenom}', '{$this->sCourriel}', '{$this->iRole}')");
            $this->setId($oConnexion->getInsertId());
            return true;
        }

        //Appeler au clique sur l'icône supprimer des pages admin professeur (tuteurs), responsable (professeurs), superadmin (responsables)
        public function adm_supprimerUtilisateur() {
            $oConnexion = new MySqliLib();

            $oResultat = $oConnexion->executer("UPDATE utilisateurs SET `est_detruit` = 1 WHERE `utilisateur_ID` = '{$this->iId}' ");
        }

        public function recupererUtilisateur() {
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT * FROM utilisateurs WHERE `role` = '{$this->iRole}'");
            $aResultat = $oConnexion->recupererTableau($oResultat);
            return $aResultat;

        }


        public function modifierUtilisateur() {
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer( "UPDATE utilisateurs
                                                SET 
                                                    `nom` = '{$this->sNom}', `prenom` = '{$this->sPrenom}', `courriel` = '{$this->sCourriel}'
                                                WHERE `utilisateur_ID` = '{$this->iId}'");                                      
        }

        public function pub_validerCodePermanent() {
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT * FROM codes_permanents WHERE `code_permanent` = '$this->sCode_permanent' ");
            $aResultat = $oConnexion->recupererTableau($oResultat);
            $botte = strtoupper(substr($aResultat[0]['code_permanent'], 0, 3));
            $aiguille = strtoupper(substr(preg_replace('/[^a-zA-Z]/', '', $this->sNom), 0, 3));

            if(isset($aResultat[0]['code_permanent']) && $aResultat[0]['deja_utilise'] == 0) {
                if($botte == $aiguille) {
                    $oResultat = $oConnexion->executer("UPDATE codes_permanents SET `deja_utilise` = 1 WHERE code_permanent = '{$this->sCode_permanent}'");
                    return true;
                }
                return false;
            }
            return false;
        }

        public function recupererMDP() {
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT * FROM utilisateurs WHERE `utilisateur_ID` = '{$this->iId}'");
            $aResultat = $oConnexion->recupererTableau($oResultat);
            return $aResultat[0];
        }

        public function changerMDP(){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("UPDATE utilisateurs SET mot_de_passe = '{$this->sMot_de_passe}' WHERE utilisateur_ID = '$this->iId'");

            return $oConnexion->getConnect()->affected_rows;
        }

        public function getListeEcoles(){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT * FROM ecoles_par_utilisateur WHERE utilisateur_ID = '{$this->iId}'");
            $aResultats = $oConnexion->recupererTableau($oResultat);

            $aFinal = array();
            foreach ($aResultats as $rangee) {
                $oEcole = new Ecole($rangee['ecole_ID']);
                $oEcole->chargerEcole();
                $aFinal[] = $oEcole;
            }
            return $aFinal;
        }

        public function getListeMatieres(){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT * FROM matieres_par_utilisateur WHERE utilisateur_ID = '{$this->iId}'");
            $aResultats = $oConnexion->recupererTableau($oResultat);

            $aFinal = array();
            foreach ($aResultats as $rangee) {
                $oMatiere = new Matiere($rangee['matiere_ID']);
                $oMatiere->chargerMatiere();
                $aFinal[] = $oMatiere;
            }
            return $aFinal;
        }

        public function getCommission(){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT commission_ID FROM ecoles_par_utilisateur epu, ecoles e WHERE epu.utilisateur_ID = '{$this->getId()}' AND epu.ecole_ID = e.ecole_ID");
            $aResultats = $oConnexion->recupererTableau($oResultat);

            return $aResultats[0]['commission_ID'];
        }

        public function rechercherListeTuteurs($iCommissionId){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT * FROM utilisateurs u, ecoles_par_utilisateur epu WHERE u.utilisateur_ID = epu.utilisateur_ID AND u.role = '2' AND epu.ecole_ID IN (SELECT ecole_ID FROM ecoles WHERE commission_ID = '{$iCommissionId}') AND u.est_detruit = 0");
            $aResultats = $oConnexion->recupererTableau($oResultat);

            $aFinal = array();
            foreach ($aResultats as $rangee) {
                $oUtilisateur = new Utilisateur($rangee['utilisateur_ID']);
                $oUtilisateur->chargerCompteParId();
                $aFinal[] = $oUtilisateur;
            }
            return $aFinal;
        }

        public function rechercherListeProfs($iCommissionId){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT * FROM utilisateurs u, ecoles_par_utilisateur epu WHERE u.utilisateur_ID = epu.utilisateur_ID AND u.role = '3' AND epu.ecole_ID IN (SELECT ecole_ID FROM ecoles WHERE commission_ID = '{$iCommissionId}')");
            $aResultats = $oConnexion->recupererTableau($oResultat);

            $aFinal = array();
            foreach ($aResultats as $rangee) {
                $oUtilisateur = new Utilisateur($rangee['utilisateur_ID']);
                $oUtilisateur->chargerCompteParId();
                $aFinal[] = $oUtilisateur;
            }
            return $aFinal;
        }

        public function rechercherListeResponsables(){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT * FROM utilisateurs u, commissions c WHERE u.utilisateur_ID = c.responsable");
            $aResultats = $oConnexion->recupererTableau($oResultat);

            $aFinal = array();
            foreach ($aResultats as $rangee) {
                $oUtilisateur = new Utilisateur($rangee['utilisateur_ID']);
                $oUtilisateur->chargerCompteParId();
                $aFinal[] = $oUtilisateur;
            }
            return $aFinal;
        }

        public function creerLogin(){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("UPDATE utilisateurs SET pseudo = '{$this->sPseudo}', mot_de_passe = '{$this->sMot_de_passe}' WHERE utilisateur_ID = '{$this->iId}'");

            return $oConnexion->getConnect()->affected_rows;
        }

        public function getNomRole(){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT nom FROM roles WHERE role_ID = '{$this->iRole}'");
            $aResultats = $oConnexion->recupererTableau($oResultat);

            return $aResultats[0]['nom'];
        }

        public function supprimer(){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("UPDATE utilisateurs SET est_detruit = '1' WHERE utilisateur_ID = '$this->iId'");

            return true;
        }




        public function setId($iId) {
            TypeException::estInteger($iId);
             //Ce code n'est pas exécuté si une erreur est lancée.
            $this->iId = $iId;
        }

        public function setPseudo($sPseudo) {
            TypeException::estVide($sPseudo);
            TypeException::estString($sPseudo);

            $this->sPseudo = $sPseudo;
        }

        public function setMDP($sMot_de_passe) {
            TypeException::estVide($sMot_de_passe);
            TypeException::estString($sMot_de_passe);

            $this->sMot_de_passe = sha1($sMot_de_passe);
        }

        public function setNom($sNom) {
            TypeException::estVide($sNom);
            TypeException::estString($sNom);

            $this->sNom = $sNom;
        }

        public function setPrenom($sPrenom) {
            TypeException::estVide($sPrenom);
            TypeException::estString($sPrenom);

            $this->sPrenom = $sPrenom;
        }

        public function setCourriel($sCourriel) {
            TypeException::estVide($sCourriel);
            TypeException::estString($sCourriel);

            $this->sCourriel = $sCourriel;
        }
        public function setRole($iRole) {
            TypeException::estInteger($iRole);

            $this->iRole = $iRole;
        }

        public function setCodePermanent($sCode_permanent) {
            TypeException::estVide($sCode_permanent);
            TypeException::estString($sCode_permanent);

            $this->sCode_permanent = $sCode_permanent;
        }


        public function getMDP() {
            return $this->sMot_de_passe;
        }
        public function getPseudo() {
            return $this->sPseudo;
        }
        public function getNom() {
            return $this->sNom;
        }
        public function getPrenom() {
            return $this->sPrenom;
        }
        public function getCourriel() {
            return $this->sCourriel;
        }
        public function getRole() {
            return $this->iRole;
        }
        public function getId() {
            return $this->iId;
        }
        public function getCodePermanent() {
            return $this->sCode_permanent;
        }
    }      
?>