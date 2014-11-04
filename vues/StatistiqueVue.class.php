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
                <!-- Troisième graphique, affiché dans un panel -->
                <!--<div class="panel panel-default col-xs-12">
                    <div class="panel-heading">
                       Temps connécté(heures) par mois
                    </div>
                    <div class="panel-body">
                        <?php //echo $this->hGraphiqueTempsParMois;?>
                    </div>
                </div>-->
                <!-- Mettre le reste des graphiques ici. -->                   
            </div><!-- .col-md-12 -->                
        </div><!-- .row -->
    <?php
    }	
    
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
                <!-- Mettre le reste des graphiques ici. -->                    
            </div><!-- .col-md-12 -->
        </div><!-- .row -->    
    <?php
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