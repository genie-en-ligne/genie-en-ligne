<?php
class AdminVue extends Vue {
    
    
    public function __construct(){?>
        
    <?php
    }

    /*=====================================*/
    /*======GESTION DES RESPONSABLES=======*/
    /*==========DROITS SUPERADMIN==========*/
    /*=====================================*/

    public function afficheListeResponsables(){?>

        <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>
                    
        <div class="col-lg-12">
            <div class="page-header">
                <div class="navbar navbar-default">
                    <h2 class="navbar-text">Gérer les responsables</h2>
                </div>
            </div>
        </div>
        <div class="col-sm-11 col-sm-offset-1">
            <form id="frmChercherResponsable" method="GET" action="" enctype="" class="form-horizontal" role="form">
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-5 col-sm-offset-2">
                            <label for="sltCommissions" class="col-sm-5 control-label">Commisions scolaires :</label>
                            <div class="col-sm-7 col-md-7">
                                <select id="sltCommissions" class="form-control" name="commission"> 
                                    <?php
                                        //pour chaque élément/objet du tableau

                                        foreach ($this->aListeCommissions as $oCommission) {
                                            //ajouter une balise option et afficher la valeur des propriéts de l'objet
                                            echo '<option value="'.$oCommission->getId().'">' . $oCommission->getNom() . '</option>';
                                        }
                                    ?>
                                    <div class="divErreur" id="sltCommissionsErreur"></div>                         
                                </select>
                            </div>  
                        </div>
                    </div> <!-- .form-group -->
                </div>  <!-- .row -->  
                <div class="col-xs-3 col-sm-3 col-md-3 pull-right">
                    <button type="submit" id="subChercherResp" class="btn btn-success pull-right">
                    <span class="glyphicon glyphicon-search"></span> Rechercher</button>
                </div> 
                <div class="col-xs-3 col-sm-3 col-md-3 pull-right">
                </div>        
            </form> 
        </div>   

        <div class="contenu">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <div class="">
                            
                        </div>
                    </div>
                </div>
            </div>
            <form >
                <div class="row">
                    <div class="col-lg-12">
                        <table id="tabRechercherProf" class="table table-striped text-center">
                            <tr>
                                <th class="text-center">Prénom</th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Courriel</th>
                                <th class="text-center">Pseudo</th>
                                <th class="text-center">Commission scolaire</th>
                                <th class="text-center">Action</th>
                            </tr>
                           <!-- <?php
                                foreach($this->aListeUtilisateurs as $oUtilisateur){
                                  
                                    $oCommission = new Commission();
                                    $oCommission->setResponsable($oUtilisateur->getId());
                                    $oCommission->chargerCommissionParResponsable();
                                    
                                    echo '<tr>';
                                        echo '<td id="txtPrenomTabResp">'.$oUtilisateur->getPrenom().'</td>';
                                        echo '<td id="txtNomTabPResp">'.$oUtilisateur->getNom().'</td>';
                                        echo '<td id="txtCourrielTabResp">'.$oUtilisateur->getCourriel().'</td>';
                                        echo '<td id="txtPseudoTabResp">'.$oUtilisateur->getPseudo().'</td>';
                                        echo '<td id="txtCommissionTabResp">'.$oCommission->getNom().'</td>';
                                        echo '<td>';
                                                echo '<a href="'.WEB_ROOT.'/admin/modifierUtilisateur/'.$oUtilisateur->getId().'" class="btn btn-primary btn-xs">';
                                                    echo '<span title="Modifier" class="glyphicon glyphicon-pencil"></span>';
                                                echo '</a>';
                                                echo '<a href="'.WEB_ROOT.'/admin/supprimerUtilisateur/'.$oUtilisateur->getId().'" class="btn btn-danger btn-xs col-sm-offset-1">';
                                                    echo '<span title="Supprimer" class="glyphicon glyphicon-remove"></span>';
                                                echo '</a>';
                                        echo '</td>';
                                    echo '</tr>';   
                                }
                            ?> -->
                        </table>
                    </div> <!-- .col-lg-12 -->
                </div> <!-- .row -->
            </form>
            <div class="col-sm-10 col-sm-offset-10">
                <button type="button" id="btnAjouterResp" class="btn btn-success col-sm-offset-1">
                <span class="glyphicon glyphicon-plus"></span> Ajouter</button>
            </div>
        </div> <!-- .contenu -->
    <?php
    }

    public function afficheAjouterResponsable(){?>
          
        <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>

        <div class="col-sm-6 col-sm-offset-2">
            
            <div class="col-sm-offset-2 col-sm-9">
                <div class="col-sm-offset-4  col-sm-8">
                    <div class="navbar navbar-default text-center">
                        <h3 class="navbar-text">Ajouter un responsable</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-offset-4 col-sm-8 page-header">
                     
            </div>

            <div class="col-sm-12 col-sm-offset-1">
                <form id="frmAjouterResponsable" action="" method="POST" enctype="" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="txtPrenom" class="col-sm-4 control-label">Prénom :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtPrenom" class="form-control" name="prenom" placeholder="Prenom">
                            <div class="divErreur" id="txtPrenomErreur"></div>    
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtNom" class="col-sm-4 control-label">Nom  :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtNom" class="form-control" name="nom" placeholder="Nom">
                            <div class="divErreur" id="txtNomErreur"></div>    
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="emlCourriel" class="col-sm-4 control-label">Courriel :</label>
                        <div class="col-sm-6">
                            <input type="email" id="emlCourriel" class="form-control" name="courriel" placeholder="Courriel">
                            <div class="divErreur" id="emlCourrielErreur"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sltCommissions" class="col-sm-4 control-label">Commission scolaire :</label>
                        <div class="col-sm-6">
                            <select id="sltCommissions" class="form-control col-sm-6" name="commissions">
                                <?php         
                                    foreach($this->aListeCommissions as $oCommission){                                        
                                        echo '<option value="'.$oCommission->getId().'">'.$oCommission->getNom().'</option>';
                                    }
                                ?>
                            </select>
                            <div class="divErreur" id="sltCommissionsErreur"></div>
                        </div>
                    </div>
                    <div class="form-group"></div>
                    <div class="form-group"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-6 text-right">
                             <a href="#" class="btn btn-danger" role="button">
                                <span class="glyphicon glyphicon-remove"></span> Annuler
                            </a>
                            <button type="submit" id="subAjouterResp" class="btn btn-success col-sm-offset-1 ">
                                <span class="glyphicon glyphicon-plus"></span> Ajouter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }

