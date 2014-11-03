/**
 * Validation du formulaires en JavaScript en utilisant les RegExp
 * @author Silvia Popa
 * @version Beta
 * @date 29-10-2014
 */

window.addEventListener('load', function () {

if(document.getElementById('frmCreationVideo')){
   document.getElementById('frmCreationVideo').addEventListener("submit", validerFormCreationVideo);
   // positionner le curseur sur le premier champs
   var txtTitre = document.getElementById('txtTitre');
   txtTitre.focus();
}

if(document.getElementById('frmCreationTexte')){
   document.getElementById('frmCreationTexte').addEventListener("submit", validerFormCreationTexte);
   // positionner le curseur sur le premier champs
   var txtTitre = document.getElementById('txtTitre');
   txtTitre.focus();
}

if(document.getElementById('frmModificationVideo')){
   document.getElementById('frmModificationVideo').addEventListener("submit", validerFormModificationVideo);
   // positionner le curseur sur le premier champs
   var txtTitre = document.getElementById('txtTitre');
   txtTitre.focus();
}

if(document.getElementById('frmModificationTexte')){
   document.getElementById('frmModificationTexte').addEventListener("submit", validerFormModificationTexte);
   // positionner le curseur sur le premier champs
   var txtTitre = document.getElementById('txtTitre');
   txtTitre.focus();
}

});




function validerFormCreationVideo(){
   //Pour empêcher le formulaire de soumettre automatiquement
   if(event.preventDefault){
      event.preventDefault();
   }
   else{
      event.returnValue = false;
   }
	
   var estValide = true;
   var premiereErreur = '';//pour l'utilisation de curseur
   var frmCreationVideo = document.getElementById('frmCreationVideo');

   //Définir les champs
   var txtTitre = document.getElementById('txtTitre');
   var sltMatiere = document.getElementById('sltMatiere');
   var sltNiveau = document.getElementById('sltNiveau');
   var sltEcole = document.getElementById('sltEcole');
   var txtUrl = document.getElementById('txtUrl');
   
   //Définir les champs d’erreur
   var txtTitreErreur = document.getElementById('txtTitreErreur');
   var sltMatiereErreur = document.getElementById('sltMatiereErreur');
   var sltNiveauErreur = document.getElementById('sltNiveauErreur');
   var sltEcoleErreur = document.getElementById('sltEcoleErreur');
   var txtUrlErreur = document.getElementById('txtUrlErreur');
   

   var aDivErreur = document.querySelectorAll('.divErreur');

   //Enlever toutes les erreurs
   for(var i = 0; i < aDivErreur.length; i++){
      aDivErreur[i].innerHTML = '';
   }

   //Valider le titre - le champ avec id =  txtTitre  
   if(estVide(txtTitre.value)){
      estValide = false;
      txtTitreErreur.innerHTML = 'Veuillez remplir ce champ';
	  if(premiereErreur == '')
        {
            premiereErreur = txtTitre;
		}
   }
   else
   if(estTitre(txtTitre.value) == false){
	  txtTitreErreur.innerHTML = 'Ce champ comporte des caractères invalides.';
      
	  if(premiereErreur == '')// gestion du curseur
        {
            premiereErreur = txtTitre;
		}
      estValide = false;
   }   
   
   //Valider sltMatiere  - le choix dans le select de matières
   if(sltMatiere.value == 0){
      estValide = false;
      sltMatiereErreur.innerHTML = 'Veuillez faire une sélection';
	  if(premiereErreur == '')// gestion du curseur
        {
            premiereErreur = sltMatiere;
		}
   }
   
    //Valider sltNiveau  - le choix dans le select de niveaux secondaire
   if(sltNiveau.value == 0){
      estValide = false;
      sltNiveauErreur.innerHTML = 'Veuillez faire une sélection';
	   if(premiereErreur == '')// gestion du curseur
        {
            premiereErreur = sltNiveau;
		}
   }
   
   //Valider sltEcole  - le choix dans le select de écoles
   if(sltEcole.value == 0){
      estValide = false;
      sltEcoleErreur.innerHTML = 'Veuillez faire une sélection';
	  if(premiereErreur == '')// gestion du curseur
        {
            premiereErreur = sltEcole;
		}
   }
   
   //Valider le URL - le champ avec id =  txtUrl  
   if(estVide(txtUrl.value)){
      estValide = false;
      txtUrlErreur.innerHTML = 'Veuillez remplir ce champ';
	  if(premiereErreur == '')
        {
            premiereErreur = txtUrl;
		}
   }
   else
   if(estUrl(txtUrl.value) == false){
	  txtUrlErreur.innerHTML = 'Ce champ comporte des caractères invalides.';
      
	  if(premiereErreur == '')// gestion du curseur
        {
            premiereErreur = txtUrl;
		}
      estValide = false;
   }   

  /* //Valider chkMatiere
   var auMoinsUn = false;
   for(var i = 0; i < aChkMatiere.length; i++){
      if(chkMatiere[i].checked == true){
         auMoinsUn = true;
      }
   }
   if(auMoinsUn == false){
      estValide = false;
      chkMatiereErreur = "*";
   }*/ 

   //Soumettre le formulaire
   if(estValide == true){
      //idDeMonFormulaire.submit();
	  console.log('Formulaire soumis');
	  frmCreationVideo.submit();
   }
   else{
		premiereErreur.focus();
   }
}



