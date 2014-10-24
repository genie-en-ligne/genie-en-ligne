<?php
    class Commission extends Modele {
        
        private $sNom;
        private $iRegion;
        private $iResponsable;
        private $iId;
        private $iServiceId;    
        
        public function __construct($iId = 0, $sNom = " ", $iRegion = " ", $iResponsable = 0) {
            $this->setId($iId);
            $this->setNom($sNom);
            $this->setRegion($iRegion);
            $this->setResponsable($iResponsable);
        }

        public function admin_AjouterCommission() {
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("INSERT INTO commissions (`nom`, `region`, `responsable`) 
                                                 VALUES ('{$this->sNom}','{$this->iRegion}','{$this->iResponsable}')");
            return $this->setId($oConnexion->getInsertId());
        }
        
        public function admin_ModifierCommission() {
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("UPDATE commissions 
                                                SET `nom` = '{$this->sNom}', `region` = '{$this->iRegion}', 
                                                    `responsable` = '{$this->iResponsable}' 
                                                WHERE `commission_ID` = '{$this->iId}'");
        }
        
        public function admin_SupprimerCommission() {
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("DELETE FROM commissions WHERE `commission_ID` = '{$this->iId}'");
        }
        
        public function chargerCommission() {
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT * FROM commissions WHERE `commission_ID` = '{$this->iId}'");
            $aResultat =  $oConnexion->recupererTableau($oResultat);
            return $aResultat[0];
        }
        
        public function ajouterModuleAutorise() {
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("INSERT INTO services_par_commission (`commission_ID`, `service_ID`) 
                                                VALUES ('{$this->iId}', '{$this->iServiceId}')");
        }

        public function afficherModuleAutorise() {
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT commission_ID
                                                FROM services_par_commission 
                                                WHERE commission_ID = $this->iId AND service_ID = $this->iServiceId");
            $aResultat = $oConnexion->recupererTableau($oResultat); 
            return $aResultat;                                  
        }
        
        public function retirerModuleAutorise() {
            $oConnexion = new MySqliLib();
           
        }
        
        //TODO: Ajouter méthodes au besoin
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
        public function setRegion($iRegion) {
            TypeException::estVide($iId);
            TypeException::estInteger($iId);

            $this->iRegion = $iRegion;
        }
        public function setResponsable($iResponsable) {
            TypeException::estVide($iId);
            TypeException::estInteger($iId);

            $this->iResponsable = $iResponsable;
        }
        public function setService($iServiceId) {
            TypeException::estVide($iId);
            TypeException::estInteger($iId);

            $this->iServiceId = $iServiceId;
        }
       
        public function getId() {
            return $this->iId;
        }
        public function getNom() {
            return $this->sNom;
        }
        public function getRegion() {
            return $this->iRegion;
        }
        public function getResponsable() {
            return $this->iResponsable;
        }
         public function getService() {
            return $this->iServiceId;
        }
       
    }
?>