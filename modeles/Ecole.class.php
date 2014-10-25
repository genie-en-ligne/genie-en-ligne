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
            $oResultat = $oConnexion->executer("INSERT INTO ecole (`nom`, `commission_ID`) 
                                                 VALUES ('{$this->sNom}','{$this->iCommissionId}");
            $this->setId($oConnexion->getInsertId());            
            return $this->iId();
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
            $oResultat = $oConnexion->executer("DELETE FROM ecoles WHERE `ecole_ID` = '{$this->iId}'");
            return $oConnexion->getConnect()->affected_rows;
        }
       
        public function rechercherListeEcoles(){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT * FROM ecoles WHERE commission_ID = '{$this->iCommissionId}'");
            $aResultats = $oConnexion->recupererTableau($oResultat);
            
            return $aResultats;
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