<?php
/**
 * Description of Article
 *
 * @author dorian.lethaibinh
 */
class Article {
    
    private $_intNumArticle;
    private $_stringTitreArticle;
    private $_stringLienFichierContenu;
    private $_stringChapeau;
    private $_stringLongueur;
    private $_dateDateMiseEnLigne;
    private $_objPigiste;
    private $_objRubrique;
    private $_objNumero;
    private $_objImage;

    /**
     * Constructeur de la classe Article
     * @param int $numArticle
     * @param string $titreArticle
     * @param string $lienFichierContenu
     * @param string $chapeau
     * @param int $longueur
     * @param date $dateMiseEnLigne
     * @param Pigiste $pigiste
     */
    function __construct($numArticle, $titreArticle, $lienFichierContenu, $chapeau, $longueur, $dateMiseEnLigne, $pigiste, $rubrique) {
        $this->_intNumArticle = $numArticle;
        $this->_stringTitreArticle = $titreArticle;
        $this->_stringLienFichierContenu = $lienFichierContenu;
        $this->_stringChapeau = $chapeau;
        $this->_stringLongueur = $longueur;
        $this->_dateDateMiseEnLigne = $dateMiseEnLigne; 
        $this->_objPigiste = $pigiste;
        $this->_objRubrique = $rubrique;
        //Modification gomes
        $this->_objImage = null;
    }
    
    /**
     * Retourne le numéro de l'article
     * @return int
     */
    function getNumArticle() {
        return $this->_intNumArticle;
    }

    /**
     * Retourne le titre de l'article
     * @return string
     */
    function getTitreArticle() {
        return $this->_stringTitreArticle;
    }

    /**
     * Retourne le lien du fichier de contenu
     * @return string
     */
    function getLienFichierContenu() {
        return $this->_stringLienFichierContenu;
    }

    /**
     * Retourne le chapeau de l'article
     * @return string
     */
    function getChapeau() {
        return $this->_stringChapeau;
    }

    /**
     * Retourne la longueur de l'article
     * @return int
     */
    function getLongueur() {
        return $this->_stringLongueur;
    }

    /**
     * Retourne la date de mise en ligne de l'article
     * @return date
     */
    function getDateMiseEnLigne() {
        return $this->_dateDateMiseEnLigne;
    }
    
    /**
     * Retourne l'objet du type image
     * @return type ObjImage
     */
    function getObjImage(){
        return $this->_objImage;
    }

    /**
     * Définit le numéro de l'article
     * @param int $numArticle
     */
    function setNumArticle($numArticle) {
        $this->_intNumArticle = $numArticle;
    }

    /**
     * Définit le titre de l'article
     * @param string $titreArticle
     */
    function setTitreArticle($titreArticle) {
        $this->_stringTitreArticle = $titreArticle;
    }

    /**
     * Définit le lien du fichier de contenu
     * @param string $lienFichierContenu
     */
    function setLienFichierContenu($lienFichierContenu) {
        $this->_stringLienFichierContenu = $lienFichierContenu;
    }

    /**
     * Définit le chapeau de l'article
     * @param string $chapeau
     */
    function setChapeau($chapeau) {
        $this->_stringChapeau = $chapeau;
    }

    /**
     * Définit la longueur de l'article
     * @param int $longueur
     */
    function setLongueur($longueur) {
        $this->_stringLongueur = $longueur;
    }

    /**
     * Définit la date de mise en ligne
     * @param date $dateMiseEnLigne
     */
    function setDateMiseEnLigne($dateMiseEnLigne) {
        $this->_dateDateMiseEnLigne = $dateMiseEnLigne;
    }
    
    /**
     * Obtient le pigiste 
     * @return Pigiste
     */
    function getPigiste() {
        return $this->_objPigiste;
    }

    /**
     * Obtient la rubrique
     * @return Rubrique
     */
    function getRubrique() {
        return $this->_objRubrique;
    }

    /**
     * Obtient le numero
     * @return Numero
     */
    function getNumero() {
        return $this->_objNumero;
    }

    /**
     * Définit le Pigiste
     * @param Pigiste $pigiste
     */
    function setPigiste($pigiste) {
        $this->_objPigiste = $pigiste;
    }

    /**
     * Définit la rubrique
     * @param Rubrique $rubrique
     */
    function setRubrique($rubrique) {
        $this->_objRubrique = $rubrique;
    }

    /**
     * Définit le numéro
     * @param Numero $numero
     */
    function setNumero($numero) {
        $this->_objNumero = $numero;
    }

    /**
     * Définit l'objet image
     * @param type $objImage
     */
    function setObjImage($objImage){
        $this->_objImage = $objImage;
    }



}
