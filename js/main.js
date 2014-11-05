/**
 * @file Script contenant les fonctions de base
 * @author Jonathan Martel (jmartel@gmail.com)
 * @version 0.1
 * @update 2013-12-11
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 *
 */


//Tester pour un champ vide
function estVide(varATester){
	//Approche positive
   	if(varATester.length == 0){
      	return true;
   	}
   		return false;
}

//Tester une valeur numérique invalide
function estNumerique(varATester){
   	//Approche négative
   	var regex = /[^0-9]/;
   	if(regex.test(varATester)){
      	return false;
   	}
   		return true;
}

//Tester un titre invalide
function estTitre(varATester){
	//Approche négative
	var regex = /[^a-zA-Z0-9\s\-\*\xC0-\xFC'\!\?\.\,\t\n\r]/;

	if(regex.test(varATester)) { 
		return false;			 
	}
		return true;
}

//Tester une URL invalide
function estUrl(varATester){
	//Approche négative
	var regex = /[^a-zA-Z0-9\s\/\<\>'="\?\._]/;

	if(regex.test(varATester)) { 
		return false;			 
	}
		return true;
}
    
//Tester une valeur alpha invalide
function estLettre(varATester) {
	//Approche négative
	var regex = /[^a-zA-Z\s\xC0-\xFC]/;

	if(regex.test(varATester)) { //on teste le champ et si il y a  des caractères invalides 
		return false;			 // on retourne false
	}
		return true;
}

//Tester pour un nom ou prénom (peuvent être composés) valide
function estNom(varAtester) {
	//Approche positive
	var regex = /^[a-zA-Z\xC0-\xFC]{1,}([\s\-\']{1}[a-zA-Z\xC0-\xFC]+)*$/;

	if(regex.test(varAtester)) {
		return true;
	} else {
		return false;
	}
}

//Tester un nom de commission scolaire valide
function estCommission(varAtester) {
	//Approche positive
	var regex = /^[a-zA-Z\xC0-\xFC]+([\s\-\']{1}[a-zA-Z\xC0-\xFC]+)*$/;

	if(regex.test(varAtester)) {
		return true;
	} else {
		return false;
	}
}

//Tester un courriel valide
function estCourriel(varATester) {
	//approche positive
	var regex = /[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})/;
	if(regex.test(varATester)) {
		return true;
	} else {
		return false;
	}
}

//Tester pour un mot de passe
//doit contenir au moins un chiffre
//doit contenir au moins une lettre
//doit contenir minimum 8 caractère
function estMotDePasse(varATester) {

	var regex = /^(?=.{8,15})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])$/
	if(regex.test(varATester)) {	
		return true;
	} 
    	return true;
}