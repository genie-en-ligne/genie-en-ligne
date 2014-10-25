<div class="panel panel-primary col-xs-12">
    <div class="panel-heading">
        Test de la vue afficheStatsPersonnellesEleve()
    </div>
    <div class="panel-body">
        <?php    
            $aDonnees = array(
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

            $oVue->hGraphiqueTutosParMois = $oVue->genererGraphique('test', 300, 555, $aDonnees);

            $oVue->afficheStatsPersonnellesEleve();
        ?>
    </div>
</div>