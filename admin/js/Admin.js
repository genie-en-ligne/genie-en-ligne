/*********************************************************************/
/*****************VALIDATION DES FORMULLAIRES ADMIN*******************/
/*********************************************************************/

/*************FORMULAIRE RECHERCHER RESPONSABLE**********************/

//Créer des événements sur chacun des formualires après le chargement du document
window.addEventListener('load', function () { 

	//Formulaire d'ajout de responsables de commissions scolaires
	if(document.getElementById('frmAjouterResp')) {
		document.getElementById('frmAjouterResp').addEventListener('submit', validerFrmAjouterResp);
		//Mettre le focus sur le premier élément du formulaire
		var txtPrenom = document.getElementById('txtPrenom');
   		txtPrenom.focus();
	}

	//Formulaire de modification de responsables de commissions scolaires
	if(document.getElementById('frmModifierResp')) {
		document.getElementById('frmModifierResp').addEventListener('submit', validerFrmModifierResp);
		var txtPrenom = document.getElementById('txtPrenom');
   		txtPrenom.focus();
	}

	//Formulaire d'ajout de commissions scolaires
	if(document.getElementById('frmAjouterCommission')) {
		document.getElementById('frmAjouterCommission').addEventListener('submit', validerfrmAjouterCommission);
		//Mettre le focus sur le premier élément du formulaire
		var sltMrc = document.getElementById('sltMrc');
   		sltMrc.focus();
	}

	//Formulaire de modification de commissions scolaires
	if(document.getElementById('frmModifierCommission')) {
		document.getElementById('frmModifierCommission').addEventListener('submit', validerFrmModifierCommission);
	}

	//Formulaire de recherhce d'écoles
	if(document.getElementById('frmChercherEcoles')) {
		document.getElementById('frmChercherEcoles').addEventListener('submit', validerFrmChercherEcole);
		//Mettre le focus sur le premier élément du formulaire
		var sltCommissions = document.getElementById('sltCommissions');
   		sltCommissions.focus();
	}

	//Formulaire d'ajout d'écoles
	if(document.getElementById('frmAjouterEcole')) {
		document.getElementById('frmAjouterEcole').addEventListener('submit', validerFrmAjouterEcole);
		//Mettre le focus sur le premier élément du formulaire
		var sltCommissions = document.getElementById('sltCommissions');
   		sltCommissions.focus();
	}

	//Formulaire de modification d'écoles
	if(document.getElementById('frmModifierEcoles')) {
		document.getElementById('frmModifierEcoles').addEventListener('submit', validerFrmModifierEcoles);
		//Mettre le focus sur le premier élément du formulaire
		var sltCommissions = document.getElementById('sltCommissions');
   		sltCommissions.focus();
	}

	//Formulaire d'ajout de matières
	if(document.getElementById('frmAjouterMatiere')) {
		document.getElementById('frmAjouterMatiere').addEventListener('submit', validerFrmAjouterMatiere);
		//Mettre le focus sur le premier élément du formulaire
		var txtNom = document.getElementById('txtNom');
   		txtNom.focus();
	}

	//Formulaire de madification de matières
	if(document.getElementById('frmModifierMatiere')) {
		document.getElementById('frmModifierMatiere').addEventListener('submit', validerFrmModifierMatiere);
		//Mettre le focus sur le premier élément du formulaire
		var txtNom = document.getElementById('txtNom');
   		txtNom.focus();
	}

	//Formulaire de recherhce de professeurs
	if(document.getElementById('frmChercherProf')) {
		document.getElementById('frmChercherProf').addEventListener('submit', validerFrmChercherProf);
		//Mettre le focus sur le premier élément du formulaire
		var sltEcoles = document.getElementById('sltEcoles');
   		sltEcoles.focus();
	}

	//Formulaire d'ajout de professeurs
	if(document.getElementById('frmAjouterProf')) {
		document.getElementById('frmAjouterProf').addEventListener('submit', validerFrmAjouterProf);
		//Mettre le focus sur le premier élément du formulaire
		var txtPrenom = document.getElementById('txtPrenom');
   		txtPrenom.focus();
	}

	//Formulaire de modification de professeurs
	if(document.getElementById('frmModifierProf')) {
		document.getElementById('frmModifierProf').addEventListener('submit', validerFrmModifierProf);
		//Mettre le focus sur le premier élément du formulaire
		var txtPrenom = document.getElementById('txtPrenom');
   		txtPrenom.focus();
	}

	//Formulaire de recherche de tuteurs
	if(document.getElementById('frmChercherTuteur')) {
		document.getElementById('frmChercherTuteur').addEventListener('submit', validerFrmChercherTuteur);
		//Mettre le focus sur le premier élément du formulaire
		var sltEcoles = document.getElementById('sltEcoles');
   		sltEcoles.focus();
	}

	//Formulaire d'ajout de tuteurs
	if(document.getElementById('frmAjouterTuteur')) {
		document.getElementById('frmAjouterTuteur').addEventListener('submit', validerFrmAjouterTuteur);
		//Mettre le focus sur le premier élément du formulaire
		var txtPrenom = document.getElementById('txtPrenom');
   		txtPrenom.focus();
	}

	//Formulaire de modification de tuteurs
	if(document.getElementById('frmModifierTuteur')) {
		document.getElementById('frmModifierTuteur').addEventListener('submit', validerFrmModifierTuteur);
		//Mettre le focus sur le premier élément du formulaire
		var txtPrenom = document.getElementById('txtPrenom');
   		txtPrenom.focus();
	}

});


