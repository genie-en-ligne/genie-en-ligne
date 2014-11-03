if(docment.getElementById('frmLogin')) {
	docment.getElementById('frmLogin').addEventListener('submit', validerFrmLogin);
}

function validerFrmLogin() {
	//empêcher le formulaire de soumettre automatiquemenet
	if(event.preventDefault) {
		event.preventDefault;
	} else {
		event.returnValue = false;
	}

	var estValide = true;
	var frmLogin 	= 	document.getElementById('frmLogin');

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

if(docment.getElementById('frmProfilUtilateur')) {
	docment.getElementById('frmProfilUtilateur').addEventListener('submit', validerFormulaire);
}

function modifierProfil() {

	var estValide = true;
	var frmProfilUtilateur 	= 	document.getElementById('frmProfilUtilateur');

	//Définir les champs
	var pwdPass1 			=	document.getElementById('pwdPass1');
	var pwdPass2 			= 	document.getElementById('pwdPass2');

	//Définir les champs d'erreur
	var txtPseudoErreur		=	document.getElementById('pwdPass1Erreur');
	var pwdPassErreur		=	document.getElementById('pwdPass2Erreur');

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
		frmProfilUtilateur.submit();
	}
}


//Formulaire pour signialiser un problème 
//@author	Donna
function SignaliserUnProbleme(){
	if(event.preventDefault) {
		event.preventDefault;
	} else {
		event.returnValue = false;
	}

	var estValide = true;
	var frmMessage 	= 	document.getElementById('frmMessage');

	//Définir les champs
	var txtCourriel			=	document.getElementById('txtCourriel');
	var txtCommentaire		= 	document.getElementById('txtCommentaire');

	//Définir les champs d'erreur
	var txtCourrielErreur		=	document.getElementById('txtCourrielErreur');
	var txtCommentaireErreur	=	document.getElementById('txtCommentaireErreur');

	var aDivErreur 			= 	document.getElementsByClassName('divErreur');

   //Enlever toutes les erreurs
   for(var i = 0; i < aDivErreur.length; i++){
      aDivErreur[i].innerHTML = ‘’;
   }

	//Valider le champs message
	if(estVide(txtCommentaire.value)) {
		estValide = false;
		txtCourrielErreur.innerHTML = 'Veuillez remplir ce champ';
	} 
	else if(estTexte(txtCommentaire.value) == false) {
		estValide = false;
		txtPseudoErreur.innerHTML = "Ce champ doit contenir du texte";
	}

	//Valider le champs couriel
	if(estVide(txtCourriel.value)) {
		estValide = false;
		txtCourrielErreur.innerHTML = 'Veuillez remplir ce champ';
	} 
	else if(estTexte(txtCourriel.value) == false) {
		estValide = false;
		txtPseudoErreur.innerHTML = "Ce champ doit contenir du texte";
	}
	else if(estCouriel(txtCourriel.value) == false) {
		estValide = false;
		txtPseudoErreur.innerHTML = "Ce champ doit contenir un couriel";
	}

	//Soumettre le formulaire
   if(estValide == true){
      frmMessage.submit();
   }
}

// Recuperer mots de passe
//@author	Donna
function RecupereMotsDePasse(){
	if(event.preventDefault) {
		event.preventDefault;
	} else {
		event.returnValue = false;
	}

	var estValide = true;
	var frmRecuperer = 	document.getElementById('frmRecuperer');

	//Définir les champs
	var txtRecupMdp			=	document.getElementById('txtRecupMdp');

	//Définir les champs d'erreur
	var txtRecupPassErreur		=	document.getElementById('txtRecupPassErreur');

	var aDivErreur 			= 	document.getElementsByClassName('divErreur');

   //Enlever toutes les erreurs
   for(var i = 0; i < aDivErreur.length; i++){
      aDivErreur[i].innerHTML = ‘’;
   }

	//Valider le champs couriel
	if(estVide(txtRecupMdp.value)) {
		estValide = false;
		txtRecupPassErreur.innerHTML = 'Veuillez remplir ce champ';
	} 
	else if(estTexte(txtRecupMdp.value) == false) {
		estValide = false;
		txtRecupPassErreur.innerHTML = "Ce champ doit contenir du texte";
	}
	else if(estCouriel(txtRecupMdp.value) == false) {
		estValide = false;
		txtRecupPassErreur.innerHTML = "Ce champ doit contenir un couriel";
	}

	//Soumettre le formulaire
   if(estValide == true){
      frmRecuperer.submit();
   }
}

//Formulaire préinscription
//@author	Donna
function FormPreinscription(){
	if(event.preventDefault) {
		event.preventDefault;
	} else {
		event.returnValue = false;
	}

	var estValide = true;
	var frmPreInscrition 	= 	document.getElementById('frmPreInscrition');

	//Définir les champs
	var txtCodePerm	=	document.getElementById('txtCodePerm');
	var txtNom		= 	document.getElementById('txtNom');

	//Définir les champs d'erreur
	var txtCodePermErreur	=	document.getElementById('txtCodePermErreur');
	var txtNomErreur	=	document.getElementById('txtNomErreur');

	var aDivErreur 		= 	document.getElementsByClassName('divErreur');

   //Enlever toutes les erreurs
   for(var i = 0; i < aDivErreur.length; i++){
      aDivErreur[i].innerHTML = ‘’;
   }

	//Valider le champs Code permanent
	if(estVide(txtCodePerm.value)) {
		estValide = false;
		txtCodePermErreur.innerHTML = 'Veuillez remplir ce champ';
	} 
	else if(estTexte(txtCodePerm.value) == false) {
		estValide = false;
		txtCodePermErreur.innerHTML = "Ce champ doit contenir du texte";
	}

	//Valider le Nom
	if(estVide(txtNomErreur.value)) {
		estValide = false;
		txtNomErreur.innerHTML = 'Veuillez remplir ce champ';
	} 
	else if(estTexte(txtNomErreur.value) == false) {
		estValide = false;
		txtNomErreur.innerHTML = "Ce champ doit contenir du texte";
	}

	//Soumettre le formulaire
   if(estValide == true){
      frmPreInscrition.submit();
   }
}

