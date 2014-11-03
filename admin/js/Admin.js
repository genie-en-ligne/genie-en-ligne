/*********************************************************************/
/*****************VALIDATION DES FORMULLAIRES ADMIN*******************/
/*********************************************************************/

/*************FORMULAIRE RECHERCHER RESPONSABLE**********************/

if(document.getElementById('frmAjouterResp')) {
	document.getElementById('subChercherResp').addEventListner('submit', validerFrmChercherResp);
}
function validerFrmChercherResp() {

	//Empêcher le formulaire de soumettre automatiquement
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide =  false;
	var frmAjouterResp 	= 	document.getElementById('frmAjouterResp');

	//Définir les champs
	var sltCommissions		=	document.getElementById('sltCommissions');

	//Définir les champs d'erreurs
	var sltCommissionsErreur 	= 	document.getElementById('sltCommissionsErreur');

	var aDivErreur document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i = aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//Valider sltEcoles
	if(sltCommissions.value == "0") {
		estValide = false;
		sltCommissionsErreur.innerHTML = "Veuillez faire une sélection";
	}

	//Soummettre le formulaire
	if(estValide) {
		frmAjouterResp.submit(); 
	}

}

/*************FORMULAIRE AJOUTER RESPONSABLE**********************/

if(document.getElementById('frmAjouterResp')) {
	document.getElementById('subAjouterResp').addEventListner('submit', validerFrmAjouterResp);
}
function validerFrmAjouterResp() {

	//Empêcher le formulaire de soumettre automatiquement
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide =  false;
	var frmAjouterResp 		= 	document.getElementById('frmAjouterResp');

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

	var aDivErreur document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i = aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//Valider txtPrenom
	if(estVide(txtPrenom.value)) {
		estValide = false;
		txtPrenomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estPrenom(txtPrenom.value)) {
		estValide = false;
		txtPrenomErreur.innerHTML = "Le prénom ne doit contenir que des lettres";
	}

	//Valider nom
	if(estVide(txtNom.value)) {
		estValide = false;
		txtPrenomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estNom(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Le nom ne doit contenir que des lettres";
	}

	//Valider courriel
	if(estVide(emlCourriel.value)) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estCourriel(emlCourriel.value)) {
		estValide = false;
		emlCourriel.innerHTML = "^Le courriel est invalide";
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

if(document.getElementById('frmModifierResp')) {
	document.getElementById('subModifierResp').addEventListner('submit', validerFrmModifierResp);
}
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
	

	var aDivErreur document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i = aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//Valider txtPrenom
	if(estVide(txtPrenom.value)) {
		estValide = false;
		txtPrenomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estPrenom(txtPrenom.value)) {
		estValide = false;
		txtPrenomErreur.innerHTML = "Ce champ doit être un prénom";
	}

	//Valider nom
	if(estVide(txtNom.value)) {
		estValide = false;
		txtPrenomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estNom(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Ce champ doit être un nom";
	}

	//Valider courriel
	if(estVide(emlCourriel.value)) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estCourriel(emlCourriel.value)) {
		estValide = false;
		emlCourriel.innerHTML = "Ce champ doit contenir un courriel valide";
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

/*************FORMULAIRE RECHERCHER COMMISSIONS**********************/

if(document.getElementById('frmChercherCommissions')) {
	document.getElementById('subChercherCommissions').addEventListner('submit', validerFrmChercherCommissions);
}
function validerFrmChercherCommissions() {

	//Empêcher le formulaire de soumettre automatiquement
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide =  false;
	var frmChercherCommissions 	= 	document.getElementById('frmChercherCommissions');

	//Définir les champs
	var sltMrc					=	document.getElementById('sltMrc');

	//Définir les champs d'erreurs
	var sltMrcErreur 			= 	document.getElementById('sltMrcErreur');

	var aDivErreur document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i = aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//Valider sltEcoles
	if(sltMrc.value == "0") {
		estValide = false;
		sltMrcErreur.innerHTML = "Veuillez faire une sélection";
	}

	//Soummettre le formulaire
	if(estValide) {
		frmChercherCommissions.submit(); 
	}

}

/*************FORMULAIRE AJOUTER COMMISSIONS**********************/

if(document.getElementById('frmAjouterCommission')) {
	document.getElementById('subAjouterCommission').addEventListner('submit', validerfrmAjouterCommission);
}
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

	var aDivErreur document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i = aDivErreur.length; i++) {
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
	else if(estNom(txtCommission.value)) {
		estValide = false;
		txtCommissionErreur = "Ce champ doit contenir du texte";
	}

	//Soummettre le formulaire
	if(estValide) {
		frmAjouterCommission.submit(); 
	}

}

/*************FORMULAIRE MODIFIER COMMISSIONS**********************/

if(document.getElementById('frmModifierCommission')) {
	document.getElementById('subChercherCommissions').addEventListner('submit', validerFrmModifierCommission);
}

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

	var aDivErreur document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i = aDivErreur.length; i++) {
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
	else if(estCommission(txtCommission.value)) {
		estValide = false;
		txtCommissionErreur = "Ce champ doit contenir du texte";
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

if(document.getElementById('frmChercherEcoles')) {
	document.getElementById('subChercherCommissions').addEventListner('submit', validerFrmChercherEcole);
}

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
	var txtNom					= 	document.getElementById('txtNom');
	var sltCommissions			= 	document.getElementById('sltCommissions');

	//Définir les champs d'erreurs
	var txtNomErreur 			= 	document.getElementById('txtNomErreur');
	var sltCommissionsErreur 	= 	document.getElementById('sltCommissionsErreur');

	var aDivErreur document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i = aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//Valider txtCommission
	if(estVide(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(estNom(txtNom.value)) {
		estValide = false;
		txtNomErreur = "Ce champ doit contenir du texte";
	}

	//Valider sltEcoles
	if(sltCommissions.value == "0") {
		estValide = false;
		sltCommissionsErreur.innerHTML = "Veuillez faire une sélection";
	}

	//Soummettre le formulaire
	if(estValide) {
		frmChercherEcoles.submit(); 
	}

}

/*************FORMULAIRE CHERCHER AJOUTER ÉCOLES**********************/

if(document.getElementById('frmAjouterEcoles')) {
	document.getElementById('subAjouterEcoles').addEventListner('submit', validerFrmChercherEcole);
}

function validerFrmChercherEcole() {

	//Empêcher le formulaire de soumettre automatiquement
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide =  false;
	var frmAjouterEcoles 		= 	document.getElementById('frmAjouterEcoles');

	//Définir les champs
	var txtNom					= 	document.getElementById('txtNom');
	var sltCommissions			= 	document.getElementById('sltCommissions');

	//Définir les champs d'erreurs
	var txtNomErreur 			= 	document.getElementById('txtNomErreur');
	var sltCommissionsErreur 	= 	document.getElementById('sltCommissionsErreur');

	var aDivErreur document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i = aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//Valider txtCommission
	if(estVide(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(estNom(txtNom.value)) {
		estValide = false;
		txtNomErreur = "Ce champ doit contenir du texte";
	}

	//Valider sltEcoles
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

if(document.getElementById('frmModifierEcoles')) {
	document.getElementById('subAjouterEcoles').addEventListner('submit', validerFrmModifierEcoles);


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

	var aDivErreur document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i = aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//Valider txtCommission
	if(estVide(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(estNom(txtNom.value)) {
		estValide = false;
		txtNomErreur = "Ce champ doit contenir du texte";
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

/*********************************************************************/
/**************VALIDATION DES FORMULAIRES RESPONSABLES****************/
/*********************************************************************/

/*************FORMULAIRE DE RECHERCHE PROFESSEUR**********************/

if(document.getElementById('frmChercherProf')) {
	document.getElementById('subChercherProf').addEventListner('submit', validerFrmChercherProf);
}

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

	var aDivErreur document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i = aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//Valider emlCourriel
	if(estVide(emlCourriel.value) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Veuillez remplir ce champ";
	} 
	else if(!estCourriel(emlCourriel.value)) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Ce champ doit contenir un mot de passe";
	}

	//Valider txtNom
	if(estVide(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estTexte(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Ce champ doit contenir du texte";
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

if(document.getElementById('frmAjouterProf')) {
	document.getElementById('subAjouterProf').addEventListner('submit', validerFrmAjouterProf);
}

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

	var aDivErreur document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i = aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//Valider txtPrenom
	if(estVide(txtPrenom.value)) {
		estValide = false;
		txtPrenomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estTexte(txtPrenom.value)) {
		estValide = false;
		txtPrenomErreur.innerHTML = "Ce champ doit contenir du texte";
	}

	//Valider txtNom
	if(estVide(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estTexte(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Ce champ doit contenir du texte";
	}

	//Valider emlCourriel
	if(estVide(emlCourriel.value) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Veuillez remplir ce champ";
	} 
	else if(!estCourriel(emlCourriel.value)) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Ce champ doit contenir un mot de passe";
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
		frmAjouterProf.submit(); 
	}
}

/***************FORMULAIRE DE MODIFICATION PROFESSEUR*****************/

if(document.getElementById('frmModifierProf')) {
	document.getElementById('subModifierProf').addEventListner('submit', validerFrmModifierProf);
}

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

	var aDivErreur document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i = aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//Valider txtPrenom
	if(estVide(txtPrenom.value)) {
		estValide = false;
		txtPrenomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estTexte(txtPrenom.value)) {
		estValide = false;
		txtPrenomErreur.innerHTML = "Ce champ doit contenir du texte";
	}

	//Valider txtNom
	if(estVide(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estTexte(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Ce champ doit contenir du texte";
	}

	//Valider emlCourriel
	if(estVide(emlCourriel.value) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Veuillez remplir ce champ";
	} 
	else if(!estCourriel(emlCourriel.value)) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Ce champ doit contenir un mot de passe";
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
}



/*********************************************************************/
/**************VALIDATION DES FORMULAIRES PROFESSEURS*****************/
/*********************************************************************/

/****************FORMULAIRE DE RECHERCHE TUTEURS**********************/

if(document.getElementById('frmChercherTuteur')) {
	document.getElementById('subChercherTuteur').addEventListner('submit', validerFrmChercherTuteur);
}

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

	var aDivErreur document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i = aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//Valider txtNom
	if(estVide(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estTexte(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Ce champ doit contenir du texte";
	}

	//Valider emlCourriel
	if(estVide(emlCourriel.value) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Veuillez remplir ce champ";
	} 
	else if(!estCourriel(emlCourriel.value)) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Ce champ doit contenir un mot de passe";
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
}
/*******************FORMULAIRE D'AJOUT TUTEUR*************************/

if(document.getElementById('frmAjouterTuteur')) {
	document.getElementById('subAjouterTuteur').addEventListner('submit', validerFrmAjouterTuteur);
}

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

	var aDivErreur document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i = aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//Valider txtPrenom
	if(estVide(txtPrenom.value)) {
		estValide = false;
		txtPrenomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estTexte(txtPrenom.value)) {
		estValide = false;
		txtPrenomErreur.innerHTML = "Ce champ doit contenir du texte";
	}

	//Valider txtNom
	if(estVide(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estTexte(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Ce champ doit contenir du texte";
	}

	//Valider emlCourriel
	if(estVide(emlCourriel.value) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Veuillez remplir ce champ";
	} 
	else if(!estCourriel(emlCourriel.value)) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Ce champ doit contenir un mot de passe";
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

if(document.getElementById('frmModifierTuteur')) {
	document.getElementById('subModifierTuteur').addEventListner('submit', validerFrmModifierTuteur)
}

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

	var aDivErreur document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i = aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//Valider txtPrenom
	if(estVide(txtPrenom.value)) {
		estValide = false;
		txtPrenomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estTexte(txtPrenom.value)) {
		estValide = false;
		txtPrenomErreur.innerHTML = "Ce champ doit contenir du texte";
	}

	//Valider txtNom
	if(estVide(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(!estTexte(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = "Ce champ doit contenir du texte";
	}

	//Valider emlCourriel
	if(estVide(emlCourriel.value) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Veuillez remplir ce champ";
	} 
	else if(!estCourriel(emlCourriel.value)) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Ce champ doit contenir un mot de passe";
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