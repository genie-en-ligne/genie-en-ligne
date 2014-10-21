<?php
    class Utilisateur extends Modele {
        private $id;
        private $role;
        private $pseudo;
        private $prenom;
        private $nom;
        private $courriel;
        private $mot_de_passe; //Utilisé seulement lors du login
        
        public function __construct($id = 0, $pseudo = " ", $mot_de_passe = " ", $nom = " ", $prenom = " ", $courriel= " ", $role = 0){
            $this->setId($id);
            $this->setPseudo($pseudo);
            $this->setMDP($mot_de_passe);
            $this->setNom($nom);
            $this->setPrenom($prenom);
            $this->setCourriel($courriel);
            $this->setRole($role);
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
            $oResultat = $oConnexion->executer("INSERT INTO activite_login (`utilisateur_ID`, `evenement`) VALUES ('{$this->getId()}', '{$evenement}'");
        }
        
    /*======================*/
    /*== AUTRES FONCTIONS ==*/
    /*======================*/
        
        public function estDisponiblePseudo(){
            
        }
        
        public function motDePasseAssezComplexe(){
            //minimum majuscule, minuscule, chiffre
            //Tous caractères permis
            //Return true ou false
        }
        
        public function deuxMotsDePasseIdentiques(){
            //Return true ou false
        }
        
        //TODO: fonctions pour créer tous les niveaux de compte, et chaque étape de chaque création
        
        private function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
        }
        private function setMDP($mot_de_passe) {
            $this->mot_de_passe = $mot_de_passe;
        }
        public function setNom($sNom) {
            //Validation à l'aide de la classe TypeException. Une exception est lancée (throw) si le paramètre n'est pas conforme.
            TypeException::estVide($sNom);
            TypeException::estString($sNom);

            //Ce code n'est pas exécuté si une erreur est lancée.
            $this->nom = $sNom;
        }
        public function setPrenom($prenom) {
            $this->prenom = $prenom;
        }
        private function setCourriel($courriel) {
            $this->courriel = $courriel;
        }
        private function setRole($role) {
            $this->role = $role;
        }
        public function setId($id){
            $this->id = $id;
        }


         public function getMDP() {
            return $this->mot_de_passe;
        }
        public function getPseudo() {
            return $this->pseudo;
        }
        public function getNom() {
            return $this->nom;
        }
        public function getPrenom() {
            return $this->prenom;
        }
        public function getCourriel() {
            return $this->courriel;
        }
        public function getRole() {
            return $this->role;
        }
        public function getId(){
            return $this->id;
        }
    }      
?>