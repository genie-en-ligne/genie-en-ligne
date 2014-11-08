/**
 * Validation du formulaires en JavaScript en utilisant les RegExp
 * @author Maxime Gaillard
 * @version Beta
 * @date 29-10-2014
 */

window.addEventListener('load', function () {

	if(document.getElementById('frmLogin')) {
		document.getElementById('frmLogin').addEventListener('submit', validerFrmLogin);
	}

	if(document.getElementById('frmProfilUtilisateur')) {
		document.getElementById('frmProfilUtilisateur').addEventListener('submit', validerFrmModifierProfil);
	}

	if(document.getElementById('frmPreInscription')) {
		document.getElementById('frmPreInscription').addEventListener('submit', validerFrmPreinscription);
	}

	if(document.getElementById('frmInscription')) {
		document.getElementById('frmInscription').addEventListener('submit', validerFrmInscription);
		document.getElementById('txtPseudo').addEventListener('keyup', validerDispoPseudo);
	}

	if(document.getElementById('frmRecuperMdp')) {
		document.getElementById('frmRecuperMdp').addEventListener('submit', validerFrmRecuperMotsDePasse);
	}

	if(document.getElementById('frmMessage')) {
		document.getElementById('frmMessage').addEventListener('submit', validerFrmSignaliserUnProbleme);
	}
});

//Formulaire de login
function validerFrmLogin() {

	//empêcher le formulaire de soumettre automatiquemenet
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	//var premiereErreur 	= 	'';

	//Valeur par défaut du formulaire
	var estValide 			= 	true;

	//Cible de la méthode submit 
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
	else if(!estPseudo(txtPseudo.value)) {
		estValide = false;
		txtPseudoErreur.innerHTML = "Le pseudo est invalide";
	}

	//Valider Mot de passe
	if(estVide(pwdPass.value)) {
		estValide = false;
		pwdPassErreur.innerHTML = "Veuillez remplir ce champ";
	}
	/*else if(!estMotDePasse(pwdPass.value)) {
		estValide = false;
		pwdPassErreur.innerHTML = "Le mot de passe est invalide";
	}*/

	//Soumettre le formulaire 
	if(estValide == true) {
		frmLogin.submit();
	}
}

//Formulaire de modification de profil
function validerFrmModifierProfil() {

	//Prévenir l'envoie automatique du formulaire
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	//Valeur par défaut du formulaire
	var estValide 			= 	true;

	//Cible de la méthode submit 
	var frmProfilUtilateur 	= 	document.getElementById('frmProfilUtilisateur');

	//Définir les champs
	/*var txtPseudo 		=	document.getElementById('txtPseudo');*/
	var pwdPass1 			=	document.getElementById('pwdPass1');
	var pwdPass2 			= 	document.getElementById('pwdPass2');

	//Définir les champs d'erreur
	/*var txtPseudoErreur		=	document.getElementById('txtPseudoErreur');*/
	var pwdPass1Erreur		=	document.getElementById('pwdPass1Erreur');
	var pwdPass2Erreur		=	document.getElementById('pwdPass2Erreur');

	var aDivErreur 			= 	document.getElementsByClassName('divErreur');

	for(var i = 0; i < aDivErreur.length; i++) {
		aDivErreur[i].innerHTML = "";	
	}

	//Valider pseudo
	/*if(estVide(txtPseudo.value)) {
		estValide = false;
		txtPseudoErreur.innerHTML = "Veuillez remplir ce champ";
	}
	else if(estPseudo(txtPseudo.value)) {
		estValide = false;
		txtPseudoErreur.innerHTML = "Le pseudo est invalide";
	}*/

	//Valider Mot de passe1
	if(estVide(pwdPass1.value)) {
		estValide = false;
		pwdPass1Erreur.innerHTML = "Veuillez remplir ce champ";
	} 
	else if(estMotDePasse(pwdPass1.value) == false) {
		estValide = false;
		pwdPass1Erreur.innerHTML = "Le mot de passe est invalide";
	}

	//Comparer les mots de passes
	if(pwdPass1.value != pwdPass2.value) {
		estValide = false;
		pwdPass2Erreur.innerHTML = "Les mots de passe ne sont pas identiques";
	}

	if(estValide == true){

	  frmProfilUtilateur.submit();
   }
}