function validerFormModificationVideo(){

	//Empêcher le formulaire de soumettre automatiquement
   if(event.preventDefault){
      event.preventDefault();
   }
   else{
      event.returnValue = false;
   }
	
   var estValide = true;
   var premiereErreur = '';//pour l'utilisation de curseur
   var frmModificationVideo = document.getElementById('frmModificationVideo');
   //var frmModificationVideo = document.querySelector('#frmModificationVideo');
   
   //Définir les champs
   var txtTitre = document.getElementById('txtTitre');
   var sltMatiere = document.getElementById('sltMatiere');
   var sltNiveau = document.getElementById('sltNiveau');
   var sltEcole = document.getElementById('sltEcole');
   var txtUrl = document.getElementById('txtUrl');
   
   //Définir les champs d’erreur
   var txtTitreErreur = document.getElementById('txtTitreErreur');
   var sltMatiereErreur = document.getElementById('sltMatiereErreur');
   var sltNiveauErreur = document.getElementById('sltNiveauErreur');
   var sltEcoleErreur = document.getElementById('sltEcoleErreur');
   var txtUrlErreur = document.getElementById('txtUrlErreur');
   
	var aDivErreur = document.querySelectorAll('.divErreur');

   //Enlever toutes les erreurs
   for(var i = 0; i < aDivErreur.length; i++){
      aDivErreur[i].innerHTML = '';
   }

   //Valider le titre - le champ avec id =  txtTitre  
   if(estVide(txtTitre.value)){
      estValide = false;
      txtTitreErreur.innerHTML = 'Veuillez remplir ce champ';
	  if(premiereErreur == '')
        {
            premiereErreur = txtTitre;
		}
   }
   else
   if(estTitre(txtTitre.value) == false){
	  txtTitreErreur.innerHTML = 'Ce champ comporte des caractères invalides.';
      
	  if(premiereErreur == '')// gestion du curseur
        {
            premiereErreur = txtTitre;
		}
      estValide = false;
   }   
   
   //Valider sltMatiere  - le choix dans le select de matières
	if(sltMatiere.value == 0){
      estValide = false;
      sltMatiereErreur.innerHTML = 'Veuillez faire une sélection';
	  if(premiereErreur == '')// gestion du curseur
        {
            premiereErreur = sltMatiere;
		}
   }
   
    //Valider sltNiveau  - le choix dans le select de niveaux secondaire
   if(sltNiveau.value == 0){
      estValide = false;
      sltNiveauErreur.innerHTML = 'Veuillez faire une sélection';
	   if(premiereErreur == '')// gestion du curseur
        {
            premiereErreur = sltNiveau;
		}
   }
   
   //Valider sltEcole  - le choix dans le select de écoles
   if(sltEcole.value == 0){
      estValide = false;
      sltEcoleErreur.innerHTML = 'Veuillez faire une sélection';
	  if(premiereErreur == '')// gestion du curseur
        {
            premiereErreur = sltEcole;
		}
   }
   
   //Valider le URL - le champ avec id =  txtUrl  
   if(estVide(txtUrl.value)){
      estValide = false;
      txtUrlErreur.innerHTML = 'Veuillez remplir ce champ';
	  if(premiereErreur == '')
        {
            premiereErreur = txtUrl;
		}
   }
   else
   if(estUrl(txtUrl.value) == false){
	  txtUrlErreur.innerHTML = 'Ce champ comporte des caractères invalides.';
      
	  if(premiereErreur == '')// gestion du curseur
        {
            premiereErreur = txtUrl;
		}
      estValide = false;
   }
	
	//Soumettre le formulaire
   if(estValide == true){
      //idDeMonFormulaire.submit();
	  //console.log('Formulaire soumis');
	  console.log(frmModificationVideo);
	  frmModificationVideo.submit();
   }
   else{
		premiereErreur.focus();
   }

}