    public function afficheModifierResponsables(){?>
        
        <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>


        <div class="col-sm-6 col-sm-offset-2">


            <div class="col-sm-offset-3 col-sm-9">
                <div class="col-sm-offset-2  col-sm-9">
                    <div class="navbar navbar-default text-center">
                        <h3 class="navbar-text">Modifier un responsable</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-offset-4 col-sm-8 page-header">
                     
            </div>

            <div class="col-sm-12 col-sm-offset-1">
                <form id="frmModifierResp" acion="" method="POST" enctype="" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="txtPrenom" class="col-sm-4 control-label">Prénom :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtPrenom" class="form-control" name="prenom" placeholder="Prenom" value="<?php echo $this->oUtilisateur->getPrenom();?>">
                            <div class="divErreur" id="txtPrenomErreur"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtNom" class="col-sm-4 control-label">Nom  :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtNom" class="form-control" name="nom" placeholder="Nom" value="<?php echo $this->oUtilisateur->getNom();?>">
                            <div class="divErreur" id="txtNomErreur"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="emlCourriel" class="col-sm-4 control-label">Courriel :</label>
                        <div class="col-sm-6">
                            <input type="email" id="emlCourriel" class="form-control" name="courriel" placeholder="Courriel" value="<?php echo $this->oUtilisateur->getCourriel();?>">
                            <div class="divErreur" id="emlCourrielErreur"></div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="txtPseudo" class="col-sm-4 control-label">Pseudo :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtPseudo" class="form-control" name="courriel" placeholder="Pseudo" value="<?php echo $this->oUtilisateur->getPseudo();?>">
                            <div class="divErreur" id="txtPseudoErreur"></div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="pswPass" class="col-sm-4 control-label">Mot de passe :</label>
                        <div class="col-sm-6">
                            <input type="text" id="pswPass" class="form-control" name="mdp" placeholder="Mot de passe" value="<?php echo $this->oUtilisateur->getMDP();?>">
                            <div class="divErreur" id="pswPassErreur"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sltCommissions" class="col-sm-4 control-label">Commissions scolaires :</label>
                        <div class="col-sm-6">
                            <select multiple  id="sltCommissions" name="commissions" class="form-control col-sm-6">
                                <?php
                                    $oCommissionUtilisateurAModifier = new Commission();
                                    $oCommissionUtilisateurAModifier->setResponsable($this->oUtilisateur->getId());
                                    $oCommissionUtilisateurAModifier->chargerCommissionParResponsable();
                                    
                                    //aListeCommissions est une propriété qui contient un tableau d'objet
                                    // de chaque entrée de la table commission dans la bd. Comme elle appartient 
                                    //à l'objet $oVue (instance de cette classe (Admin.Vue)), elle peut être appelé 
                                    //$this->aListeCommission. On peut égalment récupérer les valeurs des propriétés de 
                                    //chacun des objet qu'elle contient en pointant vers les méthode de ces objets :
                                    //les méthodes de la classe Commission. 
                                    foreach($this->aListeCommissions as $oCommission){
                                        $selected = '';
                                        if($oCommissionUtilisateurAModifier->getId() == $oCommission->getId()){
                                            $selected = ' selected="selected"';
                                        }
                                        
                                        echo '<option value="'.$oCommission->getId().'" '.$selected.'>'.$oCommission->getNom().'</option>';
                                    }
                                ?>
                                <div class="divErreur" id="sltCommissionsErreur"></div>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-6 text-right">
                            <a href="#" class="btn btn-danger" role="button">
                                <span class="glyphicon glyphicon-remove"></span> Annuler
                            </a>
                            <button type="submit" id="subModifierResp" class="btn btn-success col-sm-offset-1">
                                <span class="glyphicon glyphicon-ok"></span> Modifier
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }

    /****************************************************/
    /**********AFFICHER GESTION DES COMMISSIONS**********/
    /****************************************************/

    public function afficheListeCommissions(){?>
    
        <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>
                    
        <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>
                    
        <div class="col-lg-12">
            <div class="page-header">
                <div class="navbar navbar-default">
                    <h2 class="navbar-text">Gérer les comissions scolaires</h2>
                </div>
            </div>
        </div>
        <div class="col-sm-11 col-sm-offset-1">
            <form id="frmChercherResponsable" method="GET" action="" enctype="" class="form-horizontal" role="form">
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-5 col-sm-offset-2">
                            <label for="sltMrc" class="col-sm-5 control-label">MRC :</label>
                            <div class="col-sm-7 col-md-7">
                                <select id="sltMrc" class="form-control" name="commission"> 
                                    <?php
                                        //pour chaque élément/objet du tableau

                                        foreach ($this->aListeCommissions as $oCommission) {
                                            //ajouter une balise option et afficher la valeur des propriéts de l'objet
                                            echo '<option value="'.$oCommission->getId().'">' . $oCommission->getNom() . '</option>';
                                        }
                                    ?>
                                    <div class="divErreur" id="sltMrcErreur"></div>                         
                                </select>
                            </div>  
                        </div>
                    </div> <!-- .form-group -->
                </div>  <!-- .row -->  
                <div class="col-xs-3 col-sm-3 col-md-3 pull-right">
                    <button type="submit" id="subChercherCommissions" class="btn btn-success pull-right">
                    <span class="glyphicon glyphicon-search"></span> Rechercher</button>
                </div> 
                <div class="col-xs-3 col-sm-3 col-md-3 pull-right">
                </div>        
            </form> 
        </div>   

        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <div class="">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table id="tabRechercherCom" class="table table-striped text-center">
                    <tr>
                        <th class="text-center">MRC</th>
                        <th class="text-center">Nom de la Commission</th>
                        <th class="text-center">Responsable</th>
                        <th class="text-center">Écoles</th>
                        <th class="text-center">Action</th>
                    </tr>
                    <?php
                        foreach ($this->aListeCommissions as $oCommission) {
                            $oUtilisateur = new Utilisateur($oCommission->getResponsable());
                            $oUtilisateur->chargerCompteParId();

                            echo '<tr>';
                                echo '<td>'.$oCommission->getNomRegion().'</td>';
                                echo '<td>'.$oCommission->getNom().'</td>';
                                echo '<td>'.count($oCommission->rechercherListeEcoles()).'</td>';
                                echo '<td>'.$oUtilisateur->getPrenom().' '.$oUtilisateur->getNom().'</td>';
                                echo '<td>
                                        <a href="" class="btn btn-primary btn-xs" title="Modifier">
                                            <span title="Modifier" class="glyphicon glyphicon-pencil col-sm-offset-1"></span>
                                        </a>
                                        <a href="" class="btn btn-danger btn-xs" title="Supprimer">
                                            <span title="Supprimer" class="glyphicon glyphicon-remove col-sm-offset-1"></span>
                                        </a>
                                    </td>';
                            echo '</tr>';
                        }
                    ?> 

                </table>
            </div> <!-- .col-lg-12 -->
        </div> <!-- .row -->
        <div class="col-sm-10 col-sm-offset-10">
            <button type="button" id="btnAjouterCommissions" class="btn btn-success col-sm-offset-1">
            <span class="glyphicon glyphicon-plus"></span> Ajouter</button>
        </div>
    <?php
    }

