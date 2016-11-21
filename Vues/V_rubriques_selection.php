<!DOCTYPE html>
<html>
    <body>      
        <div class="container">
            <legend>Regroupement des articles dans un numéro (2/3)</legend>
            <div id="alerte" class="alert alert-danger" hidden>Vous devez cocher au moins une case.</div>
            <div class="row">
                <form method="POST" id="formulaire" action="index.php?uc=gerer_numero&action=rubriques_selection_envoi">
                    <div class="col-md-6">
                        <label for="numero">Numéro : </label>
                        <select id="listeNumeros" name="numero" class="form-control">
                            <?php
                            foreach ($colNumeros as $val) {
                                echo '<option>' . $val->getCodeNumero() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="rubrique">Rubriques : </label><br/>
                        <?php
                        foreach ($colRubriques as $val) {
                            echo '<input type="checkbox" name="rubriques[]" value="' . $val->getNumRubrique() .'"> ' . $val->getTitreRubrique() . '<br/>';
                        }
                        ?>                          
                    </div>
                    <div class="col-md-6">
                        <br/><input class="btn btn-default" type="submit" value="Valider" /> <a class="btn btn-default" href="index.php?uc=gerer_numero&action=revues_selection">Annuler</a>        
                    </div>
                </form>
            </div>
        </div>
        <script src="Ajax/rubriques_regroupement.js" type="text/javascript"></script>
    </body>
</html>
