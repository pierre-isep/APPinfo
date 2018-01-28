<?php

function connexion_utilisateur($bdd, $adresse, $mdp) {
    $trouve = false;
    // Vérification des identifiants
    $req = $bdd->prepare('SELECT id FROM membres WHERE pseudo = :pseudo AND pass = :pass');
    $req->execute(array(
        'pseudo' => $pseudo,
        'pass' => $pass_hache));

    $resultat = $req->fetch();

}

function recup_id_utilisateur($conn, $mail, $mdp) {
    $requete=$conn->prepare('SELECT id FROM utilisateur WHERE adresse_mail=? AND mdp=?');
    $requete->execute(array($mail, $mdp));
    $proprietaire=$requete->fetch();
    $id_utilisateur = $proprietaire['id'];
    $requete->closeCursor();
    return $id_utilisateur;
}
?>