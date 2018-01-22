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
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut libero sagittis, sagittis diam non, sollicitudin lacus. Aliquam commodo condimentum tempus. Curabitur porttitor lobortis hendrerit. Maecenas justo mi, tempus et lorem a, placerat scelerisque orci. Nulla tristique tincidunt odio, non laoreet nulla volutpat ut. Curabitur nec odio ullamcorper, tempor sapien non, consequat mi. Proin ac neque eget sapien consequat mollis sit amet eu elit. Quisque blandit elit ac tortor scelerisque, eu rhoncus nisi fringilla. Vivamus ac dictum tortor, nec ornare nisi. Proin at felis purus. Mauris a mi bibendum erat egestas volutpat. Sed sed placerat ipsum, sed aliquam eros.

                    Curabitur placerat erat eleifend metus bibendum, nec gravida tortor bibendum. Suspendisse eu pulvinar ante, malesuada condimentum dui. Integer massa magna, faucibus a aliquam sit amet, laoreet sit amet odio. Aenean molestie lacus nec nulla maximus, sed hendrerit ipsum faucibus. Vestibulum dolor mauris, fermentum ultricies pharetra in, scelerisque in orci. Sed elementum metus egestas lacus cursus posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum orci erat, ultrices sed orci ut, efficitur dapibus ipsum. Curabitur id tellus sem. Maecenas sit amet semper magna. Maecenas a urna id massa dignissim tincidunt. Fusce vel mattis sapien. Phasellus id tincidunt ex.</p>
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
            <footer>Mentions légales</footer>
        </div>
    </div>
</div>

</body>
</html>