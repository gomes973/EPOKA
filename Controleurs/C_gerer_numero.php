<?php

if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'accueil';
}
$action = $_REQUEST["action"];
switch ($action) {
    //Si l'utilisateur sélectionne Sélectionner rubriques
    case "revues_selection":
        $colRevues = pdoRevue::getLesRevues();
        include 'Vues/V_revues_selection.php';
        break;

    //Après avoir validé la revue, l'utilisateur est redirigé vers la sélection des rubriques
    case "revues_selection_envoi":
        session_start();
        $_SESSION['revue'] = $_REQUEST['revue'];
        //On récupère les numéros de la revue sélectionnée
        $colNumeros = pdoNumero::getLesNumeros($_REQUEST['revue']);
        $_SESSION['colNumeros'] = $colNumeros;
        $colRubriques = pdoRubrique::getLesRubriques();
        echo '<script>var codeRevue = '.$_REQUEST['revue'].'</script>';
        include 'Vues/V_rubriques_selection.php'; 
        break;

    //Après avoir validé les rubriques
    case "rubriques_selection_envoi":
        session_start();
        //Si envoi numero et liste rubriques
        if (!isset($_REQUEST['valider'])) {
            $_SESSION['numero'] = $_REQUEST['numero'];

            $tabObjRubriques = [];

            //Remplissage tableau des objets rubriques
            foreach ($_REQUEST['rubriques'] as $val) {
                $tabObjRubriques[] = pdoRubrique::getLaRubrique($val);
            }
            $_SESSION['tabRubriques'] = $tabObjRubriques;

            include 'Vues/V_rubriques_recap.php';
        }
        // Si récapitulatif validé
        else {

            $colNumeros = $_SESSION['colNumeros'];

            foreach ($colNumeros as $val) {

                if ($_SESSION['numero'] == $val->getCodeNumero()) {

                    $val->setListeRubriques($_SESSION['tabRubriques']);

                    $res = pdoNumero::regrouper($val);

                    if ($res) {
                        $messageSucces = "Rubriques bien regroupées.";
                    } else {
                        $messageErreur = "Rubriques non regroupées.";
                    }
                }
            }

            include 'Vues/V_resultat.php';
        }

        break;

    case "articles_selection_revue":

        $colRevues = pdoRevue::getLesRevues();

        include 'Vues/V_articles_selection.php';
        break;

    case "articles_selection_validation":
        
        $revue = $_REQUEST['revue'];
        $numero = $_REQUEST['numero'];
        $rubrique = $_REQUEST['rubrique'];
        $listeArticles = $_REQUEST['articles'];
        
        
        foreach ($listeArticles as $codeArticle) {
            $objArticle = pdoArticle::getUnArticle($codeArticle);
            $res = pdoArticle::updateArticle($objArticle, $revue, $numero);

            if ($res) {
                $messageSucces = "Articles bien inserés dans la rubrique n° $rubrique, du numéro $numero de la revue n° $revue.";
            } else {
                $messageErreur = $res;
            }
        }
        
        if ($res) {
                $messageSucces = "Articles bien inserés dans la rubrique n° $rubrique, du numéro $numero de la revue n° $revue.";
        } else {
                $messageErreur = "Articles non inserés.";
         }

        include 'Vues/V_resultat.php';   

        break;

/**
 * Gomes
 * Dylan
 */ 
    /**
     * Liste articles par rubrique
     */
    case "articles_selection_rubrique":
        $obRevue = pdoRevue::getLesRevues();
        include 'Vues/V_articles_selection_rubriques.php';
        break;
    
    /**
     * Affiche la liste des articles à supprimer
     */
    case "article_suppression":
        $ListeObjArticles = pdoArticle::getLesArticlesPasPublie();
        include 'Vues/V_liste_articles_suppresion.php';
    break;

    /**
     * Supprime l'article chosie dans la view :
     * 
     * Vues/V_liste_articles_suppresion.php
     */
    case "supprimer_article":
        $objArticle = pdoArticle::getUnArticle($_REQUEST['id']);
        if(pdoArticle::deleteArticle($objArticle)){
            echo 'L\'article a été bien supprimer';
            header('Refresh: 3; index.php?uc=gerer_numero&action=article_suppression');
        }
    else {
            echo 'L\'article n\'as pas été supprimer';
            header('Refresh: 3; index.php?uc=gerer_numero&action=article_suppression');
    }
        
    break;
    default:
        include 'Vues/V_accueil.php';
        break;
/**
 * Fin
 * Gomes 
 * Dylan
 */
}
