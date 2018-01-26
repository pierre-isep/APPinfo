<?php
session_start();
// on inclut le fichier modèle contenant les appels à la BDD

include 'modele/connexion.php';
/*include 'modele/administrateur.php';
include './modele/utilisateur.php';*/
include './controleurs/fonction.php';


// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "accueil";
} else {
    $function = $_GET['fonction'];
}

switch ($function) {

    case 'accueil':
        //affichage de l'accueil
        $vue = "accueil";
        $title = "Accueil";
        $alerte = false;
        break;

    case 'profil':
        $vue = "parametres";
        $title = "profil";
        $alerte = false;
        break;

    case 'gestion_utilisateur':
        $vue = "gestion_utilisateurs";
        $title = "gestion_utilisateurs";
        $alerte = false;
        break;

    case 'parametres':
        $vue = "profil";
        $title = "profil";
        $alerte = false;
        break;


    case 'ajout_utilisateur':
        $vue = "addUser";
        $title = "Ajout utilisateur";
        $alerte = false;
        break;

    case 'outil_ajout_utilisateur':
        $vue = "addUserTool";
        $title = "Ajout utilisateur";
        $alerte = false;
        break;

    case 'outil_edition_utilisateur':
        $vue = "editTool";
        $title = "modification utilisateur";
        $alerte = false;
        break;


    case 'deconexion':
        //affichage de l'accueil
        session_unset();
        session_destroy();
        $vue = "accueil";
        $title = "Accueil";
        $alerte = false;
        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}


include 'vues/' . $vue . '.php';