/*************FORMULAIRE AJOUTER RESPONSABLE**********************/

//Validation du formulaire d'ajout de responsables de commissions scolaires
function validerFrmAjouterResp() {

	//Prévenir l'envoie automatique du formulaire
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		//Internet Explorer
		event.returnValue = false;
	}

	//Valeur par défaut du formulaire
	var estValide 				=  true;

	//Cible de la méthode submit 
	var frmAjouterResp 			= 	document.getElementById('frmAjouterResp');

	//Définir les champs
	var txtPrenom				=	document.getElementById('txtPrenom');
	var txtNom 					= 	document.getElementById('txtNom');
	var emlCourriel 			= 	document.getElementById('emlCourriel');
	var sltCommissions 			= 	document.getElementById('sltCommissions');

	//Définir les champs d'erreurs
	var txtPrenomErreur 		=	document.getElementById('txtPrenomErreur');
	var txtNomErreur 			=	document.getElementById('txtNomErreur');
	var sltCommissionsErreur 	= 	document.getElementById('sltCommissionsErreur');
	var emlCourrielErreur 		= 	document.getElementById('emlCourrielErreur');

	var aDivErreur 				= 	document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i < aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//Valider txtPrenom
	if(estVide(txtPrenom.value)) {
		estValide = false;
		txtPrenomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estNom(txtPrenom.value)) {
		estValide = false;
		txtPrenomErreur.innerHTML = "Le prénom est invalide";
	}

	//Valider nom
	if(estVide(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estNom(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Le nom est invalide";
	}

	//Valider courriel
	if(estVide(emlCourriel.value)) {
		console.log('vide');
		estValide = false;
		emlCourrielErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estCourriel(emlCourriel.value)) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Le courriel est invalide";
	}

	//Valider sltCommissions
	if(sltCommissions.value == "0") {
		estValide = false;
		sltCommissionsErreur.innerHTML = "Veuillez faire une sélection";
	}

	//Soummettre le formulaire
	if(estValide) {
		frmAjouterResp.submit(); 
	}

}

/*************FORMULAIRE MODIFIER RESPONSABLE**********************/

