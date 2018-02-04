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
    <div class="TEXTE">
        <?php
        // affiche la dernière version des CGU avec la dernière date de modif
        while($donnees = $reponse->fetch()) {
            echo $donnees['Contenu'];
            echo '<br><br>Dernière modification le ', $donnees['Date_de_derniere_modification'];
        }
        ?>
    </div>

</div>


<div id="footer">
    <div id="Footer-gauche">
        <div id="logo-footer">
            <img id="imglogofooter"src="image/logo-isep.jpg" id="logo">
        </div>
        <div id="copyright">
            <footer>&copy;2017</footer>
        </div>
        <div id="domisep">
            <footer>&reg;Domisep</footer>
        </div>
        <div id="mention-légales">
            <footer><form  method="post" action="index.php?cible=cgu_client_controleur&fonction=accueil"><a><button id="bouton_sans_style" type="submit" style="color:#262626;background-color:#efefef; border-radius:5%" >cgu</button></a></form></footer>
        </div>
    </div>
</div>

</body>
</html>