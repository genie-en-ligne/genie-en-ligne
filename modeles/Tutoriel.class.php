   <?php
    class Tutoriel extends Modele {

        /* Propriétés privées */
        private $iContenu_Id;
        private $sTitre;
        private $dDateSoumis;
        private $dDateApprouve;
        private $iSoumisPar;
        private $iApprouvePar;
        private $bStatut;
        private $iTypeContenu;
        private $iMatiereId;
        private $iNiveauScolaireId;
        private $bEstDetruit;
        private $iEcoleId;
        private $sContenu;
       
        /**
        *Constructeur
        *@param integer iContenu_Id;
        *@param string sTitre;
        *@param date dDateSoumis;
        *@param date dDateApprouve;
        *@param integer iSoumisPar;
        *@param integer iApprouvePar;
        *@param booleen bStatut;
        *@param integer iTypeContenu;
        *@param integer iMatiereId;
        *@param booleen integer iNiveauScolaireId;
        *@param booleen bEstDetruit;
        *@param integer iEcoleId;
        *@param string sContenu;
        **/
        
        public function __construct($iContenu_Id=0, $sTitre=" ", $dDateSoumis="0000-00-00", $dDateApprouve="0000-00-00", $iSoumisPar=0, $iApprouvePar=0, $bStatut=false, $iTypeContenu=0, $iMatiereId=0, $iNiveauScolaireId=0, $bEstDetruit=false, $iEcoleId=0, $sContenu=" "){
            //TODO: matiere et annee par defaut à 0
            $this->setContenuId($iContenu_Id);
            $this->setTitre($sTitre);
            $this->setDateSoumis($dDateSoumis);
            $this->setDateApprouve($dDateApprouve);
            $this->setSoumisPar($iSoumisPar);
            $this->setApprouvePar($iApprouvePar);
            $this->setStatut($bStatut);
            $this->setType($iTypeContenu);
            $this->setMatiereId($iMatiereId);
            $this->setNiveauScolaire($iNiveauScolaireId);
            $this->setEstDetruit($bEstDetruit);
            $this->setEcoleId($iEcoleId);
            $this->setContenu($sContenu);
        }
        
        /**
        *setteur 
        **/

        public function setContenuId($iContenu_Id){
            TypeException::estInteger($iContenu_Id);
            $this->iContenu_Id = $iContenu_Id;
        }


        public function setTitre($sTitre){
            TypeException::estVide($sTitre);
            TypeException::estString($sTitre);
            $this->sTitre = $sTitre;
        }


        public function setDateSoumis($dDateSoumis){
            TypeException::estDate($dDateSoumis);
            $this->dDateSoumis = $dDateSoumis;
        }

        public function setDateApprouve($dDateApprouve){
            TypeException::estDate($dDateApprouve);
            $this->dDateApprouve =$dDateApprouve;
        }

        public function setSoumisPar($iSoumisPar){
            TypeException::estInteger($iSoumisPar);
            $this->iSoumisPar = $iSoumisPar; 
        }

        public function setApprouvePar($iApprouvePar){
            TypeException::estInteger($iApprouvePar);
            $this->iApprouvePar = $iApprouvePar;
        }

        public function setStatut($bStatut){
            TypeException::estBool($bStatut);
            $this->bStatut = $bStatut;
        }

        public function setType($iTypeContenu){
            TypeException::estInteger($iTypeContenu);
            $this->iTypeContenu = $iTypeContenu;
        }

        public function setMatiereId($iMatiereId){
            TypeException::estInteger($iMatiereId);
            $this->iMatiereId = $iMatiereId;
        }

        public function setNiveauScolaire($iNiveauScolaireId){
            TypeException::estInteger($iNiveauScolaireId);
            $this->iNiveauScolaireId = $iNiveauScolaireId;
        }

        public function setEstDetruit($bEstDetruit){
            TypeException::estBool($bEstDetruit);
            $this->bEstDetruit = $bEstDetruit;
        }

        public function setEcoleId($iEcoleId){
            TypeException::estInteger($iEcoleId);
            $this->iEcoleId = $iEcoleId;
        }

        public function setContenu($sContenu){
            TypeException::estString($sContenu);
            TypeException::estVide($sContenu);
            $this->sContenu = $sContenu;
        }


    /**
     * Permet de récupérer la valeur de la propriété privée (setteur)
     * @return integer Le numéro du média
     */
        public function getContenuId(){
            return $this->iContenu_Id;
        }


        public function getTitre(){
           return htmlentities ($this->sTitre);
        }


        public function getDateSoumis(){
            return $this->dDateSoumis;
        }

        public function getDateApprouve(){
            return $this->dDateApprouve;
        }

        public function getSoumisPar(){
            return $this->iSoumisPar; 
        }

        public function getApprouvePar(){
            return $this->iApprouvePar;
        }

        public function getStatut(){
            return $this->bStatut;
        }

        public function getType(){
            return $this->iTypeContenu;
        }

        public function getMatiereId(){
            return $this->iMatiereId;
        }

        public function getNiveauScolaire(){
            return $this->iNiveauScolaireId;
        }

        public function getEstDetruit(){
            return $this->bEstDetruit;
        }

        public function getEcoleId(){
            return $this->iEcoleId;
        }

        public function getContenu(){
            return $this->sContenu;
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
            //Connecter à la base de données
            $oConnexion = new MySqliLib();
            //Réaliser la requête de recherche par le idEtudiant
            $sRequete="
             SELECT 
                * 
            FROM 
                contenu 
             WHERE 
                soumis_par='{$this->iSoumisPar}' AND
                est_detruit=0
                ";

            //Exécuter la requête
            $oResult = $oConnexion->executer($sRequete);
            //récuperation tableau
            $aListeTuto = $oConnexion->recupererTableau($oResult);

            return $aListeTuto;
            
        }
        
        public function ajouterTuto(){
            //Connexion à la base de données
             $oConnexion = new MySqliLib();
            //Requête d'ajout d'un tutorat
            $sRequete = "
            INSERT INTO 
                contenu
            SET 
                titre = '{$oConnexion->getConnect()->real_escape_string($this->sTitre)}',
                date_soumis = '{$oConnexion->getConnect()->real_escape_string($this->dDateSoumis)}',
                soumis_par = '{$this->iSoumisPar}',
                statut = '{$this->bStatut}',
                type_contenu = '{$this->iTypeContenu}',
                matiere_ID = '{$this->iMatiereId}',
                niveau_scolaire_ID = '{$this->iNiveauScolaireId}',
                ecole_ID = '{$this->iEcoleId}'";

                echo $sRequete;

            $oResult = $oConnexion->executer($sRequete);
            $this->setContenuId($oConnexion->getInsertId());

            if($this->iTypeContenu == '2'){//texte
                $sRequete = "
                INSERT INTO contenu_tutoriel_texte
                SET contenu_html = '".$oConnexion->getConnect()->real_escape_string($this->sContenu)."',"
                ."  contenu_ID = ".$this->iContenu_Id."
                ";
                echo $sRequete;
                $oResult = $oConnexion->executer($sRequete);
            }
            else{//vidéo
                 $sRequete = "
                INSERT INTO contenu_tutoriel_video
                SET url = '".$oConnexion->getConnect()->real_escape_string($this->sContenu)."',"
                ."  contenu_ID = ".$this->iContenu_Id."
                ";
                echo $sRequete;
                $oResult = $oConnexion->executer($sRequete);
            }      
                        
            return true;            
        }
        
        
        public function modifierTutoVideo(){

            //Connexion à la base de données
             $oConnexion = new MySqliLib();
            //Requête d'ajout d'un tutorat
            $sRequete = "
            UPDATE 
                contenu
            SET 
                titre = '{$oConnexion->getConnect()->real_escape_string($this->sTitre)}',
                matiere_ID = '{$this->iMatiereId}',
                niveau_scolaire_ID = '{$this->iNiveauScolaireId}',
                ecole_ID = '{$this->iEcoleId}'
            WHERE
                contenu_ID = '{$this->iContenu_Id}'
            ";

                echo $sRequete;

            $oResult = $oConnexion->executer($sRequete);

            if($this->iTypeContenu == '2'){//texte
                $sRequete = "
                UPDATE contenu_tutoriel_texte
                SET contenu_html = '".$oConnexion->getConnect()->real_escape_string($this->sContenu)."'
                WHERE contenu_ID= ".$this->iContenu_Id."
                ";
                echo $sRequete;
                $oResult = $oConnexion->executer($sRequete);
            }
            else{//vidéo
                 $sRequete = "
                UPDATE contenu_tutoriel_video
                SET url = '".$oConnexion->getConnect()->real_escape_string($this->sContenu)."'
                WHERE  contenu_ID = ".$this->iContenu_Id."
                ";
                echo $sRequete;
                $oResult = $oConnexion->executer($sRequete);
            }      
                        
            return true;            
        }
        

        public function approuverTuto(){
            //Connexion à la base de données
             $oConnexion = new MySqliLib();
            //Requête d'ajout d'un tutorat
            $sRequete = "
            UPDATE 
                contenu
            SET 
                soumis_par = '{$this->iSoumisPar}',
                date_approuve = '{$this->dDateApprouve}',
                approuve_par = '{$this->iApprouvePar}',
                statut= '{$this->bStatut}'
            WHERE
                contenu_ID = '{$this->iContenu_Id}'
            ";
            echo $sRequete;
            $oResult = $oConnexion->executer($sRequete);
        }
        
        public function supprimerTuto(){
            //UPDATE DB, SET est_detruit = 0
            //Connexion à la base de données
            $oConnexion = new MySqliLib();
            //Requête d'ajout d'un tutorat
            $sRequete = "
            UPDATE 
                contenu
            SET 
                est_detruit= '{$this->bEstDetruit}'
            WHERE
                contenu_ID = '{$this->iContenu_Id}'
            ";
            echo $sRequete;
            $oResult = $oConnexion->executer($sRequete);
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