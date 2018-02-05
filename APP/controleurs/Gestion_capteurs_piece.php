<?php
/*/session_start();/*/

//inclusion du fichier modèle contenant les appels à la BDD
include 'modele/connexion.php';
include 'modele/Gestion_capteurs_piece.php';

include './controleurs/fonction.php';



$function = $_GET['fonction'];
$id_piece= $_GET['id_piece'];

switch ($function) {
  

    case 'Gestion_capteurs_piece':
        //affichage de la page de la fonction hygro
        $vue = "Gestion_capteurs_piece";
        $title = "Gestion_capteurs_piece";
        $alerte = false;


        break;

    case 'supprimer_capteur':
        $vue = "Gestion_capteurs_piece";
        $title = "Gestion_capteurs_piece";
        $alerte = false;

        if(isset($_GET['numCapteur']) && !empty($_GET['numCapteur'])) {
            // Si la variable idpiece est passé en GET
            $num_capteur = $_GET['numCapteur'];
            $req = $bdd ->prepare('DELETE FROM capteur WHERE num_serie =?');
            $req->execute(array( $num_capteur)); //user, sensor, etc.
            supprimer_capteur($bdd,$num_capteur);}


        break;

    case 'ajouter_capteur':
        $vue = "Gestion_capteurs_piece";
        $title = "Gestion_capteurs_piece";
        $alerte = false;

        if(isset($_POST['Nom']) and isset($_POST['id_piece'])) {
            // Si la variable idpiece est passé en GET
            $nom_capteur = $_POST['Nom'];
            $id_piece = $_POST['id_piece'];
            if ($nom_capteur=="Temperature"){
                $id_type=1;
            }
            if ($nom_capteur=="Luminosite"){
                $id_type=2;
            }
            if ($nom_capteur=="Humidite"){
                $id_type=3;
            }
            if ($nom_capteur=="Fenetre"){
                $id_type=4;
            }
            $req = $bdd->prepare('INSERT INTO capteur (nom, etat,id_type,id_piece, id_cemac) VALUES(?,?,?,?,?)');
            $req->execute(array($nom_capteur,'1',$id_type,$id_piece,'0')); //user, sensor, etc.
        }


        break;


    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";

}



include 'vues/' . $vue . '.php';








?>


