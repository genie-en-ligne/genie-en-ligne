<?php
   class Ecole extends Modele {
        
        private $iId;
        private $sNom;
        private $iCommissionId;
        
        public function __construct($iId = 0, $sNom = " ", $iCommissionId = 0){
            $this->setId($iId);
            $this->setNom($sNom);
            $this->setCommissionId($iCommissionId);
        }
        
        public function ajouterEcole(){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("INSERT INTO ecoles (`nom`, `commission_ID`) 
                                                 VALUES ('{$this->sNom}','{$this->iCommissionId}')");
            $this->setId($oConnexion->getInsertId());            
            return $this->iId;
        }
        
        public function modifierEcole(){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("UPDATE ecoles 
                                                SET `nom` = '{$this->sNom}', `commission_ID` = '{$this->iCommissionId}'
                                                WHERE `ecole_ID` = '{$this->iId}'");
            return $oConnexion->getConnect()->affected_rows;
        }
        
        public function supprimerEcole(){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("UPDATE ecoles 
                                                SET `est_detruit` = '1'
                                                WHERE `ecole_ID` = '{$this->iId}'");
            return $oConnexion->getConnect()->affected_rows;
        }
       
        public function rechercherListeEcoles(){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT * FROM ecoles WHERE est_detruit = '0' ORDER BY nom ASC");
            $aResultats = $oConnexion->recupererTableau($oResultat);
            
            $aEcoles = array();

            foreach ($aResultats as $rangee) {
                $oEcole = new Ecole($rangee['ecole_ID']);
                $oEcole->chargerEcole();
                $aEcoles[] = $oEcole;
            }
            return $aEcoles;
        }

        public function modifierEcolesParUtilisateur($oUtilisateur, $aEcoles){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("DELETE FROM ecoles_par_utilisateur WHERE utilisateur_ID = '{$oUtilisateur->getId()}'");

            foreach ($aEcoles as $ecole_ID) {
                $oResultat = $oConnexion->executer("INSERT INTO ecoles_par_utilisateur (`ecole_ID`, `utilisateur_ID`) VALUES ('{$ecole_ID}', '{$oUtilisateur->getId()}')");
            }

            return true;
        }

        public function chargerEcole(){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT * FROM ecoles WHERE ecole_ID = '{$this->iId}'");
            $aResultats = $oConnexion->recupererTableau($oResultat);

            $this->setNom($aResultats[0]['nom']);
            $this->setCommissionId($aResultats[0]['commission_ID']);

            return true;
        }

        public function setId($iId) {
            TypeException::estInteger($iId);

            $this->iId = $iId;
        }
        public function setNom($sNom) {
            TypeException::estVide($sNom);
            TypeException::estString($sNom);

            $this->sNom = $sNom;
        }
        public function setCommissionId($iCommissionId){
            TypeException::estInteger($iCommissionId);

            $this->iCommissionId = $iCommissionId;
        }

        public function getId() {
            return $this->iId;
        }
        public function getNom() {
            return $this->sNom;
        }
        public function getCommissionId(){
            return $this->iCommissionId;
        }
    }
?>