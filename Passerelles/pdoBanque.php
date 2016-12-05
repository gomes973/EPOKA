<?php
class pdoBanque{
    
    /**
     * Renvoie des objets banques presente dans la base EPOKA
     * @return \Collection
     */
    public static function getLesBanques(){
        $objPdo = PdoConnexion::getPdoConnexion();
        
        $sql = "select * from BANQUE";
        $res = $objPdo->query($sql);
        $res = $res->fetchAll();
        
        $col = new Collection();
        
        foreach ($res as $value) {
            $objBaqnue = new Banque($value['CODE'], $value['URL'], $value['RESUME']);
            $col->add($objBaqnue);
        }
        
        return $col->getAll();
    }
    
    /**
     * Cette function permet de retourne une collection d'images Externes d'une banque.
     * L'id de la banque est passe en parametre.
     * @param type $objBanque
     * @return \Collection
     */
    public static function getLesImagesBanque($idBanque){
        $objBanque = PdoConnexion::getPdoConnexion();
        
        $sql = "select * from IMAGEEXTERNE where CODEBANQUE = " . $idBanque;
        $res = $objBanque->query($sql);
        $res = $res->fetchAll();
        
        $col = new Collection();
        
        foreach ($res as $value) {
            $objImageExt = new ImageExterne($value['IDIMAGEEXTERNE'], $value['PRIX'], pdoBanque::getBanque($value['CODEBANQUE']), $value['URLIMAGE']);
            $col->add($objImageExt);
        }
        
        return $col->getAll();
    }
    
    /**
     * Cette function permet de retourner un objet du type banque
     * Elle reçoie l'id de la banque en parametre.
     * @param type $idBanque
     * @return type
     */
    public static function getBanque($idBanque){
        $objBanque = PdoConnexion::getPdoConnexion();
        
        $sql = "select * from BANQUE where CODE = ".$idBanque;
        $res = $objBanque->query($sql);
        $res = $res->fetch();
        
        $onjBanque = new Banque($res['CODE'], $res['URL'], $res['RESUME']);
        
        return $objBanque;
    }
}
