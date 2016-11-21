<!DOCTYPE html>

<html>
    <body>
        <div class="container">
            <legend>Résultat de l'opération</legend>
            <?php 
            $message = "";
            if (isset($messageSucces)) {
                $message = $messageSucces;
            }
            else if (isset($messageErreur)){
                $message = $messageErreur;
            }
            ?>
            
            <div class="alert <?php if (isset($messageSucces)) { echo 'alert-success'; } else if (isset($messageErreur)) { echo 'alert-danger'; } else { echo 'alert-info'; } ?>">
                <p><?php echo $message; ?></p>
                <a href="index.php">Retourner à la page d'accueil</a>
            </div>
        </div>
   
    </body>
</html>
