<?php

/**
 * TypeException.class.php
 * Classe TypeException 
 * Liste des Méthodes :
 *		public static function estVide($sCh)
 * 		public static function estString($sCh)
 *		public static function estNumerique($iInt)
 *		public static function estInteger($iInt)
 *		public static function estDossier($sDossier)
 *		public static function estResource($rH)
 *		public static function estObjet($oObj)
 *		public static function estArray($aArr)
 *		public function __construct($sMsg="", $iCode=0)
 * @author Caroline Martin cmartin@cmaisonneuve.qc.ca
 * @version 2014-10-08
 */
    class TypeException extends Exception {
    	
		const ERR_VIDE ="Le paramètre ne doit pas être une chaîne vide.";	
		const ERR_STRING ="Le paramètre doit être une chaîne de caractères.";
		const ERR_INTEGER ="Le paramètre doit être une valeur entière.";
		const ERR_NUMERIC ="Le paramètre doit être une valeur numérique.";
		const ERR_FOLDER="Le paramètre doit être un dossier";
		const ERR_RESOURCE="Le paramètre doit être une ressource";
		const ERR_OBJET = "Erreur - le paramètre doit être un objet";
		const ERR_BOOL = "Erreur - le paramètre doit être un booléen";
		const ERR_ARRAY = "Erreur - le paramètre doit être un array";
		const ERR_DATE = "Erreur - le paramètre doit être une date";
    	/**
		 * détermine si le paramètre est une chaîne vide
		 * @param mixed $sCh
		 */
    	public static function estVide($sCh){
    		if(empty($sCh)==true)
				throw new TypeException(get_class()." :: ". TypeException::ERR_VIDE);
    	}
		
    	/**
		 * détermine si le paramètre est une chaîne de caractères
		 * @param mixed $sCh
		 */
    	public static function estString($sCh){
    		if(is_numeric($sCh)==true)
				throw new TypeException(get_class()." :: ". TypeException::ERR_STRING." - Valeur actuelle:".$sCh);	
    	}
    	/**
		 * détermine si le paramètre est une valeur numérique
		 * @param mixed $iInt
		 */
    	public static function estNumerique($iInt){
    		if(is_numeric($iInt)==false)
				throw new TypeException(get_class()." :: ". TypeException::ERR_NUMERIC." - Valeur actuelle:".$iInt);	
    	}
		/**
		 * détermine si le paramètre est une valeur entière
		 * @param mixed $iInt
		 */
    	public static function estInteger($iInt){
    		if(is_integer(intval($iInt))==false)
				throw new TypeException(get_class()." :: ". TypeException::ERR_INTEGER." - Valeur actuelle:".$iInt);	
    	}
		/**
		 * détermine si le paramètre est un dossier
		 * @param mixed $sDossier
		 */
    	public static function estDossier($sDossier){
    		if(is_dir($sDossier)==false)
				throw new TypeException(get_class()." :: ". TypeException::ERR_FOLDER);	
    	}
		/**
		 * détermine si le paramètre est une ressource
		 * @param mixed $rH
		 */
    	public static function estResource($rH){
    		if(is_resource($rH)==false)
				throw new TypeException(get_class()." :: ". TypeException::ERR_RESOURCE);	
    	}
		/**
		 * détermine si le paramètre est un objet
		 * @param mixed $oObj
		 */
    	public static function estObjet($oObj){
    		if(is_object($oObj) == false){
				throw new Exception(get_class()." :: ". TypeException::ERR_OBJET);
			}	
    	}
        
        
    	public static function estBool($bBool){
    		if($bBool != 0 && $bBool != 1){
				throw new Exception(get_class()." :: ". TypeException::ERR_BOOL);
			}	
    	}
		
		/**
		 * détermine si le paramètre est un array
		 * @param mixed $aArr
		 */
    	public static function estArray($aArr){
    		if(is_array($aArr) == false){
				throw new Exception(get_class()." :: ". TypeException::ERR_ARRAY);
			}	
    	}
        
        public static function estDate($dDate){
            if(preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $dDate) == false){
                throw new Exception(get_class()." :: ". TypeException::ERR_DATE);
            }
            list($year, $month, $day) = explode("-", $dDate);
            
            if(checkdate($month, $day , $year) == false && $dDate != "0000-00-00"){
                throw new Exception(get_class()." :: ". TypeException::ERR_DATE);
            }
        }
		
		public function __construct($sMsg="", $iCode=0){
			parent::__construct($sMsg, $iCode);
		}
		
    }
?>