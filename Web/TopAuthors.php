<?php
session_start();
include 'Data.php';
DataBaseConnection();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Classement des Auteurs</title>
	<link rel="stylesheet" href="./style/styleAccount.css">
</head>
<div class="sidebar">
<div><a href="./Test.php">Accueil</a></div>
<div><?php       
if (empty($_SESSION['Email'])) {
    echo'<a href="./Login.php"> Connexion </a>';
}else{
    echo'<a href="./Logout.php" onclick="return confirm(\'Are you sure?\')">Déconnexion</a>
';
}
?></div>
<div><a href="./Account.php">Mon Compte</a></div>
<div><a href="./Poster.php">Nouvelle Publication</a></div>
</div>
<body>

<div id="MainContainer">
<div>
<?php
displayTopAuthors()
?>
</div>
<div>
</body>
</html>