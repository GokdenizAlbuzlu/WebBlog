<?php
session_start();                                    //on vérifie si l'utilisateur est bien connecté
if (empty($_SESSION['Email'])) {
    header('location: ./Login.php');             //si ce n'est pas le cas on le dirige vers la page de connexion
    exit;
}

include 'Data.php';
DataBaseConnection();


$var=$_GET['subject'];

$req3=('SELECT * from utilisateur INNER JOIN commentaire on utilisateur.id=commentaire.ID_utilisateur WHERE commentaire.ID_post="'.$_GET['subject'].'"');
$ret3=$bdd->query($req3);
$return3=$ret3->fetch_assoc();

$reqSupress=("DELETE from commentaire WHERE commentaire.ID_post='".$return3['ID_post']."'");

Modifypost();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Modifier</title>
	<link rel="stylesheet" href="./style/styleAccount.css">

</head>
<div class="sidebar">
<div><a href="./Test.php">Accueil</a></div>
<div><a href="./Logout.php">Déconnexion</a></div>
<div><a href="./Poster.php">Nouvelle Publication</a></div>
<div><a href="./TopAuthors.php">Classement des Auteurs</a></div>
<div><a href="./Account.php">Mon compte</a></div>
<div> <?php if(!empty($_SESSION['Email'])){echo '<a href="./viewProfile.php?subject='.$return3['ID_utilisateur'].'">Voir mon blog</a>';}?></div>
</div>

<body>
<div id="MainContainer">
<div class ="header">
    <br>
<h1>Modifier votre Annonce </h1>
</div>
<br><br>


<div align="center">

<?php
echo'
<form action="./Modify.php?subject='.$var.'" method="post">
<label class="lab">votre Titre</label>
<textarea id="titre" name="titre" placeholder="title"
            rows="2" cols="40" required="required">
            '.$return3['Titre'].'
</textarea>
<br>
<br>
<label class="lab">Que pensez-vous ?</label>

<textarea id="Commentaire" name="Commentaire"
          rows="14" cols="40" required="required">
          '.$return3['Commentaire'].'
</textarea>
</div>
<br>
<div class="formbutton" align="center">
	<button type="submit">Modifier</button>

</form>
';

echo'

<form action="./Modify.php?subject='.$var.'" method="post">
<button name= "button_supprimer" id="button_supprimer" onclick="return confirm(\'Are you sure?\')"> Supprimer</button>
</form>
</div>
';
?>
</div>
</body>
</html>