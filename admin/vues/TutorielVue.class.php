<?php
class TutorielVue extends Vue {
    
    public function afficheListeGerer(){?>
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1>
                        Gérer les tutoriels de votre commission scolaire
                    </h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table id="tabRechercherTuto" class="table table-striped text-center">
                    <tr>
                        <th class="text-center">Auteur</th>
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
							$nom = "N/A";
                            $oUtilisateur = new Utilisateur($oTutoriel->getSoumisPar());
                            if($oUtilisateur->chargerCompteParId()){
								$nom = $oUtilisateur->getPrenom().' '.$oUtilisateur->getNom();
							}
                            echo '<tr>';
                                echo '<td id="txtTitre">'.$nom.'</td>';
                                echo '<td id="txtTitre">'.$oTutoriel->getTitre().'</td>';
                                echo '<td id="txtType">'.$oTutoriel->getSorteTuto().'</td>';
                                echo '<td id="txtDateCree">'.$oTutoriel->getDateSoumis().'</td>';
                                echo '<td id="txtStatut">'.$oTutoriel->getTypeApprouver().'</td>';
                                echo '<td id="txtMatiere">'.$oTutoriel->getSorteMatiere().'</td>';
                                echo '<td id="txtNiveau">Secondaire '.$oTutoriel->getNiveauScolaire().'</td>';
                                echo '<td>';
                                    echo '<a remote="'.WEB_ROOT.'/admin/ControleurAJAX.php?module=tutoriel&action=visionner&id='.$oTutoriel->getContenuId().'"data-toggle="myModal" class="btn btn-primary btn-xs">';
                                        echo '<span title="visualiser" class="glyphicon glyphicon-play"></span>';
                                    echo '</a>';
                                    $type = ($oTutoriel->getType() == 1)?'video':'texte';
                                    echo '<a href="'.WEB_ROOT.'/admin/tutoriel/modifier-'.$type.'/'.$oTutoriel->getContenuId().'" class="btn btn-primary btn-xs">';
                                        echo '<span title="Modifier" class="glyphicon glyphicon-pencil"></span>';
                                    echo '</a>';
                                    echo '<a href="'.WEB_ROOT.'/admin/tutoriel/supprimer/'.$oTutoriel->getContenuId().'" class="btn btn-primary btn-xs">';
                                        echo '<span title="Supprimer" class="glyphicon glyphicon-remove"></span>';
                                    echo '</a>';
                                    if($oTutoriel->getStatut() == 0){
                                        echo '<a href="'.WEB_ROOT.'/admin/tutoriel/approuver/'.$oTutoriel->getContenuId().'" class="btn btn-success btn-xs">';
                                            echo '<span title="approuver" class="glyphicon glyphicon-ok"></span>';
                                        echo '</a>';
                                    }
                                echo '</td>';
                            echo '</tr>';
                        }
                    ?>
                </table>
            </div> <!-- .col-lg-12 -->
        </div> <!-- .row -->
        <div class="row">
            <div class=" col-xs-12 text-right">
                <a href="<?php echo WEB_ROOT;?>/admin/tutoriel/ajouter-video" class="btn btn-success">
                <span class="glyphicon glyphicon-plus"></span>Ajouter un vidéo</a>
                <a href="<?php echo WEB_ROOT;?>/admin/tutoriel/ajouter-texte" class="btn btn-success">
                <span class="glyphicon glyphicon-plus"></span>Ajouter un texte</a>
            </div>
        </div>

        <script>
            $('a[data-toggle="myModal"]').click(function(e) {
                e.preventDefault();
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
                <form action="<?php echo WEB_ROOT;?>/admin/tutoriel/ajouter-video/" method="post" role="form" id="frmCreationVideo">
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
                        <a href="<?php echo WEB_ROOT;?>/admin/tutoriel/gerer" class="btn btn-danger">Annuler</a>
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
                <form action="<?php echo WEB_ROOT;?>/admin/tutoriel/ajouter-texte/" method="post" role="form" id="frmCreationTexte">
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
                        <a href="<?php echo WEB_ROOT;?>/admin/tutoriel/gerer" class="btn btn-danger">Annuler</a>
                        <button type="submit" name="subAjouterTexte" class="btn btn-success">Soumettre</button>
                    </div>
                </form>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/tinymce/tinymce.min.js"></script>
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
                <form action="<?php echo WEB_ROOT;?>/admin/tutoriel/modifier-video/<?php echo $this->oTutoriel->getContenuId();?>" method="post" role="form" id="frmModificationVideo">
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
                        <a href="<?php echo WEB_ROOT;?>/admin/tutoriel/gerer" class="btn btn-danger">Annuler</a>
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
                <form action="<?php echo WEB_ROOT;?>/admin/tutoriel/modifier-texte/<?php echo $this->oTutoriel->getContenuId();?>" method="post" role="form" id="frmModificationTexte">
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
                        <a href="<?php echo WEB_ROOT;?>/admin/tutoriel/gerer" class="btn btn-danger">Annuler</a>
                        <button type="submit" name="subModifierTexte" class="btn btn-success">Soumettre</button>
                    </div>
                </form>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>/lib/tinymce/tinymce.min.js"></script>
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
                <form action="<?php echo WEB_ROOT;?>/admin/tutoriel/supprimer" method="POST">
                    <input type="hidden" name="hidContenuId" value="<?php echo $this->oTutoriel->getContenuId();?>">
                    <a href="<?php echo WEB_ROOT;?>/admin/tutoriel/gerer" class="btn btn-danger">Annuler</a>
                    <input type="submit" name="subSupprimer" class="btn btn-success" value="Supprimer">
                </form>
            </div>
        </div>
    <?php
    }

    public function afficheApprouverTuto(){?>
        <div class="page-header">
            <h1>Approuver un tutoriel</h1>
        </div>
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3 text-center">
                <h2>Êtes-vous certain de vouloir approuver ce tutoriel?</h2>
                <p><?php echo $this->oTutoriel->getTitre();?></p>
                <form action="<?php echo WEB_ROOT;?>/admin/tutoriel/approuver" method="POST">
                    <input type="hidden" name="hidContenuId" value="<?php echo $this->oTutoriel->getContenuId();?>">
                    <a href="<?php echo WEB_ROOT;?>/admin/tutoriel/gerer" class="btn btn-danger">Annuler</a>
                    <input type="submit" name="subApprouver" class="btn btn-success" value="Approuver">
                </form>
            </div>
        </div>
    <?php
    }

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

    //TODO: Ajouter des méthodes au besoin
}
?>