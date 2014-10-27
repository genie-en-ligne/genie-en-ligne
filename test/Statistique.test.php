		<div id="header">
			<h1>Test - Modèles Statistiques</h1>
		</div>
		<div id="contenu">
			<?php 
                // Placer vos tests unitaires ici...
                /* La classe à tester */
				
            ?>
			<div class="panel panel-primary col-xs-12">
                <div class="panel-heading">
                    Test de la classe Statistique (Statistique.class.php)
                </div>
                 <div class="panel-body">
			<h2>rechercherNbVisitesParMois($user_id) => integer 25</h2>
				<?php 
				
					try{
						$oStatistique = new Statistique();
						$oStatistique->rechercherNbVisitesParMois(25);
						
					}catch(Exception $e){
						echo "<p>".$e->getMessage()."</p>";
					}
				
				?>
				
				
			<h2>rechercherNbVisitesParMois($user_id) => chaine "Silvia"</h2>
				<?php 
				
					try{
						$oStatistique = new Statistique();
						$oStatistique->rechercherNbVisitesParMois("Silvia");
						
					}catch(Exception $e){
						echo "<p>".$e->getMessage()."</p>";
					}
				
				?>
				<br/>
				<h2>rechercherNbTutoratsCrees($commmission_ID) => integer 25</h2>
				<?php 
				
					try{
						$oStatistique = new Statistique();
						$oStatistique->rechercherNbTutoratsCrees(25);
						
					}catch(Exception $e){
						echo "<p>".$e->getMessage()."</p>";
					}
				
				?>
				
				
			<h2>rechercherNbTutoratsCrees($commmission_ID) => chaine "Silvia"</h2>
				<?php 
				
					try{
						$oStatistique = new Statistique();
						$oStatistique->rechercherNbTutoratsCrees("Silvia");
						
					}catch(Exception $e){
						echo "<p>".$e->getMessage()."</p>";
					}
				
				?>
				<br/>
				<h2>rechercherNbTutoratsApprouves($commission_ID) => integer 30</h2>
				<?php 
				
					try{
						$oStatistique = new Statistique();
						$oStatistique->rechercherNbTutoratsApprouves(30);
						
					}catch(Exception $e){
						echo "<p>".$e->getMessage()."</p>";
					}
				
				?>
				
				
			<h2>rechercherNbTutoratsApprouves($commission_ID) => chaine "Silvia"</h2>
				<?php 
				
					try{
						$oStatistique = new Statistique();
						$oStatistique->rechercherNbTutoratsApprouves("Silvia");
						
					}catch(Exception $e){
						echo "<p>".$e->getMessage()."</p>";
					}
				
				?>
				<br/>
				<h2>rechercherNbTuteursConversation($iEleveId) => integer 1</h2>
				<?php 
				
					try{
						$oStatistique = new Statistique();
						$oStatistique->rechercherNbTuteursConversation(1);
						
					}catch(Exception $e){
						echo "<p>".$e->getMessage()."</p>";
					}
				
				?>
				
				
			<h2>rechercherNbTuteursConversation($iEleveId) => chaine "Silvia"</h2>
				<?php 
				
					try{
						$oStatistique = new Statistique();
						$oStatistique->rechercherNbTuteursConversation("Silvia");
						
					}catch(Exception $e){
						echo "<p>".$e->getMessage()."</p>";
					}
				
				?>
				<br/>
				<h2>rechercherNbElevesConversation($iTuteurId) => integer 5</h2>
				<?php 
				
					try{
						$oStatistique = new Statistique();
						$oStatistique->rechercherNbElevesConversation(5);
						
					}catch(Exception $e){
						echo "<p>".$e->getMessage()."</p>";
					}
				
				?>
				
				
			<h2>rechercherNbElevesConversation($iTuteurId) => chaine "Silvia"</h2>
				<?php 
				
					try{
						$oStatistique = new Statistique();
						$oStatistique->rechercherNbElevesConversation("Silvia");
						
					}catch(Exception $e){
						echo "<p>".$e->getMessage()."</p>";
					}
				
				?>
				<br/>
				<h2>rechercherNbTuteursParEcole($ecole_ID) => integer 25</h2>
				<?php 
				
					try{
						$oStatistique = new Statistique();
						$oStatistique->rechercherNbTuteursParEcole(25);
						
					}catch(Exception $e){
						echo "<p>".$e->getMessage()."</p>";
					}
				
				?>
				
				
			<h2>rechercherNbTuteursParEcole($ecole_ID) => chaine "Silvia"</h2>
				<?php 
				
					try{
						$oStatistique = new Statistique();
						$oStatistique->rechercherNbTuteursParEcole("Silvia");
						
					}catch(Exception $e){
						echo "<p>".$e->getMessage()."</p>";
					}
				
				?>
				<br/>
				<h2>rechercherNbProfsParEcole($ecole_ID) => integer 25</h2>
				<?php 
				
					try{
						$oStatistique = new Statistique();
						$oStatistique->rechercherNbProfsParEcole(25);
						
					}catch(Exception $e){
						echo "<p>".$e->getMessage()."</p>";
					}
				
				?>
				
				
			<h2>rechercherNbProfsParEcole($ecole_ID) => chaine "Silvia"</h2>
				<?php 
				
					try{
						$oStatistique = new Statistique();
						$oStatistique->rechercherNbProfsParEcole("Silvia");
						
					}catch(Exception $e){
						echo "<p>".$e->getMessage()."</p>";
					}
				
				?>
				<br/>
				<h2>rechercherNbElevesParEcole($ecole_ID) => integer 25</h2>
				<?php 
				
					try{
						$oStatistique = new Statistique();
						$oStatistique->rechercherNbElevesParEcole(25);
						
					}catch(Exception $e){
						echo "<p>".$e->getMessage()."</p>";
					}
				
				?>
				
				
			<h2>rechercherNbElevesParEcole($ecole_ID) => chaine "Silvia"</h2>
				<?php 
				
					try{
						$oStatistique = new Statistique();
						$oStatistique->rechercherNbElevesParEcole("Silvia");
						
					}catch(Exception $e){
						echo "<p>".$e->getMessage()."</p>";
					}
				
				?>
				<br/>
				<h2>rechercherNbTutorielsParEcole($ecole_ID) => integer 25</h2>
				<?php 
				
					try{
						$oStatistique = new Statistique();
						$oStatistique->rechercherNbTutorielsParEcole(25);
						
					}catch(Exception $e){
						echo "<p>".$e->getMessage()."</p>";
					}
				
				?>
				
				
			<h2>rechercherNbTutorielsParEcole($ecole_ID) => chaine "Silvia"</h2>
				<?php 
				
					try{
						$oStatistique = new Statistique();
						$oStatistique->rechercherNbTutorielsParEcole("Silvia");
						
					}catch(Exception $e){
						echo "<p>".$e->getMessage()."</p>";
					}
				
				?>
				
				<br/>
				<h2>rechercherNbTutoratsParMatiere($tuteur_ID, $mois) => integer (25, 12)</h2>
				<?php 
				
					try{
						$oStatistique = new Statistique();
						$oStatistique->rechercherNbTutoratsParMatiere(25, 12);
						
					}catch(Exception $e){
						echo "<p>".$e->getMessage()."</p>";
					}
				
				?>
				
				<h2>rechercherNbTutoratsParMatiere($tuteur_ID, $mois) => integer (25, 30)</h2>
				<?php 
				
					try{
						$oStatistique = new Statistique();
						$oStatistique->rechercherNbTutoratsParMatiere(25, 30);
						
					}catch(Exception $e){
						echo "<p>".$e->getMessage()."</p>";
					}
				
				?>
				
				
			<h2>rechercherNbTutoratsParMatiere($tuteur_ID, $mois) => chaine "Silvia"</h2>
				<?php 
				
					try{
						$oStatistique = new Statistique();
						$oStatistique->rechercherNbTutoratsParMatiere("Silvia", "12");
						
					}catch(Exception $e){
						echo "<p>".$e->getMessage()."</p>";
					}
				
				?>
				
				<br/>
				<h2>rechercherNbTutoratsApprouvesParProf($prof_ID, $mois) => integer (25, 2)</h2>
				<?php 
				
					try{
						$oStatistique = new Statistique();
						$oStatistique->rechercherNbTutoratsApprouvesParProf(25, 2);
						
					}catch(Exception $e){
						echo "<p>".$e->getMessage()."</p>";
					}
				
				?>
				
				<h2>rechercherNbTutoratsApprouvesParProf($prof_ID, $mois) => integer (25, 30)</h2>
				<?php 
				
					try{
						$oStatistique = new Statistique();
						$oStatistique->rechercherNbTutoratsApprouvesParProf(25, 30);
						
					}catch(Exception $e){
						echo "<p>".$e->getMessage()."</p>";
					}
				
				?>
				
				
			<h2>rechercherNbTutoratsApprouvesParProf($prof_ID, $mois) => chaine ("Silvia", "12")</h2>
				<?php 
				
					try{
						$oStatistique = new Statistique();
						$oStatistique->rechercherNbTutoratsApprouvesParProf("Silvia", "12");
						
					}catch(Exception $e){
						echo "<p>".$e->getMessage()."</p>";
					}
				
				?>
            </div>
        </div>
