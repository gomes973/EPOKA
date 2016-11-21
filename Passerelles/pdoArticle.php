<?php

class pdoArticle {

    /**
     * Procédure qui permet d'insérer un article dans la base de données.
     * @param integer $numRubrique  Le numéro de la rubrique
     * @param integer $matricule    Le matricule du pigiste
     * @param string $titreArticle  le titre de l'article à insérer
     * @param string $lienfichiercontenu    L'adresse URL où est stocké le fichier de l'article.
     * @param string $chapeau   Le chapeau de l'article à insérer. 
     * @param integer $longueur La longueur en feuillets de l'article.
     * @param date $datemiseenligne La date de mise en ligne de l'article
     * @return boolean  True si l'ajoute a été effectué, False si l'ajout a échoué. 
     */
    public static function insertArticle($numRubrique, $matricule, $titreArticle, $lienfichiercontenu, $chapeau, $longueur, $datemiseenligne) {

        try {
            $objPdo = PdoConnexion::getPdoConnexion();

            $matricule = htmlentities($matricule, ENT_QUOTES);
            $titreArticle = htmlentities($titreArticle, ENT_QUOTES);
            $chapeau = htmlentities($chapeau, ENT_QUOTES);
            $req = "INSERT INTO Article (NUMRUBRIQUE,MATRICULE,TITREARTICLE,LIENFICHIERCONTENU,CHAPEAU,LONGUEUR,DATEMISEENLIGNE) VALUES ($numRubrique, '$matricule', '$titreArticle', '$lienfichiercontenu', '$chapeau', $longueur, $datemiseenligne)";
            $objPdo->exec($req);
            return true;
            
        } catch (Exception $ex) {
            
            return false;
        }
    }

