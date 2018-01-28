<?php

function supprimer_piece($bdd,$id_piece) {
    $requete = $bdd->prepare('DELETE FROM piece WHERE id_piece = ? ');
    $requete->execute(array($id_piece));
    $requete->closeCursor();

    $requete = $bdd->prepare('SELECT id_cemac FROM cemac WHERE ID_piece =:id_piece ');
    $requete->execute(array(
        'id_piece' => $id_piece));
    while ($idcemac = $requete->fetch()) {
            $requete2 = $bdd->prepare('DELETE FROM capteur WHERE id_cemac = ? ');
            $requete2->execute(array($idcemac['id_cemac']));
            $requete2->closeCursor();
    }

    $requete = $bdd->prepare('SELECT id_cemac FROM cemac WHERE ID_piece =:id_piece ');
    $requete->execute(array(
        'id_piece' => $id_piece));
    while ($idcemac = $requete->fetch()) {
        $requete2 = $bdd->prepare('DELETE FROM cemac WHERE id_cemac = ? ');
        $requete2->execute(array($idcemac['id_cemac']));
        $requete2->closeCursor();
    }
}

function supprimer_cemac($bdd,$id_cemac) {
    $requete = $bdd->prepare('DELETE FROM cemac WHERE id_cemac = ? ');
    $requete->execute(array($id_cemac));
    $requete->closeCursor();

    $requete2 = $bdd->prepare('DELETE FROM capteur WHERE id_cemac = ? ');
    $requete2->execute(array($id_cemac));
    $requete2->closeCursor();
}

function supprimer_capteur($bdd,$id_capteur) {

    $requete = $bdd->prepare('DELETE FROM capteur WHERE num_serie = ? ');
    $requete->execute(array($id_capteur));
    $requete->closeCursor();
}
?>