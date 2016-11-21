<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class pdoNumero {

    /**
     * Obtient les numéros d'une revue spécifique non parus. 
     * @param integer $codeRevue    Le code d'une revue
     * @return Collection   La collection des objets numéros de la revue
     */
    public static function getLesNumeros($codeRevue) {

        $objPdo = PdoConnexion::getPdoConnexion();
        /*
         * On sélectionne le coderevue, codenumero, matricule, anneepublication 
         * et  moispublication de la table Numero si le coderevue est celui
         * passé en paramètre, et que la date (annee et mois) de publication
         * se situent après la date de consultation
         */
        $req = "select coderevue, codenumero, matricule, anneepublication, moispublication from NUMERO "
                . "WHERE coderevue = $codeRevue "
                . "AND dateadd(mm,(anneepublication -1900) * 12 + moispublication - 1, 1) > getdate()";
        $res = $objPdo->query($req);
        $col = new Collection();
        $lesLignes = $res->fetchAll();
        foreach ($lesLignes as $numero) {
            $codeRevue = $numero['coderevue'];
            $codeNumero = $numero['codenumero'];
            $matricule = $numero['matricule'];
            $anneePublication = $numero['anneepublication'];
            $moisPublication = $numero['moispublication'];
            $maquettiste = pdoParticipant::getLeParticipant($matricule);
            $revue = pdoRevue::getLaRevue($codeRevue);
            $numero = new Numero($codeNumero, $anneePublication, $moisPublication, $maquettiste, $revue);
            $listeRubriques = pdoRubrique::getLesRubriquesRevueNumero($codeRevue, $codeNumero);
            $numero->setListeRubriques($listeRubriques);
            foreach ($numero->getListeRubriques() as $rubrique) {
                $listeArticles = pdoArticle::getLesArticles($rubrique->getNumRubrique());
                foreach ($listeArticles as $article) {
                    $numero->ajouteArticle($article);
                }
            }

            $col->add($numero);
        }


        $res->closeCursor();
        return $col->getAll();
    }

    /**
     * Permet de regrouper un numéro au sein d'une revue
     * @param Numero $objNumero Un objet numéro
     * @return boolean  true si le regroupement a lieu, false s'il a échoué.
     */
    public static function regrouper($objNumero) {
        $objPdo = PdoConnexion::getPdoConnexion();
        $coderevue = $objNumero->getRevue()->getCodeRevue();
        $codenumero = $objNumero->getCodeNumero();
        $tabRubriques = $objNumero->getListeRubriques();

        try {

            $req = "DELETE FROM REGROUPER WHERE CODEREVUE = $coderevue and CODENUMERO = $codenumero";
            $objPdo->exec($req);

            foreach ($tabRubriques as $rubrique) {

                $rub = $rubrique->getNumRubrique();

                $req = "INSERT INTO REGROUPER VALUES ($coderevue ,$codenumero , $rub)";
                $objPdo->exec($req);
            }
        } catch (Exception $ex) {
            return false;
        }

        return true;
    }
    
    /**
     * Retourne les numeros d'une revue
     * @param type $codeRevue
     * @return type
     */
    public static function getNumeros($codeRevue){
        $objPdo = PdoConnexion::getPdoConnexion();
        
        $req = "select CODENUMERO from numero where CODEREVUE = " . $codeRevue;
        $res = $objPdo->query($req);
        $res = $res->fetchAll();
        
       
        return$res;
        
    }

}
