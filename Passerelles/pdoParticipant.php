<?php

/**
 * Classe d'accès aux données
 * Gère la table Participant
 */
class pdoParticipant {

    /**
     * Obtient la liste des participants
     * @return Collection   La collection des objets Participant.
     */
    public static function getLesParticipants() {
        $objPdo = PdoConnexion::getPdoConnexion();
        $req = "Select matricule, nom, prenom, email, prixfeuillet, typeparticipant from PARTICIPANT";
        $res = $objPdo->query($req);
        $lesLignes = $res->fetchAll();
        $col = new Collection();
        foreach ($lesLignes as $unParticipant) {

            $MATRICULE = $unParticipant['MATRICULE'];
            $CODESTATUT = $unParticipant['CODESTATUT'];
            $NOM = $unParticipant['NOM'];
            $PRENOM = $unParticipant['PRENOM'];
            $EMAIL = $unParticipant['EMAIL'];
            $PRIXFEUILLET = $unParticipant['PRIXFEUILLET'];
            $TYPEPARTICIPANT = $unParticipant['TYPEPARTICIPANT'];
            $col->add(new Participant($MATRICULE, $NOM, $PRENOM, $EMAIL, $CODESTATUT));
        }
        $res->closeCursor();
        return $col->getAll();
    }

    /**
     * Obtient le participant avec un matricule spécifique
     * @param String $matricule Le matricule du participant recherché
     * @return \Participant Un objet Participant
     */
    public static function getLeParticipant($matricule) {
        $objPdo = PdoConnexion::getPdoConnexion();
        $req = "Select matricule, codeStatut, nom, prenom, email, prixfeuillet, typeparticipant from PARTICIPANT WHERE matricule = $matricule";
        $res = $objPdo->query($req)->fetch();
        $objParticipant = new Participant($res['matricule'], $res['nom'], $res['prenom'], $res['email'], pdoStatut::getStatut($res['codeStatut']));
        return $objParticipant;
    }

}
