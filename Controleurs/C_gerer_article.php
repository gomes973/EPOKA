<?php

//S'il n'y a pas d'action définie, on met par défaut accueil, afin d'afficher la page d'accueil
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'accueil';
}
$action=$_REQUEST["action"];


switch ($action) {
        
        //Si utilisateur clique sur Insérer article, redirection vers vue insertion articles
        case "article_insertion" : 
            $tabPigistes = pdoPigiste::getLesPigistes();
            $tabRubriques = pdoRubrique::getLesRubriques();
            include 'Vues/V_articles_insertion.php';
            
        break;
    
        //Après validation d'insertion
        case "article_insertion_validation": 
            $titre = $_REQUEST['titre'];
            $longueur = $_REQUEST['longueur'];
            $chapeau = $_REQUEST['chapeau'];
            $pigiste = $_REQUEST['pigiste'];
            $adresse = $_REQUEST['adresse'];
            $rubrique = $_REQUEST['rubrique'];
            if (isset($_REQUEST['urlImgInterne'])){
               $codeImageInterne = $_REQUEST['urlImgInterne'];   
               $codeImageInterne = "'".$codeImageInterne."'";
            }
            else {
                $codeImageInterne  = "NULL";  
            }
            if (isset($_REQUEST['urlImgExterne'])){
                $codeImageExterne = $_REQUEST['urlImgExterne'];
                $codeImageExterne = "'".$codeImageExterne."'";
            }
            else {
                $codeImageExterne = "NULL";    
            }
            $res = pdoArticle::insertArticle($rubrique, $pigiste, $titre, $adresse, $chapeau, $longueur, date("Y-m-d"), $codeImageInterne, $codeImageExterne);
            //On notifie l'utilisateur de la réussite ou de l'échec de l'insertion
            if($res){
                $messageSucces = "Insertion réussie";                
            }
            else{
                $messageErreur = "Echec d'insertion"; 
            } 
            
            include 'Vues/V_resultat.php';
           
        break;
        default:
		include 'Vues/V_accueil.php';
	break;
}

?>
