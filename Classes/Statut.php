<?php
/**
 * Description of Statut
 *
 * @author dorian.lethaibinh
 */
class Statut {
    
    private $_intCodeStatut;
    private $_stringLibelleStatut;
    
    /**
     * Constructeur de la classe Statut
     * @param int $codeStatut
     * @param string $libelleStatut
     */
    function __construct($codeStatut, $libelleStatut) {
        $this->_intCodeStatut = $codeStatut;
        $this->_stringLibelleStatut = $libelleStatut;
    }
    
    /**
     * Retourne le code statut
     * @return int
     */
    function getCodeStatut() {
        return $this->_intCodeStatut;
    }

    /**
     * Retourne le libelle statut
     * @return string
     */
    function getLibelleStatut() {
        return $this->_stringLibelleStatut;
    }

    /**
     * Définit le code statut
     * @param int $codeStatut
     */
    function setCodeStatut($codeStatut) {
        $this->_intCodeStatut = $codeStatut;
    }

    /**
     * Définit le libelle statut
     * @param string $libelleStatut
     */
    function setLibelleStatut($libelleStatut) {
        $this->_stringLibelleStatut = $libelleStatut;
    }


    
}
