<?php

class PdoImage{
    
    /**
     * Permet de sauvegarder dans la base de donnée l'objet du type Image
     * @param type $objImageInterne
     */
    public static function insertImageInterne($objImageInt){
        try{
            
            if (is_a($objImageInterne, ImageInterne::class())){
                
                $objImageInterne = new ImageInterne($objImageInt->get_strCodeImage(), $objImageInt->get_strLienFichier())
                
            }         
        } catch (Exception $ex) {

        }
    }
    
}