//Formulaire pour signaler un problème
function validerFrmSignaliserUnProbleme(){
	
	//Prévenir l'envoie automatique du formulaire
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	//Valeur par défaut du formulaire
	var estValide 				= true;

	//Cible de la méthode submit 
	var frmMessage 				= 	document.getElementById('frmMessage');

	//Définir les champs
	var emlCourriel				=	document.getElementById('emlCourriel');
	var txtCommentaire			= 	document.getElementById('txtCommentaire');

	//Définir les champs d'erreur
	var txtCommentaireErreur	=	document.getElementById('txtCommentaireErreur');
	var emlCourrielErreur		=	document.getElementById('emlCourrielErreur');

	var aDivErreur 				= 	document.getElementsByClassName('divErreur');

   //Enlever toutes les erreurs
   for(var i = 0; i < aDivErreur.length; i++){
      aDivErreur[i].innerHTML = '';
   }

	//Valider le commentaire
	if(estVide(txtCommentaire.value)) {
		estValide = false;
		txtCommentaireErreur.innerHTML = 'Veuillez remplir ce champ';
	} 

	//Valider le champs couriel
	if(estVide(emlCourriel.value)) {
		estValide = false;
		emlCourrielErreur.innerHTML = 'Veuillez remplir ce champ';
	} 
	else if(estCourriel(emlCourriel.value) == false) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Le courriel est invalide";
	}

	//Soumettre le formulaire
   if(estValide == true){
      frmMessage.submit();
   }
}

//Formulaire de récupération du mot de passe
function validerFrmRecuperMotsDePasse(){
	
	//Prévenir l'envoie automatique du formulaire
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	//Valeur par défaut du formulaire
	var estValide 			= 	true;

	//Cible de la méthode submit 
	var frmRecuperMdp 		= 	document.getElementById('frmRecuperMdp');

	//Définir les champs
	var emlCourriel			=	document.getElementById('emlCourriel');

	//Définir les champs d'erreur
	var emlCourrielErreur	=	document.getElementById('emlCourrielErreur');

	var aDivErreur 			= 	document.getElementsByClassName('divErreur');

   //Enlever toutes les erreurs
   for(var i = 0; i < aDivErreur.length; i++){
      aDivErreur[i].innerHTML = '';
   }

	//Valider le champs couriel
	if(estVide(emlCourriel.value)) {
		estValide = false;
		emlCourrielErreur.innerHTML = 'Veuillez remplir ce champ';
	} 
	else if(estCourriel(emlCourriel.value) == false) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Le courriel est invalide";
	}

	//Soumettre le formulaire
   if(estValide == true){
      frmRecuperMdp.submit();
   }
}