    /**************************************************/
    /**********AFFICHER AJOUT DES COMMISSIONS**********/
    /**************************************************/

    public function afficheAjouterCommissions(){?>

        <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>

        <div class="col-sm-6 col-sm-offset-2">
            
            <div class="col-sm-offset-2 col-sm-9">
                <div class="col-sm-offset-4  col-sm-8">
                    <div class="navbar navbar-default text-center">
                        <h3 class="navbar-text">Ajouter une commission scolaire</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-offset-4 col-sm-8 page-header">
                     
            </div>

            <div class="col-sm-12 col-sm-offset-1">
                <form id="frmAjouterResponsable" action="" method="POST" enctype="" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="sltMrc" class="col-sm-4 control-label">MRC :</label>
                            <div class="col-sm-6">
                                <select mutltiple id="sltMrc" class="form-control" name="sltMrc">
                                 <?php         
                                    foreach($this->aListeCommissions as $oCommission){                                        
                                        echo '<option value="'.$oCommission->getId().'">'.$oCommission->getNom().'</option>';
                                    }
                                ?>
                                </select>
                                <div class="divErreur" id="sltMrcErreur"></div>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="txtNom" class="col-sm-4 control-label">Commission scolaire :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtNom" class="form-control" name="nom" placeholder="Nom">
                            <div class="divErreur" id="txtNomErreur"></div>    
                        </div>
                    </div>
        
                    <div class="form-group"></div>
                    <div class="form-group"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-6 text-right">
                             <a href="#" class="btn btn-danger" role="button">
                                <span class="glyphicon glyphicon-remove"></span> Annuler
                            </a>
                            <button type="submit" id="subAjouterCommission" class="btn btn-success col-sm-offset-1 ">
                                <span class="glyphicon glyphicon-plus"></span> Ajouter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }

    /***********************************************************/
    /***********AFFICHER MODIFICATIONS DES COMMISSIONS**********/
    /***********************************************************/

    public function afficheModifierCommission(){?>

         <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>

        <div class="col-sm-6 col-sm-offset-2">
            
            <div class="col-sm-offset-2 col-sm-9">
                <div class="col-sm-offset-4  col-sm-8">
                    <div class="navbar navbar-default text-center">
                        <h3 class="navbar-text">Modifier une commission scolaire</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-offset-4 col-sm-8 page-header">
                     
            </div>

            <div class="col-sm-12 col-sm-offset-1">
                <form id="frmAjouterResponsable" action="" method="POST" enctype="" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="sltMrc" class="col-sm-4 control-label">MRC :</label>
                            <div class="col-sm-6">
                                <select id="sltMrc" class="form-control" name="sltMrc">
                                 <?php         
                                    foreach($this->aListeCommissions as $oCommission){                                        
                                        echo '<option value="'.$oCommission->getId().'">'.$oCommission->getNom().'</option>';
                                    }
                                ?>
                                </select>
                                <div class="divErreur" id="sltMrcErreur"></div>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="txtCommission" class="col-sm-4 control-label">Commissions scolaire :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtCommission" class="form-control" name="nom" placeholder="Nom de la commission">
                            <div class="divErreur" id="txtCommissionErreur"></div>    
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtResposable" class="col-sm-4 control-label">Responsable :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtNom" class="form-control" name="nom" placeholder="Resposable">
                            <div class="divErreur" id="txtResponsableErreur"></div>    
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sltEcoles" class="col-sm-4 control-label">MRC :</label>
                            <div class="col-sm-6">
                                <select mutltiple id="sltEcoles" class="form-control" name="sltMrc">
                                 <?php         
                                    foreach($this->aListeEcoles as $oCommission){                                        
                                        echo '<option value="'.$oCommission->getId().'">'.$oCommission->getNom().'</option>';
                                    }
                                ?>
                                </select>
                                <div class="divErreur" id="sltEcolesErreur"></div>
                            </div>
                    </div>
                    <div class="form-group"></div>
                    <div class="form-group"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-6 text-right">
                             <a href="#" class="btn btn-danger" role="button">
                                <span class="glyphicon glyphicon-remove"></span> Annuler
                            </a>
                            <button type="submit" id="subModifierCommission" class="btn btn-success col-sm-offset-1 ">
                                <span class="glyphicon glyphicon-plus"></span> Ajouter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    <?php
    }

    /***************************************************/
    /***********AFFICHER SUPPRIMER COMMISSIONS**********/
    /***************************************************/


