<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <title>$title</title>
    <!--	<link rel="stylesheet" type="text/css" href="Vues/PageAccueil.css" media="all"/> -->
</head>

<body>
<!--
        <div class="connexion">

            <form method="post" action="controleurs/accueil.php">

                <p>
                    <div class="email_connexion"><label>E-mail : </label><input type="mail" name="e-mail_co" required/></div>
                    <div class="mdp_connexion"><label>Mot de passe : </label><input type="password" name="mot_de_passe_co" required/></div>
                </p>
                <input class="bouton_connexion" type="submit" value="Connexion" />
            </form>



    </div>
-->
<p><?php echo AfficheAlerte($alerte); ?></p>
<div class="inscription">

    <form method="post" action="index.php?fonction=inscription">
        <p class="titre_inscription">Formulaire d'inscription </p>
        <p>
            <label>Nom:</label><input type="text" name="Nom"  required/></br>
            <label>Prénom:</label><input type="text" name="Prenom"  required/></br>
            <label>Pseudonyme:</label><input type="text" name="login"  required/></br>
            <label>Adresse mail:</label><input type="mail" name="E-mail" required/></br>
            <label>Mot de passe:</label><input  type="password" name="Mot_De_Passe"  required/></br>
            <label>Téléphone:</label><input type="tel" name="Telephone"  required/></br>
            <label>Date de naissance:</label><input type="date" name="Date_Naissance"  required/></br>
            <label>Adresse:</label><input  type="text" name="Adresse1" required/></br>
            <label>Code Postal:</label><input  type="text" name="Code_Postal"  required/></br>
            <label>J'accepte les conditions d'utilisation</label> <input type="checkbox" name="Conditions" required/></br>
            <input type="submit" value="Inscription" /></br>
        </p>
    </form>
    <br/>
    <p><a href="http://localhost/APP/index.php">Accueil</a></p>
</div>

</body>






</html>
