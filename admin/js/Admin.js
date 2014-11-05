/*********************************************************************/
/*****************VALIDATION DES FORMULLAIRES ADMIN*******************/
/*********************************************************************/

/*************FORMULAIRE RECHERCHER RESPONSABLE**********************/

window.addEventListener('load', function () { 

	if(document.getElementById('frmAjouterResp')) {
		document.getElementById('frmAjouterResp').addEventListener('submit', validerFrmAjouterResp);
	}

	if(document.getElementById('frmModifierResp')) {
		document.getElementById('frmModifierResp').addEventListener('submit', validerFrmModifierResp);
	}

	if(document.getElementById('frmChercherCommissions')) {
		document.getElementById('frmChercherCommissions').addEventListener('submit', validerFrmChercherCommissions);
	}

	if(document.getElementById('frmAjouterCommission')) {
		document.getElementById('frmAjouterCommission').addEventListener('submit', validerfrmAjouterCommission);
	}

	if(document.getElementById('frmModifierCommission')) {
		document.getElementById('frmModifierCommission').addEventListener('submit', validerFrmModifierCommission);
	}

	if(document.getElementById('frmSupprimerCommision')) {
		document.getElementById('frmSupprimerCommision').addEventListener('submit', validerFrmSupprimerCommission);
	}

	if(document.getElementById('frmChercherEcoles')) {
		document.getElementById('frmChercherEcoles').addEventListener('submit', validerFrmChercherEcole);
	}

	if(document.getElementById('frmAjouterEcole')) {
		document.getElementById('frmAjouterEcole').addEventListener('submit', validerFrmAjouterEcole);
	}

	if(document.getElementById('frmModifierEcoles')) {
		document.getElementById('frmModifierEcoles').addEventListener('submit', validerFrmModifierEcoles);
	}

	if(document.getElementById('frmAjouterMatiere')) {
		document.getElementById('frmAjouterMatiere').addEventListener('submit', validerFrmAjouterMatiere);
	}

	if(document.getElementById('frmModifierMatiere')) {
		document.getElementById('frmModifierMatiere').addEventListener('submit', validerFrmModifierMatiere);
	}

	if(document.getElementById('frmChercherProf')) {
		document.getElementById('frmChercherProf').addEventListener('submit', validerFrmChercherProf);
	}

	if(document.getElementById('frmAjouterProf')) {
		document.getElementById('frmAjouterProf').addEventListener('submit', validerFrmAjouterProf);
	}

	if(document.getElementById('frmModifierProf')) {
		document.getElementById('frmModifierProf').addEventListener('submit', validerFrmModifierProf);
	}

	if(document.getElementById('frmChercherTuteur')) {
		document.getElementById('frmChercherTuteur').addEventListener('submit', validerFrmChercherTuteur);
	}

	if(document.getElementById('frmAjouterTuteur')) {
		document.getElementById('frmAjouterTuteur').addEventListener('submit', validerFrmAjouterTuteur);
	}

	if(document.getElementById('frmModifierTuteur')) {
		document.getElementById('frmModifierTuteur').addEventListener('submit', validerFrmModifierTuteur);
	}

});


/*************FORMULAIRE AJOUTER RESPONSABLE**********************/