    public function afficheSupprimerCommission(){?>
        <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>

        <div class="col-sm-6 col-sm-offset-2">
            
            <div class="col-sm-offset-3 col-sm-9">
                <div class="col-sm-offset-2  col-sm-9">
                    <div class="navbar navbar-default text-center">
                        <h3 class="navbar-text">Supprimer une commission scolaire</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-offset-4 col-sm-8 page-header">
                     
            </div>
            <div class="col-sm-12 col-sm-offset-1">
                <form id="frmSupprimerCommision" class="form-horizontal" action="" method="POST" enctype="" role="form">
                    <div class="form-group">
                        <label for="txtCommission" class="col-sm-4 control-label">Commission scolaire :</label>
                        <div class="col-sm-6">
                            <span id="txtCommission" name="mrc"></span>
                        </div>
                    </div>
                   
                    <div class="form-group"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-6 text-right">
                             <a href="#" class="btn btn-danger" role="button">
                                <span class="glyphicon glyphicon-remove"></span> Annuler
                            </a>
                            <button type="submit" name="subSupprimer" id="subSupprimer" class="btn btn-success col-sm-offset-1">
                                <span class="glyphicon glyphicon-ok"></span> Supprimer
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }

    /***********************************************************/
    /****************AFFICHER GÉRER LES ÉCOLES******************/
    /***********************************************************/

    public function afficheListeEcoles(){?>
        
        <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>
                    
        <div class="col-lg-12">
            <div class="page-header">
                <div class="navbar navbar-default">
                    <h2 class="navbar-text">Gérer les écoles</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <form id="frmChercherEcole" method="GET" action="" enctype="" class="form-horizontal" role="form">
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label for="txtRechercherCourriel" class="col-xs-3 col-sm-3 col-md-5 control-label">Courriel :</label>
                            <div class="col-sm-9 col-md-7">
                                 <input type="email" id="txtRechercherCourriel" name="courriel" class="form-control" placeholder="Courriel">
                                 <div class="divErreur" id="txtRechercherCourrielErreur"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="txtRechercherNom" class="col-xs-3 col-sm-3 col-md-5 control-label">Nom :</label>
                            <div class="col-sm-9 col-md-7">
                                 <input type="text" id="txtRechercherNom" name="nom" class="form-control" placeholder="Nom">
                                 <div class="divErreur" id="txtRechercherNomErreur"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="sltRechercherEcole" class="col-xs-3 col-sm-3 col-md-5 control-label">École :</label>
                            <div class="col-sm-9 col-md-7">
                                <select mutltiple id="sltRechercherEcole" class="form-control" name="ecole">
                                    <option value="0">Sélection</option> 
                                </select>
                            <div class="divErreur" id="sltRechercherEcoleErreur"></div>
                            </div>
                        </div>
                    </div> <!-- .form-group -->
                </div>  <!-- .row -->  
                <div class="col-xs-3 col-sm-3 col-md-3 pull-right">
                    <button type="submit" id="subChercherEcole" class="btn btn-success pull-right">
                    <span class="glyphicon glyphicon-search"></span> Rechercher</button>
                </div> 
                <div class="col-xs-3 col-sm-3 col-md-3 pull-right">
                </div>        
            </form> 
        </div>   

            <div class="contenu">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <div class="">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table id="tabRechercherEcoles" class="table table-striped text-center">
                        <tr>
                            <th class="text-center">Prénom</th>
                            <th class="text-center">Nom</th>
                            <th class="text-center">Courriel</th>
                            <th class="text-center">Commission scolaire</th>
                            <th class="text-center">École</th>
                            <th class="text-center">Matière</th>
                            <th class="text-center">Action</th>
                        </tr>
                        <tr>
                            <td id="txtPrenomTabProf"></td>
                            <td id="txtNomTabProf"></td>
                            <td id="txtCourrielTabProf"></td>
                            <td id="txtCommissionTabProf"></td>
                            <td id="txtEcoleTabProf"></td> <!-- Si plus d'une afficher valeurs multiples -->
                            <td id="txtMatiereTabProf"></td> <!-- Si plus d'une afficher valeurs multiples -->
                            <td>
                                <!-- echo '<a href="'.WEB_ROOT.'/admin/modifierUtilisateur/'.$oUtilisateur->getId().'" class="btn btn-primary btn-xs">';
                                    echo '<span title="Modifier" class="glyphicon glyphicon-pencil"></span>';
                                echo '</a>';
                                echo '<a href="'.WEB_ROOT.'/admin/supprimerUtilisateur/'.$oUtilisateur->getId().'" class="btn btn-danger btn-xs col-sm-offset-1">';
                                    echo '<span title="Supprimer" class="glyphicon glyphicon-remove"></span>';
                                echo '</a>'; -->
                               <a href="#" class="btn btn-primary btn-xs" title="Modifier">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <a href="#" class="btn btn-danger btn-xs col-sm-offset-1" title="Supprimer">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div> <!-- .col-lg-12 -->
            </div> <!-- .row -->
            <div class="col-sm-10 col-sm-offset-10">
                <button type="button" id="btnAjouterEcole" class="btn btn-success col-sm-offset-1">
                <span class="glyphicon glyphicon-plus"></span> Ajouter</button>
            </div>
        </div> <!-- .contenu -->
    <?php
    }

    /*=====================================*/
    /*========FIN DE LA SECTION DES========*/
    /*==========DROITS SUPERADMIN==========*/
    /*=====================================*/


    /*================================================*/
    /*============GESTION DES PROFESSEURS=============*/
    /*==DROITS RESPONSABLES DES COMMISSIONS SCOLAIRE==*/
    /*================================================*/
    
