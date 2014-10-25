<?php
class AdminVue extends Vue {
    
    
    public function __construct(){?>
        
    <?php
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

        <div class="col-lg-12">
            <div class="page-header">
                <div class="navbar navbar-default">
                    <h2 class="navbar-text">Rechercher une commission scolaire</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <form id="form-trouver-tuteur" class="form-horizontal" role="form">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="col-md-4">
                                <label for="select-mois" class="col-xs-3 col-sm-3 col-md-5 control-label">MRC</label>
                                <div class="col-sm-9 col-md-7">
                                    <select class="form-control" id="select-mois">
                                        <option value="">Sélection</option>
                                        <option value="1">Laval</option>
                                        <option value="2">Montcalm</option>
                                        <option value="3">Pontiac</option>
                                        <option value="4">Rivière-du-loup</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="select-annee" class="col-xs-3 col-sm-3 col-md-5 control-label">Nom :</label>
                                <div class="col-sm-9 col-md-7">
                                    <select class="form-control" id="select-annee">
                                        <option value="1">Gatineau</option>
                                        <option value="2">Montréal</option>
                                        <option value="3">Sherbrooke</option>
                                        <option value="4">Val-d'or</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="select-matiere" class="col-xs-3 col-sm-3 col-md-5 control-label">Responsable :</label>
                                <div class="col-sm-9 col-md-7">
                                    <select class="form-control" id="select-matiere">
                                        <option value="1">Louis Riel</option>
                                        <option value="2">Ste-Béatrice</option>
                                        <option value="3">Valcartier</option>
                                    </select>
                                </div>
                            </div>
                        </div> <!-- .form-group -->
                    </div> <!-- .col-lg-12 -->
                </div>  <!-- .row -->  
                <div class="col-xs-3 col-sm-3 col-md-3 pull-right">
                    <button type="button" id="rechercherTuteur" class="btn btn-success pull-right">
                    <span class="glyphicon glyphicon-search"></span>Rechercher</button>
                </div> 
                <div class="col-xs-3 col-sm-3 col-md-3 pull-right">
                </div>        
            </form> 
        </div>   

    <?php   
    }
    
    public function afficheAjouterCommissions(){?>

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
                    <h2 class="navbar-text">Rechercher une commission scolaire</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <form id="form-trouver-tuteur" class="form-horizontal" role="form">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="col-md-4">
                                <label for="select-mois" class="col-xs-3 col-sm-3 col-md-5 control-label">MRC</label>
                                <div class="col-sm-9 col-md-7">
                                    <select class="form-control" id="select-mois">
                                        <option value="">Sélection</option>
                                        <option value="1">Laval</option>
                                        <option value="2">Montcalm</option>
                                        <option value="3">Pontiac</option>
                                        <option value="4">Rivière-du-loup</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="select-annee" class="col-xs-3 col-sm-3 col-md-5 control-label">Nom :</label>
                                <div class="col-sm-9 col-md-7">
                                    <select class="form-control" id="select-annee">
                                        <option value="1">Gatineau</option>
                                        <option value="2">Montréal</option>
                                        <option value="3">Sherbrooke</option>
                                        <option value="4">Val-d'or</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="select-matiere" class="col-xs-3 col-sm-3 col-md-5 control-label">École :</label>
                                <div class="col-sm-9 col-md-7">
                                    <select class="form-control" id="select-matiere">
                                        <option value="1">Louis Riel</option>
                                        <option value="2">Ste-Béatrice</option>
                                        <option value="3">Valcartier</option>
                                    </select>
                                </div>
                            </div>
                        </div> <!-- .form-group -->
                    </div> <!-- .col-lg-12 -->
                </div>  <!-- .row -->  
                <div class="col-xs-3 col-sm-3 col-md-3 pull-right">
                    <button type="button" id="rechercherTuteur" class="btn btn-success pull-right">
                    <span class="glyphicon glyphicon-search"></span>Rechercher</button>
                </div> 
                <div class="col-xs-3 col-sm-3 col-md-3 pull-right">
                </div>        
            </form> 
        </div>   

    <?php
    }

    public function afficheAjouterEcoles(){?>


    <?PHP
    }
    
