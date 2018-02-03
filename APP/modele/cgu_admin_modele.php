<?php
function afficherCGU($bdd) {
  $requete = $bdd->query('SELECT * FROM conditions_generales_utilisation ORDER BY ID DESC LIMIT 1 '); // On sélectionne la dernière version des CGU grâce à l'ID décroissant
  return $requete;
}

function modifierCGU($bdd) {
    /* $requete = $bdd->prepare('DELETE FROM conditions_generales_utilisation ');
    $requete->execute(array()); */
    $requete = $bdd->prepare('INSERT INTO conditions_generales_utilisation(Contenu,Date_de_derniere_modification) VALUES(:Contenu,NOW())');
    $requete->execute(array(
        'Contenu' => $_POST['Contenu'],
  ));
}
?>
