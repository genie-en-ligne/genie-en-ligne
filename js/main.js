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

//Tester pour un champ vide
function estVide(varATester){

   if(varATester.length == 0){
      return true;
   }
   return false;
}

//Tester pour une valeur numérique
function estNumerique(varATester){
   //Approche négative
   var regex = /[^0-9]/;
   if(regex.test(varATester)){
      return false;
   }
   return true;
}


function estTitre(varATester){
    // regex pour que l'utilisateur ne rentre pas les caractères non désirés
	var regex = /[^a-zA-Z0-9\s\-\*\xC0-\xFC'\!\?\.\,\t\n\r]/;

	if(regex.test(varATester)) { //on teste le champ et si il y a  des caractères invalides 
		return false;			 // on retourne false
	}
	return true;
}

function estUrl(varATester){
    // regex pour que l'utilisateur ne rentre pas les caractères non désirés
	var regex = /[^a-zA-Z0-9\s\/\<\>'="\?\._]/;

	if(regex.test(varATester)) { //on teste le champ et si il y a  des caractères invalides 
		return false;			 // on retourne false
	}
	return true;
}
    
//Tester pour une valeur alpha
function estLettre(varATester) {
	// regex pour que l'utilisateur ne rentre pas les caractères non désirés
	var regex = /[^a-zA-Z\s\xC0-\xFC]/;

	if(regex.test(varATester)) { //on teste le champ et si il y a  des caractères invalides 
		return false;			 // on retourne false
	}
	return true;
}

//Tester pour une valeur nom ou prénom
function estNom(varAtester) {
	//Validation pour un nom ou prénom composé (optionnel)
	var regex = /^[a-zA-Z\xC0-\xFC]{2,}[\s\-\'][a-zA-Z\xC0-\xFC]*$/;

	if(regex.test(varAtester)) {
		return true;
	} else {
		return false;
	}
}

//Tester pour une valeur commission scolaire
function estCommission(varAtester) {

	var regex = /^[a-zA-Z\xC0-\xFC]+([\s\-\']{1}[a-zA-Z\xC0-\xFC]+)*$/;

	if(regex.test(varAtester)) {
		return true;
	} else {
		return false;
	}
}

//Tester pour un courriel
function estCourriel(varATester) {
	//approche positive
	var regex = /[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})/;
	if(regex.test(varATester)) {
		return true;
	} else {
		return false;
	}
    //return true;
}

//Tester pour un mot de passe
//doit contenir au moins un chiffre
//doit contenir au moins une lettre
//doit contenir minimum 8 caractère
function estMotDePasse(varATester) {
	//approche négative [^\s](?=.*\d)(?=.*[a-z]).{8,20}
	var regex = /^(?=.{8,15})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])$/
	if(regex.test(varATester)) {	
		return true;
	} 
    return true;
}