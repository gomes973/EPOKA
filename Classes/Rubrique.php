<?php
/**
 * Description of Rubrique
 *
 * @author dorian.lethaibinh
 */
class Rubrique {
    
    private $_intNumRubrique;
    private $_stringTitreRubrique;   
    private $_arrayListeArticles;
    
    /**
     * Constructeur de la classe Rubrique
     * @param int $numRubrique
     * @param string $titreRubrique
     */
    function __construct($numRubrique, $titreRubrique) {
        $this->_intNumRubrique = $numRubrique;
        $this->_stringTitreRubrique = $titreRubrique;
        $this->_arrayListeArticles = [];
    }
    
    /**
     * Ajoute un article à la liste des articles de la rubrique
     * @param Article $objArticle
     */
    function ajouteArticle($objArticle) {       
        $this->_arrayListeArticles[] = $objArticle;   
    }
    
    /**
     * Retourne le numero de rubrique
     * @return int
     */
    function getNumRubrique() {
        return $this->_intNumRubrique;
    }

    /**
     * Retourne le titre de la rubrique
     * @return string
     */
    function getTitreRubrique() {
        return $this->_stringTitreRubrique;
    }

    /**
     * Définit le numéro de la rubrique
     * @param int $numRubrique
     */
    function setNumRubrique($numRubrique) {
        $this->_intNumRubrique = $numRubrique;
    }

    /**
     * Définit le titre de la rubrique
     * @param string $titreRubrique
     */
    function setTitreRubrique($titreRubrique) {
        $this->_stringTitreRubrique = $titreRubrique;
    }
    
    /**
     * Obtient la liste des articles
     * @return Array
     */
    function getListeArticles() {
        return $this->_arrayListeArticles;
    }

    /**
     * Définit la liste des articles
     * @param Array $listeArticles
     */
    function setListeArticles($listeArticles) {
        $this->_arrayListeArticles = $listeArticles;
    }
    
    




}
