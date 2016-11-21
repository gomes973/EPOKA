<?php

/**
 * Gomes
 * Dylan
 */ 
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

$listeNumeros = pdoNumero::getNumeros($_REQUEST['codeRev']);
?>

<h2>Numero</h2>
<select  onchange="articlesParRubriques(this.value)">
    <option></option>
    <?php 
    foreach ($listeNumeros as $value) {?>
        <option value="<?php echo $value['CODENUMERO'];?>"><?php echo $value['CODENUMERO'];?></option>
    <?php }?>
        
</select>