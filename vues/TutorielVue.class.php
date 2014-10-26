<?php
class TutorielVue extends Vue {
    
    public function afficheListeConsulter(){
        //Vue pour eleves
    }
    
    public function afficheListeGererTuteur(){
        //Sans bouton approuver
    }
    
    public function afficheListeGererProfesseur(){
        //Avec bouton approuver
    }
    
    public function afficheFormulaireCreationVideo(){?>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Ajouter un vidéo
                </h1>
                <form action="index.php" s="<?php echo WEB_ROOT;?>/tutoriel/creerVideo/" method="post" role="form">
                    <fieldset class="col-md-12">
                        <legend>Ajouter un vidéo</legend>
                        <div class="form-group">
                            <label>Titre</label>
                            <input id="" name="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea id="" name="" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Mots-clés</label>
                            <textarea id="" name="" class="form-control" rows="2"></textarea>
                            <p class="form-control-static">Ajoutez une virgule après chaque mots clé</p>
                        </div>
                        <div class="form-group">
                            <label>Importer le vidéo</label>
                            <input id="" name=""type="file">
                        </div>
                        <button type="button" class="btn btn-primary">Soumettre</button>
                    </fieldset>
                </form>
            </div>
        </div>
    <?php
    }
    
    public function afficheFormulaireCreationTexte(){
        
    }
    
    // a changer les gens champs pour modifier vue marche
    public function afficheFormulaireModificationVideo(){?>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Ajouter un vidéo
                </h1>
                <form action="index.php" s="<?php echo WEB_ROOT;?>/tutoriel/creerVideo/" method="post" role="form">
                    <fieldset class="col-md-12">
                        <legend>Ajouter un vidéo</legend>
                        <div class="form-group">
                            <label>Titre</label>
                            <input id="" name="" class="form-control" value="<?php echo $this->oTutoriel->getTitre();?>">
                        </div>
                        <div class="form-group">
                            <label>Mots-clés</label>
                            <textarea id="" name="" class="form-control" rows="2">
                                <?php echo $this->oTutoriel->getContenu();?>
                            </textarea>
                            <p class="form-control-static">Ajoutez une virgule après chaque mots clé</p>
                        </div>
                        <div class="form-group">
                            <label>Importer le vidéo</label>
                            <input id="" name=""type="file">
                        </div>
                        <button type="button" class="btn btn-primary">Soumettre</button>
                    </fieldset>
                </form>
            </div>
        </div>
    <?php
    }
    
    public function afficheFormulaireModificationTexte(){
        
    }

    //TODO: Ajouter des méthodes au besoin
}
?>