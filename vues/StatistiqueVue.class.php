<?php
class StatistiqueVue extends Vue {
    
    public function afficheStatsPersonnellesEleve(){?>
        <script language="javascript" type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/jquery.min.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/jquery.jqplot.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.canvasTextRenderer.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.pointLabels.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT;?>/lib/jqplot/jquery.jqplot.css" />

        <div class="page-header">
            <h1>Activité sur votre compte</h1>
        </div>
                
                <!-------------------------------------------->
                <!-- STATISTIQUES PERSONNELES POUR UN ÉLÈVE -->
                <!-------------------------------------------->

        <div class="row">		
				<div class="col-md-12">
<!--=====================================================================-->
    
            <!-- Permier graphique, affiché dans un panel -->
            <div class="panel panel-default col-xs-12">
                <div class="panel-heading">
                    Nombre de visites par mois pour cette année scolaire
                </div>
                <div class="panel-body">
                   <?php echo $this->hGraphiqueVisitesParMois;?>
                </div>
            </div>
            <!-- Deuxième graphique, affiché dans un panel -->
            <div class="panel panel-default col-xs-12">
                <div class="panel-heading">
                    Nombre de tuteurs avec qui vous avez communiqué par mois
                </div>
                <div class="panel-body">
                    <?php echo $this->hGraphiqueTuteursParMois;?>
                </div>
            </div>
            <!-- Troisième graphique, affiché dans un panel -->
            <div class="panel panel-default col-xs-12">
                <div class="panel-heading">
                   Temps connécté(heures) par mois
                </div>
                <div class="panel-body">
                    <?php echo $this->hGraphiqueTempsParMois;?>
                </div>
            </div>
            <!-- Mettre le reste des graphiques ici. -->
<!--=====================================================================-->                    
        </div><!-- .col-md-12 -->
                
    </div><!-- .row -->
        
            

    <?php }	
    
    public function afficheStatsPersonnellesTuteur(){?>
        <script language="javascript" type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/jquery.min.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/jquery.jqplot.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.canvasTextRenderer.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.pointLabels.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT;?>/lib/jqplot/jquery.jqplot.css" />

        <div class="page-header">
            <h1>Activité sur votre compte personnel</h1>
        </div>
                
                <!--------------------------------------------->
                <!-- STATISTIQUES PERSONNELES POUR UN TUTEUR -->
                <!--------------------------------------------->

        <div class="row">		
				<div class="col-md-12">
<!--=====================================================================-->
                    <!-- Permier graphique, affiché dans un panel -->
            <div class="panel panel-default col-xs-12">
                <div class="panel-heading">
                    Nombre de visites par mois pour cette année scolaire
                </div>
                <div class="panel-body">
                   <?php echo $this->hGraphiqueVisitesTuteurParMois;?>
                </div>
            </div>
                    
            <!-- Deuxième graphique, affiché dans un panel -->
            <div class="panel panel-default col-xs-12">
                <div class="panel-heading">
                    Nombre d'élèves avec qui vous avez communiqué par mois
                </div>
                <div class="panel-body">
                    <?php echo $this->hGraphiqueElevesParMois;?>
                </div>
            </div>
                    
            <!-- Troisième graphique, affiché dans un panel -->
            <div class="panel panel-default col-xs-12">
                <div class="panel-heading">
                   Nombre de tutoriels soumis par matière
                </div>
                <div class="panel-body">
                    <?php echo $this->hGraphiqueTutosMatiere;?>
                </div>
            </div>
            <!-- Mettre le reste des graphiques ici. -->
<!--=====================================================================-->                    
        </div><!-- .col-md-12 -->
                
    </div><!-- .row -->
    
   <?php }	
    public function afficheStatsPersonnellesProfesseur(){?>
        <script language="javascript" type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/jquery.min.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/jquery.jqplot.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.canvasTextRenderer.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.pointLabels.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT;?>/lib/jqplot/jquery.jqplot.css" />

        <div class="page-header">
            <h1>Activité sur votre compte personnel</h1>
        </div>
                
                <!------------------------------------------------->
                <!-- STATISTIQUES PERSONNELES POUR UN PROFESSEUR -->
                <!------------------------------------------------->

        <div class="row">		
				<div class="col-md-12">
<!--=====================================================================-->
                    <!-- Permier graphique, affiché dans un panel -->
            <div class="panel panel-default col-xs-12">
                <div class="panel-heading">
                    Nombre de visites par mois pour cette année scolaire
                </div>
                <div class="panel-body">
                   <?php echo $this->hGraphiqueVisitesProfParMois;?>
                </div>
            </div>
                    
            <!-- Deuxième graphique, affiché dans un panel -->
            <div class="panel panel-default col-xs-12">
                <div class="panel-heading">
                    Nombre de tutoriels approuvés par matière
                </div>
                <div class="panel-body">
                    <?php echo $this->hGraphiqueTutosApprouves;?>
                </div>
            </div>
           
            <!-- Mettre le reste des graphiques ici. -->
<!--=====================================================================-->                    
        </div><!-- .col-md-12 -->
                
    </div><!-- .row -->
    
   <?php } //fin de la fonction	afficheStatsPersonnellesProfesseur()
   
   
   
