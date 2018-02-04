<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/accueil.css">
    <link rel="script" href="OHcabouge.js">
    <title>Domisep</title>
</head>
<body>


    <div id="conteneurentete">
        <div id="logoentete">
            <img id="imglogo"src="image/logo-bls.png" id="logo">
        </div>
        <div id="hearthomeentete">
            <div id="hometech"><titrelogo>Hometech</titrelogo></div>
            <div id="domisependessous">Domisep</div>
        </div>
        <div id="conteneur-connexion">
            <div id="connexion">
                <form  method="post" action="index.php?fonction=connexion">
                    <p class="titre_connexion">Me connecter </p>
                    <p>
                        <label class="texte-connexion">Adresse mail : </label><input class="case-vide-connexion" type="mail" name="E-mail" required/>
                        <label class="texte-connexion">Mot de passe : </label><input class="case-vide-connexion"  type="password" name="Mot_De_Passe"  required/>
                        <input type="submit" value="Connexion" />
                    </p>
                </form>
            </div>

        </div>
    </div>

<div id="section">
<div id="FAQ">
    <div class="faq">
        <ul>
            <li>
                <a href="#question_1">Comment contacter domisep ?</a>
            </li>

            <li>
                <a href="#question_2">Comment contrôler mes capteurs ?</a>
            </li>

            <li>
                <a href="#question_3">Comment ajouter des capteurs supplémentaires ?</a>
            </li>

            <li>
                <a href="#question_4">Comment se désabonner ?</a>
            </li>

            <li>
                <a href="#question_5">Comment poser une question plus personnalisée ?</a>
            </li>
        </ul>
    </div>
    <br />
    <br />


    <div class="faq">
        <ul>
            <li>
                <h3 id="question_1" name="question_1">
                    Comment contacter domisep ?
                </h3>
                SAV:0123456789 <br />
                Service technique:0123456788 <br />
                Mail:Hometech@gmail.com <br />
                Adresse: 13 rue des nuages 75014 PARIS
            </li>

            <li>
                <h3 id="question_2" name="question_2">
                    Comment contrôler mes capteurs ?
                </h3>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </li>

            <li>
                <h3 id="question_3" name="question_3">
                    Comment ajouter des capteurs supplémentaires ?
                </h3>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </li>

            <li>
                <h3 id="question_4" name="question_4">
                    Comment se désabonner ?
                </h3>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </li>

            <li>
                <h3 id="question_5" name="question_5">
                    Comment poser une question plus personnalisée ?
                </h3>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </li>
        </ul>
        <form  method="post" action="index.php?cible=accueil&fonction=accueil"><a><button id="bouton_sans_style_accueil" type="submit" >Retour Accueil</button></a></form>
    </div>
</div>
</div>
<?php
include("footer.php");
?>

</body>
</html>
