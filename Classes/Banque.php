<?php

class Banque{
    private $_intCodeBanque;
    private $_strUrl;
    private $_strResume;
    
    /**
     * Constrcuteur de la classe Banque qui reçoie en parametre :
     * 
     * @param type int CodeBanque
     * @param type str URL
     * @param type str Resume
     */
    function __construct($_intCodeBanque, $_strUrl, $_strResume) {
        $this->_intCodeBanque = $_intCodeBanque;
        $this->_strUrl = $_strUrl;
        $this->_strResume = $_strResume;
    }
    
    /**
     * Permet de retourner le code de la Banque d'image
     * @return int
     */
    function get_intCodeBanque() {
        return $this->_intCodeBanque;
    }

    /**
     * Retourne l'URL de l'image
     * @return string
     */
    function get_strUrl() {
        return $this->_strUrl;
    }

    /**
     * Retourne le Resumé de l'image
     * @return string
     */
    function get_strResume() {
        return $this->_strResume;
    }

    /**
     * Permet de modifier le code de la Banque d'image
     * @param type string
     */
    function set_intCodeBanque($_intCodeBanque) {
        $this->_intCodeBanque = $_intCodeBanque;
    }

    /**
     * Permet  de modifier l'URL de l'image
     * @param type string
     */
    function set_strUrl($_strUrl) {
        $this->_strUrl = $_strUrl;
    }

    /**
     * Permet de modifier le resumé
     * @param type string
     */
    function set_strResume($_strResume) {
        $this->_strResume = $_strResume;
    }


}