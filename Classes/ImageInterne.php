<?php


final class ImageInterne extends Image {

    private $_strLienFichier;

    /**
     * Constructeur de la classe 
     * 
     * @param type $strCodeImage
     */
    function __construct($strCodeImage, $lienFichier) {
        
        $this->_strCodeImage = $strCodeImage;
        $this->_strLienFichier = $lienFichier;
    }

    /**
     * Retourne le lien du fichier
     * @return string
     */
    function get_strLienFichier() {
        return $this->_strLienFichier;
    }

    /**
     * Retourne le code de l'image
     * @return string
     */
    public function get_strCodeImage() {
        return $this->_strCodeImage;
    }
    
    /**
     * Permet de mettre a jour le lien du fichier
     * @param type string
     */
    function set_strLienFichier($_strLienFichier) {
        $this->_strLienFichier = $_strLienFichier;
    }

    /**
     * Retourne de mettre a jour le code de l'image
     * @param type string
     */
    public function set_strCodeImage($CodeImage) {
        $this->_strCodeImage = $CodeImage;
    }

}
