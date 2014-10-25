    <div class="page-header">
        <h1>Mes tests unitaires</h1>
    </div>
    <?php


        echo "<div class='col-xs-12'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test affichePreInscription";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                    $oVue = new UtilisateurVue();
                    $oVue->affichePreInscription();

                echo "</div>";
            echo "</div>";
        echo "</div>";

         echo "<div class='col-xs-12'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test afficheInscription";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                    $oVue = new UtilisateurVue();
                    $oVue->afficheInscription();

                echo "</div>";
            echo "</div>";
        echo "</div>";

        echo "<div class='col-xs-12'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test afficheRecupererMDP";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                    $oVue = new UtilisateurVue();
                    $oVue->afficheRecupererMDP();

                echo "</div>";
            echo "</div>";
        echo "</div>";

         echo "<div class='col-xs-12'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test afficheRecupererMDP";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                    $oVue = new UtilisateurVue();
                    $oVue->afficheEnvoyerMessage();

                echo "</div>";
            echo "</div>";
        echo "</div>";

        echo "<div class='col-xs-12'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test afficheAccueil";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                    $oVue = new UtilisateurVue();
                    $oVue->afficheAccueil();

                echo "</div>";
            echo "</div>";
        echo "</div>";
    /*
        Test code permanent
    */
    echo "<div class='col-xs-12'>"; 
        echo "<h2>Test de la méthode pub_validerCodePermanent de la classe Utilisateur</h2>";
    echo "</div>";
        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "pub_validerCodePermanent()";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                    try{
                        $user1 = new Utilisateur();
                        $user1->setCodePermanent("GOUA15079304");
                        $user1->setNom("Gouin");
                        echo $user1->pub_validerCodePermanent();
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    } 

                echo "</div>";
            echo "</div>";
        echo "</div>";


    echo "<div class='col-xs-12'>";
        echo "<h2>Tests des méthodes get et set de la classe Utilisateur pour le code permanent</h2>";
    echo "</div>";

        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test de la méthode getCodePermanent";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                    try{
                        $user1 = new Utilisateur();
                        $user1->setCodePermanent("GOUA15079304");
                        echo $user1->getCodePermanent();
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    } 

                echo "</div>";
            echo "</div>";
        echo "</div>";

        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test de la méthode setCodePermanent";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                    try{
                        $user1 = new Utilisateur();
                        $user1->setCodePermanent(8);
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    } 

                echo "</div>";
            echo "</div>";
        echo "</div>";

        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test de la méthode setCodePermanent";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                    try{
                        $user1 = new Utilisateur();
                        $user1->setCodePermanent("");
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    } 

                echo "</div>";
            echo "</div>";
        echo "</div>";

    /*
        Test de la méthode ajouterUtilisateur de la classe Utilisateur
    */ 
    echo "<div class='col-xs-12'>"; 
        echo "<h2>Test de la méthode ajouterUtilisateur de la classe Utilisateur</h2>";
    echo "</div>";
        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "ajouterUtilisateur()";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                   try{
                        $user1 = new Utilisateur(0, "gus28", "gtz12k", "Siverner", "Donna", "abc@123.com", 2);
                        $user1->ajouterUtilisateur();
                        echo "<p> Succès! L'utilisateur #".$user1->getId()." ".$user1 ->getPrenom()." ".$user1->getNom(). " a été ajouté.</p>";
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    } 
                echo "</div>";
            echo "</div>";
        echo "</div>";

    /*                    
        Début des tests des méthodes get de la classe Utilisateur
    */
    echo "<div class='col-xs-12'>"; 
        echo "<h2>Test des méthodes get de la classe Utilisateur</h2>";
    echo "</div>";    
        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test getId de la classe Utilisateur";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";
                    try{
                        $user2 = new Utilisateur(10, "gus27", "gtz12l", "Thomas", "Paul", "paul@123.com", 3);
                        echo $user2->getId();
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    } 
                echo "</div>";
            echo "</div>";
        echo "</div>";

        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test getPseudo de la classe Utilisateur";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";
                    try{
                        $user2 = new Utilisateur(10, "gus27", "gtz12l", "Thomas", "Paul", "paul@123.com", 3);
                        echo $user2->getPseudo();
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    } 
                echo "</div>";
            echo "</div>";
        echo "</div>";

        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test getMDP de la classe Utilisateur";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";
                    try{
                        $user2 = new Utilisateur(10, "gus27", "gtz12l", "Thomas", "Paul", "paul@123.com", 3);
                        echo $user2->getMDP();
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    } 
                echo "</div>";
            echo "</div>";
        echo "</div>";

        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test getNom de la classe Utilisateur";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";
                    try{
                        $user2 = new Utilisateur(10, "gus27", "gtz12l", "Thomas", "Paul", "paul@123.com", 3);
                        echo $user2->getNom();
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    } 
                echo "</div>";
            echo "</div>";
        echo "</div>";

         echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test getPrenom de la classe Utilisateur";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";
                    try{
                        $user2 = new Utilisateur(10, "gus27", "gtz12l", "Thomas", "Paul", "paul@123.com", 3);
                        echo $user2->getPrenom();
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    } 
                echo "</div>";
            echo "</div>";
        echo "</div>";

         echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test getCourriel de la classe Utilisateur";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";
                    try{
                        $user2 = new Utilisateur(10, "gus27", "gtz12l", "Thomas", "Paul", "paul@123.com", 3);
                        echo $user2->getCourriel();
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    } 
                echo "</div>";
            echo "</div>";
        echo "</div>";

         echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test getRole de la classe Utilisateur";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";
                    try{
                        $user2 = new Utilisateur(10, "gus27", "gtz12l", "Thomas", "Paul", "paul@123.com", 3);
                        echo $user2->getRole();
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    } 
                echo "</div>";
            echo "</div>";
        echo "</div>";
    /*                    
        Fin des tests des méthodes get de la classe Utilisateur
    */

    /*                    
        Début des tests des méthodes set de la classe Utilisateur
    */
    echo "<div class='col-xs-12'>"; 
        echo "<h2>Test des Exceptions pour les méthodes set de la classe Utilisateur</h2>";
    echo "</div>"; 
        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test setId de la classe Utilisateur";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                   try{
                        $user2 = new Utilisateur();
                        $user2->setId("String");
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    } 

                echo "</div>";
            echo "</div>";
        echo "</div>";

        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test setId de la classe Utilisateur";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                  try{
                        $user2 = new Utilisateur();
                        $user2->setId([]);
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    } 

                echo "</div>";
            echo "</div>";
        echo "</div>";

         echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test setPseudo de la classe Utilisateur";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                  try{
                        $user2 = new Utilisateur();
                        $user2->setPseudo(8);
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    } 

                echo "</div>";
            echo "</div>";
        echo "</div>";

        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                       echo "Test setPseudo de la classe Utilisateur";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                  try{
                        $user2 = new Utilisateur();
                        $user2->setPseudo("");
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    } 

                echo "</div>";
            echo "</div>";
        echo "</div>";

        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test setMDP de la classe Utilisateur";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                  try{
                        $user2 = new Utilisateur();
                        $user2->setMDP(123);
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    } 

                echo "</div>";
            echo "</div>";
        echo "</div>";

        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test setMDP de la classe Utilisateur";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                  try{
                        $user2 = new Utilisateur();
                        $user2->setMDP("");
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    } 

                echo "</div>";
            echo "</div>";
        echo "</div>";

        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test setNom de la classe Utilisateur";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                  try{
                        $user2 = new Utilisateur();
                        $user2->setNom(8);
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    } 

                echo "</div>";
            echo "</div>";
        echo "</div>";

        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test setNom de la classe Utilisateur";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                  try{
                        $user2 = new Utilisateur();
                        $user2->setNom("");
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    } 

                echo "</div>";
            echo "</div>";
        echo "</div>";

        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test setPrenom de la classe Utilisateur";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                  try{
                        $user2 = new Utilisateur();
                        $user2->setPrenom(8);
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    } 

                echo "</div>";
            echo "</div>";
        echo "</div>";

        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test setPrenom de la classe Utilisateur";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                  try{
                        $user2 = new Utilisateur();
                        $user2->setPrenom("");
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    } 

                echo "</div>";
            echo "</div>";
        echo "</div>";

        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test setCourriel de la classe Utilisateur";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                  try{
                        $user2 = new Utilisateur();
                        $user2->setCourriel(8);
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    } 

                echo "</div>";
            echo "</div>";
        echo "</div>";

        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test setCourriel de la classe Utilisateur";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                  try{
                        $user2 = new Utilisateur();
                        $user2->setCourriel("");
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    } 

                echo "</div>";
            echo "</div>";
        echo "</div>";

        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test setRole de la classe Utilisateur";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                  try{
                        $user2 = new Utilisateur();
                        $user2->setRole("String");
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    } 

                echo "</div>";
            echo "</div>";
        echo "</div>";

        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test setRole de la classe Utilisateur";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                  try{
                        $user2 = new Utilisateur();
                        $user2->setRole(NULL);
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    } 

                echo "</div>";
            echo "</div>";
        echo "</div>";
    /*
        Fin des tests des méthodes set de la classe Utilisater
    */


    /*
        Test recuperation utilisateur en fonction du role
    */
    echo "<div class='col-xs-12'>"; 
        echo "<h2>Test de la méthode recupererUtilisateur de la classe Utilisateur</h2>";
    echo "</div>";  
        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "recupererUtilisateur() par role";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                   try{
                        $user1 = new Utilisateur();
                        $user1->setRole(2);
                        $aUtilisateurs = $user1->recupererUtilisateur();

                        foreach ($aUtilisateurs as $rangee) {

                            echo $rangee['prenom'] . " " . $rangee['nom'] . "<br />";
                        }
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    }

                echo "</div>";
            echo "</div>";
        echo "</div>";

    /*
        Test modification utilisateur
    */
    echo "<div class='col-xs-12'>"; 
        echo "<h2>Test de la méthode modifierUtilisateur de la classe Utilisateur</h2>";
    echo "</div>";   
        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "modifierUtilisateur()";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                    try{
                        $user2 = new Utilisateur();
                        $user2->setId(1);
                        $user2->setPseudo("blackjack");
                        $user2->setMDP("joker88");
                        $user2->setNom("Doe");
                        $user2->setPrenom("John"); 
                        $user2->setCourriel("john.doe@me.com");  
                        $user2->setRole(3); 
                        $user2->setCodePermanent("xxx");
                        $user2->modifierUtilisateur();

                        echo "<p> Les informations de " . $user2->getPrenom() . " " . $user2->getNom() . " ont été modifié</p>";
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    }

                echo "</div>";
            echo "</div>";
        echo "</div>";

        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Informations modifiées";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                    try{
                        echo "Id : " . $user2->getId() . "<br />";
                        echo "Nom : " . $user2->getNom() . "<br />";
                        echo "Prenom : " . $user2->getPrenom() . "<br />";
                        echo "MDP : " . $user2->getMDP() . "<br />";
                        echo "Pseudo : " . $user2->getPseudo() . "<br />";
                        echo "Courriel : " . $user2->getCourriel() . "<br />";
                        echo "Role : " . $user2->getRole();

                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    }

                echo "</div>";
            echo "</div>";
        echo "</div>";

    /*
        Findes tests  de modifications utilisateurs
    */

    echo "<div class='col-xs-12'>"; 
        echo "<h2>Test de la méthode recupererMDP de la classe Utilisateur</h2>";
    echo "</div>";
        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Informations modifiées";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                    try{
                        $user2 = new Utilisateur();
                        $user2->setId(1);
                        $aUser = $user2->recupererMDP();
                        echo "Un courriel vous a été envoyé  à l'adresse ". $aUser['courriel'] . ".";

                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    }

                echo "</div>";
            echo "</div>";
        echo "</div>";

    /*
        Test d'insertion de nouvelles commission scolaires
    */
     echo "<div class='col-xs-12'>"; 
        echo "<h2>Test d'insertion de nouvelles commissions scolaires</h2>";
    echo "</div>";   
        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "ajouterCommission()";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                    try{
                        $commission1 = new Commission(0, "Laval", 4, 3);
                        $commission1->admin_AjouterCommission();
                        echo "<p> Succès! La commission scolaire #".$commission1->getId()." ".$commission1 ->getNom(). " a été ajouté.</p>";
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    }

                echo "</div>";
            echo "</div>";
        echo "</div>";

    /*
        Test de modification d'entrée de commission scolaires
    */
        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test de la méthode chargerCommission() de la classe Commission";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                    try{
                        $commission1 = new Commission();
                        $commission1->setId(2);
                        $aCommission1 = $commission1->chargerCommission();
                        echo "Nom : " . $aCommission1['nom'] . "<br />";
                        echo "Région : " . $aCommission1['region'] . "<br />";
                        echo "Responsable : " . $aCommission1['responsable'] . "<br />";
                        echo "Est détruit : " . $aCommission1['est_detruit'] . "<br />";

                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    }

                echo "</div>";
            echo "</div>";
        echo "</div>";

        echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test de la méthode admin_ModifierCommission() de la classe Commission";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                    try{
                        $commission1 = new Commission();
                        $commission1->setId(2);
                        $commission1->setNom("Laval");
                        $commission1->setRegion(8);
                        $commission1->setResponsable(13);
                        $commission1->admin_ModifierCommission();
                        $aCommission1 = $commission1->chargerCommission();
                        echo "Nom : " . $aCommission1['nom'] . "<br />";
                        echo "Région : " . $aCommission1['region'] . "<br />";
                        echo "Responsable : " . $aCommission1['responsable'] . "<br />";
                        echo "Est détruit : " . $aCommission1['est_detruit'] . "<br />";
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    }

                echo "</div>";
            echo "</div>";
        echo "</div>";

         echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test de la méthode admin_SupprimerCommission() de la classe Commission";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";
                    try{
                        $commission1 = new Commission();
                        $commission1->setId(70);
                        $aCommission1 = $commission1->chargerCommission();

                        $commission1->admin_SupprimerCommission();
                        echo "<p>La commission scolaire de ". $aCommission1['nom'] . " a été supprimé.</p>";
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    }

                echo "</div>";
            echo "</div>";
        echo "</div>";

         echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test de la méthode ajouterModuleAutorise() de la classe Commission";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                    try{
                      $commission1 = new Commission();
                      $commission1->setId(2);
                      $commission1->setService(4);
                      //$commission1->ajouterModuleAutorise();
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    }

                echo "</div>";
            echo "</div>";
        echo "</div>";

         echo "<div class='col-xs-4'>";
            echo "<div class='panel panel-primary'>";
                echo "<div class='panel-heading'>";
                    echo "<h4>";
                        echo "Test de la méthode afficherModuleAutorise() de la classe Commission";
                    echo "</h4>";
                echo "</div>";
                echo "<div class='panel-body'>";

                    try{
                      $commission1 = new Commission();
                      $commission1->setId(2);
                      $commission1->setService(4);
                      $aCommission1 = $commission1->afficherModuleAutorise();
                      print_r($aCommission1);
                    }
                    catch(Exception $e){
                        echo "<p>".$e->getMessage()."</p>";
                    }

                echo "</div>";
            echo "</div>";
        echo "</div>";


    ?>