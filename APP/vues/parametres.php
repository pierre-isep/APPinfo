<?php
session_start();?>
    <!DOCTYPE html>
    <html>
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://localhost/APP/css/style.css">
    <link rel="stylesheet" href="http://localhost/APP/css/footer.css">
    <link rel="stylesheet" href="http://localhost/APP/css/header.css">
    <link rel="stylesheet" href="http://localhost/APP/css/parametres.css">
    <link rel="script" href="OHcabouge.js">
    <title>Domisep</title>
</head>

<?php include("header.php");?>
<div id="conteneur-titre">
<p><strong> Paramètres généraux du compte </strong></p>
</div>

<div id="conteneur-body">
<div id="conteneur-profil">
<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=APP2;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
/* die(var_dump($_SESSION['ID'])); */
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

<p><em><a href="profil.php">Éditer le profil</a></em></p>
</div>

</div>


<?php
include("footer.php");
?>