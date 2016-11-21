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

header("Cache-Control: no-cache, must-revalidate");

$colArticles = pdoArticle::getLesArticles($_REQUEST['codeRubrique']);

$tabArticles = Array();

foreach ($colArticles as $val) {
    $tabArticles[$val->getNumRubrique()] = $val->getTitreRubrique();
}

echo json_encode($tabArticles);
