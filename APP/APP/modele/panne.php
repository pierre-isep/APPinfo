<?php


function recup_panne($bdd) {
    $requete=$bdd->query("SELECT ID_panne,ID_personne,description * FROM pannes");
    $tableau = $requete->fetchAll();
    $requete->closeCursor();
    return $tableau;
}