    public function afficheStatsGeneralesPourEcole(){?>
        <script language="javascript" type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/jquery.min.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/jquery.jqplot.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.canvasTextRenderer.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.pointLabels.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT;?>/lib/jqplot/jquery.jqplot.css" />

        <div class="page-header">
            <h1>Activité sur le compte de l'école</h1>
        </div>
            <!----------------------->
			<!-- LE FORMULAIRE ------>
			<!----------------------->
			
			<div class="row">
				<form id="form-trouver-tuteur" class="form-horizontal" role="form">
                        <div class="form-group">
                            <div class="col-md-4">
                                <label for="select-ecole" class="col-sm-3 col-md-3 control-label">École:</label>
                                <div class="col-sm-9 col-md-9">
                                    <select class="form-control" id="select-ecole">
                                        <option value="1">École 1</option>
                                        <option value="2">École 2</option>
                                        <option value="3">École 3</option>
                                        <option value="4">École 4</option>
                                        <option value="5">École 5</option>
										<option value="6">École 6</option>
										<option value="7">École 7</option>
                                    </select>
                                </div>
                            </div>
							<div class="col-md-4">
                                <label for="select-annee" class="col-sm-3 col-md-3 control-label">Commission:</label>
                                <div class="col-sm-9 col-md-9">
                                    <select class="form-control" id="select-annee">
                                        <option value="1">Commission 1</option>
                                        <option value="2">Commission 2</option>
                                        <option value="3">Commission 3</option>
                                        <option value="4">Commission 4</option>
                                        <option value="5">Commission 5</option>
                                    </select>
                                </div>
                            </div>
                           
                            <div class="col-md-4">
                                <input type="submit" class="form-control btn btn-success" value="Lancer &rarr;">
                            </div>
                        </div>
                    </form>
			</div>
                
                <!--------------------------------->
                <!-- STATISTIQUES POUR UNE ÉCOLE -->
                <!--------------------------------->

        <div class="row">		
				<div class="col-md-12">
<!--=====================================================================-->
                    <!-- Permier graphique, affiché dans un panel -->
            <div class="panel panel-default col-xs-6">
                <div class="panel-heading">
                    Nombre d'élèves par école 
                </div>
                <div class="panel-body">
                   <?php echo $this->hGraphiqueNbElevesParEcole;?>
                </div>
            </div>
                    
            <!-- Deuxième graphique, affiché dans un panel -->
            <div class="panel panel-default col-xs-6">
                <div class="panel-heading">
                    Nombre de tuteurs par école 
                </div>
                <div class="panel-body">
                    <?php echo $this->hGraphiqueNbTuteursParEcole;?>
                </div>
            </div>
            <!-- 3ème graphique, affiché dans un panel -->
            <div class="panel panel-default col-xs-6">
                <div class="panel-heading">
                    Nombre de professeurs par école 
                </div>
                <div class="panel-body">
                    <?php echo $this->hGraphiqueNbProfsParEcole;?>
                </div>
            </div>
            <!-- 4ème graphique, affiché dans un panel -->
            <div class="panel panel-default col-xs-6">
                <div class="panel-heading">
                    Nombre de tutoriels par école 
                </div>
                <div class="panel-body">
                    <?php echo $this->hGraphiqueNbTutorielsParEcole;?>
                </div>
            </div>
            <!-- Mettre le reste des graphiques ici. -->
<!--=====================================================================-->                    
        </div><!-- .col-md-12 -->
                
    </div><!-- .row -->
    
   <?php } //fin de la fonction	afficheStatsGeneralesPourEcole()
   
   
   
    public function afficheStatsGeneralesPourCommission(){?>
		<script language="javascript" type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/jquery.min.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/jquery.jqplot.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.canvasTextRenderer.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.pointLabels.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT;?>/lib/jqplot/jquery.jqplot.css" />

        <div class="page-header">
            <h1>Activité sur le compte de votre commission</h1>
        </div>
            
				<!-------------------------------------->
                <!-- STATISTIQUES POUR UNE COMMISSION -->
                <!-------------------------------------->

        <div class="row">		
			<div class="col-md-12">
<!--=====================================================================-->
					<!-- Permier graphique, affiché dans un panel -->
					<div class="panel panel-default col-xs-12">
						<div class="panel-heading">
							Nombre de tutorats créés par votre commission
						</div>
						<div class="panel-body">
						   <?php echo $this->hGraphiqueNbTutosCreesParCommission;?>
						</div>
					</div>
					
					<!-- 2ème graphique, affiché dans un panel -->
					<div class="panel panel-default col-xs-12">
						<div class="panel-heading">
							Nombre de tutorats approuvés par votre commission
						</div>
						<div class="panel-body">
						   <?php echo $this->hGraphiqueNbTutosApprouvesParCommission;?>
						</div>
					</div>
					
					<!-- Mettre le reste des graphiques ici. -->
<!--=====================================================================-->                    
			</div><!-- .col-md-12 -->
                
		</div><!-- .row -->
    
    <?php }


	
    public function afficheStatsGeneralesPourSuperAdmin(){
    
    }	
    
    public function genererGraphique($sDivId, $iHauteur, $iLongueur, $aDonnees){
        $pointsXYSurGraphique = '';
        
        foreach($aDonnees as $key => $paireXY){
            if($key != 0){
                $pointsXYSurGraphique .= ", ";
            }
            $pointsXYSurGraphique .= "['{$paireXY[0]}', {$paireXY[1]}]";
        }
        
        $graph = "<div id='{$sDivId}' style='height:{$iHauteur}px;width:{$iLongueur}px;'></div>
        <script>
            $.jqplot(
                '{$sDivId}',  
                [[
                    {$pointsXYSurGraphique}
                ]], 
                { 
                    axes:{
                        xaxis:{
                            renderer: $.jqplot.CategoryAxisRenderer,
                        },
                        yaxis:{
                            min:0
                        }
                    },
                    seriesDefaults: { 
                        pointLabels: {
                            show:true
                        }
                    }
                }
            );
        </script>";
        
        return $graph;
    }

}
?>