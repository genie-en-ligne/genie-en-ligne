/**
 * Validation du formulaires en JavaScript en utilisant les RegExp
 * @author Maxime Gaillard
 * @version Beta
 * @date 29-10-2014
 */

window.addEventListener('load', function () {

	if(document.getElementById('frmLogin')) {
		document.getElementById('frmLogin').addEventListener('submit', validerFrmLogin);
		var txtPseudo = document.getElementById('txtPseudo');
   		txtPseudo.focus();
	}

	if(document.getElementById('frmProfilUtilateur')) {
		document.getElementById('frmProfilUtilateur').addEventListener('submit', validerFrmModifierProfil);
	}

	if(document.getElementById('frmPreInscrition')) {
		document.getElementById('frmPreInscrition').addEventListener('submit', validerFrmPreInscrition);
	}

	if(document.getElementById('frmInscription')) {
		document.getElementById('frmInscription').addEventListener('submit', validerFrmInscrition);
	}

	if(document.getElementById('frmMessage')) {
		document.getElementById('frmMessage').addEventListener('submit', validerFrmMessage);
	}

	if(document.getElementById('frmRecuperMdp')) {
		document.getElementById('frmRecuperMdp').addEventListener('submit', validerFrmRecuperMdp);
	}

});

function validerFrmLogin() {
	
	//empêcher le formulaire de soumettre automatiquemenet
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide 			= 	true;
	var premiereErreur = '';//pour l'utilisation de curseur
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
	else if(estLettre(txtPseudo.value) == false) {
		estValide = false;
		txtPseudoErreur.innerHTML = "Ce champ doit uniquement contenir du texte";
	}

	//Valider Mot de passe
	if(estVide(pwdPass.value)) {
		estValide = false;
		pwdPassErreur.innerHTML = "Veuillez remplir ce champ";
	}
	/*else if(estMotDePasse(pwdPass.value) == false) {
		estValide = false;
		pwdPassErreur.innerHTML = "Ce champ doit contenir huit caractères ou plus et au moins un chiffre";
	}*/

	//Soumettre le formulaire 
	if(estValide == true) {
		frmLogin.submit();
	}
}

function validerFrmModifierProfil() {

	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	var estValide = true;
	var frmProfilUtilateur 	= 	document.getElementById('frmProfilUtilateur');

	//Définir les champs
	var txtPseudo 			=	document.getElementById('txtPseudo');
	var pwdPass1 			=	document.getElementById('pwdPass1');
	var pwdPass2 			= 	document.getElementById('pwdPass2');

	//Définir les champs d'erreur
	var txtPseudoErreur		=	document.getElementById('txtPseudoErreur');
	var pwdPass1Erreur		=	document.getElementById('pwdPass1Erreur');
	var pwdPass2Erreur		=	document.getElementById('pwdPass2Erreur');

	var aDivErreur 			= 	document.getElementsByClassName('divErreur');

	for(var i = 0; i < aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = "";	
	}

	//Valider Mot de passe1
	if(estVide(pwdPass1.value)) {
		estValide = false;
		pwdPass1Erreur.innerHTML = 'Veuillez remplir ce champ';
	} 
	else if(estMotDePasse(pwdPass1.value) == false) {
		estValide = false;
		pwdPass1Erreur.innerHTML = "Ce champ doit contenir huit caractères ou plus et au moins un chiffre";
	}

	//Valider Mot de passe2
	/*if(estVide(pwdPass2.value)) {
		estValide = false;
		pwdPass2Erreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(estMotDePasse(pwdPass2.value) ==  false) {
		estValide = false;
		pwdPass2Erreur.innerHTML = "Ce champ doit contenir huit caractères ou plus et au moins un chiffre";
	}*/

	//Vérifier s les mots de passe s
	if(pwdPass1.value != pwdPass2.value) {
		estValide = false;
		pwdPass2Erreur.innerHTML = "Les mots de passe ne sont pas identiques";
	}

	if(estValide ==  true) {
		
	}
	if(estValide == true){
      //idDeMonFormulaire.submit();
	  console.log('Formulaire soumis');
	  frmProfilUtilateur.submit();
   }
   else{
		premiereErreur.focus();
   }

}

function validerFrmPreInscrition() {

}

function validerFrmInscrition() {

}

function validerFrmMessage() {

}

function validerFrmRecuperMdp() {

}