<?php
class TutorielVue extends Vue {
    ///////////////////////////////////
    // Section pour la vue des tutos//
    /////////////////////////////////
    public function afficheListeConsulter(){?>
        <div id="message">
            <?php 
                if($this->getMessage()){
                    $aMessage = $this->getMessage();
                    echo '<div class="alert alert-'.$aMessage[1].'">'.$aMessage[0].'</div>';
                }
            ?>
        </div>

        <div class="page-header">
            <h1>Liste des tutoriels</h1>
        </div>

        <div class="row">
            <form method="GET" action="<?php echo WEB_ROOT;?>/tutoriel/consulter" class="form-horizontal" role="form">
                <div class="form-group">
                    <div class="col-sm-5">
                        <label for="select-annee" class="col-sm-3 col-md-2 control-label">
                            Année:
                        </label>
                        <div class="col-sm-9 col-md-10">
                            <select class="form-control" name="niveau" id="sltAnnee">
                                <?php
                                    for($i = 1; $i <= 5; $i++) {
                                        $selected = '';
                                        if($_GET['niveau'] == $i){
                                            $selected = 'selected="selected"';
                                        }
                                        echo '<option value="'.$i.'" '.$selected.'>Secondaire '.$i.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <label for="select-matiere" class="col-sm-3 col-md-2 control-label">
                            Matière:
                        </label>
                        <div class="col-sm-9 col-md-10">
                            <select class="form-control" name="matiere" id="sltMatiere">
                                <?php
                                    foreach ($this->aMatieres as $oMatiere) {
                                        $selected = '';
                                        if($_GET['matiere'] == $oMatiere->getId()){
                                            $selected = 'selected="selected"';
                                        }
                                        echo '<option value="'.$oMatiere->getId().'" '.$selected.'>'.$oMatiere->getNom().'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <input type="submit" class="form-control btn btn-success" value="Lancer &rarr;">
                    </div>
                </div>
            </form>
        </div>

        <?php
            if(!empty($this->aListeTutos)){
                echo '<div class="row">';
                foreach($this->aListeTutos as $oTutoriel){
                        echo '<div class="col-xs-4">';
                            echo '<div class="panel panel-default">';
                                echo '<div class="panel-heading">'.$oTutoriel->getTitre().'</div>';
                                echo '<div class="panel-body">';
                                    $type = ($oTutoriel->getType() == 1)?'video':'texte';
                                    echo '<a remote="'.WEB_ROOT.'/ControleurAJAX.php?module=tutoriel&action=visionner&id='.$oTutoriel->getContenuId().'"data-toggle="myModal" class="btn btn-primary btn-xs">';
                                        echo '<img class="img-responsive espaceAvant coinRond" src="../images/'.$type.'.jpg">';
                                    echo '</a>';
                                    echo '<h3 class="espaceApres">';
                                        echo '<a remote="'.WEB_ROOT.'/ControleurAJAX.php?module=tutoriel&action=visionner&id='.$oTutoriel->getContenuId().'"data-toggle="myModal">';
                                            echo $oTutoriel->getSorteMatiere();
                                        echo '</a>';
                                    echo '</h3>';
                                    echo '<p class="auteurDate">'.$oTutoriel->getPrenomTuteur().' '.$oTutoriel->getNomTuteur().', '.$oTutoriel->getDateSoumis().'</p>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                }
                echo '</div>';
            }
            else{
                echo "<div class='alert alert-info'>Aucun tutoriel ne correspond à vos critères de recherche</div>";
            }
        ?>
        <script>
            $('a[data-toggle="myModal"]').click(function(e) {
                e.preventDefault();
                console.log('click');
                $('#myModal').remove();
                var $this = $(this)
                  , $remote = $this.attr('remote') ||  $this.attr('href')
                  , $modal = $('<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>');
                $('body').append($modal);
                $modal.modal({backdrop: 'static', keyboard: false});
                $modal.load($remote);
              }
            );
        </script>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Visionner un tutoriel</h4>
              </div>
              <div class="modal-body">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              </div>
            </div>
          </div>
        </div>
    <?php
    }

    ///////////////////////////////////////////
    // Section pour visualiser texte ou video//
    //////////////////////////////////////////
    //TODO: 


    public function afficheLeVideo(){?>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Visionner un tutoriel</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2><?php echo $this->oTutoriel->getTitre();?></h2>
                            <div>
                                <?php echo $this->oTutoriel->getContenu();?>
                            </div>                            
                        </div>
                    </div>                             
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <p class="auteurDate"><?php echo $this->oTutoriel->getPrenomTuteur();?> <?php echo $this->oTutoriel->getNomTuteur();?>, <?php echo $this->oTutoriel->getDateSoumis();?></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    <?php
    }

    public function afficheLeTexte(){?>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Visionner un tutoriel</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2><?php echo $this->oTutoriel->getTitre();?></h2>
                            <p class="auteurDate"><?php echo $this->oTutoriel->getPrenomTuteur();?> <?php echo $this->oTutoriel->getNomTuteur();?>, <?php echo $this->oTutoriel->getDateSoumis();?></p>
                            <div text-center>
                                <p><?php echo $this->oTutoriel->getContenu();?></p>
                            </div>                          
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>                     
    <?php
    }

    ////////////////////////////
    // Section pour les tuteur//
    ////////////////////////////
    
    public function afficheListeGererTuteur(){?>
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1>
                        Gérer vos tutoriels
                    </h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table id="tabRechercherTuto" class="table table-striped text-center">
                    <tr>
                        <th class="text-center">Titre</th>
                        <th class="text-center">Type</th>
                        <th class="text-center">Date crée</th>
                        <th class="text-center">Statut</th>
                        <th class="text-center">Matière</th>
                        <th class="text-center">Niveau scolaire</th>
                        <th class="text-center">Action</th>
                    </tr>
                    <?php
                        foreach($this->aListeTutos as $oTutoriel){
                            echo '<tr>';
                                echo '<td id="txtTitre">'.$oTutoriel->getTitre().'</td>';
                                echo '<td id="txtType">'.$oTutoriel->getSorteTuto().'</td>';
                                echo '<td id="txtDateCree">'.$oTutoriel->getDateSoumis().'</td>';
                                echo '<td id="txtStatut">'.$oTutoriel->getTypeApprouver().'</td>';
                                echo '<td id="txtMatiere">'.$oTutoriel->getSorteMatiere().'</td>';
                                echo '<td id="txtNiveau">Secondaire '.$oTutoriel->getNiveauScolaire().'</td>';
                                echo '<td>';
                                    /*echo '<a href="'.WEB_ROOT.'/tutoriel/visualiser/'.$oTutoriel->getContenuId().'" class="btn btn-primary btn-xs">';
                                        echo '<span title="visualiser" class="glyphicon glyphicon-play"></span>';
                                    echo '</a>';*/
                                    echo '<a remote="'.WEB_ROOT.'/ControleurAJAX.php?module=tutoriel&action=visionner&id='.$oTutoriel->getContenuId().'" data-toggle="myModal" class="btn btn-primary btn-xs">';
                                        echo '<span title="visualiser" class="glyphicon glyphicon-play"></span>';
                                    echo '</a>';
                                    $type = ($oTutoriel->getType() == 1)?'video':'texte';
                                    echo '<a href="'.WEB_ROOT.'/tutoriel/modifier-'.$type.'/'.$oTutoriel->getContenuId().'" class="btn btn-primary btn-xs">';
                                        echo '<span title="Modifier" class="glyphicon glyphicon-pencil"></span>';
                                    echo '</a>';
                                    echo '<a href="'.WEB_ROOT.'/tutoriel/supprimer/'.$oTutoriel->getContenuId().'" class="btn btn-primary btn-xs">';
                                        echo '<span title="Supprimer" class="glyphicon glyphicon-remove"></span>';
                                    echo '</a>';
                                echo '</td>';
                            echo '</tr>';
                        }
                    ?>
                </table>
            </div> <!-- .col-lg-12 -->
        </div> <!-- .row -->
        <div class="row">
            <div class=" col-xs-12 text-right">
                <a href="<?php echo WEB_ROOT;?>/tutoriel/ajouter-video" class="btn btn-success">
                <span class="glyphicon glyphicon-plus"></span>Ajouter un vidéo</a>
                <a href="<?php echo WEB_ROOT;?>/tutoriel/ajouter-texte" class="btn btn-success">
                <span class="glyphicon glyphicon-plus"></span>Ajouter un texte</a>
            </div>
        </div>


        <script>
            $('a[data-toggle="myModal"]').click(function(e) {
                e.preventDefault();
                console.log('click');
                $('#myModal').remove();
                var $this = $(this)
                  , $remote = $this.attr('remote') ||  $this.attr('href')
                  , $modal = $('<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>');
                $('body').append($modal);
                $modal.modal({backdrop: 'static', keyboard: false});
                $modal.load($remote);
              }
            );
        </script>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Visionner un tutoriel</h4>
              </div>
              <div class="modal-body">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              </div>
            </div>
          </div>
        </div>
    <?php
    }
    
    //////////////////////////////////
    // Section pour les proffesseurs//
    //////////////////////////////////

    //gerer et voir tous les tuto de tour leur tuteur  
    /*public function afficheListeTutoTuteursProfesseur(){?>
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
                    <table id="tabRechercherTuto" class="table table-striped text-center">
                        <tr>
                            <tr>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Titre</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Date crée</th>
                                <th class="text-center">Matière</th>
                                <th class="text-center">Niveau scolaire</th>
                                 <th class="text-center">Statut</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </tr>
                        <?php
                            foreach($this->aListeTutos as $oTutoriel){
                                echo '<tr>'; 
                                    echo '<td id="txtNom">'.$oTutoriel->getNomTuteur().', '.$oTutoriel->getPrenomTuteur().'</td>';                           
                                    echo '<td id="txtTitre">'.$oTutoriel->getTitre().'</td>';
                                    echo '<td id="txtType">'.$oTutoriel->getSorteTuto().'</td>';
                                    echo '<td id="txtDateCree">'.$oTutoriel->getDateSoumis().'</td>';
                                    echo '<td id="txtMatiere">'.$oTutoriel->getSorteMatiere().'</td>';
                                    echo '<td id="txtNiveau">'.$oTutoriel->getNiveauScolaire().'</td>';
                                    echo '<td id="txtStatut">'.$oTutoriel->getTypeApprouver().'</td>';
                                    echo '<td>';
                                        echo '<a href="'.WEB_ROOT.'/tutoriel/visualiser/'.$oTutoriel->getContenuId().'" class="btn btn-primary btn-xs">';
                                            echo '<span title="visualiser" class="glyphicon glyphicon-play"></span>';
                                        echo '</a>';
                                        echo '<a href="'.WEB_ROOT.'/tutoriel/modifier/'.$oTutoriel->getContenuId().'" class="btn btn-primary btn-xs">';
                                            echo '<span title="Modifier" class="glyphicon glyphicon-pencil"></span>';
                                        echo '</a>';
                                        echo '<a href="'.WEB_ROOT.'/tutoriel/supprimer/'.$oTutoriel->getContenuId().'" class="btn btn-primary btn-xs">';
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
            <button type="button" id="btnAjouterVideo" class="btn btn-success col-sm-offset-1">
            <span class="glyphicon glyphicon-plus"></span>Ajouter</button>
        </div>
    <?php      //Avec bouton approuver
    }*/

    //TODO:
    //gerer la liste des tuto fait par le proffesseur  
    public function afficheListeGererProfesseur(){?>
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
                    <table id="tabRechercherTuto" class="table table-striped text-center">
                        <tr>
                            <th class="text-center">Titre</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">Date crée</th>
                            <th class="text-center">Matière</th>
                            <th class="text-center">Niveau scolaire</th>
                            <th class="text-center">Action</th>
                        </tr>
                        <?php
                            foreach($this->aListeTutos as $oTutoriel){
                                echo '<tr>';                            
                                    echo '<td id="txtTitre">'.$oTutoriel->getTitre().'</td>';
                                    echo '<td id="txtType">'.$oTutoriel->getSorteTuto().'</td>';
                                    echo '<td id="txtDateCree">'.$oTutoriel->getDateSoumis().'</td>';
                                    echo '<td id="txtMatiere">'.$oTutoriel->getSorteMatiere().'</td>';
                                    echo '<td id="txtNiveau">'.$oTutoriel->getNiveauScolaire().'</td>';
                                    echo '<td>';
                                        echo '<a href="'.WEB_ROOT.'/tutoriel/visualiser/'.$oTutoriel->getContenuId().'" class="btn btn-primary btn-xs">';
                                            echo '<span title="visualiser" class="glyphicon glyphicon-play"></span>';
                                        echo '</a>';
                                        echo '<a href="'.WEB_ROOT.'/tutoriel/modifier/'.$oTutoriel->getContenuId().'" class="btn btn-primary btn-xs">';
                                            echo '<span title="Modifier" class="glyphicon glyphicon-pencil"></span>';
                                        echo '</a>';
                                        echo '<a href="'.WEB_ROOT.'/tutoriel/supprimer/'.$oTutoriel->getContenuId().'" class="btn btn-primary btn-xs">';
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
            <button type="button" id="btnAjouterVideo" class="btn btn-success col-sm-offset-1">
            <span class="glyphicon glyphicon-plus"></span>Ajouter</button>
        </div>
    <?php      //Avec bouton approuver
    }

    //gerer la liste des tutos a prouver par proffesseur  
    /*public function afficheListeGererApprouverProfesseur(){?>
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
                    <table id="tabRechercherTuto" class="table table-striped text-center">
                        <tr>
                            <th class="text-center">Nom</th>
                            <th class="text-center">Titre</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">Date crée</th>
                            <th class="text-center">Matière</th>
                            <th class="text-center">Niveau scolaire</th>
                            <th class="text-center">Action</th>
                        </tr>
                        <?php
                            foreach($this->aListeTutos as $oTutoriel){
                                echo '<tr>';
                                    echo '<td id="txtNom">'.$oTutoriel->getNomTuteur().', '.$oTutoriel->getPrenomTuteur().'</td>';
                                    echo '<td id="txtTitre">'.$oTutoriel->getTitre().'</td>';
                                    echo '<td id="txtType">'.$oTutoriel->getSorteTuto().'</td>';
                                    echo '<td id="txtDateCree">'.$oTutoriel->getDateSoumis().'</td>';
                                    echo '<td id="txtMatiere">'.$oTutoriel->getSorteMatiere().'</td>';
                                    echo '<td id="txtNiveau">'.$oTutoriel->getNiveauScolaire().'</td>';
                                    echo '<td>';
                                        echo '<a href="'.WEB_ROOT.'/tutoriel/visualiser/'.$oTutoriel->getContenuId().'" class="btn btn-primary btn-xs">';
                                            echo '<span title="visualiser" class="glyphicon glyphicon-play"></span>';
                                        echo '</a>';
                                        echo '<a href="'.WEB_ROOT.'/tutoriel/modifier/'.$oTutoriel->getContenuId().'" class="btn btn-primary btn-xs">';
                                            echo '<span title="Modifier" class="glyphicon glyphicon-pencil"></span>';
                                        echo '</a>';
                                        echo '<a href="'.WEB_ROOT.'/tutoriel/supprimer/'.$oTutoriel->getContenuId().'" class="btn btn-primary btn-xs">';
                                            echo '<span title="Supprimer" class="glyphicon glyphicon-remove"></span>';
                                        echo '</a>';
                                        echo '<a href="'.WEB_ROOT.'/tutoriel/approuver/'.$oTutoriel->getContenuId().'" class="btn btn-primary btn-xs">';
                                            echo '<span title="approuver" class="glyphicon glyphicon-ok"></span>';
                                        echo '</a>';
                                    echo '</td>';
                                echo '</tr>';
                            }
                        ?>
                    </table>
                </div> <!-- .col-lg-12 -->
            </div> <!-- .row -->
        </form>
    <?php
    }*/

    //////////////////////////////////////
    // Section pour tout les formulaires//
    /////////////////////////////////////
    public function afficheFormulaireCreationVideo(){?>
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
                <h1 class="page-header">
                    Ajouter un vidéo
                </h1>
                <form action="<?php echo WEB_ROOT;?>/tutoriel/ajouter-video/" method="post" role="form" id="frmCreationVideo">
                    <div class="form-group">
                        <label>Titre</label>
                        <input id="txtTitre" name="txtTitre" class="form-control">
							<div id="txtTitreErreur" class="divErreur"></div> <!-- div pour afficher les erreurs -->
                    </div>
                     <div class="row">
                        <div class="form-group">
                            <div class="col-lg-3">
                                <label>Matière:</label>
                                <select class="form-control" name="sltMatiere" id="sltMatiere">
									<option value="0">Choisir</option> <!-- ???????????? -->
                                    <?php
                                        foreach ($this->aMatieres as $oMatiere) {
                                            echo '<option value="'.$oMatiere->getId().'">'.$oMatiere->getNom().'</option>';
                                        }
                                    ?>
                                </select>
								<div class="divErreur" id="sltMatiereErreur"></div> <!-- div pour afficher les erreurs -->
                           </div>
                            <div class="col-lg-3">
                                <label>Niveau secondaire:</label>
                                <select class="form-control" name="sltNiveau" id="sltNiveau">
									<option value="0">Choisir</option> <!-- ???????????? -->
                                    <?php
                                        for($i = 1; $i <= 5; $i++) {
                                            echo '<option value="'.$i.'">Secondaire '.$i.'</option>';
                                        }
                                    ?>
                                </select>
								<div class="divErreur" id="sltNiveauErreur"></div> <!-- div pour afficher les erreurs -->
                            </div>
                            <div class="col-lg-3">
                                <label>École:</label>
                                <select class="form-control" name="sltEcole" id="sltEcole">
									<option value="0">Choisir</option> <!-- ???????????? -->
                                    <?php
                                        foreach ($this->aEcoles as $oEcole) {
                                            echo '<option value="'.$oEcole->getId().'">'.$oEcole->getNom().'</option>';
                                        }
                                    ?>
                                </select>
								<div class="divErreur" id="sltEcoleErreur"></div> <!-- div pour afficher les erreurs -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><br/>Lien de video</label>
                        <input type="text" id="txtUrl" name="txtUrl" class="form-control">
							<div class="divErreur" id="txtUrlErreur"></div> <!-- div pour afficher les erreurs -->
								<p class="form-control-static">Le lien du vidéo doit etre un lien "embed" YouTube complet.</p>
                    </div>
                    <div class="form-group text-right">
                        <a href="<?php echo WEB_ROOT;?>/tutoriel/gerer" class="btn btn-danger">Annuler</a>
                        <button type="submit" name="subAjouterVideo" class="btn btn-success">Soumettre</button>
                    </div>
                </form>
            </div>
        </div>
		<script src="<?php echo WEB_ROOT;?>/js/Tutoriel.js"></script>
    <?php
    }
    
    public function afficheFormulaireCreationTexte(){?>
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
                <h1 class="page-header">
                    Ajouter un texte
                </h1>
                <form action="<?php echo WEB_ROOT;?>/tutoriel/ajouter-texte/" method="post" role="form" id="frmCreationTexte">
                    <div class="form-group">
                        <label>Titre</label>
                        <input id="txtTitre" name="txtTitre" class="form-control">
						<div id="txtTitreErreur" class="divErreur"></div> <!-- div pour afficher les erreurs -->
                    </div>
                     <div class="row">
                        <div class="form-group">
                            <div class="col-lg-3">
                                <label>Matière:</label>
                                <select class="form-control" name="sltMatiere" id="sltMatiere">
									<option value="0">Choisir</option> <!-- ???????????? -->
                                    <?php
                                        foreach ($this->aMatieres as $oMatiere) {
                                            echo '<option value="'.$oMatiere->getId().'">'.$oMatiere->getNom().'</option>';
                                        }
                                    ?>
                                </select>
								<div class="divErreur" id="sltMatiereErreur"></div> <!-- div pour afficher les erreurs -->
                           </div>
                            <div class="col-lg-3">
                                <label>Niveau secondaire:</label>
                                <select class="form-control" name="sltNiveau" id="sltNiveau">
									<option value="0">Choisir</option> <!-- ???????????? -->
                                    <?php
                                        for($i = 1; $i <= 5; $i++) {
                                            echo '<option value="'.$i.'">Secondaire '.$i.'</option>';
                                        }
                                    ?>
                                </select>
								<div class="divErreur" id="sltNiveauErreur"></div> <!-- div pour afficher les erreurs -->
                            </div>
                            <div class="col-lg-3">
                                <label>École:</label>
                                <select class="form-control" name="sltEcole" id="sltEcole">
									<option value="0">Choisir</option> <!-- ???????????? -->
                                    <?php
                                        foreach ($this->aEcoles as $oEcole) {
                                            echo '<option value="'.$oEcole->getId().'">'.$oEcole->getNom().'</option>';
                                        }
                                    ?>
                                </select>
								<div class="divErreur" id="sltEcoleErreur"></div> <!-- div pour afficher les erreurs -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><br/>Rédigez votre texte</label>
                        <textarea id="tarContenu" name="txtContenu" class="form-control"></textarea>
							<div class="divErreur" id="tarContenuErreur"></div> <!-- div pour afficher les erreurs -->
                    </div>
                    <div class="form-group text-right">
                        <a href="<?php echo WEB_ROOT;?>/tutoriel/gerer" class="btn btn-danger">Annuler</a>
                        <button type="submit" name="subAjouterTexte" class="btn btn-success">Soumettre</button>
                    </div>
                </form>
            </div>
        </div>
		<script src="<?php echo WEB_ROOT;?>/js/Tutoriel.js"></script>
    <?php
        
    }
    
    // a changer les gens champs pour modifier vue marche
    public function afficheFormulaireModificationVideo(){?>
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
                <h1 class="page-header">
                    Modifier un vidéo
                </h1>
                <form action="<?php echo WEB_ROOT;?>/tutoriel/modifier-video/<?php echo $this->oTutoriel->getContenuId();?>" method="post" role="form" id="frmModificationVideo">
                    <div class="form-group">
                        <label>Titre</label>
                        <input id="txtTitre" name="txtTitre" class="form-control" value="<?php echo $this->oTutoriel->getTitre();?>">
							<div id="txtTitreErreur" class="divErreur"></div> <!-- div pour afficher les erreurs -->	
                    </div>
                     <div class="row">
                        <div class="form-group">
                            <div class="col-lg-3">
                                <label>Matière:</label>
                                <select class="form-control" name="sltMatiere" id="sltMatiere">
									<option value="0">Choisir</option> <!-- ???????????? -->
                                    <?php
                                        foreach ($this->aMatieres as $oMatiere) {
                                            $selected = '';
                                            if($this->oTutoriel->getMatiereId() == $oMatiere->getId()){
                                                $selected = 'selected="selected"';
                                            }
                                            echo '<option value="'.$oMatiere->getId().'" '.$selected.'>'.$oMatiere->getNom().'</option>';
                                        }
                                    ?>
                                </select>
								<div class="divErreur" id="sltMatiereErreur"></div> <!-- div pour afficher les erreurs -->
                           </div>
                            <div class="col-lg-3">
                                <label>Niveau secondaire:</label>
                                <select class="form-control" name="sltNiveau" id="sltNiveau">
									<option value="0">Choisir</option> <!-- ???????????? -->
                                    <?php
                                        for($i = 1; $i <= 5; $i++) {
                                            $selected = '';
                                            if($this->oTutoriel->getNiveauScolaire() == $i){
                                                $selected = 'selected="selected"';
                                            }
                                            echo '<option value="'.$i.'" '.$selected.'>Secondaire '.$i.'</option>';
                                        }
                                    ?>
                                </select>
								<div class="divErreur" id="sltNiveauErreur"></div> <!-- div pour afficher les erreurs -->
                            </div>
                            <div class="col-lg-3">
                                <label>École:</label>
                                <select class="form-control" name="sltEcole" id="sltEcole">
									<option value="0">Choisir</option> <!-- ???????????? -->
                                    <?php
                                        foreach ($this->aEcoles as $oEcole) {
                                            $selected = '';
                                            if($this->oTutoriel->getEcoleId() == $oEcole->getId()){
                                                $selected = 'selected="selected"';
                                            }
                                            echo '<option value="'.$oEcole->getId().'" '.$selected.'>'.$oEcole->getNom().'</option>';
                                        }
                                    ?>
                                </select>
								<div class="divErreur" id="sltEcoleErreur"></div> <!-- div pour afficher les erreurs -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><br/>Lien de video</label>
                        <input type="text" id="txtUrl" name="txtUrl" class="form-control" value="<?php echo htmlentities($this->oTutoriel->getContenu());?>">
							<div class="divErreur" id="txtUrlErreur"></div> <!-- div pour afficher les erreurs -->
								<p class="form-control-static">Le lien du vidéo doit etre un lien "embed" YouTube complet.</p>
                    </div>
                    <div class="form-group text-right">
                        <a href="<?php echo WEB_ROOT;?>/tutoriel/gerer" class="btn btn-danger">Annuler</a>
                        <button type="submit" name="subModifierVideo" class="btn btn-success">Soumettre</button>
                    </div>
                </form>
            </div>
        </div>
		<script src="<?php echo WEB_ROOT;?>/js/Tutoriel.js"></script>
    <?php
    }
    
    public function afficheFormulaireModificationTexte(){?>
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
                <h1 class="page-header">
                    Modifier un texte
                </h1>
                <form action="<?php echo WEB_ROOT;?>/tutoriel/modifier-texte/<?php echo $this->oTutoriel->getContenuId();?>" method="post" role="form" id="frmModificationTexte">
                    <div class="form-group">
                        <label>Titre</label>
                        <input id="txtTitre" name="txtTitre" class="form-control" value="<?php echo $this->oTutoriel->getTitre();?>">
							<div id="txtTitreErreur" class="divErreur"></div> <!-- div pour afficher les erreurs -->
                    </div>
                     <div class="row">
                        <div class="form-group">
                            <div class="col-lg-3">
                                <label>Matière:</label>
                                <select class="form-control" name="sltMatiere" id="sltMatiere">
									<option value="0">Choisir</option> <!-- ???????????? -->
                                    <?php
                                        foreach ($this->aMatieres as $oMatiere) {
                                            $selected = '';
                                            if($this->oTutoriel->getMatiereId() == $oMatiere->getId()){
                                                $selected = 'selected="selected"';
                                            }
                                            echo '<option value="'.$oMatiere->getId().'" '.$selected.'>'.$oMatiere->getNom().'</option>';
                                        }
                                    ?>
                                </select>
								<div class="divErreur" id="sltMatiereErreur"></div> <!-- div pour afficher les erreurs -->
                           </div>
                            <div class="col-lg-3">
                                <label>Niveau secondaire:</label>
                                <select class="form-control" name="sltNiveau" id="sltNiveau">
									<option value="0">Choisir</option> <!-- ???????????? -->
                                    <?php
                                        for($i = 1; $i <= 5; $i++) {
                                            $selected = '';
                                            if($this->oTutoriel->getNiveauScolaire() == $i){
                                                $selected = 'selected="selected"';
                                            }
                                            echo '<option value="'.$i.'" '.$selected.'>Secondaire '.$i.'</option>';
                                        }
                                    ?>
                                </select>
								<div class="divErreur" id="sltNiveauErreur"></div> <!-- div pour afficher les erreurs -->
                            </div>
                            <div class="col-lg-3">
                                <label>École:</label>
                                <select class="form-control" name="sltEcole" id="sltEcole">
									<option value="0">Choisir</option> <!-- ???????????? -->
                                    <?php
                                        foreach ($this->aEcoles as $oEcole) {
                                            $selected = '';
                                            if($this->oTutoriel->getEcoleId() == $oEcole->getId()){
                                                $selected = 'selected="selected"';
                                            }
                                            echo '<option value="'.$oEcole->getId().'" '.$selected.'>'.$oEcole->getNom().'</option>';
                                        }
                                    ?>
                                </select>
								<div class="divErreur" id="sltEcoleErreur"></div> <!-- div pour afficher les erreurs -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><br/>Rédigez votre texte</label>
                        <textarea id="tarContenu" name="txtContenu" class="form-control"><?php echo $this->oTutoriel->getContenu();?></textarea>
							<div class="divErreur" id="tarContenuErreur"></div> <!-- div pour afficher les erreurs -->
                    </div>
                    <div class="form-group text-right">
                        <a href="<?php echo WEB_ROOT;?>/tutoriel/gerer" class="btn btn-danger">Annuler</a>
                        <button type="submit" name="subModifierTexte" class="btn btn-success">Soumettre</button>
                    </div>
                </form>
            </div>
        </div>
		<script src="<?php echo WEB_ROOT;?>/js/Tutoriel.js"></script>
    <?php
    }

    public function afficheSupprimerTuto(){?>
        <div class="page-header">
            <h1>Supprimer un tutoriel</h1>
        </div>
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3 text-center">
                <h2>Êtes-vous certain de vouloir supprimer ce tutoriel?</h2>
                <p><?php echo $this->oTutoriel->getTitre();?></p>
                <form action="<?php echo WEB_ROOT;?>/tutoriel/supprimer" method="POST">
                    <input type="hidden" name="hidContenuId" value="<?php echo $this->oTutoriel->getContenuId();?>">
                    <a href="<?php echo WEB_ROOT;?>/tutoriel/gerer" class="btn btn-danger">Annuler</a>
                    <input type="submit" name="subSupprimer" class="btn btn-success" value="Supprimer">
                </form>
            </div>
        </div>
    <?php
    }

    //TODO: Ajouter des méthodes au besoin
}
?>