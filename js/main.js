/**
 * @file Script contenant les fonctions de base
 * @author Jonathan Martel (jmartel@gmail.com)
 * @version 0.1
 * @update 2013-12-11
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 *
 */

 // Placer votre JavaScript ici

//Ici seront les fonctions de validation générales utilisées pour toutes nos validations personnelles.

//Par exemple, estNumérique(), estBooleen(), estVide(), etc.

//Test négatif

//Tester pour un champ vide 
function estVide(varATester) {
	if(varATester.length == 0) {
		return true;
	} else {
		return false;
	}
}

//Tester pour une valeur numérique
function estNumerique(varATester) {
	//approche négative
	var regex = /^[0-9]$/;
	if(regex.test(varATester) {
		return false;
	} else {
		return true;
	}	
}

//Tester pour une valeur alpha
function estLettre(varATester) {
	//approche négative
	var regex = /^[a-zA-Z](\s)?\xC0-\xFC$/;
	if(regex.test(varATester) {
		return false;
	} else {
		return true;
	}
}

//Tester pour un courriel
function estCourrie(varATester) {
	//approche positive
	var regex = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
	if(regex.test(varATester) {
		return false;
	} else {
		return true;
	}
}