<?php

/**
 * Classe d'accès aux données
 * Gère la table Statut
 */
class pdoRubrique {

    /**
     * Obtient toutes les rubriques
     * @return Collection   La collection de tous les objets Rubrique
     */
    public static function getLesRubriques() {
        $objPdo = PdoConnexion::getPdoConnexion();
        $req = "select NUMRUBRIQUE, TITRERUBRIQUE from RUBRIQUE";
        $res = $objPdo->query($req);
        $lesLignes = $res->fetchAll();
        $col = new Collection();
        foreach ($lesLignes as $val) {
            $num = $val['NUMRUBRIQUE'];
            $lib = $val['TITRERUBRIQUE'];
            $col->add(new Rubrique($num, $lib));
        }
        $res->closeCursor();
        return $col->getAll();
    }

    /**
     * Obtient les rubriques d'une revue
     * @param integer $codeRevue    Le code de la revue
     * @return Collection   La collection des objets Rubriques de la revue
     */
    public static function getLesRubriquesRevue($codeRevue) {
        $objPdo = PdoConnexion::getPdoConnexion();
        $req = "select distinct RUBRIQUE.NUMRUBRIQUE, TITRERUBRIQUE from RUBRIQUE "
                . "INNER JOIN Regrouper ON RUBRIQUE.NUMRUBRIQUE = REGROUPER.NUMRUBRIQUE "
                . "INNER JOIN NUMERO ON REGROUPER.CODENUMERO = NUMERO.CODENUMERO AND REGROUPER.CODEREVUE = NUMERO.CODEREVUE "
                . "WHERE REGROUPER.CODEREVUE = $codeRevue ";

        $res = $objPdo->query($req);
        $lesLignes = $res->fetchAll();
        $col = new Collection();
        foreach ($lesLignes as $val) {
            $num = $val['NUMRUBRIQUE'];
            $lib = $val['TITRERUBRIQUE'];
            $col->add(new Rubrique($num, $lib));
        }
        $res->closeCursor();
        return $col->getAll();
    }

    /**
     * Obtient la rubrique du codeRubrique passé en paramètre
     * @param integer $codeRubrique Le code de la rubrique
     * @return \Rubrique    Un objet Rubrique
     */
    public static function getLaRubrique($codeRubrique) {
        $objPdo = PdoConnexion::getPdoConnexion();
        $req = "select TITRERUBRIQUE From RUBRIQUE WHERE NUMRUBRIQUE = $codeRubrique";
        $res = $objPdo->query($req);
        $rubrique = $res->fetch();
        $rub = new Rubrique($codeRubrique, $rubrique[0]);
        return $rub;
    }

    /**
     * Obtient les objets Rubriques du numéro et de la revue passés en paramètre
     * @param integer $codeRevue    Un code d'une revue
     * @param integer $codeNumero   Un code d'un numero
     * @return Collection   La collection d'objets Rubrique du numéro et de la revue passé en paramètre
     */
    public static function getLesRubriquesRevueNumero($codeRevue, $codeNumero) {
        $objPdo = PdoConnexion::getPdoConnexion();
        $req = "select RUBRIQUE.NUMRUBRIQUE, TITRERUBRIQUE from RUBRIQUE "
                . "INNER JOIN Regrouper ON RUBRIQUE.NUMRUBRIQUE = REGROUPER.NUMRUBRIQUE "
                . "INNER JOIN NUMERO ON REGROUPER.CODENUMERO = NUMERO.CODENUMERO AND REGROUPER.CODEREVUE = NUMERO.CODEREVUE "
                . " WHERE REGROUPER.CODEREVUE = $codeRevue AND REGROUPER.CODENUMERO = $codeNumero";

        $res = $objPdo->query($req);
        $lesLignes = $res->fetchAll();
        $col = new Collection();
        foreach ($lesLignes as $val) {
            $num = $val['NUMRUBRIQUE'];
            $lib = $val['TITRERUBRIQUE'];
            $col->add(new Rubrique($num, $lib));
        }
        $res->closeCursor();
        return $col->getAll();
    }

    /**
     * Obtient les rubriques qui contiennent des articles pour une revue
     * @param type $codeRevue
     */
    public static function getLesArticlesParRubriques($codeRevue) {
        $objPdo = PdoConnexion::getPdoConnexion();
        try {

            $req = "SELECT RUBRIQUE.TITRERUBRIQUE as Titre_Rubrique, ARTICLE.TITREARTICLE as Titre_Article, ARTICLE.CHAPEAU as Chapeau, ARTICLE.LIENFICHIERCONTENU as Lien, REVUE.TITRE as Titre_Revue, PARTICIPANT.NOM as Nom, PARTICIPANT.PRENOM as Prenom FROM ARTICLE
                    INNER JOIN RUBRIQUE ON RUBRIQUE.NUMRUBRIQUE = ARTICLE.NUMRUBRIQUE
                    INNER JOIN REVUE ON REVUE.CODEREVUE = ARTICLE.CODEREVUE
                    INNER JOIN PARTICIPANT ON PARTICIPANT.MATRICULE = ARTICLE.MATRICULE
                    WHERE ARTICLE.CODEREVUE = $codeRevue
                    AND PARTICIPANT.PRIXFEUILLET IS NOT NULL
                    ORDER BY RUBRIQUE.TITRERUBRIQUE";

            $res = $objPdo->query($req);
            $res = $res->fetchAll();

            return $res;
        } catch (Exception $ex) {

            return $ex->getMessage();
        }
    }

}
