<?php


include 'Data.php';
session_start();
DataBaseConnection();


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Chercher un auteur</title>
	<link rel="stylesheet" href="./style/styleAccount.css">
</head>
<div class="sidebar">
<div><a href="./Test.php">Accueil</a></div>
<div><a href="./Logout.php">Déconnexion</a></div>
<div><a href="./Poster.php">Nouvelle Publication</a></div>
<div><a href="./TopAuthors.php">Classement des Auteurs</a></div>

</div>
<body>
<div id="MainContainer">
<div>
<?php
SearchUser();
?>
</div>
</body>
</html>