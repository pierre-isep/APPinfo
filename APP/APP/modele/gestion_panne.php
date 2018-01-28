<?php

function supprimer_panne($bdd,$id_panne) {

    $requete = $bdd->prepare('DELETE FROM panne WHERE id_panne = ? ');
    $requete->execute(array($id_panne));
    $requete->closeCursor();
}