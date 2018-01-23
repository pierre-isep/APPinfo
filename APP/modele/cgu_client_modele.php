<?php
function afficherCGU($bdd) {
$requete = $bdd->query('SELECT * FROM conditions_generales_utilisation ORDER BY ID DESC LIMIT 1');
return $requete;
}
?>