function validerFrmAjouterResp() {

	//Empêcher le formulaire de soumettre automatiquement
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide =  false;
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

function validerFrmModifierResp() {

	//Empêcher le formulaire de soumettre automatiquement
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide =  false;
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

	//Valider courriel
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


function validerfrmAjouterCommission() {

	//Empêcher le formulaire de soumettre automatiquement
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide =  false;
	var frmAjouterCommission 	= 	document.getElementById('frmAjouterCommission');

	//Définir les champs
	var sltMrc					=	document.getElementById('sltMrc');
	var txtCommission 			= 	document.getElementById('txtCommission');

	//Définir les champs d'erreurs
	var sltMrcErreur 			= 	document.getElementById('sltMrcErreur');
	var txtCommissionErreur 	= 	document.getElementById('txtCommissionErreur');

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

function validerFrmModifierCommission() {

	//Empêcher le formulaire de soumettre automatiquement
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide =  false;
	var frmModifierCommission 	= 	document.getElementById('frmModifierCommission');

	//Définir les champs
	var sltMrc					=	document.getElementById('sltMrc');
	var txtCommission 			= 	document.getElementById('txtCommission');
	var sltEcoles 				= 	document.getElementById('sltEcoles');

	//Définir les champs d'erreurs
	var sltMrcErreur 			= 	document.getElementById('sltMrcErreur');
	var txtCommissionErreur 	= 	document.getElementById('txtCommissionErreur');
	var sltEcolesErreur 		= 	document.getElementById('sltEcolesErreur');

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

	//Valider sltEcoles
	if(sltEcoles.value == "0") {
		estValide = false;
		sltEcolesErreur.innerHTML = "Veuillez faire une sélection";
	}

	//Soummettre le formulaire
	if(estValide) {
		frmModifierCommission.submit(); 
	}

}


/*************FORMULAIRE CHERCHER ÉCOLES**********************/


function validerFrmChercherEcole() {

	//Empêcher le formulaire de soumettre automatiquement
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide =  false;
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

function validerFrmAjouterEcole() {

	//Empêcher le formulaire de soumettre automatiquement
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide =  false;
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
		frmAjouterEcoles.submit(); 
	}

}

/*************FORMULAIRE MODIFIER ÉCOLES**********************/

function validerFrmModifierEcoles() {

	//Empêcher le formulaire de soumettre automatiquement
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide =  false;
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

function validerFrmAjouterMatiere() {

	//Empêcher le formulaire de soumettre automatiquement
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide =  false;
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

function validerFrmModifierMatiere() {

	//Empêcher le formulaire de soumettre automatiquement
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide =  false;
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

function validerFrmChercherProf() { 

	//Empêcher le formulaire de soumettre automatiquement
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide =  false;
	var frmChercherProf 	= 	document.getElementById('frmChercherProf');

	//Définir les champs
	var emlCourriel 		= 	document.getElementById('emlCourriel');
	var txtNom 				= 	document.getElementById('txtNom');
	var sltEcoles			=	document.getElementById('sltEcoles');

	//Définir les champs d'erreurs
	var emlCourrielErreur 	= 	document.getElementById('emlCourrielErreur');
	var txtNomErreur 		=	document.getElementById('txtNomErreur');
	var sltNomErreur		=	document.getElementById('sltEcolesErreur');

	var aDivErreur 			= 	document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i < aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
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

	//Valider txtNom
	if(estVide(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estNom(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Le nom est invalide";
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

function validerFrmAjouterProf() {

	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide =  false;
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
		if(!auMoinsUn) {
			estValide = false;
			chkMatieresErreur.innerHTML = "Faites une sélection";
		}
	}

	//Soumettre le formulaire
	if(estValide) {
		frmAjouterProf.submit(); 
	}
}

/***************FORMULAIRE DE MODIFICATION PROFESSEUR*****************/

function validerFrmModifierProf() {

	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide =  false;
	var frmModifierProf = document.getElementById('frmModifierProf');

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
		if(!auMoinsUn) {
			estValide = false;
			chkMatieresErreur.innerHTML = "*";
		}
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

function validerFrmChercherTuteur() {

	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide =  false;
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

function validerFrmAjouterTuteur() {

	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide =  false;
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
		if(!auMoinsUn) {
			estValide = false;
			chkMatieresErreur.innerHTML = "*";
		}
	}

	//Soumettre le formulaire
	if(estValide) {
		frmModifierProf.submit(); 
	}

}

/*************FORMULAIRE DE MODIFICATION TUTEURS**********************/

function validerFrmModifierTuteur() {
	
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide =  false;
	var frmModifierTuteur = document.getElementById('frmModifierTuteur');

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
		if(!auMoinsUn) {
			estValide = false;
			chkMatieresErreur.innerHTML = "*";
		}
	}

	//Soumettre le formulaire
	if(estValide) {
		frmModifierProf.submit(); 
	}

}


/*****************************************************************************************/
/***************VALIDATION DU FORMULAIRE DE SUPPRESSION DES UTILISATEURS ******************/
/*****************************************************************************************/

/*if(document.getElementById('frmSupprimerUtilisateur')) {
	document.getElementById('subSupprimer').addEventListner('submit', validerFrmSupprimerUtilisateur)
}

function validerFrmSupprimerUtilisateur() {
	
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide =  false;
	var frmSupprimerUtilisateur = document.getElementById('frmSupprimerUtilisateur');

	//Définir les champs
	var = document.getElementById('');

	//Définir les champs d'erreurs
	var aDivErreur document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i = aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//...
}*/