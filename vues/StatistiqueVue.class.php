<?php

/**
 * @date 2014-10-25
 * @author Silvia Popa
 * @brief Classe StatistiqueVue (classe fille de la classe Vue ) 
 */

class StatistiqueVue extends Vue {
    
	/**
	 * afficher les Statistiques Personnelles d'un(e) Élève
	 */
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
                
        <!-- -------------------------------------- -->
        <!-- STATISTIQUES PERSONNELES POUR UN ÉLÈVE -->
        <!-- -------------------------------------- -->

        <div class="row">		
			<div class="col-md-12">  

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
                        Nombre de tutoriels consultés
                    </div>
                    <div class="panel-body">
                        <?php echo $this->hGraphiqueTutorielsConsultes;?>
                    </div>
                </div> 

            </div><!-- .col-md-12 -->                
        </div><!-- .row -->
    <?php
    } //fin de la fonction afficheStatsPersonnellesEleve()	
    
    
	/**
	 * afficher les Statistiques Personnelles d'un Tuteur
	 */
	public function afficheStatsPersonnellesTuteur(){?>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/jquery.jqplot.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.canvasTextRenderer.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.pointLabels.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT;?>/lib/jqplot/jquery.jqplot.css" />

        <div class="page-header">
            <h1>Activité sur votre compte personnel</h1>
        </div>
                
        <!-- --------------------------------------- -->
        <!-- STATISTIQUES PERSONNELES POUR UN TUTEUR -->
        <!-- --------------------------------------- -->

        <div class="row">		
			<div class="col-md-12">
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
                       Nombre de tutoriels soumis par matière pour cette année scolaire
                    </div>
                    <div class="panel-body">
                        <?php echo $this->hGraphiqueTutosMatiere;?>
                    </div>
                </div>
                                  
            </div><!-- .col-md-12 -->
        </div><!-- .row -->    
    <?php
    } //fin de la fonction afficheStatsPersonnellesTuteur()

    
	/**
	* Fonction genere le div avec id = $sDivId qui a la hauteur = $iHauteur et la longueur = $iLongueur dans lequel
	* crée le graphique selon les données dans le tableau $aDonnees
	* @return $graph (le div avec le graphique)
    */
	public function genererGraphique($sDivId, $iHauteur, $iLongueur, $aDonnees){
        
		//Déclaration d'une variable où on va stocker tous les les coordonnées des points du graphique final
		$pointsXYSurGraphique = '';
        
        //pour chaque élément du tableau 
		foreach($aDonnees as $key => $paireXY){
            //Si ce n'ai pas le premier élément
			if($key != 0){
                $pointsXYSurGraphique .= ", "; //On sépare les élément par virgule
            }
            $pointsXYSurGraphique .= "['{$paireXY[0]}', {$paireXY[1]}]"; // Création de la chaine pour jQuery
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
    } //fin de la fonction genererGraphique($sDivId, $iHauteur, $iLongueur, $aDonnees)

} //fin de la classe StatistiqueVue
?>