<!-- ========================================================================= -->            
            <div class="panel panel-primary col-xs-12">
                <div class="panel-heading">
                    Test de la vue afficheStatsPersonnellesEleve()
                </div>
                 <div class="panel-body">
                    <?php    
                        $aDonnees = array(
                                        array('Aoû', 10), 
                                        array('Sep', 5), 
                                        array('Oct', 9), 
                                        array('Nov', 15), 
                                        array('Déc', 12),
                                        array('Jan', 7), 
                                        array('Fév', 9), 
                                        array('Mar', 0), 
                                        array('Avr', 12),
                                        array('Mai', 7), 
                                        array('Jui', 9)
                                    );


                         $aDonnees2 = array(
                                        array('Aoû', 0), 
                                        array('Sep', 1), 
                                        array('Oct', 3), 
                                        array('Nov', 2), 
                                        array('Déc', 0),
                                        array('Jan', 5), 
                                        array('Fév', 9), 
                                        array('Mar', 15), 
                                        array('Avr', 12),
                                        array('Mai', 7), 
                                        array('Jui', 9)
                                    );


                         $aDonnees3 = array(
                                        array('Aoû', 7), 
                                        array('Sep', 7), 
                                        array('Oct', 9), 
                                        array('Nov', 15), 
                                        array('Déc', 12),
                                        array('Jan', 7), 
                                        array('Fév', 9), 
                                        array('Mar', 15), 
                                        array('Avr', 12),
                                        array('Mai', 7), 
                                        array('Jui', 9)
                                    );


                        $oVue = new StatistiqueVue();

                        $oVue->hGraphiqueVisitesParMois = $oVue->genererGraphique('test', 300, 1000, $aDonnees);
                        $oVue->hGraphiqueTuteursParMois = $oVue->genererGraphique('test2', 300, 555, $aDonnees2);
                        $oVue->hGraphiqueTempsParMois = $oVue->genererGraphique('test3', 300, 555, $aDonnees3);

                        $oVue->afficheStatsPersonnellesEleve();
                    ?>
                </div>            

                <div class="panel-body">
                    <?php    



                    ?>
                </div>
            </div>