    public function afficheListeProfesseurs(){?>
        
        <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>
        <div class="row">            
            <div class="col-lg-12">
                <div class="page-header">
                    <div class="navbar navbar-default">
                        <h2 class="navbar-text">Gérer les professeurs</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <form id="frmChercherProf" method="GET" action="" enctype="" class="form-horizontal" role="form">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-4">
                                <label for="emlCourriel" class="col-xs-3 col-sm-3 col-md-5 control-label">Courriel :</label>
                                <div class="col-sm-9 col-md-7">
                                    <input type="email" id="emlCourriel" name="emlCourriel" class="form-control" placeholder="Courriel">
                                    <div class="divErreur" id="emlCourrielErreur"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="txtNom" class="col-xs-3 col-sm-3 col-md-5 control-label">Nom :</label>
                                <div class="col-sm-9 col-md-7">
                                    <input type="text" id="txtNom" name="nom" class="form-control" placeholder="Nom">
                                    <div class="divErreur" id="txtNomErreur"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="sltEcoles" class="col-xs-3 col-sm-3 col-md-5 control-label">École :</label>
                                <div class="col-sm-9 col-md-7">
                                    <select mutltiples id="sltEcoles" class="form-control" name="ecole">
                                        <option value="0">Sélection</option> 
                                    </select>
                                    <div class="divErreur" id="sltEcolesErreur"></div>
                                </div>
                            </div>
                        </div> <!-- .form-group -->
                    </div>  <!-- .row -->  
                    <div class="col-xs-3 col-sm-3 col-md-3 pull-right">
                        <button type="submit" id="subChercherProf" class="btn btn-success pull-right">
                        <span class="glyphicon glyphicon-search"></span> Rechercher</button>
                    </div> 
                    <div class="col-xs-3 col-sm-3 col-md-3 pull-right">
                    </div>        
                </form> 
            </div>
        </div>   

        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <div class="">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table id="tabRechercherProf" class="table table-striped text-center">
                    <tr>
                        <th class="text-center">Prénom</th>
                        <th class="text-center">Nom</th>
                        <th class="text-center">Courriel</th>
                        <th class="text-center">Pseudo</th>
                        <th class="text-center">Commission</th>
                        <th class="text-center">École</th>
                        <th class="text-center">Matière</th>
                        <th class="text-center">Action</th>
                    </tr>
                    <?php
                        foreach ($this->aListeProfs as $oUtilisateur) {
                            if(count($oUtilisateur->getListeEcoles()) > 1){
                                $ecole = 'Multiples';
                            }
                            else{
                                $aEcoles = $oUtilisateur->getListeEcoles();
                                $ecole = $aEcoles[0]->getNom();
                            }
                            if(count($oUtilisateur->getListeMatieres()) > 1){
                                $matiere = 'Multiples';
                            }
                            else{
                                $aMatieres = $oUtilisateur->getListeMatieres();
                                $matiere = $aMatieres[0]->getNom();
                            }

                            echo '<tr>';
                                echo '<td>'.$oUtilisateur->getPrenom().'</td>';
                                echo '<td>'.$oUtilisateur->getNom().'</td>';
                                echo '<td>'.$oUtilisateur->getCourriel().'</td>';
                                echo '<td>'.$oUtilisateur->getPseudo().'</td>';
                                echo '<td>'.$oUtilisateur->getNomCommission().'</td>';
                                echo '<td>'.$ecole.'</td>';
                                echo '<td>'.$matiere.'</td>';
                                echo '<td>
                                        <a href="'.WEB_ROOT.'/admin/utilisateur/modifier-prof/'.$oUtilisateur->getId().'" class="btn btn-primary btn-xs">
                                            <span title="Modifier" class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <a href="'.WEB_ROOT.'/admin/utilisateur/supprimer/'.$oUtilisateur->getId().'" class="btn btn-danger btn-xs col-sm-offset-1">
                                            <span title="Supprimer" class="glyphicon glyphicon-remove"></span>
                                        </a>
                                    </td>';
                            echo '</tr>';
                        }
                    ?>
                </table>
            </div> <!-- .col-lg-12 -->
        </div> <!-- .row -->
        <div class="col-sm-10 col-sm-offset-10">
            <a href="<?php echo WEB_ROOT.'/admin/utilisateur/ajouter-prof/';?>" id="btnAjouterProf" class="btn btn-success col-sm-offset-1">
            <span class="glyphicon glyphicon-plus"></span> Ajouter</a>
        </div>
    <?php
    }
    
    public function afficheAjouterProfesseur(){?>
          
        <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>

        <div class="col-sm-6 col-sm-offset-2">
            
            <div class="col-sm-offset-2 col-sm-9">
                <div class="col-sm-offset-4 col-sm-7">
                    <div class="navbar navbar-default col-sm-offset-1">
                        <h3 class="navbar-text">Ajouter un professeur</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-offset-4 col-sm-8 page-header">
                     
            </div>

            <div class="col-sm-12 col-sm-offset-1">
                <form id="frmAjouterProf" action="<?php echo WEB_ROOT;?>/admin/utilisateur/ajouter-prof" method="POST" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="txtPrenom" class="col-sm-4 control-label">Prénom :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtPrenom" class="form-control" name="txtPrenom" placeholder="Prenom">
                            <div class="divErreur" id="txtPrenomErreur"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtNom" class="col-sm-4 control-label">Nom  :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtNom" class="form-control" name="txtNom" placeholder="Nom">
                            <div class="divErreur" id="txtNomErreur"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="emlCourriel" class="col-sm-4 control-label">Courriel :</label>
                        <div class="col-sm-6">
                            <input type="email" id="emlCourriel" class="form-control" name="emlCourriel" placeholder="Courriel">
                            <div class="divErreur" id="emlCourrielErreur"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sltEcoles" class="col-sm-4 control-label">École :</label>
                        <div class="col-sm-6">
                            <select multiple id="sltEcoles" class="form-control col-sm-6" name="sltEcoles[]">
                                <?php
                                    foreach ($this->aListeEcoles as $oEcole) {
                                        echo '<option value="'.$oEcole->getId().'">'.$oEcole->getNom().'</option>';
                                    }
                                ?>
                            </select>
                            <div class="divErreur" id="sltEcolesErreur"></div>
                        </div>
                    </div>
                    <div id="chkAddDiv" class="form-group">
                        <label for="chkMatieres" class="col-sm-4 control-label">Matières :</label>
                        <div class="divErreur" id="chkMatieresErreur"></div>
                        <div class="col-sm-8">
                            <?php foreach ($this->aListeMatieres as $i => $oMatiere) {
                                echo '<div class="checkbox-inline col-sm-4">';
                                    echo '<label for="chk'.$i.'">';
                                        echo '<input type="checkbox" id="chk'.$i.'" name="chkMatieres[]" value="'.$oMatiere->getId().'">';
                                        echo $oMatiere->getNom();
                                    echo '</label>';
                                echo '</div>';
                            }?>
                        </div>                        
                    </div>
                    <div class="form-group"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-6 text-right">
                             <a href="<?php echo WEB_ROOT;?>/admin/utilisateur/gerer-profs" class="btn btn-danger" role="button">
                                <span class="glyphicon glyphicon-remove"></span> Annuler
                            </a>
                            <button type="submit" id="subAjouterProf" name="subCreerProf" class="btn btn-success col-sm-offset-1">
                                <span class="glyphicon glyphicon-plus"></span> Ajouter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }

