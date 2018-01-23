<?php
session_start();?>
    <!DOCTYPE html>
    <html>
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/profil.css">
    <link rel="script" href="OHcabouge.js">
    <title>Domisep</title>
</head>

<?php include("header.php");?>

<h1> Veuillez renseigner les informations du nouvel utilisateur : </h1>

<div id="conteneur-body">

	<form action="addUserTool.php" method="POST" enctype="multipart/form-data">
		<label for="nom"><strong>Nom</strong> :</label> <input type="text" name="nom"><br><br>
		<label for="prenom"><strong>Prénom</strong> :</label> <input type="text" name="prenom"><br><br>
		<label for="login"><strong>Login</strong> : </label> <input type="text" name="login"><br><br>
		<label for="mdp1"><strong>Mot de passe</strong> :</label> <input type="password" name="mdp1"><br><br>
		<label for="mdp2"><strong>Validez votre Mot de passe</strong> :</label> <input type="password" name="mdp2"><br><br>
		<label for="tel"><strong>Numéro de Téléphone</strong> : </label> <input type="text" name="tel"><br><br>
		<label for="mail"><strong>Email</strong> : </label> <input type="text" name="mail"><br><br>

		<label for="typeCompte"><strong>Type d'utilisateur : </strong></label>
		<select name="typeCompte">
			<option value="Utilisateur secondaire">Utilisateur secondaire</option>
		</select><br><br>

		<input type="submit" value="Valider">
	</form>

</div>


<?php
include("footer.php");
?>