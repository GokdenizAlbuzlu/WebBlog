<?php
session_start();                                    //on vérifie si l'utilisateur est bien connecté
if (empty($_SESSION['Email'])) {
    header('location: ./Login.php');             //si ce n'est pas le cas on le dirige vers la page de connexion
    exit;
}

include 'Data.php';
DataBaseConnection();  

$req=('SELECT * FROM utilisateur WHERE Email="'.$_SESSION['Email'].'"');      //on identifie l'utilisateur dans la base de données
$ret=$bdd->query($req);
$return=$ret->fetch_assoc();

publishPost();


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title> Nouvelle Publication</title>
	<link rel="stylesheet" href="./style/styleAccount.css">
    
</head>
<div class="sidebar">
<div><a href="./Test.php">Accueil</a></div>
<div><a href="./Logout.php">Déconnexion</a></div>
<div><a href="./Account.php">Mon Compte</a></div>
<div><a href="./TopAuthors.php">Classement des Auteurs</a></div>
<div> <?php if(!empty($_SESSION['Email'])){echo '<a href="./viewProfile.php?subject='.$return['ID'].'">Voir mon blog</a>';}?></div>

</div>
<body>
<div id="MainContainer">
<div class ="header">
    <br>
<h1>Nouvelle Publication</h1>

</div>
<br><br>
<div align="center">
<label class="lab">Votre Titre :</label>
<form action="./Poster.php" method="post">
<textarea id="titre" name="titre" placeholder="title"
            rows="2" cols="40" required="required">
</textarea>

<br>
<br>
<label class="lab">Que pensez-vous ?</label>
<textarea id="Commentaire" name="Commentaire" placeholder="It was a dark and stormy night..."
          rows="14" cols="40" required="required">
</textarea>
</div>
<br>
<div class="formbutton" align="center">
	<button type="submit" id="post_button" onclick='goToTest()'>Poster</button>
</div>
<script>
function goToTest(){
    alert ("votre commentaire a été posté avec succès , vous allez être dirigés vers la page d'accueil !");
}
</script>
</form>
</div>
</body>
</html>