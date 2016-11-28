<?php

final class ImageExterne extends Image{
    
    private $_intPrix;
    private $_objBaqnue;

    /**
     * Constrcuetur de la classe
     * 
     * @param type string
     * @param type string
     * @param type string
     */
    function __construct($strCodeImage, $_intPrix, $_objBaqnue) {
        $this->_strCodeImage = $strCodeImage;
        $this->_intPrix = $_intPrix;
        $this->_objBaqnue = $_objBaqnue;
    }

    /**
     * Retourne le code de l'image
     * @return string
     */
    public function get_strCodeImage() {
        return $this->_strCodeImage;
    }
    /**
     * Retourne de mettre a jour le code de l'image
     * @param type string
     */
    public function set_strCodeImage($CodeImage) {
        $this->_strCodeImage = $CodeImage;
    }
    
    /**
     * Retourne le prix de l'image
     * @return int
     */
    function get_intPrix() {
        return $this->_intPrix;
    }

    /**
     * Retourne l'objet Banque
     * @return Banque
     */
    function get_objBaqnue() {
        return $this->_objBaqnue;
    }

    /**
     * Permet de modifier le prix de l'image
     * @param type int
     */
    function set_intPrix($_intPrix) {
        $this->_intPrix = $_intPrix;
    }

    /**
     * Permet de modifier l'objet Banque
     * @param type $_objBaqnue
     */
    function set_objBaqnue($_objBaqnue) {
        $this->_objBaqnue = $_objBaqnue;
    }


}