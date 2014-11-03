<?php
    class Commission extends Modele {
        
        private $sNom;
        private $iRegion;
        private $iResponsable;
        private $iId;  
        
        public function __construct($iId = 0, $sNom = " ", $iRegion = 0, $iResponsable = 0) {
            $this->setId($iId);
            $this->setNom($sNom);
            $this->setRegion($iRegion);
            $this->setResponsable($iResponsable);
        }

        public function ajouterCommission() {
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("INSERT INTO commissions (`nom`, `region`) 
                                                 VALUES ('{$this->sNom}','{$this->iRegion}')");
            return $this->setId($oConnexion->getInsertId());
        }
        
        public function modifierCommission() {
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("UPDATE commissions 
                                                SET `nom` = '{$this->sNom}', `region` = '{$this->iRegion}', `responsable` = '{$this->iResponsable}'                                                    
                                                WHERE `commission_ID` = '{$this->iId}'");
            return $oConnexion->getConnect()->affected_rows;
        }
        
        public function supprimerCommission() {
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("DELETE FROM commissions WHERE `commission_ID` = '{$this->iId}'");      
            return $oConnexion->getConnect()->affected_rows;
        }
        
        public function chargerCommission() {
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT * FROM commissions WHERE `commission_ID` = '{$this->iId}'");
            $aResultat =  $oConnexion->recupererTableau($oResultat);

            if(count($aResultat) == 0){
                return false;
            }
            
            $this->setNom($aResultat[0]['nom']);
            $this->setRegion($aResultat[0]['region']);
            $this->setResponsable($aResultat[0]['responsable']);

            return true;
        }
        
        public function chargerCommissionParResponsable() {
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT * FROM commissions WHERE `responsable` = '{$this->iResponsable}'");
            $aResultat =  $oConnexion->recupererTableau($oResultat);

            if(count($aResultat) == 0){
                return false;
            }
            
            $this->setNom($aResultat[0]['nom']);
            $this->setRegion($aResultat[0]['region']);
            $this->setId($aResultat[0]['commission_ID']);

            return true;
        }
        
        public function ajouterModuleAutorise($iServiceId) {
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("INSERT INTO services_par_commission (`commission_ID`, `service_ID`) 
                                                VALUES ('{$this->iId}', '{$iServiceId}')");
            return $this->setId($oConnexion->getInsertId());
        }

        public function rechercherListeModulesAutorises() {
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT service_ID
                                                FROM services_par_commission 
                                                WHERE commission_ID = '{$this->iId}'");
            $aResultat = $oConnexion->recupererTableau($oResultat); 
            return $aResultat;                                  
        }
        
        public function retirerModuleAutorise() {
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("DELETE FROM services_par_commission WHERE `commission_ID` = '{$this->iId}' AND `service_ID` = '{$iServiceId}'");            
            return $oConnexion->getConnect()->affected_rows;
        }
        
        public function rechercherListeCommissions(){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT * FROM commissions WHERE est_detruit = '0' ORDER BY nom ASC");
            //insertion des résultats de la requête dans un array
            $aResultats = $oConnexion->recupererTableau($oResultat);
            
            $aFinal = array();
            
            foreach($aResultats as $rangee){               
                $aFinal[] = new Commission($rangee['commission_ID'], $rangee['nom'], $rangee['region'], $rangee['responsable']);
            }
            
            return $aFinal;
        }

        public function rechercherListeEcoles(){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT * FROM ecoles WHERE commission_ID = '$this->iId'");
            $aResultats = $oConnexion->recupererTableau($oResultat);
            
            $aFinal = array();
            
            foreach($aResultats as $rangee){               
                $aFinal[] = new Ecole($rangee['ecole_ID'], $rangee['nom'], $rangee['commission_ID']);
            }
            
            return $aFinal;
        }

        public function rechercherListeRegions(){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT * FROM regions ORDER BY nom ASC");
            $aResultats = $oConnexion->recupererTableau($oResultat);

            $aRegions = array();

            foreach ($aResultats as $rangee) {
                $aRegions[$rangee['region_ID']] = $rangee['nom'];
            }

            return $aRegions;
        }

        public function retirerResponsable(){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("UPDATE commissions 
                                                SET `responsable` = '0'                                                    
                                                WHERE `commission_ID` = '{$this->iId}'");
            $this->setResponsable(0);
            return $oConnexion->getConnect()->affected_rows;
        }

        public function getNomRegion(){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT nom FROM regions WHERE region_ID = '$this->iRegion'");
            $aResultats = $oConnexion->recupererTableau($oResultat);

            return $aResultats[0]['nom'];
        }
        
        //TODO: Ajouter méthodes au besoin
        public function setId($iId) {
            TypeException::estInteger($iId);

            $this->iId = $iId;
        }
        public function setNom($sNom) {
            TypeException::estVide($sNom);
            TypeException::estString($sNom);

            $this->sNom = $sNom;
        }
        public function setRegion($iRegion) {
            TypeException::estInteger($iRegion);

            $this->iRegion = $iRegion;
        }
        public function setResponsable($iResponsable) {
            TypeException::estInteger($iResponsable);

            $this->iResponsable = $iResponsable;
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
       
    }
?>