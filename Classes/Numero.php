<?php
/**
 * Description of Numero
 *
 * @author dorian.lethaibinh
 */
class Numero {
    
    private $_intCodeNumero;
    private $_intAnneePublication;
    private $_intMoisPublication;
    private $_arrayListeRubriques;
    private $_arrayListeArticles;
    private $_objMaquettiste;
    private $_objRevue;
    
    /**
     * Constructeur de la classe Numero
     * @param int $codeNumero
     * @param int $annePublication
     * @param int $moisPublication
     * @param Maquettiste $maquettiste
     * @param Revue $revue
     */
    function __construct($codeNumero, $annePublication, $moisPublication, $maquettiste, $revue) {
        $this->_intCodeNumero = $codeNumero;
        $this->_intAnneePublication = $annePublication;
        $this->_intMoisPublication = $moisPublication;
        $this->_objMaquettiste = $maquettiste;
        $this->_objRevue = $revue;
        $this->_arrayListeRubriques = [];
        $this->_arrayListeArticles = [];
    }
    
    /**
     * Ajoute un article à la liste des articles
     * @param Article $objArticle
     */
    function ajouteArticle($objArticle) {       
        $this->_arrayListeArticles[] = $objArticle;
    }
    
    /**
     * Ajoute une rubrique à la liste des rubriques
     * @param Rubrique $objRubrique
     */
    function ajouteRubrique($objRubrique) {       
        $this->_arrayListeRubriques[] = $objRubrique;
    }
    
    /**
     * Retourne le code numero
     * @return int
     */
    function getCodeNumero() {
        return $this->_intCodeNumero;
    }

     /**
     * Retourne l'année de publication
     * @return int
     */
    function getAnneePublication() {
        return $this->_intAnneePublication;
    }

     /**
     * Retourne le mois de publication
     * @return int
     */
    function getMoisPublication() {
        return $this->_intMoisPublication;
    }

    /**
     * Définit le code numero
     * @param int $codeNumero
     */
    function setCodeNumero($codeNumero) {
        $this->_intCodeNumero = $codeNumero;
    }

    /**
     * Définit l'année de publication
     * @param int $anneePublication
     */
    function setAnneePublication($anneePublication) {
        $this->_intAnneePublication = $anneePublication;
    }

    /**
     * Définit le mois de publication
     * @param int $moisPublication
     */
    function setMoisPublication($moisPublication) {
        $this->_intMoisPublication = $moisPublication;
    }

    /**
     * Obtient la liste des rubriques
     * @return Array
     */
    function getListeRubriques() {
        return $this->_arrayListeRubriques;
    }

    /**
     * Obtient la liste des articles
     * @return Array
     */
    function getListeArticles() {
        return $this->_arrayListeArticles;
    }

    /**
     * Obtient le maquettiste
     * @return Maquettiste
     */
    function getMaquettiste() {
        return $this->_objMaquettiste;
    }

    /**
     * Obtient la revue
     * @return Revue
     */
    function getRevue() {
        return $this->_objRevue;
    }

    /**
     * Définit la liste des rubriques
     * @param Array $listeRubriques
     */
    function setListeRubriques($listeRubriques) {
        $this->_arrayListeRubriques = $listeRubriques;
    }

    /**
     * Définit la liste des articles
     * @param Array $listeArticles
     */
    function setListeArticles($listeArticles) {
        $this->_arrayListeArticles = $listeArticles;
    }

    /**
     * Définit le maquettiste
     * @param Maquettiste $maquettiste
     */
    function setMaquettiste($maquettiste) {
        $this->_objMaquettiste = $maquettiste;
    }

    /**
     * Définit la revue
     * @param Revue $revue
     */
    function setRevue($revue) {
        $this->_objRevue = $revue;
    }



}
