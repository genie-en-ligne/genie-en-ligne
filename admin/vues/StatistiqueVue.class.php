<?php

/**
 * @date 2014-10-25
 * @author Silvia Popa
 * @brief Classe StatistiqueVue (classe fille de la classe Vue ) pour le site admin 
 */

class StatistiqueVue extends Vue {

    /**
	 * afficher les Statistiques Personnelles d'un Prof
	 */
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

    
	/**
	 * afficher les Statistiques Personnelles d'un Responsable de commission
	 */
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

   
	/**
	 * afficher les Statistiques Personnelles pour SuperAdmin
	 */
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

    
	/**
	 * afficher les Statistiques Générales pour le Prof
	 */
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

    
	/**
	 * afficher les Statistiques Générales pour le Responsable de commission
	 */
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
    } //fin de la fonction afficheStatsGeneralesResponsable()

    
	/**
	 * afficher les Statistiques Générales pour le SuperAdmin
	 */
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
    } //fin de la fonction afficheStatsGeneralesSuperAdmin()

    
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
        //returner $graph (le div avec le graphique)
        return $graph;
    
	} //fin de la fonction genererGraphique($sDivId, $iHauteur, $iLongueur, $aDonnees)

} //fin de la classe StatistiqueVue
?>