/*********************************************************************/
/**************VALIDATION DES FORMULLAIRES ADMIN*****************/
/*********************************************************************/



/*********************************************************************/
/**************VALIDATION DE LA GESTION DES PROFESSEURS***************/
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
	var sltEcoles			=	document.getElementById('sltEcoles')

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
/***************VALIDATION DE LA GESTION DES TUTEURS******************/
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
	var aChkMatieres 		= 	document.getElementsByName('chkMatieres[]')

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
	var aChkMatieres 		= 	document.getElementsByName('chkMatieres[]')

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