function validerFormCreationTexte() {

	//Empêcher le formulaire de soumettre automatiquement
   if(event.preventDefault){
      event.preventDefault();
   }
   else{
      event.returnValue = false;
   }
	
   var estValide = true;
   var premiereErreur = '';//pour l'utilisation de curseur
   var frmCreationTexte = document.getElementById('frmCreationTexte');
   
   //Définir les champs
   var txtTitre = document.getElementById('txtTitre');
   var sltMatiere = document.getElementById('sltMatiere');
   var sltNiveau = document.getElementById('sltNiveau');
   var sltEcole = document.getElementById('sltEcole');
   var tarContenu = document.getElementById('tarContenu');
   
   //Définir les champs d’erreur
   var txtTitreErreur = document.getElementById('txtTitreErreur');
   var sltMatiereErreur = document.getElementById('sltMatiereErreur');
   var sltNiveauErreur = document.getElementById('sltNiveauErreur');
   var sltEcoleErreur = document.getElementById('sltEcoleErreur');
   var tarContenuErreur = document.getElementById('tarContenuErreur');
   
	var aDivErreur = document.querySelectorAll('.divErreur');

   //Enlever toutes les erreurs
   for(var i = 0; i < aDivErreur.length; i++){
      aDivErreur[i].innerHTML = '';
   }
   
   //Valider le titre - le champ avec id =  txtTitre  
   if(estVide(txtTitre.value)){
      estValide = false;
      txtTitreErreur.innerHTML = 'Veuillez remplir ce champ';
	  if(premiereErreur == '')
        {
            premiereErreur = txtTitre;
		}
   }
   else
   if(estTitre(txtTitre.value) == false){
	  txtTitreErreur.innerHTML = 'Ce champ comporte des caractères invalides.';
      
	  if(premiereErreur == '')// gestion du curseur
        {
            premiereErreur = txtTitre;
		}
      estValide = false;
   }   
   
   //Valider sltMatiere  - le choix dans le select de matières
	if(sltMatiere.value == 0){
      estValide = false;
      sltMatiereErreur.innerHTML = 'Veuillez faire une sélection';
	  if(premiereErreur == '')// gestion du curseur
        {
            premiereErreur = sltMatiere;
		}
   }
   
    //Valider sltNiveau  - le choix dans le select de niveaux secondaire
   if(sltNiveau.value == 0){
      estValide = false;
      sltNiveauErreur.innerHTML = 'Veuillez faire une sélection';
	   if(premiereErreur == '')// gestion du curseur
        {
            premiereErreur = sltNiveau;
		}
   }
   
   //Valider sltEcole  - le choix dans le select de écoles
   if(sltEcole.value == 0){
      estValide = false;
      sltEcoleErreur.innerHTML = 'Veuillez faire une sélection';
	  if(premiereErreur == '')// gestion du curseur
        {
            premiereErreur = sltEcole;
		}
   }
   
   //Valider le textarea - le champ avec id="tarContenu"  
   if(estVide(tarContenu.value)){
      estValide = false;
      tarContenuErreur.innerHTML = 'Veuillez remplir ce champ';
	  if(premiereErreur == '')
        {
            premiereErreur = tarContenu;
		}
   }
   else
   if(estTitre(tarContenu.value) == false){
	  tarContenuErreur.innerHTML = 'Ce champ comporte des caractères invalides.';
      
	  if(premiereErreur == '')// gestion du curseur
        {
            premiereErreur = tarContenu;
		}
      estValide = false;
   }
	
	//Soumettre le formulaire
   if(estValide == true){
      //idDeMonFormulaire.submit();
	  //console.log('Formulaire soumis');
	  console.log(frmCreationTexte);
	  frmCreationTexte.submit();
   }
   else{
		premiereErreur.focus();
   }

}



