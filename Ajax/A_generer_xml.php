<?php

/**
 * Gomes
 * Dylan
 */ 
header("Cache-Control: no-cache, must-revalidate");
header('Content-Type: text/xml; charset=UTF-8');
require_once '../Librairies/Collection.php';
require_once '../Classes/Article.php';
require_once '../Classes/Participant.php';
require_once '../Classes/Maquettiste.php';
require_once '../Classes/Numero.php';
require_once '../Classes/Pigiste.php';
require_once '../Classes/Revue.php';
require_once '../Classes/Rubrique.php';
require_once '../Classes/Statut.php';
require_once '../Passerelles/pdoConnexion.php';
require_once '../Passerelles/pdoArticle.php';
require_once '../Passerelles/pdoNumero.php';
require_once '../Passerelles/pdoParticipant.php';
require_once '../Passerelles/pdoPigiste.php';
require_once '../Passerelles/pdoRevue.php';
require_once '../Passerelles/pdoRubrique.php';
require_once '../Passerelles/pdoStatut.php';

// création du documentn XML
$doc = new DOMDocument();
//Spécification version et encodage
$doc->version = '1.0';
$doc->encoding = 'UTF-8';

//premiere branche de l'arborescence
$listeRubriquesRevue = pdoRubrique::getLesRubriquesRevue($_REQUEST['codeNumero']);
$objRevue = pdoRevue::getLesRevues($_REQUEST['codeRevue']);

$numero = $doc->createElement('Numero');
$doc->appendChild($numero);
$numero->setAttribute('codeRevue', $_REQUEST['codeRevue']);
$numero->setAttribute('codeNumero', $_REQUEST['codeNumero']);
$titre = $doc->createElement('TitreRevue', $objRevue[0]->getTitre());
$numero->appendChild($titre);

$rubrique = $doc->createElement('Rubrique');
$numero->appendChild($rubrique);

foreach ($listeRubriquesRevue as $value) {
    $titreRubrique = $doc->createElement('Titre', utf8_encode($value->getTitreRubrique()));
    $rubrique->appendChild($titreRubrique);

    $listeArticles = pdoArticle::getLesArticlesParRubrique($value->getNumRubrique(), $_REQUEST['codeRevue']);

    foreach ($listeArticles as $unArticle) {

        $article = $doc->createElement("Article");
        $rubrique->appendChild($article);
        $titreArticle = $doc->createElement("Titre", utf8_encode($unArticle->getTitreArticle()));
        $article->appendChild($titreArticle);
        $chapeau = $doc->createElement("Chapeau", utf8_encode($unArticle->getChapeau()));
        $article->appendChild($chapeau);
        $lienCont = $doc->createElement("Lien", utf8_encode($unArticle->getLienFichierContenu()));
        $article->appendChild($lienCont);
        $signature = $doc->createElement("Signature", utf8_encode($unArticle->getPigiste()->getNom()) . " " . utf8_encode($unArticle->getPigiste()->getPrenom()));
        $article->appendChild($signature);
    }
}
echo 'xml';
$doc->save("Maquette.xml");
