<!DOCTYPE html>

<html>
    <body>
        <div class="container">
            <legend>Sélection de la revue (1/3)</legend>
            <form method="POST" action="index.php?uc=gerer_numero&action=revues_selection_envoi">
                <div class="col-md-4">
                <select name="revue" class="form-control">
                    <?php    
                        foreach ($colRevues as $val) {
                            echo '<option value="'.$val->getCodeRevue().'">'.$val->getTitre().'</option>';
                        }                      
                    ?>
                </select>
                    <br/><input class="btn btn-default" type="submit" value="Valider" /> <a class="btn btn-default" href="index.php">Annuler</a>
                </div>
            </form>
        </div>
   
    </body>
</html>
