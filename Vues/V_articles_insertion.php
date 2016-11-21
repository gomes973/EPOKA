<!DOCTYPE html>
<html>
    <body>   
        <div class="container">
            <legend>Insertion d'un article</legend>
            <form method="POST" action="index.php?uc=gerer_article&action=article_insertion_validation">
                <div class="row">
                    <div class="col-md-6">                        
                        <label for="titre">Titre article :</label>
                        <input type="text" name="titre" class="form-control" />
                    </div>
                    <div class="col-md-6">
                        <label for="longueur">Longueur article (feuillet) :</label>
                        <input type="number" name="longueur" class="form-control" />
                    </div>
                    <div class="col-md-6">
                        <label for="chapeau">Chapeau article :</label>
                        <input type="text" name="chapeau" class="form-control" />
                    </div>
                    <div class="col-md-6">
                        <label for="pigiste">Pigiste :</label>
                        <select name="pigiste" class="form-control">
                            <?php
                            foreach ($tabPigistes as $val) {
                                echo '<option value="'.$val->getMatricule().'">'.$val->getPrenom().' '.$val->getNom().'</option>';
                            }
                            ?>
                        </select>   
                    </div>
                    <div class="col-md-6">
                        <label for="adresse">Adresse fichier :</label>
                        <input type="text" name="adresse" class="form-control" />
                    </div>
                    <div class="col-md-6">
                        <label for="rubrique">Rubrique :</label>
                        <select name="rubrique" class="form-control">
                            <?php
                            foreach ($tabRubriques as $val) {
                                echo '<option value="'.$val->getNumRubrique().'">'.$val->getTitreRubrique().'</option>';
                            }
                            ?>
                        </select>     
                    </div>
                    <div class="col-md-6">
                        <br/>
                        <input class="btn btn-default" type="submit" value="Valider" /> <input class="btn btn-default" type="reset" value="Annuler" />
                    </div>
                </div>
            </form>
        </div>          
    </body>
</html>
