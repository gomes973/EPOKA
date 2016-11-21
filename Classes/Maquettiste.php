<?php

/**
 * Description of Maquettiste
 *
 * @author dorian.lethaibinh
 */
class Maquettiste extends Participant {
    
    /**
     * Constructeur de la classe Maquettiste
     * @param string $matricule
     * @param string $nom
     * @param string $prenom
     * @param string $email
     * @param Statut $statut
     */
    function __construct($matricule, $nom, $prenom, $email, $statut) {
        parent::__construct($matricule, $nom, $prenom, $email, $statut);
    }
}
