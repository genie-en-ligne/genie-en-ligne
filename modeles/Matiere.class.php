<?php
    class Matiere extends Modele {
        
        private $iId;
        private $sNom;                
        
        public function __construct($iId = 0, $sNom = ' '){
            $this->setId($iId);
            $this->setNom($sNom);
        }
        
        public function ajouterMatiere(){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("INSERT INTO matieres (`nom`) VALUES ('{$this->sNom}')");
            
            $this->setId($oConnexion->getInsertId());            
            return $this->iId();
        }
        
        public function modifierMatiere(){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("UPDATE matieres 
                                                SET `nom` = '{$this->sNom}'
                                                WHERE `matiere_ID` = '{$this->iId}'");
            return $oConnexion->getConnect()->affected_rows;
        }
        
        public function supprimerMatiere(){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("DELETE FROM matieres WHERE `matiere_ID` = '{$this->iId}'");
            return $oConnexion->getConnect()->affected_rows;
        }
        
        public function rechercherListeMatieres(){
            $oConnexion = new MySqliLib();
            $oResultat = $oConnexion->executer("SELECT * FROM matieres ORDER BY nom ASC");
            $aResultats = $oConnexion->recupererTableau($oResultat);

            $aFinal = array();

            foreach($aResultats as $rangee){
                $aFinal[] = new Matiere($rangee['matiere_ID'], $rangee['nom']);
            }
            
            return $aFinal;
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
        
        public function getId() {
            return $this->iId;
        }
        public function getNom() {
            return $this->sNom;
        }
    }
?>