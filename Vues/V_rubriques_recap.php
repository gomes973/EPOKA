<!DOCTYPE html>
<html>
    <body>      
        <div class="container">
            <legend>Récapitulatif (3/3)</legend>
            <div class="row">
                
                    <div class="col-md-6">
                        <?php echo '<p>Numéro : '.$_REQUEST['numero'].'</p>'; ?>
                    </div>
                <div class="col-md-6">
                    <p>Rubriques : </p>
                    <ul>
                        <?php    
                            foreach ($tabObjRubriques as $val) {
                                echo '<li>'.$val->getTitreRubrique().'</li>';
                            }                      
                        ?>                    
                    </ul>         
                </div>
                    <div class="col-md-6">
                        <br/><form method="POST" action="index.php?uc=gerer_numero&action=rubriques_selection_envoi"><input class="btn btn-default" name="valider" type="submit" value="Valider" /> <a class="btn btn-default" href="index.php?uc=gerer_numero&action=revues_selection">Annuler</a></form>      
                    </div>   
            </div>
        </div>
    </body>
</html>
