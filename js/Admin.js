//Toutes les validations JavaScript pour le login, les formulaires de gestion des ecoles, commissions, profs, tuteurs, demande de modif de mot de passe, changer mot de passe, etc.if(docment.getElementById('frmLogin')) {
if(docment.getElementById('frmLogin')) {
	docment.getElementById('frmLogin').addEventListener('submit', validerFrmLogin);
}

function validerFrmLogin() {
	//empêcher le formulaire de soumettre automatiquemenet
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide 			= 	true;
	var frmLogin 			= 	document.getElementById('frmLogin');

	//Définir les champs
	var txtPseudo 			=	document.getElementById('txtPseudo');
	var pwdPass 			= 	document.getElementById('pwdPass');

	//Définir les champs d'erreur
	var txtPseudoErreur		=	document.getElementById('txtPseudoErreur');
	var pwdPassErreur		=	document.getElementById('pwdPassErreur');

	var aDivErreur 			= 	document.getElementsByClassName('divErreur');

	//Enlever toutes les erreurs
	for(var i = 0; i < aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = "";	
	}

	//Valider Pseudo 
	if(estVide(txtPseudo.value)) {
		estValide = false;
		txtPseudoErreur.innerHTML = 'Veuillez remplir ce champ';
	} 
	else if(estTexte(txtPseudo.value) == false) {
		estValide = false;
		txtPseudoErreur.innerHTML = "Ce champ doit contenir du texte";
	}

	//Valider Mot de passe
	if(estVide(pwdPass.value)) {
		estValide = false;
		pwdPass.innerHTML = "Veuillez remplir ce champ";
	}
	else if(estMotDePasse(pwdPass.value) == false) {
		estValide = false;
		pwdPass.innerHTML = "Ce champ doit contenir huit caractères ou plus et au moins un chiffre";
	}

	//Soumettre le formulaire 
	if(estValide == true) {
		frmLogin.submit();
	}
}