    public function afficheListeProfesseurs(){?>
        
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
                    <h2 class="navbar-text">Rechercher un professeur</h2>
                </div>
            </div>
        </div>
        <form id="form-trouver-tuteur" class="form-horizontal" role="form">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label for="select-mois" class="col-xs-3 col-sm-3 col-md-5 control-label">Prénom :</label>
                            <div class="col-sm-9 col-md-7">
                                <select class="form-control" id="select-mois">
                                    <option value="1">Paul</option>
                                    <option value="2">Roger</option>
                                    <option value="3">Simon</option>
                                    <option value="4">Vinvent</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="select-annee" class="col-xs-3 col-sm-3 col-md-5 control-label">Nom :</label>
                            <div class="col-sm-9 col-md-7">
                                <select class="form-control" id="select-annee">
                                    <option value="1">Martinez</option>
                                    <option value="2">Rodriguez</option>
                                    <option value="3">Sanchez</option>
                                    <option value="4">Valdez</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="select-matiere" class="col-xs-3 col-sm-3 col-md-5 control-label">École :</label>
                            <div class="col-sm-9 col-md-7">
                                <select class="form-control" id="select-matiere">
                                    <option value="1">Louis Riel</option>
                                    <option value="2">Ste-Béatrice</option>
                                    <option value="3">Valcartier</option>
                                </select>
                            </div>
                        </div>
                    </div> <!-- .form-group -->
                </div> <!-- .col-lg-12 -->
            </div>  <!-- .row -->  
            <div class="col-xs-3 col-sm-3 col-md-3 pull-right">
                <button type="button" id="rechercherTuteur" class="btn btn-success pull-right">
                <span class="glyphicon glyphicon-search"></span>Rechercher</button>
            </div> 
            <div class="col-xs-3 col-sm-3 col-md-3 pull-right">
               
            </div>        
            </form>

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
                    <table id="table" class="table table-striped text-center">
                        <tr>
                            <th class="text-center">Prénom</th>
                            <th class="text-center">Nom</th>
                            <th class="text-center">Commission scolaire</th>
                            <th class="text-center">École</th>
                            <th class="text-center">Matière</th>
                            <th class="text-center">Statut</th>
                            <th class="text-center">Action</th>
                        </tr>
                        <tr>
                            <td>Paul</td>
                            <td>Martinez</td>
                            <td>Montréal</td>
                            <td>Louis-Riel</td>
                            <td>Mathématique</td>
                            <td>Professeur</td>
                            <td><a href="#"><span class="glyphicon glyphicon-pencil"></span>
                            <a href="#" class="supprimerTuteur"><span class="glyphicon glyphicon-remove"></span></a></td>
                        </tr>
                    </table>
                </div> <!-- .col-lg-12 -->
            </div> <!-- .row -->
            <div class="col-xs-3 col-sm-3 col-md-3 pull-right">
                <button type="button" id="ajouterTuteur" class="btn btn-success pull-right">
                <span class="glyphicon glyphicon-plus"></span> Ajouter</button>
            </div>
        </div> <!-- .contenu -->
    <?php
    }
    
    public function afficheAjouterProfesseurs(){?>
          
          <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>

        <div class="col-sm-6 col-sm-offset-2">
            <div class="col-sm-offset-4 col-sm-6">
                <h2 class="page-header"><span class="label label-default">Ajouter un professeur</span></h2>
            </div>
            <div class="col-sm-offset-4 col-sm-8 page-header">
                     
            </div>
            <div class="col-sm-12 col-sm-offset-1">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="nom" class="col-sm-4 control-label">Prénom :</label>
                        <div class="col-sm-6">
                            <input type="text" id="nom" class="form-control" placeholder="Prenom" pattern="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nom" class="col-sm-4 control-label">Nom  :</label>
                        <div class="col-sm-6">
                            <input type="text" id="nom" class="form-control" placeholder="Nom" pattern="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nom" class="col-sm-4 control-label">Courriel :</label>
                        <div class="col-sm-6">
                            <input type="email" id="nom" class="form-control" placeholder="Courriel" pattern="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ecole" class="col-sm-4 control-label">École :</label>
                        <div class="col-sm-6">
                            <select class="form-control col-sm-6" id="ecole">
                                <option value="">Sélection</option>
                                <option value="1">Louis Riel</option>
                                <option value="2">Ste-Béatrice</option>
                                <option value="3">Valcartier</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="matiere" class="col-sm-4 control-label">Matières :</label>
                        <div class="col-sm-8">
                            <div class="checkbox-inline col-sm-4">
                                <label for="1">
                                <input type="checkbox" id="1" name="francais" value="">
                                   Français
                                </label>
                            </div>
                            <div class="checkbox-inline col-sm-4">
                                <label for="2">
                                <input type="checkbox" id="2" name="mathematique" value="">
                                   Mathématique
                                </label>
                            </div>
                        </div>
                        <label class="col-sm-4 control-label"></label>
                        <div class="col-sm-8">
                            <div class="checkbox-inline col-sm-4">
                                <label for="3">
                                <input type="checkbox" id="3" name="chimie" value="">
                                   Chimie
                                </label>
                            </div>
                            <div class="checkbox-inline col-sm-4">
                                <label for="4">
                                <input type="checkbox" id="4" name="physique" value="">
                                   Physique
                                </label>
                            </div>
                        </div>
                         <label class="col-sm-4 control-label"></label>
                        <div class="col-sm-8">
                            <div class="checkbox-inline col-sm-4">
                                <label for="5">
                                <input type="checkbox" id="5" name="histoire" value="">
                                   Histoire
                                </label>
                            </div>
                            <div class="checkbox-inline col-sm-4">
                                <label for="6">
                                <input type="checkbox" id="6" name="geographie" value="">
                                   Géographie
                                </label>
                            </div>
                        </div>
                        <label class="col-sm-4 control-label"></label>
                        <div class="col-sm-8">
                            <div class="checkbox-inline col-sm-4">
                                <label for="7">
                                <input type="checkbox" id="7" name="anglais" value="">
                                   Anglais
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-10">
                             <button type="submit" class="btn btn-danger col-sm-offset-0">
                                Anuler
                            </button>
                            <button type="submit" class="btn btn-success col-sm-offset-2">
                                Ajouter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    <?php
    }

     public function afficheListeTuteurs(){?>
    
        
    <?php
    }
    public function afficheAjouterTuteurs(){?>
    
    <?php
    }
    
    public function afficheFormulaireSelectionModulesCommission(){?>
    
    <?php
    }
    
    //TODO: Ajouter des méthodes au besoin
}
?>