    public function afficheModifierProfesseur(){?>
        
        <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>

        <div class="col-sm-6 col-sm-offset-2">
            
            <div class="col-sm-offset-2 col-sm-9">
                <div class="col-sm-offset-4 col-sm-7">
                    <div class="navbar navbar-default col-sm-offset-1">
                        <h3 class="navbar-text">Modifier un professeur</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-offset-4 col-sm-8 page-header">
                     
            </div>

            <div class="col-sm-12 col-sm-offset-1">
                <form id="frmModifierProf" action="<?php echo WEB_ROOT;?>/admin/utilisateur/modifier-prof/<?php echo $this->oUtilisateur->getId();?>" method="POST" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="txtPrenom" class="col-sm-4 control-label">Prénom :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtPrenom" class="form-control" name="txtPrenom" placeholder="Prenom" value="<?php echo $this->oUtilisateur->getPrenom();?>">
                            <div class="divErreur" id="txtPrenomErreur"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtNom" class="col-sm-4 control-label">Nom  :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtNom" class="form-control" name="txtNom" placeholder="Nom" value="<?php echo $this->oUtilisateur->getNom();?>">
                            <div class="divErreur" id="txtNomErreur"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="emlCourriel" class="col-sm-4 control-label">Courriel :</label>
                        <div class="col-sm-6">                  
                            <input type="email" id="emlCourriel" class="form-control" name="emlCourriel" placeholder="Courriel" value="<?php echo $this->oUtilisateur->getCourriel();?>">
                            <div class="divErreur" id="emlCourrielErreur"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sltEcoles" class="col-sm-4 control-label">École :</label>
                        <div class="col-sm-6">
                            <select multiple id="sltEcoles" class="form-control col-sm-6" name="sltEcoles[]">
                                <?php
                                    $ecolesSelectionnees = array();
                                    foreach($this->oUtilisateur->getListeEcoles() as $ecole_ID){
                                        $ecolesSelectionnees[] = $ecole_ID->getId();
                                    }
                                    foreach ($this->aListeEcoles as $oEcole) {
                                        $selected = '';
                                        if(in_array($oEcole->getId(), $ecolesSelectionnees)){
                                            $selected = 'selected="selected"';
                                        }
                                        echo '<option value="'.$oEcole->getId().'" '.$selected.'>'.$oEcole->getNom().'</option>';
                                    }
                                ?>
                            </select>
                            <div class="divErreur" id="sltEcolesErreur"></div>
                        </div>
                    </div>
                    <div id="chkAddDiv" class="form-group">
                        <label for="chkMatieres" class="col-sm-4 control-label">Matières :</label>
                        <div class="divErreur" id="chkMatieresErreur"></div>
                        <div class="col-sm-8">
                            <?php foreach ($this->aListeMatieres as $i => $oMatiere) {
                                $checked = '';
                                if(in_array($oMatiere->getId(), $this->aMatieresTuteur)){
                                    $checked = 'checked="checked"';
                                }
                                echo '<div class="checkbox-inline col-sm-4">';
                                    echo '<label for="chk'.$i.'">';
                                        echo '<input type="checkbox" id="chk'.$i.'" '.$checked.' name="chkMatieres[]" value="'.$oMatiere->getId().'">';
                                        echo $oMatiere->getNom();
                                    echo '</label>';
                                echo '</div>';
                            }?>
                        </div>                        
                    </div>
                    <div class="form-group"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-6 text-right">
                             <a href="<?php echo WEB_ROOT;?>/admin/utilisateur/gerer-tuteurs" class="btn btn-danger" role="button">
                                <span class="glyphicon glyphicon-remove"></span> Annuler
                            </a>
                            <button type="submit" id="subModifierProf" name="subModifierProf" class="btn btn-success col-sm-offset-1">
                                <span class="glyphicon glyphicon-plus"></span> Modifier
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }

     /*================================================*/
    /*=========FIN GESTION DES PROFESSEURS============*/
    /*==DROITS RESPONSABLES DES COMMISSIONS SCOLAIRE==*/
    /*================================================*/


    /*================================================*/
    /*============GESTION DES TUTEURS=================*/
    /*==========DROITS DES PROFESSEURS================*/
    /*================================================*/

