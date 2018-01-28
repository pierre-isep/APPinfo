 <!DOCTYPE html>
    <html>
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://localhost/APP/css/style.css">
    <link rel="stylesheet" href="http://localhost/APP/css/footer.css">
    <link rel="stylesheet" href="http://localhost/APP/css/header.css">
    <link rel="stylesheet" href="http://localhost/APP/css/Catalogue.css">
    <link rel="script" href="OHcabouge.js">
    <title>Domisep</title>
</head>
<body>

<?php include("header_admin.php");?>

<div id="section">
	<h1>Catalogue capteurs</h1>
	<?php
        // Connexion à la base de données
        try
        {
            $bdd = new PDO("mysql:host=localhost;dbname=kum'home;charset=utf8", 'root', '');
        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }

        // Récupération des 10 derniers messages
        $reponse = $bdd->query('SELECT * FROM type_capteur');

        // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)

        while ($donnees = $reponse->fetch())

        {
            $id=$donnees["id_type_capteur"];
            echo '<div class=capteur><p><strong>' . htmlspecialchars($donnees['nom_type']) . '</strong> : '. htmlspecialchars($donnees['description']) . '</br></p>' .  '<a href=Supprimer_capteur_catalogue.php?numCapteur='.$id.'><button id="bouton_supprimer" >
                                Supprimer <img id="picto_supprimer" src="http://localhost/APP/image/icone_poubelle.png" title="supprimer" />
                            </button> 
</a>' .'</div><br />';
        }

    
        $reponse->closeCursor();

    ?>


    <form id="form2" method="POST" action="Ajout_capteur_catalogue.php"><!-- Les valuers de method et action sont à compléter -->
    	<fieldset>
            <strong>Ajouter capteur</strong><br/><br/>
			<label>Nom du capteur:</label><input type="text" placeholder='Nom' name="Nom"  required/></br>
			<label>Unité:</label><input type="text" name="Unite" placeholder="Unité"  required/></br>
			<label>Description:</label><input type="text" name="Description" placeholder="Description"  required/></br></br>
            <input type="submit">
		</fieldset>
		
	</form>

</div>


<?php
include("footer_admin.php");
?>

</body>
</html>