<!-- =========================================================================================== -->
            <div class="panel panel-primary col-xs-12">
                <div class="panel-heading">
                    Test de la vue afficheStatsPersonnellesTuteur()
                </div>
                 <div class="panel-body">
                    <?php    
                        $aDonnees4 = array(
                                        array('Aoû', 1), 
                                        array('Sep', 3), 
                                        array('Oct', 5), 
                                        array('Nov', 2), 
                                        array('Déc', 12),
                                        array('Jan', 5), 
                                        array('Fév', 8), 
                                        array('Mar', 0), 
                                        array('Avr', 12),
                                        array('Mai', 7), 
                                        array('Jui', 9)
                                    );


                         $aDonnees5 = array(
                                        array('Aoû', 0), 
                                        array('Sep', 1), 
                                        array('Oct', 3), 
                                        array('Nov', 2), 
                                        array('Déc', 0),
                                        array('Jan', 5), 
                                        array('Fév', 9), 
                                        array('Mar', 15), 
                                        array('Avr', 12),
                                        array('Mai', 7), 
                                        array('Jui', 9)
                                    );


                         $aDonnees6 = array(
                                        array('Aoû', 7), 
                                        array('Sep', 7), 
                                        array('Oct', 9), 
                                        array('Nov', 15), 
                                        array('Déc', 12),
                                        array('Jan', 7), 
                                        array('Fév', 9), 
                                        array('Mar', 15), 
                                        array('Avr', 12),
                                        array('Mai', 7), 
                                        array('Jui', 9)
                                    );


                        $oVue = new StatistiqueVue();

                        $oVue->hGraphiqueVisitesTuteurParMois = $oVue->genererGraphique('test4', 300, 555, $aDonnees4);
                        $oVue->hGraphiqueElevesParMois = $oVue->genererGraphique('test5', 300, 555, $aDonnees5);
                        $oVue->hGraphiqueTutosMatiere = $oVue->genererGraphique('test6', 300, 555, $aDonnees6);

                        $oVue->afficheStatsPersonnellesTuteur();
                    ?>
                </div>            

                <div class="panel-body">
                    <?php    



                    ?>
                </div>
            </div>
 <!-- ============================================================================================= -->
             <div class="panel panel-primary col-xs-12">
                <div class="panel-heading">
                    Test de la vue afficheStatsPersonnellesProfesseur()
                </div>
                 <div class="panel-body">
                    <?php    
                        $aDonnees7 = array(
                                        array('Aoû', 1), 
                                        array('Sep', 3), 
                                        array('Oct', 5), 
                                        array('Nov', 2), 
                                        array('Déc', 12),
                                        array('Jan', 5), 
                                        array('Fév', 8), 
                                        array('Mar', 0), 
                                        array('Avr', 12),
                                        array('Mai', 7), 
                                        array('Jui', 9)
                                    );


                         $aDonnees8 = array(
                                        array('Aoû', 0), 
                                        array('Sep', 1), 
                                        array('Oct', 3), 
                                        array('Nov', 2), 
                                        array('Déc', 0),
                                        array('Jan', 5), 
                                        array('Fév', 9), 
                                        array('Mar', 15), 
                                        array('Avr', 12),
                                        array('Mai', 7), 
                                        array('Jui', 9)
                                    );


                        $oVue = new StatistiqueVue();

                        $oVue->hGraphiqueVisitesProfParMois = $oVue->genererGraphique('test7', 300, 555, $aDonnees7);
                        $oVue->hGraphiqueTutosApprouves = $oVue->genererGraphique('test8', 300, 555, $aDonnees8);

                        $oVue->afficheStatsPersonnellesProfesseur();
                    ?>
                </div>            

            </div>
 <!-- ============================================================================================= -->
            <div class="panel panel-primary col-xs-12">
                <div class="panel-heading">
                    Test de la vue afficheStatsGeneralesPourEcole() - (pour superadmin)
                </div>
                 <div class="panel-body">
                    <?php    
                         $aDonnees9 = array(
                                        array('Aoû', 1), 
                                        array('Sep', 3), 
                                        array('Oct', 5), 
                                        array('Nov', 2), 
                                        array('Déc', 12),
                                        array('Jan', 5), 
                                        array('Fév', 8), 
                                        array('Mar', 0), 
                                        array('Avr', 12),
                                        array('Mai', 7), 
                                        array('Jui', 9)
                                    );


                         $aDonnees10 = array(
                                        array('Aoû', 0), 
                                        array('Sep', 1), 
                                        array('Oct', 3), 
                                        array('Nov', 2), 
                                        array('Déc', 0),
                                        array('Jan', 5), 
                                        array('Fév', 9), 
                                        array('Mar', 15), 
                                        array('Avr', 12),
                                        array('Mai', 7), 
                                        array('Jui', 9)
                                    );


                         $aDonnees11 = array(
                                        array('Aoû', 7), 
                                        array('Sep', 7), 
                                        array('Oct', 9), 
                                        array('Nov', 15), 
                                        array('Déc', 12),
                                        array('Jan', 7), 
                                        array('Fév', 9), 
                                        array('Mar', 15), 
                                        array('Avr', 12),
                                        array('Mai', 7), 
                                        array('Jui', 9)
                                    );

                        $aDonnees12 = array(
                                        array('Aoû', 7), 
                                        array('Sep', 7), 
                                        array('Oct', 9), 
                                        array('Nov', 15), 
                                        array('Déc', 12),
                                        array('Jan', 7), 
                                        array('Fév', 9), 
                                        array('Mar', 15), 
                                        array('Avr', 12),
                                        array('Mai', 7), 
                                        array('Jui', 9)
                                    );


                        $oVue = new StatistiqueVue();

                        $oVue->hGraphiqueNbElevesParEcole = $oVue->genererGraphique('test9', 300, 555, $aDonnees9);
                        $oVue->hGraphiqueNbTuteursParEcole = $oVue->genererGraphique('test10', 300, 555, $aDonnees10);
                        $oVue->hGraphiqueNbProfsParEcole = $oVue->genererGraphique('test11', 300, 555, $aDonnees11);
                        $oVue->hGraphiqueNbTutorielsParEcole = $oVue->genererGraphique('test12', 300, 555, $aDonnees12);

                        $oVue->afficheStatsGeneralesPourEcole();
                    ?>
                </div>            

                <div class="panel-body">
                    <?php    

                                

                    ?>
                </div>
            </div>
 <!-- ============================================================================================= -->
			<div class="panel panel-primary col-xs-12">
                <div class="panel-heading">
                    Test de la vue afficheStatsGeneralesPourCommission()
                </div>
                 <div class="panel-body">
                    <?php    
                        $aDonnees13 = array(
                                        array('Aoû', 1), 
                                        array('Sep', 3), 
                                        array('Oct', 5), 
                                        array('Nov', 2), 
                                        array('Déc', 12),
                                        array('Jan', 5), 
                                        array('Fév', 8), 
                                        array('Mar', 0), 
                                        array('Avr', 12),
                                        array('Mai', 7), 
                                        array('Jui', 9)
                                    );


                         $aDonnees14 = array(
                                        array('Aoû', 0), 
                                        array('Sep', 1), 
                                        array('Oct', 3), 
                                        array('Nov', 2), 
                                        array('Déc', 0),
                                        array('Jan', 5), 
                                        array('Fév', 9), 
                                        array('Mar', 15), 
                                        array('Avr', 12),
                                        array('Mai', 7), 
                                        array('Jui', 9)
                                    );


                        $oVue = new StatistiqueVue();

                        $oVue->hGraphiqueNbTutosCreesParCommission = $oVue->genererGraphique('test13', 300, 555, $aDonnees13);
                        $oVue->hGraphiqueNbTutosApprouvesParCommission = $oVue->genererGraphique('test14', 300, 555, $aDonnees14);

                        $oVue->afficheStatsGeneralesPourCommission();
                    ?>
                </div>            

            </div>
 <!-- ============================================================================================= -->