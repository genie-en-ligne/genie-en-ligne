/*********************************************************************/
/**************VALIDATION DES FORMULLAIRES CÔTÉ ADMIN*****************/
/*********************************************************************/



/*********************************************************************/
/**************VALIDATION DE LA GESTION DES PROFESSEURS***************/
/*********************************************************************/

/*************FORMULAIRE DE RECHERCHE PROFESSEUR**********************/

if(document.getElementById('frmChercherProf')) {
	document.getElementById('frmChercherProf').addEventListner('submit', validerFrmChercherProf)
}

function validerFrmChercherProf() {

	//Empêcher le formulaire de soumettre automatiquement
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide =  false;
	var validerFrmChercherProf = document.getElementById('validerFrmChercherProf');

	//Définir les champs
	var emlCourriel 	= 	document.getElementById('emlCourriel');
	var txtNom 		= 	document.getElementById('txtNom');
	var sltEcoles		=	document.getElementById('sltEcoles')

	//Définir les champs d'erreurs
	var emlCourrielErreur 	= 	document.getElementById('emlCourrielErreur');
	var txtNomErreur 		=	document.getElementById('txtNomErreur');
	var sltNomErreur		=	document.getElementById('sltEcolesErreur');

	var aDivErreur document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i = aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//Validation des champs

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

	//Valider sltNom
	if(sltEcoles == 0) {
		estValide = false;
		sltEcolesErreur.innerHTML = "Veuillez faire une sélection";
	}

	//Soummettre le formulaire
	if(estValide) {
		validerFrmChercherProf.submit(); 
	}

}

/****************FORMULAIRE D'AJOUT PROFESSEUR************************/

if(document.getElementById('frmAjouterProf')) {
	document.getElementById('frmAjouterProf').addEventListner('submit', validerFrmAjouterProf)
}

function validerFrmAjouterProf() {

	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide =  false;
	var validerFrmChercherProf = document.getElementById('validerFrmChercherProf');

	var = document.getElementById('');

	//Définir les champs d'erreurs
	var aDivErreur document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i = aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//...
}

/***************FORMULAIRE DE MODIFICATION PROFESSEUR*****************/

if(document.getElementById('frmModifierProf')) {
	document.getElementById('frmModifierProf').addEventListner('submit', validerFrmModifierProf)
}

function validerFrmModifierProf() {

	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide =  false;
	var validerFrmModifierProf = document.getElementById('validerFrmModifierProf');

	//Définir les champs
	var = document.getElementById('');

	//Définir les champs d'erreurs
	var aDivErreur document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i = aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//...
}



/*********************************************************************/
/***************VALIDATION DE LA GESTION DES TUTEURS******************/
/*********************************************************************/

/****************FORMULAIRE DE RECHERCHE TUTEURS**********************/

if(document.getElementById('frmChercherTuteur')) {
	document.getElementById('frmChercherTuteur').addEventListner('submit', validerFrmChercherTuteur)
}

function validerFrmChercherTuteur() {

	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide =  false;
	var validerFrmChercherTuteur = document.getElementById('validerFrmChercherTuteur');

	//Définir les champs
	var = document.getElementById('');

	//Définir les champs d'erreurs
	var aDivErreur document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i = aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//...
}
}
/*******************FORMULAIRE D'AJOUT TUTEUR*************************/

if(document.getElementById('frmAjouterTuteur')) {
	document.getElementById('frmAjouterTuteur').addEventListner('submit', validerFrmAjouterTuteur)
}

function validerFrmAjouterTuteur() {

	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide =  false;
	var validerFrmAjouterTuteur = document.getElementById('validerFrmAjouterTuteur');

	//Définir les champs
	var = document.getElementById('');

	//Définir les champs d'erreurs
	var aDivErreur document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i = aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//...
}

/*************FORMULAIRE DE MODIFICATION TUTEURS**********************/

if(document.getElementById('frmModifierTuteur')) {
	document.getElementById('frmModifierTuteur').addEventListner('submit', validerFrmModifierTuteur)
}

function validerFrmModifierTuteur() {
	
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide =  false;
	var validerFrmModifierTuteur = document.getElementById('validerFrmModifierTuteur');

	//Définir les champs
	var = document.getElementById('');

	//Définir les champs d'erreurs
	var aDivErreur document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i = aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//...
}


/*****************************************************************************************/
/***************VALIDATION DU FORMULAIRE DE SUPPRESION DES UTILISATEURS ******************/
/*****************************************************************************************/

if(document.getElementById('frmSupprimerUtilisateur')) {
	document.getElementById('frmSupprimerUtilisateur').addEventListner('submit', validerFrmSupprimerUtilisateur)
}

function validerFrmSupprimerUtilisateur() {
	
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide =  false;
	var validerFrmSupprimerUtilisateur = document.getElementById('validerFrmSupprimerUtilisateur');

	//Définir les champs
	var = document.getElementById('');

	//Définir les champs d'erreurs
	var aDivErreur document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i = aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = '';
	}

	//...
}