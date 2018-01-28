<?php
require_once("modele/panne.php");
require_once("modele/connexion.php");

$panne = recup_panne($bdd);

function afficher_panne() {
    global $panne;
    foreach ($panne as $value) {
        echo '<h2>';
        echo $value['ID_personne'];
        echo '</h2>';
        echo '<p>';
        echo $value['description'];
        echo '</p>';
    }
}

?>