//Validation du formulaire de modification de responsables de commissions scolaires
function validerFrmModifierResp() {

	//Prévenir l'envoie automatique du formulaire
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	//Valeur par défaut du formulaire
	var estValide 				=  true;

	//Cible de la méthode submit
	var frmModifierResp 		= 	document.getElementById('frmModifierResp');

	//Définir les champs
	var txtPrenom				=	document.getElementById('txtPrenom');
	var txtNom 					= 	document.getElementById('txtNom');
	var emlCourriel 			= 	document.getElementById('emlCourriel');
	var sltCommissions 			= 	document.getElementById('sltCommissions');

	//Définir les champs d'erreurs
	var txtPrenomErreur 		=	document.getElementById('txtPrenomErreur');
	var txtNomErreur 			=	document.getElementById('txtNomErreur');
	var emlCourrielErreur 		= 	document.getElementById('emlCourrielErreur');
	var sltCommissionsErreur 	= 	document.getElementById('sltCommissionsErreur');
	console.log('in');

	var aDivErreur 				= 	document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i < aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//Valider txtPrenom
	if(estVide(txtPrenom.value)) {
		estValide = false;
		txtPrenomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estNom(txtPrenom.value)) {
		estValide = false;
		txtPrenomErreur.innerHTML = "Le prénom est invalide";
	}

	//Valider nom
	if(estVide(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estNom(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Le nom est invalide";
	}

	//Valider emlCourriel
	if(estVide(emlCourriel.value)) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estCourriel(emlCourriel.value)) {
		estValide = false;
		emlCourriel.innerHTML = "Le courriel est invalide";
	}

	//Valider sltCommissions
	if(sltCommissions.value == "0") {
		estValide = false;
		sltCommissionsErreur.innerHTML = "Veuillez faire une sélection";
	}

	//Soummettre le formulaire
	if(estValide) {
		frmModifierResp.submit(); 
	}
}


/*************FORMULAIRE AJOUTER COMMISSIONS**********************/

//Validation du formulaire d'ajout de commissions scolaires
function validerfrmAjouterCommission() {

	//Prévenir l'envoie automatique du formulaire
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	//Valeur par défaut du formulaire
	var estValide 				=  true;

	//Cible de la méthode submit 
	var frmAjouterCommission 	= 	document.getElementById('frmAjouterCommission');

	//Définir les champs
	var sltMrc					=	document.getElementById('sltMrc');
	var txtCommission 			= 	document.getElementById('txtNom');

	//Définir les champs d'erreurs
	var sltMrcErreur 			= 	document.getElementById('sltMrcErreur');
	var txtCommissionErreur 	= 	document.getElementById('txtNomErreur');

	var aDivErreur 				= 	document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i < aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//Valider sltMrc
	if(sltMrc.value == "0") {
		estValide = false;
		sltMrcErreur.innerHTML = "Veuillez faire une sélection";
	}

	//Valider txtCommission
	if(estVide(txtCommission.value)) {
		estValide = false;
		txtCommissionErreur.innerHTML = "Veuillez remplir ce champ";	
	}
	else if(!estCommission(txtCommission.value)) {
		estValide = false;
		txtCommissionErreur.innerHTML = "La commission est invalide";
	}

	//Soummettre le formulaire
	if(estValide) {
		frmAjouterCommission.submit(); 
	}

}

/*************FORMULAIRE MODIFIER COMMISSIONS**********************/

//Validation du formulaire de modifications de commissions scolaires
function validerFrmModifierCommission() {

	//Prévenir l'envoie automatique du formulaire
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	//Valeur par défaut du formulaire
	var estValide 				=  	true;

	//Cible de la méthode submit 
	var frmModifierCommission 	= 	document.getElementById('frmModifierCommission');

	//Définir les champs
	var sltMrc					=	document.getElementById('sltMrc');
	var txtCommission 			= 	document.getElementById('txtNom');

	//Définir les champs d'erreurs
	var sltMrcErreur 			= 	document.getElementById('sltMrcErreur');
	var txtCommissionErreur 	= 	document.getElementById('txtNomErreur');

	var aDivErreur 				= 	document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i < aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//Valider sltMrc
	if(sltMrc.value == "0") {
		estValide = false;
		sltMrcErreur.innerHTML = "Veuillez faire une sélection";
	}

	//Valider txtCommission
	if(estVide(txtCommission.value)) {
		estValide = false;
		txtCommissionErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estCommission(txtCommission.value)) {
		estValide = false;
		txtCommissionErreur.innerHTML = "La commission scolaire est invalide";
	}

	//Soummettre le formulaire
	if(estValide) {
		frmModifierCommission.submit(); 
	}

}


/*************FORMULAIRE CHERCHER ÉCOLES**********************/

//Validation du formulaire de recherche d'écoles
function validerFrmChercherEcole() {

	//Prévenir l'envoie automatique du formulaire
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	//Valeur par défaut du formulaire
	var estValide 				=  true;

	//Cible de la méthode submit 
	var frmChercherEcoles 		= 	document.getElementById('frmChercherEcoles');

	//Définir les champs
	var sltCommissions			= 	document.getElementById('sltCommissions');

	//Définir les champs d'erreurs
	var sltCommissionsErreur 	= 	document.getElementById('sltCommissionsErreur');

	var aDivErreur 				= 	document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i < aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}


	//Valider sltCommissions
	if(sltCommissions.value == "0") {
		estValide = false;
		sltCommissionsErreur.innerHTML = "Veuillez faire une sélection";
	}

	//Soummettre le formulaire
	if(estValide) {
		frmChercherEcoles.submit(); 
	}

}

