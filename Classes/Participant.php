<?php
/**
 * Description of Participant
 *
 * @author dorian.lethaibinh
 */
class Participant {
    
    private $_stringMatricule;
    private $_stringNom;
    private $_stringPrenom;
    private $_stringEmail;
    private $_objStatut;
    
    /**
     * Constructeur de la classe Participant
     * @param string $matricule
     * @param string $nom
     * @param string $prenom
     * @param string $email
     * @param Statut $statut
     */
    function __construct($matricule, $nom, $prenom, $email, $statut) {
        $this->_stringMatricule = $matricule;
        $this->_stringNom = $nom;
        $this->_stringPrenom = $prenom;
        $this->_stringEmail = $email;
        $this->_objStatut = $statut;
    }

    /**
     * Retourne le marticule du participant
     * @return istring
     */
    function getMatricule() {
        return $this->_stringMatricule;
    }

    /**
     * Retourne le nom du participant
     * @return string
     */
    function getNom() {
        return $this->_stringNom;
    }

    /**
     * Retourne le prénom du participant
     * @return string
     */
    function getPrenom() {
        return $this->_stringPrenom;
    }

    /**
     * Retourne l'email du participant
     * @return string
     */
    function getEmail() {
        return $this->_stringEmail;
    }

    /**
     * Définit le matricule du participant
     * @param string $matricule
     */
    function setMatricule($matricule) {
        $this->_stringMatricule = $matricule;
    }

    /**
     * Définit le nom du participant
     * @param string $nom
     */
    function setNom($nom) {
        $this->_stringNom = $nom;
    }

    /**
     * Définit le prénom du participant
     * @param string $prenom
     */
    function setPrenom($prenom) {
        $this->_stringPrenom = $prenom;
    }

    /**
     * Définit l'email du participant
     * @param string $email
     */
    function setEmail($email) {
        $this->_stringEmail = $email;
    }

    /**
     * Obtient le statut
     * @return Statut
     */
    function getStatut() {
        return $this->_objStatut;
    }

    /**
     * Définit le statut
     * @param Statut $statut
     */
    function setStatut($statut) {
        $this->_objStatut = $statut;
    }



}


