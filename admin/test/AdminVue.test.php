 <div class="page-header">
   	<h1>Mes tests unitaires</h1>
</div>
    <?php
    	 echo "<div class='col-xs-12'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test afficheListeCommissions";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                    $oVue = new AdminVue();
                    $oVue->afficheListeCommissions();

                echo "</div>";
            echo "</div>";
        echo "</div>";

        echo "<div class='col-xs-12'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test afficheListeEcoles";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                    $oVue = new AdminVue();
                    $oVue->afficheListeEcoles();

                echo "</div>";
            echo "</div>";
        echo "</div>";

         echo "<div class='col-xs-12'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test afficheListeProfesseurs";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                    $oVue = new AdminVue();
                    $oVue->afficheListeProfesseurs();

                echo "</div>";
            echo "</div>";
        echo "</div>";

        echo "<div class='col-xs-12'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test afficheAjouterProfesseurs";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                    $oVue = new AdminVue();
                    $oVue->afficheAjouterProfesseurs();

                echo "</div>";
            echo "</div>";
        echo "</div>";
    ?>