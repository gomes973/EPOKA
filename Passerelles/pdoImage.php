<?php

//Gomes Dylan
class PdoImage {

    /**
     * Permet de sauvegarder dans la base de donnée l'objet du type ImageInterne ou Imageexterne
     * @param type $objImage
     */
    public static function insertImage($objImage) {

        if (is_a($objImageInterne, ImageInterne::class())) {
            try {
                $objImageInterne = new ImageInterne($objImage->get_strCodeImage(), $objImage->get_strLienFichier());
                $objPDO = PdoConnexion::getPdoConnexion();

                $sql = "insert into IMAGEINTERNE values ('" . $objImageInterne->get_strCodeImage() . "', '" . $objImageInterne->get_strLienFichier() . "'";
                $objPDO->query($sql);
            } catch (Exception $ex) {
                $ex->getMessage();
                echo 'Erreur insert ImageInterne';
            }
        }
        if (is_a($objImage, ImageExterne::class())) {
            try {
                $objImageExterne = new ImageExterne($objImage->get_strCodeImage(), $objImage->get_intPrix(), $objImage->get_objBaqnue());
                $objPDO = PdoConnexion::getPdoConnexion();

                $sql = "insert into IMAGEEXTERNE values ('" . $objImageExterne->get_strCodeImage() . "', '" . $objImageExterne->get_intPrix() . "', '" . $objImageExterne->get_objBaqnue()->get_intCodeBanque() . "'";
                $objPDO->query($sql);
            } catch (Exception $ex) {
                $ex->getMessage();
                echo 'Erreur insert ImageExterne';
            }
        }
    }

    /**
     * Recupere les images Internes
     * @return collection
     */
    public static function getImagesInternes() {
        try {
            $objPdo = PdoConnexion::getPdoConnexion();

            $sql = "select * from IMAGEINTERNE";
            $res = $objPdo->query($sql);
            $res = $res->fetchAll();

            $col = new Collection();

            foreach ($res as $value) {
                $obj = new ImageInterne($value['IDIMAGEINTERNE'], $value['LIENFICHIER']);
                $col->add($obj);
            }
            return $col->getAll();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Aucune Image Interne';
        }
    }

    /**
     * Retourne une collection d'images ecternes
     * @return Collection   
     */
    public static function getImagesExternes() {
        try {
            $objPdo = PdoConnexion::getPdoConnexion();
            $sql = "select * from IMAGEEXTERNE";
            $res = $objPdo->query($sql);
            $res = $res->fetchAll();

            $col = new Collection();

            foreach ($res as $value) {
                $obj = new ImageExterne($value['IDIMAGEEXTERNE'], $value['PRIX'], $value['CODEBANQUE']);
                $col->add($obj);
            }
            return $col->getAll();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Aucune image externe';
        }
    }
    
    public static function getImageExterne($id){
        $objPdo = PdoConnexion::getPdoConnexion();
        $sql = "select URLIMAGE from IMAGEEXTERNE where IDIMAGEEXTERNE = " . $id;
        $res = $objPdo->query($sql);
        $res = $res->fetch();
        
        return $res['URLIMAGE'];
    }

}
