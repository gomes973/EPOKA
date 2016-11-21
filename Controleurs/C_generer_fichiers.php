<?php

//S'il n'y a pas d'action définie, on met par défaut accueil, afin d'afficher la page d'accueil
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'accueil';
}
$action=$_REQUEST["action"];

switch ($action){
case "xml":
        $obRevue = pdoRevue::getLesRevues();
        include 'Vues/V_xml.php';
    break;
case "json":
        $obRevue = pdoRevue::getLesRevues();
        include 'Vues/V_json.php';
    break;
    
}