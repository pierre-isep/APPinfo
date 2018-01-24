<?php
session_start();?>
    <!DOCTYPE html>
    <html>
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/parametres.css">
    <link rel="script" href="OHcabouge.js">
    <title>Domisep</title>
</head>
<body>
<?php include 'modele/connexion.php';
 include("header.php");?>
<div id="section2">
<div id="conteneur-titre">
<p><strong> Paramètres généraux du compte </strong></p>
</div>
<div id="conteneur-body">
<div id="conteneur-profil">
<?php
$ID_personne = $_SESSION['ID'];


$req = $bdd->prepare('SELECT * FROM compte WHERE ID_personne = :ID_personne ');
$req->execute(array('ID_personne' => $ID_personne));
                            
while ($donnees = $req->fetch())
    {
        ?><p>
            <strong>Nom</strong> : <?php echo htmlspecialchars($donnees['Nom_personne']); ?><br /><br />
            <strong>Prénom</strong> : <?php echo htmlspecialchars($donnees['Prenom']); ?><br /><br />
            <strong>Login</strong> : <?php echo htmlspecialchars($donnees['login']); ?><br /><br />
            <strong>Numéro de Téléphone</strong> : <?php echo htmlspecialchars($donnees['tel']); ?><br /><br />
            <strong>Email</strong> : <?php echo htmlspecialchars($donnees['Email']); ?><br /><br />
            <strong>Type de Compte</strong> : 
                <?php 
                     IF($donnees['ID_typeCompte']==1)
                     {
                        echo 'Utilisateur principal';
                    }
                    else
                        echo 'Utilisateur secondaire'; ?><br />
        </p>
<?php
}
$req->closeCursor(); 
?>
    <form  method="post" action="index.php?cible=menu_utilisateur&fonction=parametres"><button id="bouton_sans_style2" type="submit" >Editer le profil</button></form>

</div>

</div>
</div>

<?php
include("footer.php");
?>

</body>
</html>
