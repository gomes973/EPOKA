<!DOCTYPE html>
<html>
    <body>       
        <div class="container">
            <legend>Séléction des articles</legend>
            <form method="POST" action="index.php?uc=gerer_numero&action=articles_selection_validation">
                <div class="row">
                    <div class="col-md-6">
                        <label for="numero">Revue : </label>
                        <select name="revue" id="listeRevues" class="form-control">
                            <?php
                            foreach ($colRevues as $val) {
                                echo '<option value="' . $val->getCodeRevue() . '">' . $val->getTitre() . '</option>';
                            }
                            ?>
                        </select>                     
                    </div>
                </div><br/>
                <div class="row">
                    <div class="col-md-3">
                        <label for="numero">Numéro : </label>
                        <select name="numero" id="listeNumeros" class="form-control" disabled>
                        </select>                        
                    </div>
                    <div class="col-md-3">
                        <label for="rubrique">Rubrique : </label>
                        <select name="rubrique" id="listeRubriques" class="form-control" disabled>
                        </select>
                    </div>
                </div><br/>
                <div class="row">
                    <div class="col-md-6">
                        <label for="article">Articles : </label>
                        <select multiple="multiple" id="listeArticles" name="articles[]" class="form-control" disabled required>
                        </select>
                        <br/>
                        <input class="btn btn-default" id="btnValider" type="submit" value="Valider" disabled/> <input class="btn btn-default" type="reset" value="Annuler" />
                    </div>
                </div>
            </form>
        </div>
        <script src="Ajax/articles_selection.js" type="text/javascript"></script>
    </body>
</html>
