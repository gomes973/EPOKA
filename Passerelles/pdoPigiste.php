<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class pdoPigiste{
    
    /**
     * Obtient la liste des pigistes
     * @return Collection   Une collection d'objets Pigistes.
     */
    public static function getLesPigistes(){
        
        $objPdo = PdoConnexion::getPdoConnexion();
        $req = "select matricule, nom, prenom, email, codestatut, prixfeuillet from PARTICIPANT where TYPEPARTICIPANT = 1";
        $res = $objPdo->query($req);
        $lesLignes = $res->fetchAll();
        $col = new Collection();
	foreach($lesLignes as $pigiste){
            $ID = $pigiste['matricule'];
            $nom = $pigiste['nom'];
            $prenom = $pigiste['prenom']; 
            $email = $pigiste['email'];
            $statut = $pigiste['codestatut'];
            $prixFeuillet = $pigiste['prixfeuillet'];
            $pigiste = new Pigiste($ID, $nom, $prenom, $email, $statut, $prixFeuillet);
            $col->add($pigiste);
	}
        
	$res->closeCursor();
	return $col->getAll();
        
    }
    
    
}

