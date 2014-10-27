<?php
class AdminVue extends Vue {
    
    
    public function __construct(){?>
        
    <?php
    }
    
     public function afficheAjouterTuteurs(){?>
    
    <?php
    }

    /*=====================================*/
    /*======GESTION DES RESPONSABLES=======*/
    /*==========DROITS SUPERADMIN==========*/
    /*=====================================*/

    /*public function afficheListeResponsables(){?>

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
                    <h2 class="navbar-text">Rechercher un responsable</h2>
                </div>
            </div>
        </div>
        <div class="col-sm-11 col-sm-offset-1">
            <form id="frmChercherResponsable" method="GET" action="" enctype="" class="form-horizontal" role="form">
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-5 col-sm-offset-2">
                            <label for="sltRechercherRespCommission" class="col-sm-5 control-label">Commisions scolaires :</label>
                            <div class="col-sm-7 col-md-7">
                                <select id="sltRechercherRespCommission" class="form-control" name="commission"> 
                                       <?php
                                            //pour chaque élément/objet du tableau
                                            foreach ($this->aListeCommissions as $oCommission) {
                                                //ajouter une balise option et afficher la valeur des propriéts de l'objet
                                                echo '<option value="'.$oCommission->getId().'">' . $oCommission->getNom() . '</option>';
                                               
                                            }
                                       ?>                         
                                </select>
                                
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
                            <?php
                                foreach($this->aListeUtilisateurs as $oUtilisateur){
                                    //Tu devras utiliser des vrais utilisateurs qui ont une vraie commission d'assignée pour que ça marche
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
                            ?>
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
    }*/

    /*public function afficheAjouterResponsable(){?>
          
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
                <form id="frmAjoutProf" action="" method="POST" enctype="" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="txtAjoutPrenomResp" class="col-sm-4 control-label">Prénom :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtAjoutPrenomResp" class="form-control" name="prenom" placeholder="Prenom">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtAjoutNomResp" class="col-sm-4 control-label">Nom  :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtAjoutNomResp" class="form-control" name="nom" placeholder="Nom">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtAjoutCourrielResp" class="col-sm-4 control-label">Courriel :</label>
                        <div class="col-sm-6">
                            <input type="email" id="txtAjoutCourrielResp" class="form-control" name="courriel" placeholder="Courriel">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sltAjouterCommissionResp" class="col-sm-4 control-label">Commissions scolaires :</label>
                        <div class="col-sm-6">
                            <select multiple  id="sltAjouterCommissionResp" class="form-control col-sm-6" name="commissions">
                                <?php         
                                    foreach($this->aListeCommissions as $oCommission){                                        
                                        echo '<option value="'.$oCommission->getId().'">'.$oCommission->getNom().'</option>';
                                    }
                                ?>
                            </select>
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
    }*/

    /*public function afficheModifierResponsables(){?>
        
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
                        <h3 class="navbar-text">Modifier les informations d'un responsable</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-offset-4 col-sm-8 page-header">
                     
            </div>

            <div class="col-sm-12 col-sm-offset-1">
                <form id="frmModifProf" acion="" method="POST" enctype="" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="txtModifPrenomResp" class="col-sm-4 control-label">Prénom :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtModifPrenomResp" class="form-control" name="prenom" placeholder="Prenom" value="<?php echo $this->oUtilisateur->getPrenom();?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtModifNomResp" class="col-sm-4 control-label">Nom  :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtModifNomResp" class="form-control" name="nom" placeholder="Nom" value="<?php echo $this->oUtilisateur->getNom();?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtModifCourrielResp" class="col-sm-4 control-label">Courriel :</label>
                        <div class="col-sm-6">
                            <input type="email" id="txtModifCourrielResp" class="form-control" name="courriel" placeholder="Courriel" value="<?php echo $this->oUtilisateur->getCourriel();?>">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="txtModifPseudoResp" class="col-sm-4 control-label">Pseudo :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtModifPseudoResp" class="form-control" name="courriel" placeholder="Pseudo" value="<?php echo $this->oUtilisateur->getPseudo();?>">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="txtModifMdpResp" class="col-sm-4 control-label">Mot de passe :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtModifMdpResp" class="form-control" name="mdp" placeholder="Mot de passe" value="<?php echo $this->oUtilisateur->getMDP();?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sltModifCommissionResp" class="col-sm-4 control-label">Commissions scolaires :</label>
                        <div class="col-sm-6">
                            <select multiple  id="sltModifCommissionResp" name="commissions" class="form-control col-sm-6">
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
                            </select>
                        </div>
                    </div>
                    <div class="form-group"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-6 text-right">
                            <a href="#" class="btn btn-danger" role="button">
                                <span class="glyphicon glyphicon-remove"></span> Annuler
                            </a>
                            <button type="submit" id="subModifierProf" class="btn btn-success col-sm-offset-1">
                                <span class="glyphicon glyphicon-ok"></span> Modifier
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }*/

