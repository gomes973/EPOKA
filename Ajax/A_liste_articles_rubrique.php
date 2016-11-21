<?php
/**
 * Gomes
 * Dylan
 */ 

include '../Classes/Article.php';
include '../Classes/Participant.php';
include '../Classes/Maquettiste.php';
include '../Classes/Numero.php';
include '../Classes/Pigiste.php';
include '../Classes/Revue.php';
include '../Classes/Rubrique.php';
include '../Classes/Statut.php';

include '../Librairies/Collection.php';
include '../Passerelles/pdoConnexion.php';
include '../Passerelles/pdoArticle.php';
include '../Passerelles/pdoNumero.php';
include '../Passerelles/pdoParticipant.php';
include '../Passerelles/pdoPigiste.php';
include '../Passerelles/pdoRevue.php';
include '../Passerelles/pdoRubrique.php';
include '../Passerelles/pdoStatut.php';
?>

<?php
$listeRubriquesRevue = pdoRubrique::getLesRubriquesRevue($_REQUEST['codeNumero']);

foreach ($listeRubriquesRevue as $value) {
    $listeArticles = pdoArticle::getLesArticlesParRubrique($value->getNumRubrique(), $_REQUEST['codeRevue']);
    $x = count($listeArticles);
    ?>
    <div>
        <?php if ($x > 0){?>
        <h3>Rubrique : <?php echo $value->getTitreRubrique(); ?></h3>
        <table class="table table-striped">
            <?php
        }
            if ($x > 0) {
                foreach ($listeArticles as $value) {
                    ?>
                    <tr>
                        <th>Titre article</th>
                        <th>Chapeau</th>
                        <th>Lien</th>
                        <th>Nom</th>
                        <th>Prénom</th>            
                    </tr>
                    <tr>
                        <td scope="row"><?php echo utf8_encode($value->getTitreArticle()) ?></td>
                        <td><?php echo $value->getChapeau() ?></td>
                        <td><?php echo $value->getLienFichierContenu() ?></td>
                        <td><?php echo $value->getPigiste()->getNom() ?></td>
                        <td><?php echo $value->getPigiste()->getPrenom() ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </div>
    <?php
}?>