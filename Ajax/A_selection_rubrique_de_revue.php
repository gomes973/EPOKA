<?php
include '../Librairies/Collection.php';
include '../Passerelles/pdoConnexion.php';
include '../Passerelles/pdoArticle.php';
include '../Passerelles/pdoNumero.php';
include '../Passerelles/pdoParticipant.php';
include '../Passerelles/pdoPigiste.php';
include '../Passerelles/pdoRevue.php';
include '../Passerelles/pdoRubrique.php';
include '../Passerelles/pdoStatut.php';

include '../Classes/Article.php';
include '../Classes/Participant.php';
include '../Classes/Maquettiste.php';
include '../Classes/Numero.php';
include '../Classes/Pigiste.php';
include '../Classes/Revue.php';
include '../Classes/Rubrique.php';
include '../Classes/Statut.php';
?>
<script>
    function afficheTitreRubrique(vlr){
        var e = new document;
        e.innerHTML = "<h3>Titre Rubrique : " + vlr + "</h3>";
    }
</script>
<div id="Rubrique"></div>
<div>
    <table>
        <tr>
            <th>Titre article</th>
            <th>Chapeau</th>
            <th>Lien</th>
            <th>Nom</th>
            <th>Prenom</th>
        </tr>
        <?php
            $objRubriques = pdoRubrique::getLesRubriquesRevue($_POST['codeRevue']);
            foreach ($objRubriques as $value) {
                $objListeArticles = pdoArticle::getLesArticlesParRubrique($value->getNumRubrique(), $_POST['codeRevue']);
                if (count($objListeArticles) > 0){
                    echo '<script>afficheTitreRubrique("'.$value->getTitreRubrique().'")</script>';
                }  
            }
        ?>
</table>
</div>