//Formulaire inscription
//@author	Donna
function FormInscription(){
	if(event.preventDefault) {
		event.preventDefault;
	} else {
		event.returnValue = false;
	}

	var estValide = true;
	var frmInscription 	= 	document.getElementById('frmInscription');

	//Définir les champs
	var txtInscriptionPrenom	=	document.getElementById('txtInscriptionPrenom');
	var txtInscriptionNom		= 	document.getElementById('txtInscriptionNom');
	var txtInscriptionPseudo	=	document.getElementById('txtInscriptionPseudo');
	var txtInscriptionCourriel	= 	document.getElementById('txtInscriptionCourriel');
	var txtInscriptionMdp1		=	document.getElementById('txtInscriptionMdp1');
	var txtInscriptionMdp2		= 	document.getElementById('txtInscriptionMdp2');

	//Définir les champs d'erreur
	var txtInscriptionPrenomErreur	=	document.getElementById('txtInscriptionPrenomErreur');
	var txtInscriptionNomErreur	=	document.getElementById('txtInscriptionNomErreur');
	var txtInscriptionPseudoErreur	=	document.getElementById('txtInscriptionPseudoErreur');
	var txtInscriptionCourrielErreur	=	document.getElementById('txtInscriptionCourrielErreur');
	var txtInscriptionMdp1Erreur	=	document.getElementById('txtInscriptionMdp1Erreur');
	var txtInscriptionMdp2Erreur	=	document.getElementById('txtInscriptionMdp2Erreur');

	var aDivErreur 		= 	document.getElementsByClassName('divErreur');

   //Enlever toutes les erreurs
   for(var i = 0; i < aDivErreur.length; i++){
      aDivErreur[i].innerHTML = ‘’;
   }

	//Valider le champs Prenom
	if(estVide(txtInscriptionPrenom.value)) {
		estValide = false;
		txtInscriptionPrenomErreur.innerHTML = 'Veuillez remplir ce champ';
	} 
	else if(estTexte(txtInscriptionPrenom.value) == false) {
		estValide = false;
		txtInscriptionPrenomErreur.innerHTML = "Ce champ doit contenir du texte";
	}

	//Valider le champs Nom
	if(estVide(txtInscriptionNom.value)) {
		estValide = false;
		txtInscriptionNomErreur.innerHTML = 'Veuillez remplir ce champ';
	} 
	else if(estTexte(txtInscriptionNom.value) == false) {
		estValide = false;
		txtInscriptionNomErreur.innerHTML = "Ce champ doit contenir du texte";
	}

	//Valider le champs Pseudo
	if(estVide(txtInscriptionPseudo.value)) {
		estValide = false;
		txtInscriptionPseudoErreur.innerHTML = 'Veuillez remplir ce champ';
	} 
	else if(estTexte(txtInscriptionPseudo.value) == false) {
		estValide = false;
		txtInscriptionPseudoErreur.innerHTML = "Ce champ doit contenir du texte";
	}

	//Valider Mot de passe1
	if(estVide(txtInscriptionMdp1.value)) {
		estValide = false;
		txtInscriptionMdp1Erreur.innerHTML = 'Veuillez remplir ce champ';
	} 
	else if(estMotDePasse(txtInscriptionMdp1.value) == false) {
		estValide = false;
		txtInscriptionMdp1Erreur.innerHTML = "Ce champ doit contenir huit caractères ou plus et au moins un chiffre";
	}

	//Valider Mot de passe2
	if(estVide(txtInscriptionMdp2.value)) {
		estValide = false;
		txtInscriptionMdp2Erreur.innerHTML = 'Veuillez remplir ce champ';
	} 
	else if(txtInscriptionMdp2.value != txtInscriptionMdp1.value) {
		estValide = false;
		txtInscriptionMdp2Erreur.innerHTML = "Les mots de passe ne sont pas identiques";
	}


	//Valider le champs couriel
	if(estVide(txtInscriptionCourriel.value)) {
		estValide = false;
		txtInscriptionCourrielErreur.innerHTML = 'Veuillez remplir ce champ';
	} 
	else if(estTexte(txtInscriptionCourriel.value) == false) {
		estValide = false;
		txtInscriptionCourrielErreur.innerHTML = "Ce champ doit contenir du texte";
	}
	else if(estCouriel(txtInscriptionCourriel.value) == false) {
		estValide = false;
		txtInscriptionCourrielErreur.innerHTML = "Ce champ doit être un couriel";
	}

	//Soumettre le formulaire
   if(estValide == true){
      frmPreInscrition.submit();
   }
  }