<?php
function connexion_administrateur($bdd, $adresse_mail, $mdp) {
    $trouve = false;
    $requete=$bdd->query('SELECT * FROM compte');
    while($data = $requete->fetch()) {
        if($data['Email'] == $adresse_mail && $data['mot_de_passe'] == $mdp) {
            $trouve = true;
            break;
        }
    }
    $requete->closeCursor();
    return $trouve;
}

function recup_id_administrateur($conn, $mail, $mdp) {
    $requete=$conn->prepare('SELECT id FROM administrateur WHERE mail=? AND mdp=?');
    $requete->execute(array($mail, $mdp));
    $proprietaire=$requete->fetch();
    $id_utilisateur = $proprietaire['id'];
    $requete->closeCursor();
    return $id_utilisateur;
}
?>