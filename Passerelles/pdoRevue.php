<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class pdoRevue {

    /**
     * Obtient la revue au code revue passé en paramètre
     * 
     * @param type $codeRevue
     * @return \Revue
     */
    public static function getLaRevue($codeRevue) {

        $listeNumeros = [];
        $objPdo = PdoConnexion::getPdoConnexion();
        $req = "select CODEREVUE, TITRE, THEME, PAGESMAXI from REVUE WHERE CODEREVUE = $codeRevue";
        $rev = $objPdo->query($req)->fetch();
        $req = "select * from Numero where CODEREVUE = $codeRevue";
        $numeros = $objPdo->query($req);
        $lesLignes = $numeros->fetchAll();
        $listeNumeros = new Collection();
        foreach ($lesLignes as $numero) {
            $codeNumero = $numero['CODENUMERO'];
            $annePublication = $numero['ANNEEPUBLICATION'];
            $moisPublication = $numero['MOISPUBLICATION'];
            $maquettiste = pdoParticipant::getLeParticipant($numero['MATRICULE']);
            $objNumero = new Numero($codeNumero, $annePublication, $moisPublication, $maquettiste, null);
            $listeNumeros->add($objNumero);
        }

        $objRevue = new Revue($rev['CODEREVUE'], $rev['TITRE'], $rev['THEME'], $rev['PAGESMAXI'], $listeNumeros);
        return $objRevue;
    }

    public static function getLesRevues() {

        $objPdo = PdoConnexion::getPdoConnexion();
        $req = "select CODEREVUE, TITRE, THEME, PAGESMAXI from REVUE";
        $rev = $objPdo->query($req);
        $lesLignes = $rev->fetchAll();
        $col = new Collection();
        foreach ($lesLignes as $revue) {
            $ID = $revue['CODEREVUE'];
            $titre = $revue['TITRE'];
            $theme = $revue['THEME'];
            $pagesmaxi = $revue['PAGESMAXI'];
            $col->add(new Revue($ID, $titre, $theme, $pagesmaxi, null));
        }
        $rev->closeCursor();
        return $col->getAll();
    }

}
