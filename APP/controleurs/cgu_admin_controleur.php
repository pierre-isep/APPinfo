<?php
session_start();
// on inclut le fichier modèle contenant les appels à la BDD

include 'modele/connexion.php';
include 'controleurs/fonction.php';
require('modele/cgu_admin_modele.php');
if (isset($_POST['Contenu'])) {
  modifierCGU($bdd);
}
$reponse = afficherCGU($bdd);
require('vues/cgu_admin_vue.php');
?>