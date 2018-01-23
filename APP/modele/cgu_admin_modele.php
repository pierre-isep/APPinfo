<?php
function afficherCGU($bdd) {
  $requete = $bdd->query('SELECT * FROM conditions_generales_utilisation ORDER BY ID DESC LIMIT 1 ');
  return $requete;
}

function modifierCGU($bdd) {
  $requete = $bdd->prepare('INSERT INTO conditions_generales_utilisation(Contenu,Date_de_derniere_modification,Date_de_mise_en_ligne) VALUES(:Contenu,NOW(),:Date_de_mise_en_ligne)');
  $requete->execute(array(
    'Contenu' => $_POST['Contenu'],
    'Date_de_mise_en_ligne' => date('Y-m-d')
  ));
  header('location:cgu_admin_controleur.php');
}
?>