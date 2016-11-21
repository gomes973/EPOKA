<?php 
/**
 * Classe d'accès aux données
 * Gère la table Statut
 */
 
class pdoStatut{
    
    /**
     * Obtient tous les statuts
     * @return Collection   La liste de tous les objets statuts
     */
	public static function getLesStatuts(){
		$objPdo = PdoConnexion::getPdoConnexion();
		$req = "select CODESTATUT, LIBELLESTATUT from STATUT";
		$res = $objPdo->query($req);
		$lesLignes = $res->fetchAll();
		$col = new Collection();
		foreach($lesLignes as $unStatut){
			$ID = $unStatut['CODESTATUT'];
			$lib = $unStatut['LIBELLESTATUT'];
                        $col->add(new Statut($ID, $lib));
		}
		$res->closeCursor();
		return $col->getAll();
	}
        
        /**
         * Obtient le statut du code spécifié en paramètre
         * @param integer $codeStatut   Un code statut
         * @return \Statut  l'objet statut correspondant au code spécifié
         */
        public static function getStatut($codeStatut){
            $objPdo = PdoConnexion::getPdoConnexion();
            $req = "select CODESTATUT, LIBELLESTATUT from STATUT WHERE CODESTATUT = $codeStatut";
            $res = $objPdo->query($req)->fetch();
            $objStatut = new Statut($res['CODESTATUT'], $res['LIBELLESTATUT']);
            return $objStatut;
        }
}