    public function afficheModifierCommission(){

    }

    public function afficheCreerCommission(){

    }

    public function afficheSupprimerCommission(){

    }

    public function afficheListeCommissions(){?>
    
        <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>
                    
        <div class="page-header">
            <div class="navbar navbar-default">
                <h2 class="navbar-text">Gérer les commissions scolaires</h2>
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
                <table id="tabRechercherCom" class="table table-striped text-center">
                    <tr>
                        <th class="text-center">MRC</th>
                        <th class="text-center">Nom</th>
                        <th class="text-center">Écoles</th>
                        <th class="text-center">Responsable</th>
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
            <button type="button" id="btnAjouterProf" class="btn btn-success col-sm-offset-1">
            <span class="glyphicon glyphicon-plus"></span> Ajouter</button>
        </div>
    <?php
    }

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
                    <h2 class="navbar-text">Rechercher une école</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <form id="frmChercherEcole" method="GET" action="" enctype="" class="form-horizontal" role="form">
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label for="txtRechercherEcoleCourriel" class="col-xs-3 col-sm-3 col-md-5 control-label">Courriel :</label>
                            <div class="col-sm-9 col-md-7">
                                 <input type="email" id="txtRechercherComCourriel" name="courriel" class="form-control" placeholder="Courriel" pattern="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="txtRechercherEcoleNom" class="col-xs-3 col-sm-3 col-md-5 control-label">Nom :</label>
                            <div class="col-sm-9 col-md-7">
                                 <input type="text" id="txtRechercherComNom" name="nom" class="form-control" placeholder="Nom" pattern="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="sltRechercherEcole" class="col-xs-3 col-sm-3 col-md-5 control-label">École :</label>
                            <div class="col-sm-9 col-md-7">
                                <select id="sltRechercherEcole" class="form-control" name="ecole">
                                    <option value="">Sélection</option> 
                                </select>
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
                <button type="button" id="btnAjouterProf" class="btn btn-success col-sm-offset-1">
                <span class="glyphicon glyphicon-plus"></span> Ajouter</button>
            </div>
        </div> <!-- .contenu -->
    <?php
    }

    /*=====================================*/
    /*======FIN GESTION DES RESPONSABLES===*/
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
                                <label for="txtRechercherTutCourriel" class="col-xs-3 col-sm-3 col-md-5 control-label">Courriel :</label>
                                <div class="col-sm-9 col-md-7">
                                     <input type="email" id="txtRechercherTutCourriel" name="courriel" class="form-control" placeholder="Courriel" pattern="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="txtRechercherTutNom" class="col-xs-3 col-sm-3 col-md-5 control-label">Nom :</label>
                                <div class="col-sm-9 col-md-7">
                                     <input type="text" id="txtRechercherTutNom" name="nom" class="form-control" placeholder="Nom" pattern="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="sltRechercherTutEcole" class="col-xs-3 col-sm-3 col-md-5 control-label">École :</label>
                                <div class="col-sm-9 col-md-7">
                                    <select id="sltRechercherTutEcole" class="form-control" name="ecole">
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
                                echo '<td>'.$oUtilisateur->getCommission().'</td>';
                                echo '<td>'.$ecole.'</td>';
                                echo '<td>'.$matiere.'</td>';
                                echo '<td>
                                        <a href="#" class="btn btn-primary btn-xs">
                                            <span title="Modifier" class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-xs col-sm-offset-1">
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
            <button type="button" id="btnAjouterProf" class="btn btn-success col-sm-offset-1">
            <span class="glyphicon glyphicon-plus"></span> Ajouter</button>
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
                <div class="col-sm-offset-4  col-sm-8">
                    <div class="navbar navbar-default text-center">
                        <h3 class="navbar-text">Ajouter un professeur</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-offset-4 col-sm-8 page-header">
                     
            </div>

            <div class="col-sm-12 col-sm-offset-1">
                <form id="frmAjoutProf" action="" method="POST" enctype="" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="txtAjoutPrenomProf" class="col-sm-4 control-label">Prénom :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtAjoutPrenomProf" class="form-control" name="prenom" placeholder="Prenom">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtAjoutNomProf" class="col-sm-4 control-label">Nom  :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtAjoutNomProf" class="form-control" name="nom" placeholder="Nom">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtAjoutCourrielProf" class="col-sm-4 control-label">Courriel :</label>
                        <div class="col-sm-6">
                            <input type="email" id="txtAjoutCourrielProf" class="form-control" name="courriel" placeholder="Courriel">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sltAjouterEcole" class="col-sm-4 control-label">Écoles :</label>
                        <div class="col-sm-6">
                            <select multiple  id="sltAjouterEcole" class="form-control col-sm-6" name="ecoles">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div id="chkAddDiv" class="form-group">
                        <label for="matieres" class="col-sm-4 control-label">Matières :</label>
                        <div class="col-sm-8">
                            <div class="checkbox-inline col-sm-4">
                                <label for="chkAjoutFran">
                                <input type="checkbox" id="chkAjoutFran" name="ajoutMatières[]" value="francais">
                                   Français
                                </label>
                            </div>
                            <div class="checkbox-inline col-sm-4">
                                <label for="chkAjoutMath">
                                <input type="checkbox" id="chkAjoutMath" name="ajoutMatières[]" value="mathematique">
                                   Mathématique
                                </label>
                            </div>
                        </div>
                        <label class="col-sm-4 control-label"></label>
                        <div class="col-sm-8">
                            <div class="checkbox-inline col-sm-4">
                                <label for="chkAjoutChim">
                                <input type="checkbox" id="chkAjoutChim" name="ajoutMatières[]" value="chimie">
                                   Chimie
                                </label>
                            </div>
                            <div class="checkbox-inline col-sm-4">
                                <label for="chkAjoutPhys">
                                <input type="checkbox" id="chkAjoutPhys" name="ajoutMatières[]" value="physique">
                                   Physique
                                </label>
                            </div>
                        </div>
                         <label class="col-sm-4 control-label"></label>
                        <div class="col-sm-8">
                            <div class="checkbox-inline col-sm-4">
                                <label for="chkAjoutHist">
                                <input type="checkbox" id="chkAjoutHist" name="ajoutMatières[]" value="histoire">
                                   Histoire
                                </label>
                            </div>
                            <div class="checkbox-inline col-sm-4">
                                <label for="chkAjoutGeo">
                                <input type="checkbox" id="chkAjoutGeo" name="ajoutMatières[]" value="geographie">
                                   Géographie
                                </label>
                            </div>
                        </div>
                        <label class="col-sm-4 control-label"></label>
                        <div class="col-sm-8">
                            <div class="checkbox-inline col-sm-4">
                                <label for="chkAjoutAng">
                                <input type="checkbox" id="chkAjoutAng" name="ajoutMatières[]" value="anglais">
                                   Anglais
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-6 text-right">
                             <a href="#" class="btn btn-danger" role="button">
                                <span class="glyphicon glyphicon-remove"></span> Annuler
                            </a>
                            <button type="submit" id="subAjouterProf" class="btn btn-success col-sm-offset-1">
                                <span class="glyphicon glyphicon-plus"></span> Ajouter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }

    public function afficheModifierProfesseurs(){?>
        
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
                        <h3 class="navbar-text">Modifier les informations d'un professeur</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-offset-4 col-sm-8 page-header">
                     
            </div>

            <div class="col-sm-12 col-sm-offset-1">
                <form id="frmModifProf" acion="" method="POST" enctype="" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="txtModifPrenomProf" class="col-sm-4 control-label">Prénom :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtModifPrenomProf" class="form-control" name="prenom" placeholder="Prenom">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtModifNomProf" class="col-sm-4 control-label">Nom  :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtModifNomProf" class="form-control" name="nom" placeholder="Nom">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtModifCourrielProf" class="col-sm-4 control-label">Courriel :</label>
                        <div class="col-sm-6">
                            <input type="email" id="txtModifCourrielProf" class="form-control" name="courriel" placeholder="Courriel">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtModifPseudoResp" class="col-sm-4 control-label">Pseudo :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtModifPseudoResp" class="form-control" name="courriel" placeholder="Pseudo">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="txtModifMdpResp" class="col-sm-4 control-label">Mot de passe :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtModifMdpResp" class="form-control" name="mdp" placeholder="Mot de passe">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sltModifEcoleProf" class="col-sm-4 control-label">Écoles :</label>
                        <div class="col-sm-6">
                            <select multiple  id="sltModifEcoleProf" name="ecoles" class="form-control col-sm-6">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div id="chkModDiv" class="form-group">
                        <label for="matiere" class="col-sm-4 control-label">Matières :</label>
                        <div class="col-sm-8">
                            <div class="checkbox-inline col-sm-4">
                                <label for="chkModifFran">
                                <input type="checkbox" id="chkModifFran" name="modifMatieres[]" value="francais">
                                   Français
                                </label>
                            </div>
                            <div class="checkbox-inline col-sm-4">
                                <label for="chkModifMath">
                                <input type="checkbox" id="chkModifMath" name="modifMatieres[]" value="mathematique">
                                   Mathématique
                                </label>
                            </div>
                        </div>
                        <label class="col-sm-4 control-label"></label>
                        <div class="col-sm-8">
                            <div class="checkbox-inline col-sm-4">
                                <label for="chkModifChimie">
                                <input type="checkbox" id="chkModifChimie" name="modifMatieres[]" value="chimie">
                                   Chimie
                                </label>
                            </div>
                            <div class="checkbox-inline col-sm-4">
                                <label for="chkModifPhy">
                                <input type="checkbox" id="chkModifPhy" name="modifMatieres[]" value="physique">
                                   Physique
                                </label>
                            </div>
                        </div>
                         <label class="col-sm-4 control-label"></label>
                        <div class="col-sm-8">
                            <div class="checkbox-inline col-sm-4">
                                <label for="chkModifHist">
                                <input type="checkbox" id="chkModifHist" name="modifMatieres[]" value="histoire">
                                   Histoire
                                </label>
                            </div>
                            <div class="checkbox-inline col-sm-4">
                                <label for="chkModifGeo">
                                <input type="checkbox" id="chkModifGeo" name="modifMatieres[]" value="geographie">
                                   Géographie
                                </label>
                            </div>
                        </div>
                        <label class="col-sm-4 control-label"></label>
                        <div class="col-sm-8">
                            <div class="checkbox-inline col-sm-4">
                                <label for="chkModifAng">
                                <input type="checkbox" id="chkModifAng" name="modifMatieres[]" value="anglais">
                                   Anglais
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-6 text-right">
                            <a href="#" class="btn btn-danger" role="button">
                                <span class="glyphicon glyphicon-remove"></span> Annuler
                            </a>
                            <button type="submit" id="subModifierProf" class="btn btn-success col-sm-offset-1">
                                <span class="glyphicon glyphicon-ok"></span> Modifier
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
                <form id="frmChercherProf" method="GET" action="" enctype="" class="form-horizontal" role="form">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-4">
                                <label for="txtRechercherTutCourriel" class="col-xs-3 col-sm-3 col-md-5 control-label">Courriel :</label>
                                <div class="col-sm-9 col-md-7">
                                     <input type="email" id="txtRechercherTutCourriel" name="courriel" class="form-control" placeholder="Courriel" pattern="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="txtRechercherTutNom" class="col-xs-3 col-sm-3 col-md-5 control-label">Nom :</label>
                                <div class="col-sm-9 col-md-7">
                                     <input type="text" id="txtRechercherTutNom" name="nom" class="form-control" placeholder="Nom" pattern="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="sltRechercherTutEcole" class="col-xs-3 col-sm-3 col-md-5 control-label">École :</label>
                                <div class="col-sm-9 col-md-7">
                                    <select id="sltRechercherTutEcole" class="form-control" name="ecole">
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
                <form id="frmAjoutProf" action="<?php echo WEB_ROOT;?>/admin/utilisateur/ajouter-tuteur" method="POST" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="txtAjoutPrenomTut" class="col-sm-4 control-label">Prénom :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtAjoutPrenomTut" class="form-control" name="txtPrenom" placeholder="Prenom">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtAjoutNomTut" class="col-sm-4 control-label">Nom  :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtAjoutNomTut" class="form-control" name="txtNom" placeholder="Nom">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtAjoutCourrielTut" class="col-sm-4 control-label">Courriel :</label>
                        <div class="col-sm-6">
                            <input type="email" id="txtAjoutCourrielTut" class="form-control" name="emlCourriel" placeholder="Courriel">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sltAjouterEcoleTut" class="col-sm-4 control-label">École :</label>
                        <div class="col-sm-6">
                            <select id="sltAjouterEcoleTut" class="form-control col-sm-6" name="sltEcole">
                                <?php
                                    foreach ($this->aListeEcoles as $oEcole) {
                                        echo '<option value="'.$oEcole->getId().'">'.$oEcole->getNom().'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div id="chkAddDiv" class="form-group">
                        <label for="matieres" class="col-sm-4 control-label">Matières :</label>
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
                            <button type="submit" id="subAjouterProf" name="subCreerTuteur" class="btn btn-success col-sm-offset-1">
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
                <form id="frmAjoutProf" action="<?php echo WEB_ROOT;?>/admin/utilisateur/modifier-tuteur/<?php echo $this->oUtilisateur->getId();?>" method="POST" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="txtAjoutPrenomTut" class="col-sm-4 control-label">Prénom :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtAjoutPrenomTut" class="form-control" name="txtPrenom" placeholder="Prenom" value="<?php echo $this->oUtilisateur->getPrenom();?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtAjoutNomTut" class="col-sm-4 control-label">Nom  :</label>
                        <div class="col-sm-6">
                            <input type="text" id="txtAjoutNomTut" class="form-control" name="txtNom" placeholder="Nom" value="<?php echo $this->oUtilisateur->getNom();?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtAjoutCourrielTut" class="col-sm-4 control-label">Courriel :</label>
                        <div class="col-sm-6">
                            <input type="email" id="txtAjoutCourrielTut" class="form-control" name="emlCourriel" placeholder="Courriel" value="<?php echo $this->oUtilisateur->getCourriel();?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sltAjouterEcoleTut" class="col-sm-4 control-label">École :</label>
                        <div class="col-sm-6">
                            <select id="sltAjouterEcoleTut" class="form-control col-sm-6" name="sltEcole">
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
                        </div>
                    </div>
                    <div id="chkAddDiv" class="form-group">
                        <label for="matieres" class="col-sm-4 control-label">Matières :</label>
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
                            <button type="submit" id="subAjouterProf" name="subModifierTuteur" class="btn btn-success col-sm-offset-1">
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
                <form id="frmSupprimerAdmin" class="form-horizontal" action="" method="POST" enctype="" role="form">
                    <div class="form-group">
                        <label for="txtSupprimerPrenom" class="col-sm-4 control-label">Prénom :</label>
                        <div class="col-sm-6">
                            <span id="txtSupprimerPrenom" name="prenom"><?php echo $this->oUtilisateur->getPrenom();?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtSupprimerNom" class="col-sm-4 control-label">Nom  :</label>
                        <div class="col-sm-6">
                            <span id="txtSupprimerNom" name="nom"><?php echo $this->oUtilisateur->getNom();?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtSupprimerRole" class="col-sm-4 control-label">Role  :</label>
                        <div class="col-sm-6">
                            <span id="txtSupprimerRole" name="role"><?php echo $this->oUtilisateur->getNomRole();?></span>
                        </div>
                    </div>
                    <div class="form-group"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-6 text-right">
                             <a href="#" class="btn btn-danger" role="button">
                                <span class="glyphicon glyphicon-remove"></span> Annuler
                            </a>
                            <button type="submit" name="subSupprimer" id="subValiderSupprimerProf" class="btn btn-success col-sm-offset-1">
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