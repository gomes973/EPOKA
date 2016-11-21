<!DOCTYPE html>
<html lang="fr"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<?php

require_once 'Librairies/Collection.php';
require_once 'Classes/Article.php';
require_once 'Classes/Participant.php';
require_once 'Classes/Maquettiste.php';
require_once 'Classes/Numero.php';
require_once 'Classes/Pigiste.php';
require_once 'Classes/Revue.php';
require_once 'Classes/Rubrique.php';
require_once 'Classes/Statut.php';
require_once 'Passerelles/pdoConnexion.php';
require_once 'Passerelles/pdoArticle.php';
require_once 'Passerelles/pdoNumero.php';
require_once 'Passerelles/pdoParticipant.php';
require_once 'Passerelles/pdoPigiste.php';
require_once 'Passerelles/pdoRevue.php';
require_once 'Passerelles/pdoRubrique.php';
require_once 'Passerelles/pdoStatut.php';

include 'Vues/V_entete.php';
include 'Vues/V_nav.php';

if(!isset($_REQUEST['uc'])){
	$_REQUEST['uc'] = 'accueil';
}
$uc=$_REQUEST["uc"];
switch ($uc) {
	case "gerer_numero":
		include 'Controleurs/C_gerer_numero.php';	
	break;
	case "gerer_article":
		include 'Controleurs/C_gerer_article.php';
	break;
        case "generer_fichiers":
            include './Controleurs/C_generer_fichiers.php';
        break;
	default:
		include 'Vues/V_accueil.php';
	break;
}