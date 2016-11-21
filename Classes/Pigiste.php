<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pigiste
 *
 * @author dorian.lethaibinh
 */
class Pigiste extends Participant {
   
    private $_floatPrixFeuillet;
    
    /**
     * Constructeur de la classe Pigiste
     * @param string $matricule
     * @param string $nom
     * @param string $prenom
     * @param string $email
     * @param Statut $statut
     * @param float $prixFeuillet
     */
    function __construct($matricule, $nom, $prenom, $email, $statut, $prixFeuillet) {
        parent::__construct($matricule, $nom, $prenom, $email, $statut);
        $this->_floatPrixFeuillet = $prixFeuillet;
    }
    
    /**
     * Obtient le prix feuillet
     * @return float
     */
    function getPrixFeuillet() {
        return $this->_floatPrixFeuillet;
    }

    /**
     * Définit le prix feuillet
     * @param float $prixFeuillet
     */
    function setPrixFeuillet($prixFeuillet) {
        $this->_floatPrixFeuillet = $prixFeuillet;
    }


    
}
