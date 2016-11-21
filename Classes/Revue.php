<?php
/**
 * Description of Revue
 *
 * @author dorian.lethaibinh
 */
class Revue {
    
    private $_intCodeRevue;
    private $_stringTitre;
    private $_stringTheme;
    private $_intPagesMaxi;
    private $_arrayListeNumeros;
    
    /**
     * Constructeur de la classe Revue
     * @param int $codeRevue
     * @param string $titre
     * @param string $theme
     * @param int $pagesMaxi
     * @param Array $listeNumeros
     */
    function __construct($codeRevue, $titre, $theme, $pagesMaxi, $listeNumeros) {
        $this->_intCodeRevue = $codeRevue;
        $this->_stringTitre = $titre;
        $this->_stringTheme = $theme;
        $this->_intPagesMaxi = $pagesMaxi;
        $this->_arrayListeNumeros = $listeNumeros;
    }
    
    /**
     * Ajoute un numero à la liste des numéros
     * @param Numero $objNumero
     */
    function ajouteNumero($objNumero) {
        $this->_arrayListeNumeros[] = $objNumero;
    }
    
    /**
     * Retourne le code revue
     * @return int
     */
    function getCodeRevue() {
        return $this->_intCodeRevue;
    }

    /**
     * Retourne le titre
     * @return string
     */
    function getTitre() {
        return $this->_stringTitre;
    }

    /**
     * Retourne le theme
     * @return string
     */
    function getTheme() {
        return $this->_stringTheme;
    }

    /**
     * Retourne le nombre de page maximum
     * @return int
     */
    function getPagesMaxi() {
        return $this->_intPagesMaxi;
    }

    /**
     * Définit le code revue
     * @param int $codeRevue
     */
    function setCodeRevue($codeRevue) {
        $this->_intCodeRevue = $codeRevue;
    }

    /**
     * Définit le titre
     * @param string $titre
     */
    function setTitre($titre) {
        $this->_stringTitre = $titre;
    }

    /**
     * Définit le thème
     * @param string $theme
     */
    function setTheme($theme) {
        $this->_stringTheme = $theme;
    }

    /**
     * Définit le nombre de pages maximum
     * @param int $pagesMaxi
     */
    function setPagesMaxi($pagesMaxi) {
        $this->_intPagesMaxi = $pagesMaxi;
    }

    /**
     * Obtient la liste des numéros
     * @return Array
     */
    function getListeNumeros() {
        return $this->_arrayListeNumeros;
    }

    /**
     * Définit la liste des numéros
     * @param Array $listeNumeros
     */
    function setListeNumeros($listeNumeros) {
        $this->_arrayListeNumeros = $listeNumeros;
    }



}