    public function afficheListeTuteurs(){?>
        <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>
        <div class="row">            
            <div class="col-lg-12">
                <div class="page-header">
                    <div class="navbar navbar-default">
                        <h2 class="navbar-text">Gérer les tuteurs</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <form id="frmChercherTuteur" method="GET" action="" enctype="" class="form-horizontal" role="form">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-4">
                                <label for="emlCourriel" class="col-xs-3 col-sm-3 col-md-5 control-label">Courriel :</label>
                                <div class="col-sm-9 col-md-7">
                                    <input type="email" id="emlCourriel" name="emlCourriel" class="form-control" placeholder="Courriel">
                                    <div class="divErreur" id="emlCourrielErreur"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="txtNom" class="col-xs-3 col-sm-3 col-md-5 control-label">Nom :</label>
                                <div class="col-sm-9 col-md-7">
                                    <input type="text" id="txtNom" name="nom" class="form-control" placeholder="Nom">
                                    <div class="divErreur" id="txtNomErreur"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="sltEcoles" class="col-xs-3 col-sm-3 col-md-5 control-label">École :</label>
                                <div class="divErreur" id="sltEcolesErreur"></div>
                                <div class="col-sm-9 col-md-7">
                                    <select id="sltEcoles" class="form-control" name="ecole">
                                        <option value="">Sélection</option> 
                                    </select>
                                </div>
                            </div>
                        </div> <!-- .form-group -->
                    </div>  <!-- .row -->  
                    <div class="col-xs-3 col-sm-3 col-md-3 pull-right">
                        <button type="submit" id="subChercherTuteur" class="btn btn-success pull-right">
                        <span class="glyphicon glyphicon-search"></span> Rechercher</button>
                    </div> 
                    <div class="col-xs-3 col-sm-3 col-md-3 pull-right">
                    </div>        
                </form> 
            </div>
        </div>   

        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <div class="">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table id="tabRechercherTuteur" class="table table-striped text-center">
                    <tr>
                        <th class="text-center">Prénom</th>
                        <th class="text-center">Nom</th>
                        <th class="text-center">Courriel</th>
                        <th class="text-center">Pseudo</th>
                        <th class="text-center">École</th>
                        <th class="text-center">Matière</th>
                        <th class="text-center">Action</th>
                    </tr>
                    <?php
                        foreach ($this->aListeTuteurs as $oUtilisateur) {
                            if(count($oUtilisateur->getListeEcoles()) > 1){
                                $ecole = 'Multiples';
                            }
                            else{
                                $aEcoles = $oUtilisateur->getListeEcoles();
                                $ecole = $aEcoles[0]->getNom();
                            }
                            if(count($oUtilisateur->getListeMatieres()) > 1){
                                $matiere = 'Multiples';
                            }
                            else{
                                $aMatieres = $oUtilisateur->getListeMatieres();
                                $matiere = $aMatieres[0]->getNom();
                            }

                            echo '<tr>';
                                echo '<td>'.$oUtilisateur->getPrenom().'</td>';
                                echo '<td>'.$oUtilisateur->getNom().'</td>';
                                echo '<td>'.$oUtilisateur->getCourriel().'</td>';
                                echo '<td>'.$oUtilisateur->getPseudo().'</td>';
                                echo '<td>'.$ecole.'</td>';
                                echo '<td>'.$matiere.'</td>';
                                echo '<td>
                                        <a href="'.WEB_ROOT.'/admin/utilisateur/modifier-tuteur/'.$oUtilisateur->getId().'" class="btn btn-primary btn-xs">
                                            <span title="Modifier" class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <a href="'.WEB_ROOT.'/admin/utilisateur/supprimer/'.$oUtilisateur->getId().'" class="btn btn-danger btn-xs col-sm-offset-1">
                                            <span title="Supprimer" class="glyphicon glyphicon-remove"></span>
                                        </a>
                                    </td>';
                            echo '</tr>';
                        }
                    ?>
                </table>
            </div> <!-- .col-lg-12 -->
        </div> <!-- .row -->
        <div class="col-sm-10 col-sm-offset-10">
            <a href="<?php echo WEB_ROOT;?>/admin/utilisateur/ajouter-tuteur" id="btnAjouterProf" class="btn btn-success col-sm-offset-1">
            <span class="glyphicon glyphicon-plus"></span> Ajouter</a>
        </div>
    <?php
    }
    
    public function afficheAjouterTuteur(){?>
        <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>

        <div class="col-sm-6 col-sm-offset-2">
            <div class="col-sm-offset-2 col-sm-9">
                <div class="col-sm-offset-4 col-sm-7">
                    <div class="navbar navbar-default col-sm-offset-1">
                        <h3 class="navbar-text">Ajouter un tuteur</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-offset-4 col-sm-8 page-header">
                     
            </div>

            <div class="col-sm-12 col-sm-offset-1">
                <form id="frmAjouterTuteur" action="<?php echo WEB_ROOT;?>/admin/utilisateur/ajouter-tuteur" method="POST" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="txtPrenom" class="col-sm-4 control-label">Prénom :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtPrenom" class="form-control" name="txtPrenom" placeholder="Prenom">
                            <div class="divErreur" id="txtPrenomErreur"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtNom" class="col-sm-4 control-label">Nom  :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtNom" class="form-control" name="txtNom" placeholder="Nom">
                            <div class="divErreur" id="txtNomErreur"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="emlCourriel" class="col-sm-4 control-label">Courriel :</label>
                        <div class="col-sm-6">
                            <input type="email" id="emlCourriel" class="form-control" name="emlCourriel" placeholder="Courriel">
                            <div class="divErreur" id="emlCourrielErreur"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sltEcoles" class="col-sm-4 control-label">École :</label>
                        <div class="col-sm-6">
                            <select id="sltEcoles" class="form-control col-sm-6" name="sltEcoles">
                                <?php
                                    foreach ($this->aListeEcoles as $oEcole) {
                                        echo '<option value="'.$oEcole->getId().'">'.$oEcole->getNom().'</option>';
                                    }
                                ?>
                            </select>
                            <div class="divErreur" id="sltEcolesErreur"></div>
                        </div>
                    </div>
                    <div id="chkAddDiv" class="form-group">
                        <label for="chkMatieres" class="col-sm-4 control-label">Matières :</label>
                        <div class="divErreur" id="chkMatieresErreur"></div>
                        <div class="col-sm-8">
                            <?php foreach ($this->aListeMatieres as $i => $oMatiere) {
                                echo '<div class="checkbox-inline col-sm-4">';
                                    echo '<label for="chk'.$i.'">';
                                        echo '<input type="checkbox" id="chk'.$i.'" name="chkMatieres[]" value="'.$oMatiere->getId().'">';
                                        echo $oMatiere->getNom();
                                    echo '</label>';
                                echo '</div>';
                            }?>
                        </div>                        
                    </div>
                    <div class="form-group"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-6 text-right">
                             <a href="<?php echo WEB_ROOT;?>/admin/utilisateur/gerer-tuteurs" class="btn btn-danger" role="button">
                                <span class="glyphicon glyphicon-remove"></span> Annuler
                            </a>
                            <button type="submit" id="subAjouterTuteur" name="subCreerTuteur" class="btn btn-success col-sm-offset-1">
                                <span class="glyphicon glyphicon-plus"></span> Ajouter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>  
        
    <?php
    }

