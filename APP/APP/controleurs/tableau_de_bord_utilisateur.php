<?php
session_start();
// on inclut le fichier modèle contenant les appels à la BDD

include 'modele/connexion.php';
include './controleurs/fonction.php';


$function = $_GET['fonction'];


switch ($function) {

    case 'accueil':
        $vue = "accueil_utilisateur";
        $title = "accueil_utilisateur";
        $alerte = false;

        break;

    case 'gestion_capteur':
        $vue = "accueil_utilisateur";
        $title = "accueil_utilisateur";
        $alerte = false;

        break;

    case 'gerer_ma_maison':
        $vue = "gerer_ma_maison";
        $title = "gerer_ma_maison";
        $alerte = false;

        break;

    case 'faq':
        $vue = "faq_utilisateur";
        $title = "FAQ";
        $alerte = false;

        break;


    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}


include 'vues/' . $vue . '.php';

