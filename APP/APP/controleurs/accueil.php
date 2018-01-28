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

    case 'faq':
        $vue = "faq";
        $title = "faq";
        $alerte = false;
        break;

    case 'connexion':
        //affichage de la page de connexion
        $vue = "accueil";
        $title = "accueil";
        $alerte = false;
        if (isset($_POST['E-mail']) and isset($_POST['Mot_De_Passe'])) {

            // Vérification des identifiants
            addslashes($_POST['E-mail']);
            hash('sha256', addslashes($_POST['Mot_De_Passe']));
            $req = $bdd->prepare('SELECT ID_personne, Nom_personne, Prenom FROM compte WHERE Email = :Email AND mot_de_passe = :mot_de_passe AND ID_typeCompte = :ID_typeCompte ');
            $req->execute(array(
                'Email' => $_POST['E-mail'],
                'mot_de_passe' => $_POST['Mot_De_Passe'],
                'ID_typeCompte' => 1));

            $resultat = $req->fetch();

                /*if (!$resultat) {
                    $alerte = "Mauvais identifiant ou mot de passe !";
                } */
                if($resultat){
                    $_SESSION['Nom'] = $resultat['Nom_personne'];
                    $_SESSION['Prenom'] = $resultat['Prenom'];
                    $_SESSION['ID'] = $resultat['ID_personne'];
                    $_SESSION['ID_personne'] = $resultat['ID_personne'];
                    $req = $bdd->prepare('SELECT ID_logement FROM ownerlogment WHERE ID_personnes = :ID_personne ');
                    $req->execute(array(
                        'ID_personne' => $_SESSION['ID']));
                    $resultat = $req->fetch();
                    $_SESSION['id_logement'] = $resultat['ID_logement'];
                    $vue = "accueil_administrateur";
                    $title = "accueil_administrateur";
                }
            $req2 = $bdd->prepare('SELECT ID_personne, Nom_personne, Prenom FROM compte WHERE Email = :Email AND mot_de_passe = :mot_de_passe AND ID_typeCompte = :ID_typeCompte ');
            $req2->execute(array(
                'Email' => $_POST['E-mail'],
                'mot_de_passe' => $_POST['Mot_De_Passe'],
                'ID_typeCompte' => 3));

            $resultat = $req2->fetch();
                /*if (!$resultat) {
                    echo 'Mauvais identifiant ou mot de passe !';
                }*/
                if ($resultat) {
                    $_SESSION['Nom'] = $resultat['Nom_personne'];
                    $_SESSION['Prenom'] = $resultat['Prenom'];
                    $_SESSION['ID'] = $resultat['ID_personne'];
                    $_SESSION['ID_personne'] = $resultat['ID_personne'];
                    $req = $bdd->prepare('SELECT ID_logement FROM ownerlogment WHERE ID_personnes = :ID_personne ');
                    $req->execute(array(
                        'ID_personne' => $_SESSION['ID']));
                    $resultat = $req->fetch();
                    $_SESSION['id_logement'] = $resultat['ID_logement'];
                    $vue = "accueil_technicien";
                    $title = "accueil_technicien";
                }
            $req3 = $bdd->prepare('SELECT ID_personne, Nom_personne, Prenom FROM compte WHERE Email = :Email AND mot_de_passe = :mot_de_passe AND ID_typeCompte = :ID_typeCompte ');
            $req3->execute(array(
                'Email' => $_POST['E-mail'],
                'mot_de_passe' => $_POST['Mot_De_Passe'],
                'ID_typeCompte' => 2));

            $resultat = $req3->fetch();
                /*if (!$resultat) {
                    echo 'Mauvais identifiant ou mot de passe !';
                }*/
                if ($resultat) {
                    $_SESSION['Nom'] = $resultat['Nom_personne'];
                    $_SESSION['Prenom'] = $resultat['Prenom'];
                    $_SESSION['ID'] = $resultat['ID_personne'];
                    $_SESSION['ID_personne'] = $resultat['ID_personne'];
                    $req = $bdd->prepare('SELECT ID_logement FROM ownerlogment WHERE ID_personnes = :ID_personne ');
                    $req->execute(array(
                        'ID_personne' => $_SESSION['ID']));
                    $resultat = $req->fetch();
                    $_SESSION['id_logement'] = $resultat['ID_logement'];
                    $vue = "accueil_utilisateur";
                    $title = "accueil_utilisateur";
                }

        }
        break;




    case 'inscription':
        $vue = "accueil";
        $title = "acceuil";
        $alerte = false;
        // Cette partie du code est appelée si le formulaire a été poste
        if (isset($_POST['Nom']) and isset($_POST['Prenom']) and isset($_POST['E-mail']) and isset($_POST['Mot_De_Passe'])) {
            if( !estUneChaine($_POST['Nom']))
            {
                $alerte = "Le nom doit être une chaîne de caractère.";
            }
            else if( !estUneChaine($_POST['Prenom']))
            {
                $alerte = "Le Prenom doit être une chaîne de caractère.";
            }
            /*else if( !estUnNumeroDeTelephone($_POST['Telephone']))
            {
                $alerte = "Le numero de téléphone n'est pas correct.";
            }*/
            else if( !estUnEmail($_POST['E-mail']))
            {
                $alerte = "L'Email n'est pas correct.";
            }
            /*else if( !estUneChaine($_POST['login']))
            {
                $alerte = "Le pseudo doit etre une chaine de caractère.";
            }*/
            else if( !estUnMotDePasse($_POST['Mot_De_Passe']))
            {
                $alerte = "Le mot de passe doit comporter plus de 8 caractères.";

            }

            else {
                // Tout est ok, on peut inscrire le nouvel utilisateur

                // Appel à la BDD à travers une fonction du modèle.
                $req = $bdd->prepare('INSERT INTO compte( Nom_personne, Prenom, tel, Email,login , mot_de_passe, ID_typeCompte) VALUES( :Nom_personne, :Prenom, :tel, :Email, :login , :mot_de_passe, :ID_typeCompte)');

                $req->execute(array(
                    'Nom_personne' => $_POST['Nom'],
                    'Prenom' => $_POST['Prenom'],
                    'tel' => NULL,
                    'Email' => $_POST['E-mail'],
                    'login' => NULL,
                    'mot_de_passe' => $_POST['Mot_De_Passe'],
                    'ID_typeCompte' => 2
                    ));

                $req = $bdd->prepare('SELECT ID_personne FROM compte WHERE Email = :Email ');
                $req->execute(array(
                    'Email' => $_POST['E-mail']));
                $resultat = $req->fetch();

                $req = $bdd->prepare('SELECT MAX(ID_logement) AS valmax FROM ownerlogment');
                $resultat=$req->execute(array());

                die(var_dump($resultat['valmax']));
                $id=$resultat['max(ID_logement)'];
                $new_id=$id+1;

                $req = $bdd->prepare('INSERT INTO ownerlogment(ID_personnes, ID_logement) VALUES( :ID_personnes, :ID_logement)');

                $req->execute(array(
                    'ID_personnes' => $resultat['ID_personne'],
                    'ID_logement' => $new_id
                ));
            }
        }
        break;


    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}


include 'vues/' . $vue . '.php';