    public function afficheModifierTuteur(){?>

        <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>

        <div class="col-sm-6 col-sm-offset-2">
            
            <div class="col-sm-offset-2 col-sm-9">
                <div class="col-sm-offset-4 col-sm-7">
                    <div class="navbar navbar-default col-sm-offset-1">
                        <h3 class="navbar-text">Modifier un tuteur</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-offset-4 col-sm-8 page-header">
                     
            </div>

            <div class="col-sm-12 col-sm-offset-1">
                <form id="frmModifierTuteur" action="<?php echo WEB_ROOT;?>/admin/utilisateur/modifier-tuteur/<?php echo $this->oUtilisateur->getId();?>" method="POST" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="txtPrenom" class="col-sm-4 control-label">Prénom :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtPrenom" class="form-control" name="txtPrenom" placeholder="Prenom" value="<?php echo $this->oUtilisateur->getPrenom();?>">
                            <div class="divErreur" id="txtPrenomErreur"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtNom" class="col-sm-4 control-label">Nom  :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtNom" class="form-control" name="txtNom" placeholder="Nom" value="<?php echo $this->oUtilisateur->getNom();?>">
                            <div class="divErreur" id="txtNomErreur"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="emlCourriel" class="col-sm-4 control-label">Courriel :</label>
                        <div class="col-sm-6">
                            <input type="email" id="emlCourriel" class="form-control" name="emlCourriel" placeholder="Courriel" value="<?php echo $this->oUtilisateur->getCourriel();?>">
                            <div class="divErreur" id="emlCourrielErreur"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sltEcole" class="col-sm-4 control-label">École :</label>
                        <div class="col-sm-6">
                            <select id="sltEcole" class="form-control col-sm-6" name="sltEcole">
                                <?php
                                    $ecole = $this->oUtilisateur->getListeEcoles();
                                    foreach ($this->aListeEcoles as $oEcole) {
                                        $selected = '';
                                        if($ecole[0]->getId() == $oEcole->getId()){
                                            $selected = 'selected="selected"';
                                        }
                                        echo '<option value="'.$oEcole->getId().'">'.$oEcole->getNom().'</option>';
                                    }
                                ?>
                            </select>
                            <div class="divErreur" id="sltEcoleErreur"></div>
                        </div>
                    </div>
                    <div id="chkAddDiv" class="form-group">
                        <div class="divErreur" id="chkMatieresErreur"></div>
                        <label for="chkMatieres" class="col-sm-4 control-label">Matières :</label>
                        <div class="col-sm-8">
                            <?php foreach ($this->aListeMatieres as $i => $oMatiere) {
                                $checked = '';
                                if(in_array($oMatiere->getId(), $this->aMatieresTuteur)){
                                    $checked = 'checked="checked"';
                                }
                                echo '<div class="checkbox-inline col-sm-4">';
                                    echo '<label for="chk'.$i.'">';
                                        echo '<input type="checkbox" id="chk'.$i.'" '.$checked.' name="chkMatieres[]" value="'.$oMatiere->getId().'">';
                                        echo $oMatiere->getNom();
                                    echo '</label>';
                                echo '</div>';
                            }?>
                        </div>                        
                    </div>
                    <div class="form-group"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-6 text-right">
                             <a href="<?php echo WEB_ROOT;?>/admin/utilisateur/gerer-tuteurs" class="btn btn-danger" role="button">
                                <span class="glyphicon glyphicon-remove"></span> Annuler
                            </a>
                            <button type="submit" id="subModifierTuteur" name="subModifierTuteur" class="btn btn-success col-sm-offset-1">
                                <span class="glyphicon glyphicon-plus"></span> Modifier
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        
    <?php
    }

    public function afficheSupprimerUtilisateurs(){?>

        <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>

        <div class="col-sm-6 col-sm-offset-2">
            
            <div class="col-sm-offset-3 col-sm-9">
                <div class="col-sm-offset-2  col-sm-9">
                    <div class="navbar navbar-default text-center">
                        <h3 class="navbar-text">Supprimer un utilisateur</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-offset-4 col-sm-8 page-header">
                     
            </div>
            <div class="col-sm-12 col-sm-offset-1">
                <form id="frmSupprimerUtilisateur" class="form-horizontal" action="" method="POST" enctype="" role="form">
                    <div class="form-group">
                        <label for="txtPrenom" class="col-sm-4 control-label">Prénom :</label>
                        <div class="col-sm-6">
                            <span id="txtSupprimerPrenom" name="prenom"><?php echo $this->oUtilisateur->getPrenom();?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtNom" class="col-sm-4 control-label">Nom  :</label>
                        <div class="col-sm-6">
                            <span id="txtSupprimerNom" name="nom"><?php echo $this->oUtilisateur->getNom();?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtRole" class="col-sm-4 control-label">Role  :</label>
                        <div class="col-sm-6">
                            <span id="txtSupprimerRole" name="role"><?php echo $this->oUtilisateur->getNomRole();?></span>
                        </div>
                    </div>
                    <div class="form-group"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-6 text-right">
                            <?php
                                switch($this->oUtilisateur->getRole()){
                                    case '2':
                                        $back = 'gerer-tuteurs';
                                        break;
                                    case '3':
                                        $back = 'gerer-profs';
                                        break;
                                    case '4':
                                        $back = 'gerer-responsables';
                                        break;
                                }
                            ?>
                             <a href="<?php echo WEB_ROOT.'/admin/utilisateur/'.$back;?>" class="btn btn-danger" role="button">
                                <span class="glyphicon glyphicon-remove"></span> Annuler
                            </a>
                            <button type="submit" name="subSupprimer" id="subSupprimer" class="btn btn-success col-sm-offset-1">
                                <span class="glyphicon glyphicon-ok"></span> Supprimer
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }

      
    
    
    
    public function afficheFormulaireSelectionModulesCommission(){?>
    
    <?php
    }


    
    //TODO: Ajouter des méthodes au besoin
}
?>