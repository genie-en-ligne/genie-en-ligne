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

        <!-- Permier graphique, affiché dans un panel -->
        <div class="panel panel-default col-xs-6">
            <div class="panel-heading">
                Nombre de tutorats publiés cette année
            </div>
            <div class="panel-body">
                <?php echo $this->hGraphiqueTutosParMois;?>
            </div>
        </div>
        
        <!-- Mettre le reste des graphiques ici. -->


    <?php }	
    
    public function afficheStatsPersonnellesTuteur(){
    
    }	
    public function afficheStatsPersonnellesProfesseur(){
    
    }	
    public function afficheStatsGeneralesPourProf(){
    
    }	
    public function afficheStatsGeneralesPourCommission(){
    
    }	
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