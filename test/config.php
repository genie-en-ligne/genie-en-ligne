<?php
/**
 * Fichier de configuration. Il est appelé par index.php et par test/index.php
 * Il contient notamment l'autoloader
 * @author Jonathan Martel
 * @version 1.0
 * @update 2013-03-11
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */
	function mon_autoloader($class) {
		$dossierClasse = array('../modeles/', '../vues/', '../lib/', '../controleurs/', '../' );	// Ajouter les dossiers au besoin
		
		foreach ($dossierClasse as $dossier) {
			if(file_exists('./'.$dossier.$class.'.class.php')){
				require_once('./'.$dossier.$class.'.class.php');
			}
		}
	}
	
	spl_autoload_register('mon_autoloader');

    //define('WEB_ROOT', 'http://e1395671.webdev.cmaisonneuve.qc.ca/final');
    define('WEB_ROOT', 'http://127.0.0.1/projet-github/genie-en-ligne');

    /*define('SQL_HOST', 'localhost');
    define('SQL_USER', 'e1395671');
    define('SQL_PWD',  'e1395671');
    define('SQL_BDD',  'e1395671');*/

    define('SQL_HOST', 'localhost');
    define('SQL_USER', 'root');
    define('SQL_PWD',  '');
    define('SQL_BDD',  'genie_en_ligne');
	
?>