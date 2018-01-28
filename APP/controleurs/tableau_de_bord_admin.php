<?php
session_start();
// on inclut le fichier modèle contenant les appels à la BDD

include 'modele/connexion.php';
include './controleurs/fonction.php';


$function = $_GET['fonction'];


switch ($function) {

    case 'accueil':
        $vue = "accueil_administrateur";
        $title = "accueil_administrateur";
        $alerte = false;

        break;

    case 'catalogue':
        $vue = "Catalogue";
        $title = "Catalogue";
        $alerte = false;

        break;



    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}


include 'vues/' . $vue . '.php';