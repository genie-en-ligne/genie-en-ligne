<?php
    class Ecole extends Modele {
        
        private $iId;
        private $sNom;
        private $iCommission_ID;
        
        public function __construct($iId = 0, $sNom = " ", $iCommission_ID = 0){
            $this->setId($iId);
            $this->setNom($sNom);
            $this->setCommission
        }
        
        public function ajouterEcole(){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("INSERT INTO ecole (`nom`, `commission_ID`) 
                                                 VALUES ('{$this->sNom}','{$this->iCommission_ID}");
            return $this->setId($oConnexion->getInsertId());
        }
        
        public function modifierEcole(){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("UPDATE ecoles 
                                                SET `nom` = '{$this->sNom}', `commission_ID` = '{$this->iCommission_ID}'
                                                WHERE `ecole_ID` = '{$this->iId}'");
        }
        
        public function supprimerEcole(){
            
        }

        public function setId($iId) {
            TypeException::estVide($iId);
            TypeException::estInteger($iId);

            $this->iId = $iId;
        }
        public function setNom($sNom) {
            TypeException::estVide($sPseudo);
            TypeException::estString($sPseudo);

            $this->sNom = $sNom;
        }

        public function getId() {
            return $this->iId;
        }
        public function getNom() {
            return $this->sNom;
        }
    }
?>