function validerFormModificationTexte() {

	//Empêcher le formulaire de soumettre automatiquement
   if(event.preventDefault){
      event.preventDefault();
   }
   else{
      event.returnValue = false;
   }
	
   var estValide = true;
   var premiereErreur = '';//pour l'utilisation de curseur
   var frmModificationTexte = document.getElementById('frmModificationTexte');
   
   //Définir les champs
   var txtTitre = document.getElementById('txtTitre');
   var sltMatiere = document.getElementById('sltMatiere');
   var sltNiveau = document.getElementById('sltNiveau');
   var sltEcole = document.getElementById('sltEcole');
   var tarContenu = document.getElementById('tarContenu');
   
   //Définir les champs d’erreur
   var txtTitreErreur = document.getElementById('txtTitreErreur');
   var sltMatiereErreur = document.getElementById('sltMatiereErreur');
   var sltNiveauErreur = document.getElementById('sltNiveauErreur');
   var sltEcoleErreur = document.getElementById('sltEcoleErreur');
   var tarContenuErreur = document.getElementById('tarContenuErreur');
   
	var aDivErreur = document.querySelectorAll('.divErreur');

   //Enlever toutes les erreurs
   for(var i = 0; i < aDivErreur.length; i++){
      aDivErreur[i].innerHTML = '';
   }
   
   //Valider le titre - le champ avec id =  txtTitre  
   if(estVide(txtTitre.value)){
      estValide = false;
      txtTitreErreur.innerHTML = 'Veuillez remplir ce champ';
	  if(premiereErreur == '')
        {
            premiereErreur = txtTitre;
		}
   }
   else
   if(estTitre(txtTitre.value) == false){
	  txtTitreErreur.innerHTML = 'Ce champ comporte des caractères invalides.';
      
	  if(premiereErreur == '')// gestion du curseur
        {
            premiereErreur = txtTitre;
		}
      estValide = false;
   }   
   
   //Valider sltMatiere  - le choix dans le select de matières
	if(sltMatiere.value == 0){
      estValide = false;
      sltMatiereErreur.innerHTML = 'Veuillez faire une sélection';
	  if(premiereErreur == '')// gestion du curseur
        {
            premiereErreur = sltMatiere;
		}
   }
   
    //Valider sltNiveau  - le choix dans le select de niveaux secondaire
   if(sltNiveau.value == 0){
      estValide = false;
      sltNiveauErreur.innerHTML = 'Veuillez faire une sélection';
	   if(premiereErreur == '')// gestion du curseur
        {
            premiereErreur = sltNiveau;
		}
   }
   
   //Valider sltEcole  - le choix dans le select de écoles
   if(sltEcole.value == 0){
      estValide = false;
      sltEcoleErreur.innerHTML = 'Veuillez faire une sélection';
	  if(premiereErreur == '')// gestion du curseur
        {
            premiereErreur = sltEcole;
		}
   }
   
   //Valider le textarea - le champ avec id="tarContenu"  
   if(estVide(tarContenu.value)){
      estValide = false;
      tarContenuErreur.innerHTML = 'Veuillez remplir ce champ';
	  if(premiereErreur == '')
        {
            premiereErreur = tarContenu;
		}
   }
   else
   if(estHTML(tarContenu.value) == false){
    tarContenuErreur.innerHTML = 'Ce champ comporte des caractères ou des balises invalides.';
      
    if(premiereErreur == '')// gestion du curseur
        {
            premiereErreur = tarContenu;
    }
      estValide = false;
   }
	
	//Soumettre le formulaire
   if(estValide == true){
	  //console.log('Formulaire soumis');
	  //console.log(frmModificationTexte);
	  frmModificationTexte.submit();
   }
   else{
		premiereErreur.focus();
   }

}

tinymce.init({
   selector: "textarea",
   toolbar: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | blockquote | bullist numlist | styleselect",
   style_formats: [
     {title: 'Titre', block: 'h1'},
     {title: 'Sous-titre', block: 'h2'}
   ],
   menubar : false,
   browser_spellcheck : true,
   language : 'fr_FR'
});