    /**
     * Procédure qui met à jour un article dans la base de données
     * @param Article $objArticle   Un objet Article
     * @param integer $codeRevue    Un code identifiant de la revue
     * @param integer $codeNumero   Un code identifiant du numéro
     * @return boolean  True si la modification a été effectuée, false si la modification a échoué.
     */
    public static function updateArticle($objArticle, $codeRevue, $codeNumero) {

        try {

            $objPdo = PdoConnexion::getPdoConnexion();

            $numArticle = $objArticle->getNumArticle();
            $req = "update Article set CODEREVUE = $codeRevue, CODENUMERO = $codeNumero  WHERE NUMARTICLE = $numArticle";
            $objPdo->exec($req);
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    /**
     * Procédure supprimant un article de la base de données
     * @param Article $objArticle   L'objet Article à effacer de la base de données
     * @return boolean  True si l'article a été supprimé, false si la suppression a échouée. 
     */
    public static function deleteArticle($objArticle) {

        try {
            $objPdo = PdoConnexion::getPdoConnexion();
            $i = $objArticle->getNumArticle();
            $req = "DELETE FROM Article WHERE NUMARTICLE = " . $i;
            $objPdo->exec($req);
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    /**
     * Fonction permettant d'obtenir tous les articles d'une rubrique
     * @param integer $idRubrique   L'identifiant de la rubrique
     * @return ArrayList $col   La collection d'objets Articles de la rubrique | boolean    False s'il est impossible de récupérer les articles.  
     */
    public static function getLesArticles($idRubrique) {
        try {
            $objPdo = PdoConnexion::getPdoConnexion();
            $req = "SELECT * FROM ARTICLE WHERE NUMRUBRIQUE = $idRubrique";
            $res = $objPdo->query($req);
            $lesLignes = $res->fetchAll();
            $col = new Collection();
            foreach ($lesLignes as $article) {
                $numArticle = $article['NUMARTICLE'];
                $titreArticle = $article['TITREARTICLE'];
                $lien = $article['LIENFICHIERCONTENU'];
                $chapeau = $article['CHAPEAU'];
                $longueur = $article['LONGUEUR'];
                $date = $article['DATEMISEENLIGNE'];
                $pigiste = pdoParticipant::getLeParticipant($article['MATRICULE']);
                $rubrique = pdoRubrique::getLaRubrique($idRubrique);
                $art = new Article($numArticle, $titreArticle, $lien, $chapeau, $longueur, $date, $pigiste, $rubrique);
                $col->add($art);
            }

            $res->closeCursor();
            return $col->getAll();
        } catch (Exception $ex) {
            return false;
        }
    }

    /**
     * Fonction permettant de récupérer un article.
     * @param integer $codeArticle  L'identifiant d'un article.
     * @return Article  Un objet article | boolean  false si la récupération a échoué
     */
    public static function getUnArticle($codeArticle) {
        try {
            $objPdo = PdoConnexion::getPdoConnexion();
            $req = "SELECT * FROM ARTICLE WHERE NUMARTICLE = $codeArticle";
            $res = $objPdo->query($req)->fetch();

            $numArticle = $res['NUMARTICLE'];
            $titreArticle = $res['TITREARTICLE'];
            $lien = $res['LIENFICHIERCONTENU'];
            $chapeau = $res['CHAPEAU'];
            $longueur = $res['LONGUEUR'];
            $date = $res['DATEMISEENLIGNE'];
            $idRubrique = $res['NUMRUBRIQUE'];
            $pigiste = pdoParticipant::getLeParticipant($res['MATRICULE']);
            $rubrique = pdoRubrique::getLaRubrique($idRubrique);
            $objArticle = new Article($numArticle, $titreArticle, $lien, $chapeau, $longueur, $date, $pigiste, $rubrique);
            return $objArticle;
        } catch (Exception $ex) {
            return false;
        }
    }
    /**
     * Fonction permettant de récupérer les articles d'une revue regroupé par rubrique
     * qui contiennet des articles 
     */
    public static function getLesArticlesParRubrique($codeRubrique, $codeRevue){
        try {
            $objPdo = PdoConnexion::getPdoConnexion();
            
            $req = "SELECT * FROM ARTICLE WHERE NUMRUBRIQUE = ". $codeRubrique . " and CODEREVUE = " . $codeRevue;
            $res = $objPdo->query($req);
            $res = $res->fetchAll();
            
            $objListeArticles = new Collection();
            
                foreach ($res as $value) {
                $numArticle = $value['NUMARTICLE'];
                $titreArticle = $value['TITREARTICLE'];
                $lien = $value['LIENFICHIERCONTENU'];
                $chapeau = $value['CHAPEAU'];
                $longueur = $value['LONGUEUR'];
                $date = $value['DATEMISEENLIGNE'];
                $idRubrique = $value['NUMRUBRIQUE'];
                $pigiste = pdoParticipant::getLeParticipant($value['MATRICULE']);
                $rubrique = pdoRubrique::getLaRubrique($idRubrique);

                $objArticle = new Article($numArticle, $titreArticle, $lien, $chapeau, $longueur, $date, $pigiste, $rubrique);
                $objListeArticles->add($objArticle);
            }
            return $objListeArticles->getAll();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    
    /**
     * Retourne les articles qui n'ont pas été publié
     * @return type ListeArticles
     */
    public static function getLesArticlesPasPublie() {
        try {
            $objPdo = PdoConnexion::getPdoConnexion();
            
            $req = "select * from ARTICLE where CODENUMERO is null and CODEREVUE is null and DATEDIFF(MONTH, DATEMISEENLIGNE, GETDATE()) > 6";
            $res = $objPdo->query($req);
            $res = $res->fetchAll();

            $objListeArticles = new Collection();
            
                foreach ($res as $value) {
                $numArticle = $value['NUMARTICLE'];
                $titreArticle = $value['TITREARTICLE'];
                $lien = $value['LIENFICHIERCONTENU'];
                $chapeau = $value['CHAPEAU'];
                $longueur = $value['LONGUEUR'];
                $date = $value['DATEMISEENLIGNE'];
                $idRubrique = $value['NUMRUBRIQUE'];
                $pigiste = pdoParticipant::getLeParticipant($value['MATRICULE']);
                $rubrique = pdoRubrique::getLaRubrique($idRubrique);

                $objArticle = new Article($numArticle, $titreArticle, $lien, $chapeau, $longueur, $date, $pigiste, $rubrique);
                $objListeArticles->add($objArticle);
                }
                return $objListeArticles->getAll();
        } catch (Exception $ex) {
            
            echo $ex->getMessage();
        }
    }

}
