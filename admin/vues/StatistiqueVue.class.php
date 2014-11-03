<?php
class StatistiqueVue extends Vue {
    
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
                
        <!-- ------------------------------------------- -->
        <!-- STATISTIQUES PERSONNELES POUR UN PROFESSEUR -->
        <!-- ------------------------------------------- -->

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
                        Nombre de tutoriels approuvés par matière
                    </div>
                    <div class="panel-body">
                        <?php echo $this->hGraphiqueTutosApprouves;?>
                    </div>
                </div>
                        
                <!-- Troisième graphique, affiché dans un panel -->
                <div class="panel panel-default col-xs-12">
                    <div class="panel-heading">
                        Nombre de tutoriels créés par matière
                    </div>
                    <div class="panel-body">
                        <?php echo $this->hGraphiqueTutosMatiere;?>
                    </div>
                </div>
               
                <!-- Mettre le reste des graphiques ici. -->                   
            </div><!-- .col-md-12 -->                
        </div><!-- .row -->    
    <?php
    } //fin de la fonction  afficheStatsPersonnellesProfesseur()

    public function afficheStatsPersonnellesResponsable(){?>
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
                
        <!-- --------------------------------- ---------- -->
        <!-- STATISTIQUES PERSONNELES POUR UN RESPONSABLE -->
        <!-- ------------------------------- ------------ -->

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
               
                <!-- Mettre le reste des graphiques ici. -->                   
            </div><!-- .col-md-12 -->                
        </div><!-- .row -->    
    <?php
    } //fin de la fonction  afficheStatsPersonnellesResponsable()

    public function afficheStatsPersonnellesSuperAdmin(){?>
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
                
        <!-- --------------------------------- ---------- -->
        <!-- STATISTIQUES PERSONNELES POUR UN SUPER ADMIN -->
        <!-- ------------------------------- ------------ -->

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
               
                <!-- Mettre le reste des graphiques ici. -->                   
            </div><!-- .col-md-12 -->                
        </div><!-- .row -->    
    <?php
    } //fin de la fonction  afficheStatsPersonnellesSuperAdmin()

    public function afficheStatsGeneralesProfesseur(){?>
        <script language="javascript" type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/jquery.min.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/jquery.jqplot.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.canvasTextRenderer.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.pointLabels.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT;?>/lib/jqplot/jquery.jqplot.css" />

        <div class="page-header">
            <h1>Activité sur le site</h1>
        </div>
                
        <!-- --------------------------- -->
        <!-- STATISTIQUES POUR UNE ÉCOLE -->
        <!-- --------------------------- -->

        <div class="row">       
            <div class="col-md-12">
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
                        <?php echo $this->hGraphiqueNbTutosParEcole;?>
                    </div>
                </div>
                <!-- Mettre le reste des graphiques ici. -->                 
            </div><!-- .col-md-12 -->
        </div><!-- .row -->    
    <?php
    } //fin de la fonction  afficheStatsGeneralesPourEcole()

    public function afficheStatsGeneralesResponsable(){?>
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
            
        <!-- -------------------------------- -->
        <!-- STATISTIQUES POUR UNE COMMISSION -->
        <!-- -------------------------------- -->

        <div class="row">       
            <div class="col-md-12">
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
            </div><!-- .col-md-12 -->
        </div><!-- .row -->
    <?php
    }

    public function afficheStatsGeneralesSuperAdmin(){?>
        <script language="javascript" type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/jquery.min.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/jquery.jqplot.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.canvasTextRenderer.min.js"></script>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/jqplot/plugins/jqplot.pointLabels.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT;?>/lib/jqplot/jquery.jqplot.css" />

        <div class="page-header">
            <h1>Activité sur le site</h1>
        </div>
                
        <!-- -------------------------------- -->
        <!-- STATISTIQUES POUR UNE COMMISSION -->
        <!-- -------------------------------- -->

        <div class="row">       
            <div class="col-md-12">
                <!-- Permier graphique, affiché dans un panel -->
                <div class="panel panel-default col-xs-6">
                    <div class="panel-heading">
                        Nombre de visites par commission pour cette année scolaire
                    </div>
                    <div class="panel-body">
                       <?php echo $this->hGraphiqueVisitesParCommission;?>
                    </div>
                </div>
                        
                <!-- Deuxième graphique, affiché dans un panel -->
                <div class="panel panel-default col-xs-6">
                    <div class="panel-heading">
                        Nombre de tutoriels par commission 
                    </div>
                    <div class="panel-body">
                        <?php echo $this->hGraphiqueTutosParCommission;?>
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