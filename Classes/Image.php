<?php

abstract class Image{
    
    protected $_strCodeImage;
     
    /**
     * Retourne le code de l'image
     * @return type String
     */
    abstract function get_strCodeImage();
    
    /**
     * Permet de mofifier le code de l'image
     * @return type String
     */
    abstract function set_strCodeImage($CodeImage);

}