/*************FORMULAIRE AJOUTER ÉCOLES**********************/

//Validation du formulaire d'ajout d'écoles
function validerFrmAjouterEcole() {

	//Prévenir l'envoie automatique du formulaire
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	//Valeur par défaut du formulaire
	var estValide 				=  true;

	//Cible de la méthode submit 
	var frmAjouterEcole 		= 	document.getElementById('frmAjouterEcole');

	//Définir les champs
	var txtNom					= 	document.getElementById('txtNom');
	var sltCommissions			= 	document.getElementById('sltCommissions');

	//Définir les champs d'erreurs
	var txtNomErreur 			= 	document.getElementById('txtNomErreur');
	var sltCommissionsErreur 	= 	document.getElementById('sltCommissionsErreur');

	var aDivErreur 				= 	document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i < aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//Valider txtCommission
	if(estVide(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estCommission(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "L'école est invalide";
	}

	//Valider sltCommissions
	if(sltCommissions.value == "0") {
		estValide = false;
		sltCommissionsErreur.innerHTML = "Veuillez faire une sélection";
	}

	//Soummettre le formulaire
	if(estValide) {
		frmAjouterEcole.submit(); 
	}

}

/*************FORMULAIRE MODIFIER ÉCOLES**********************/

//Validation du formulaire de modifications d'écoles
function validerFrmModifierEcoles() {

	//Prévenir l'envoie automatique du formulaire
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	//Valeur par défaut du formulaire
	var estValide 				=  true;

	//Cible de la méthode submit 
	var frmModifierEcoles 		= 	document.getElementById('frmModifierEcoles');

	//Définir les champs
	var txtNom					= 	document.getElementById('txtNom');
	var sltCommissions			= 	document.getElementById('sltCommissions');

	//Définir les champs d'erreurs
	var txtNomErreur 			= 	document.getElementById('txtNomErreur');
	var sltCommissionsErreur 	= 	document.getElementById('sltCommissionsErreur');

	var aDivErreur 				= 	document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i < aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//Valider txtCommission
	if(estVide(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estCommission(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "L'école est invalide";
	}

	//Valider sltEcoles
	if(sltCommissions.value == "0") {
		estValide = false;
		sltCommissionsErreur.innerHTML = "Veuillez faire une sélection";
	}

	//Soummettre le formulaire
	if(estValide) {
		frmModifierEcoles.submit(); 
	}

}

/*************FORMULAIRE AJOUTER MATIÈRES**********************/

//Validation du formulaire d'ajout de matières
function validerFrmAjouterMatiere() {

	//Prévenir l'envoie automatique du formulaire
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	//Valeur par défaut du formulaire
	var estValide 				=  true;

	//Cible de la méthode submit
	var frmAjouterMatiere 		= 	document.getElementById('frmAjouterMatiere');

	//Définir les champs
	var txtNom					= 	document.getElementById('txtNom');

	//Définir les champs d'erreurs
	var txtNomErreur 			= 	document.getElementById('txtNomErreur');

	var aDivErreur 				= 	document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i < aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//Valider txtCommission
	if(estVide(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estNom(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "La matière est invalide";
	}

	//Soummettre le formulaire
	if(estValide) {
		frmAjouterMatiere.submit(); 
	}

}

/*************FORMULAIRE MODIFIER MATIÈRES**********************/

//Validation du formulaire de modifications de matières
function validerFrmModifierMatiere() {

	//Prévenir l'envoie automatique du formulaire
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	//Valeur par défaut du formulaire
	var estValide 				=  true;

	//Cible de la méthode submit
	var frmModifierMatiere 		= 	document.getElementById('frmModifierMatiere');

	//Définir les champs
	var txtNom					= 	document.getElementById('txtNom');

	//Définir les champs d'erreurs
	var txtNomErreur 			= 	document.getElementById('txtNomErreur');

	var aDivErreur 				= 	document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i < aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//Valider txtCommission
	if(estVide(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estNom(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "La matière est invalide";
	}

	//Soummettre le formulaire
	if(estValide) {
		frmModifierMatiere.submit(); 
	}

}

/*********************************************************************/
/**************VALIDATION DES FORMULAIRES RESPONSABLES****************/
/*********************************************************************/

/*************FORMULAIRE DE RECHERCHE PROFESSEUR**********************/

//Validation du formulaire de recherche de professeurs
function validerFrmChercherProf() { 

	//Prévenir l'envoie automatique du formulaire
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	//Valeur par défaut du formulaire
	var estValide 			=  true;

	//Cible de la méthode submit
	var frmChercherProf 	= 	document.getElementById('frmChercherProf');

	//Définir les champs
	var sltEcoles			=	document.getElementById('sltEcoles');

	//Définir les champs d'erreur
	var sltEcolesErreur		=	document.getElementById('sltEcolesErreur');

	var aDivErreur 			= 	document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i < aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//Valider sltEcoles
	if(sltEcoles.value == "0") {
		estValide = false;
		sltEcolesErreur.innerHTML = "Veuillez faire une sélection";
	}

	//Soummettre le formulaire
	if(estValide) {
		frmChercherProf.submit(); 
	}

}

/****************FORMULAIRE D'AJOUT PROFESSEUR************************/

//Validation du formulaire d'ajout de professeurs
function validerFrmAjouterProf() {

	//Prévenir l'envoie automatique du formulaire
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	//Valeur par défaut du formulaire
	var estValide 			=  true;

	//Cible de la méthode submit
	var frmAjouterProf 		= 	document.getElementById('frmAjouterProf');

	//Définir les champs
	var txtPrenom 			= 	document.getElementById('txtPrenom');
	var txtNom 				=  	document.getElementById('txtNom');
	var elmCourriel			=	document.getElementById('emlCourriel');
	var sltEcoles 			=	document.getElementById('sltEcoles');
	var aChkMatieres 		=	document.getElementsByName('chkMatieres[]');

	//Définir les champs d'erreurs
	var txtPrenomErreur 	=	document.getElementById('txtPrenomErreur');
	var txtNomErreur 		= 	document.getElementById('txtNomErreur');
	var emlCourrielErreur 	= 	document.getElementById('emlCourrielErreur');
	var sltEcolesErreur 	=	document.getElementById('sltEcolesErreur');
	var chkMatieresErreur 	= 	document.getElementById('chkMatieresErreur');

	var aDivErreur 			= 	document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i < aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	console.log(aChkMatieres);

	//Valider txtPrenom
	if(estVide(txtPrenom.value)) {
		estValide = false;
		txtPrenomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estNom(txtPrenom.value)) {
		estValide = false;
		txtPrenomErreur.innerHTML = "Le prénom est invalide";
	}

	//Valider txtNom
	if(estVide(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estNom(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Le nom est invalide";
	}

	//Valider emlCourriel
	if(estVide(emlCourriel.value)) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Veuillez remplir ce champ";
	} 
	else if(!estCourriel(emlCourriel.value)) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Le courriel est invalide";
	}

	//Valider sltEcoles
	if(sltEcoles.value == "0") {
		estValide = false;
		sltEcolesErreur.innerHTML = "Veuillez faire une sélection";
	}

	//Valider chkMatiere
	var auMoinsUn = false;
	for(var i = 0; i < aChkMatieres.length; i++) {
		console.log(aChkMatieres[i].checked);
		if(aChkMatieres[i].checked) {
			auMoinsUn = true;
		} 
	}
	if(!auMoinsUn) {
		estValide = false;
		chkMatieresErreur.innerHTML = "Faites une sélection";
	}

	//Soumettre le formulaire
	if(estValide) {
		frmAjouterProf.submit(); 
	}
}

/***************FORMULAIRE DE MODIFICATION PROFESSEUR*****************/

//Validation du formulaire de modifications de professeurs
function validerFrmModifierProf() {

	//Prévenir l'envoie automatique du formulaire
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	//Valeur par défaut du formulaire
	var estValide 			=  true;

	//Cible de la méthode submit
	var frmModifierProf 	= 	document.getElementById('frmModifierProf');

	//Définir les champs
	var txtPrenom 			= 	document.getElementById('txtPrenom');
	var txtNom 				= 	document.getElementById('txtNom');
	var emlCourriel 		= 	document.getElementById('emlCourriel');
	var sltEcoles 			=	document.getElementById('sltEcoles');
	var aChkMatieres 		= 	document.getElementsByName('chkMatieres[]');

	//Définir les champs d'erreurs
	var txtPrenomErreur		=	document.getElementById('txtPrenomErreur');
	var txtNomErreur 		=	document.getElementById('txtNomErreur');
	var emlCourrielErreur 	=	document.getElementById('emlCourrielErreur');
	var sltEcolesErreur 	=	document.getElementById('sltEcolesErreur');
	var chkMatieresErreur 	= 	document.getElementById('chkMatieresErreur');

	var aDivErreur 			= 	document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i < aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//Valider txtPrenom
	if(estVide(txtPrenom.value)) {
		estValide = false;
		txtPrenomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estNom(txtPrenom.value)) {
		estValide = false;
		txtPrenomErreur.innerHTML = "Le prénom est invalide";
	}

	//Valider txtNom
	if(estVide(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estNom(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Le nom invalide";
	}

	//Valider emlCourriel
	if(estVide(emlCourriel.value)) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Veuillez remplir ce champ";
	} 
	else if(!estCourriel(emlCourriel.value)) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Le courriel est invalide";
	}

	//Valider sltEcoles
	if(sltEcoles.value == "0") {
		estValide = false;
		sltEcolesErreur.innerHTML = "Veuillez faire une sélection";
	}

	//Valider chkMatiere
	var auMoinsUn = false;
	for(var i = 0; i < aChkMatieres.length; i++) {
		if(aChkMatieres[i].checked) {
			auMoinsUn = true;
		} 
	}
	if(!auMoinsUn) {
		estValide = false;
		chkMatieresErreur.innerHTML = "*";
	}

	//Soumettre le formulaire
	if(estValide) {
		frmModifierProf.submit(); 
	}

}

/*********************************************************************/
/**************VALIDATION DES FORMULAIRES PROFESSEURS*****************/
/*********************************************************************/

/****************FORMULAIRE DE RECHERCHE TUTEURS**********************/

//Validation du formulaire de recherche de tuteurs
function validerFrmChercherTuteur() {

	//Prévenir l'envoie automatique du formulaire
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	//Valeur par défaut du formulaire
	var estValide 			=  	true;

	//Cible de la méthode submit
	var frmChercherTuteur 	= 	document.getElementById('frmChercherTuteur');

	//Définir les champs
	var txtNom 				= 	document.getElementById('txtNom');
	var emlCourriel 		=	document.getElementById('emlCourriel');
	var sltEcoles 			=	document.getElementById('sltEcoles');

	//Définir les champs d'erreurs
	var txtNomErreur 		=	document.getElementById('txtNomErreur');
	var emlCourrielErreur 	=	document.getElementById('emlCourrielErreur');
	var sltEcolesErreur 	= 	document.getElementById('sltEcolesErreur');

	var aDivErreur 			= 	document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i < aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//Valider txtNom
	if(estVide(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estNom(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Le nom est invalide";
	}

	//Valider emlCourriel
	if(estVide(emlCourriel.value)) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Veuillez remplir ce champ";
	} 
	else if(!estCourriel(emlCourriel.value)) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Le courriel est invalide";
	}

	//Valider sltEcoles
	if(sltEcoles.value == "0") {
		estValide = false;
		sltEcolesErreur.innerHTML = "Veuillez faire une sélection";
	}

	//Soumettre le formulaire
	if(estValide) {
		frmChercherTuteur.submit(); 
	}

}

/*******************FORMULAIRE D'AJOUT TUTEUR*************************/

//Validation du formulaire d'ajout de tuteurs
function validerFrmAjouterTuteur() {

	//Prévenir l'envoie automatique du formulaire
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	//Valeur par défaut du formulaire
	var estValide 			=  true;

	//Cible de la méthode submit
	var frmAjouterTuteur 	= document.getElementById('frmAjouterTuteur');

	//Définir les champs
	var txtPrenom 			= 	document.getElementById('txtPrenom');
	var txtNom 				= 	document.getElementById('txtNom');
	var emlCourriel 		= 	document.getElementById('emlCourriel');
	var sltEcoles 			= 	document.getElementById('sltEcoles');
	var aChkMatieres 		= 	document.getElementsByName('chkMatieres[]');

	//Définir les champs d'erreurs
	var txtPrenomErreur 	= 	document.getElementById('txtPrenomErreur');
	var txtNomErreur 		= 	document.getElementById('txtNomErreur');
	var emlCourrielErreur 	= 	document.getElementById('emlCourrielErreur');
	var sltEcolesErreur 	= 	document.getElementById('sltEcolesErreur');
	var chkMatieresErreur 	= 	document.getElementById('chkMatieresErreur');

	var aDivErreur 			= 	document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i < aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//Valider txtPrenom
	if(estVide(txtPrenom.value)) {
		estValide = false;
		txtPrenomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estNom(txtPrenom.value)) {
		estValide = false;
		txtPrenomErreur.innerHTML = "Le prénom est invalide";
	}

	//Valider txtNom
	if(estVide(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estNom(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Le nom est invalide";
	}

	//Valider emlCourriel
	if(estVide(emlCourriel.value)) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Veuillez remplir ce champ";
	} 
	else if(!estCourriel(emlCourriel.value)) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Le courriel est invalide";
	}

	//Valider sltEcoles
	if(sltEcoles.value == "0") {
		estValide = false;
		sltEcolesErreur.innerHTML = "Veuillez faire une sélection";
	}

	//Valider chkMatiere
	var auMoinsUn = false;
	for(var i = 0; i < aChkMatieres.length; i++) {
		if(aChkMatieres[i].checked) {
			auMoinsUn = true;
		} 
	}
	if(!auMoinsUn) {
		estValide = false;
		chkMatieresErreur.innerHTML = "*";
	}

	//Soumettre le formulaire
	if(estValide) {
		frmAjouterTuteur.submit(); 
	}

}

/*************FORMULAIRE DE MODIFICATION TUTEURS**********************/

//Validation du formulaire de modifications de tuteurs
function validerFrmModifierTuteur() {
	
	//Prévenir l'envoie automatique du formulaire
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	//Valeur par défaut du formulaire
	var estValide 			=  true;

	//Cible de la méthode submit
	var frmModifierTuteur 	= 	document.getElementById('frmModifierTuteur');

	//Définir les champs
	var txtPrenom 			= 	document.getElementById('txtPrenom');
	var txtNom 				= 	document.getElementById('txtNom');
	var emlCourriel 		= 	document.getElementById('emlCourriel');
	var sltEcoles 			= 	document.getElementById('sltEcoles');
	var aChkMatieres 		= 	document.getElementsByName('chkMatieres[]');

	//Définir les champs d'erreurs
	var txtPrenomErreur 	= 	document.getElementById('txtPrenomErreur');
	var txtNomErreur 		= 	document.getElementById('txtNomErreur');
	var emlCourrielErreur 	= 	document.getElementById('emlCourrielErreur');
	var sltEcolesErreur 	= 	document.getElementById('sltEcolesErreur');
	var chkMatieresErreur 	= 	document.getElementById('chkMatieresErreur');

	var aDivErreur 			= 	document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i < aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//Valider txtPrenom
	if(estVide(txtPrenom.value)) {
		estValide = false;
		txtPrenomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estNom(txtPrenom.value)) {
		estValide = false;
		txtPrenomErreur.innerHTML = "Le prénom est invalide";
	}

	//Valider txtNom
	if(estVide(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estNom(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Le nom est invalide";
	}

	//Valider emlCourriel
	if(estVide(emlCourriel.value)) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Veuillez remplir ce champ";
	} 
	else if(!estCourriel(emlCourriel.value)) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Le courriel est invalide";
	}

	//Valider sltEcoles
	if(sltEcoles.value == "0") {
		estValide = false;
		sltEcolesErreur.innerHTML = "Veuillez faire une sélection";
	}

	//Valider aChkMatieres
	var auMoinsUn = false;
	for(var i = 0; i < aChkMatieres.length; i++) {
		if(aChkMatieres[i].checked) {
			auMoinsUn = true;
		} 
	}
	if(!auMoinsUn) {
		estValide = false;
		chkMatieresErreur.innerHTML = "*";
	}

	//Soumettre le formulaire
	if(estValide) {
		frmModifierTuteur.submit(); 
	}

}