//Formulaire de préinscription
function validerFrmPreinscription(){

	//Prévenir l'envoie automatique du formulaire
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	//Valeur par défaut du formulaire
	var estValide 			= 	true;

	//Cible de la méthode submit 
	var frmPreInscription 	= 	document.getElementById('frmPreInscription');

	//Définir les champs
	var txtCodePerm			=	document.getElementById('txtCodePerm');
	var txtNom				= 	document.getElementById('txtNom');

	//Définir les champs d'erreur
	var txtCodePermErreur	=	document.getElementById('txtCodePermErreur');
	var txtNomErreur		=	document.getElementById('txtNomErreur');

	var aDivErreur 			= 	document.getElementsByClassName('divErreur');

   //Enlever toutes les erreurs
   for(var i = 0; i < aDivErreur.length; i++){
      aDivErreur[i].innerHTML = '';
   }

	//Valider le champs Code permanent
	if(estVide(txtCodePerm.value)) {
		estValide = false;
		txtCodePermErreur.innerHTML = 'Veuillez remplir ce champ';
	} 
	
	//Valider le Nom
	if(estVide(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = 'Veuillez remplir ce champ';
	} 
	else if(estNom(txtNom.value) == false) {
		estValide = false;
		txtNomErreur.innerHTML = "Le nom est invalide";
	}

	//Soumettre le formulaire
   if(estValide == true){
      frmPreInscription.submit();
   }
}


//Formulaire ¸d'inscription
function validerFrmInscription(){
	
	//Prévenir l'envoie automatique du formulaire
	if(event.preventDefault()) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	//Valeur par défaut du formulaire
	var estValide 			= 	true;

	//Cible de la méthode submit 
	var frmInscription 		= 	document.getElementById('frmInscription');

	//Définir les champs
	var txtPrenom			=	document.getElementById('txtPrenom');
	var txtNom				= 	document.getElementById('txtNom');
	var txtPseudo			=	document.getElementById('txtPseudo');
	var emlCourriel			= 	document.getElementById('emlCourriel');
	var pwdMdp1				=	document.getElementById('pwdMdp1');
	var pwdMdp2				= 	document.getElementById('pwdMdp2');

	//Définir les champs d'erreur
	var txtPrenomErreur		=	document.getElementById('txtPrenomErreur');
	var txtNomErreur		=	document.getElementById('txtNomErreur');
	var txtPseudoErreur		=	document.getElementById('txtPseudoErreur');
	var emlCourrielErreur	=	document.getElementById('emlCourrielErreur');
	var pwdMdp1Erreur		=	document.getElementById('pwdMdp1Erreur');
	var txtMdp2Erreur		=	document.getElementById('pwdMdp2Erreur');

	var aDivErreur 			= 	document.getElementsByClassName('divErreur');

   //Enlever toutes les erreurs
   	for(var i = 0; i < aDivErreur.length; i++){
      	aDivErreur[i].innerHTML = '';
   	}

	//Valider le Prenom
	if(estVide(txtPrenom.value)) {
		estValide = false;
		txtPrenomErreur.innerHTML = 'Veuillez remplir ce champ';
	} 
	else if(estNom(txtPrenom.value) == false) {
		estValide = false;
		txtPrenomErreur.innerHTML = "Le prénom est invalide";
	}

	//Valider le Nom
	if(estVide(txtNom.value)) {
		estValide = false;
		txtNomErreur.innerHTML = 'Veuillez remplir ce champ';
	} 
	else if(estNom(txtNom.value) == false) {
		estValide = false;
		txtNomErreur.innerHTML = "Le nom est invalide";
	}

	//Valider le Pseudo
	if(estVide(txtPseudo.value)) {
		estValide = false;
		txtPseudoErreur.innerHTML = 'Veuillez remplir ce champ';
	} 
	else if(estPseudo(txtPseudo.value) == false) {
		estValide = false;
		txtPseudoErreur.innerHTML = "Le pseudo est invalide";
	}

	//Valider le courriel
	if(estVide(emlCourriel.value)) {
		estValide = false;
		emlCourrielErreur.innerHTML = 'Veuillez remplir ce champ';
	}
	else if(estCourriel(emlCourriel.value) == false) {
		estValide = false;
		emlCourrielErreur.innerHTML = "Le courriel est invalide";
	}

	//Valider Mot de passe1
	if(estVide(pwdMdp1.value)) {
		estValide = false;
		pwdMdp1Erreur.innerHTML = 'Veuillez remplir ce champ';
	} 
	else if(!estMotDePasse(pwdMdp1.value)) {
		estValide = false;
		pwdMdp1Erreur.innerHTML = "Le mot de passe est invalide";
	}

	//Valider Mot de passe2
	if(estVide(pwdMdp2.value)) {
		estValide = false;
		pwdMdp2Erreur.innerHTML = 'Veuillez remplir ce champ';
	} 
	else if(pwdMdp2.value != pwdMdp1.value) {
		estValide = false;
		pwdMdp2Erreur.innerHTML = "Les mots de passe ne sont pas identiques";
	}

	//Soumettre le formulaire
   	if(estValide == true){
      	frmInscription.submit();
   	}
}


function validerDispoPseudo(){
	var txtPseudo = document.getElementById('txtPseudo');

	if(txtPseudo.value != ''){
		var xmlhttp = new XMLHttpRequest();
		var url = WEB_ROOT + "/ControleurAJAX.php?module=utilisateur&action=validerPseudo&id="+txtPseudo.value;

		xmlhttp.onreadystatechange = function() {
		    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		        var sRes = JSON.parse(xmlhttp.responseText);
		        gererRes(sRes);
		    }
		}
		xmlhttp.open("GET", url, true);
		xmlhttp.send();
	}
	else{
		gererRes('');
	}
}

function gererRes(sRes) {
	var txtPseudo = document.getElementById('txtPseudo');
	var txtPseudoErreur = document.getElementById('txtPseudoErreur');

    if(sRes.disponible == "oui"){
    	txtPseudo.classList.remove('non-dispo');
    	txtPseudo.classList.add('dispo');

    	txtPseudoErreur.innerHTML = '';
    }	    
    else{
    	txtPseudo.classList.remove('dispo');
    	txtPseudo.classList.add('non-dispo');

    	txtPseudoErreur.innerHTML = "Ce pseudo n'est pas disponible";
    }
}