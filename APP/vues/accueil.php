<?php echo AfficheAlerte($alerte); ?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/accueil.css">
    <link rel="script" href="OHcabouge.js">
    <title>Domisep</title>






</head>

<body>
<div id="conteneur-body-general">
    <div id="conteneurentete">
        <div id="logoentete">
            <img id="imglogo"src="image/logo-bls.png" id="logo">
        </div>
        <div id="hearthomeentete">
            <titrelogo>Heart'Home</titrelogo>
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

    <div id="conteneur-body">
        <div id="conteneur-presentation">
            <div id="presentation">
                <div id="presentation-vertical">
                    <p>
                        Home'tech est la nouvelle solution pour équiper votre maison en domotique.</br> Que ce soit pour la sécurité, le controle à distance ou la simplicité,<br> nous saurons donner vis a votre maison pour combler vos attentes.<br>N'hésitez pas à explorer notre F.A.Q. pour mieux nous découvrir.
                    </p>
                    <form  method="post" action="index.php?cible=accueil&fonction=faq"><a><button id="bouton_sans_style" type="submit" >F.A.Q.</button></a></form>
                </div>
            </div>
        </div>
        <div id="conteneur-inscription">
            <div id="inscription">
                <form method="post" action="index.php?fonction=inscription">
                    <h1>Inscription </h1>
                    <p>
                        <label>Nom:</label><input class="case-vide" type="text" name="Nom"  required/></br>
                        <label>Prénom:</label><input class="case-vide" type="text" name="Prenom"  required/></br>
                        <label>Adresse mail:</label><input class="case-vide" type="mail" name="E-mail" required/></br>
                        <label>Mot de passe:</label><input class="case-vide" type="password" name="Mot_De_Passe"  required/></br>
                        <label>J'accepte les conditions d'utilisation</label> <input type="checkbox" name="Conditions" required/></br>
                        <input type="submit" value="Inscription" /></br>
                    </p>
                </form>
            </div>
        </div>
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
            <footer><form  method="post" action="index.php?cible=cgu_client_controleur"><a><button id="bouton_sans_style" type="submit" >cgu</button></a></form></footer>
        </div>
    </div>
</div>

</body>
</html>