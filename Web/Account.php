<?php
                             //cette partie permet d'afficher les informations du compte de l'utilisateur
session_start();
if(empty($_SESSION['Email'])){                      //on verifie si l'utilisateur est connecté
    header('location: ./Login.php');     //sinon il est dirigé vers la page de connexion
    exit;
}

include 'Data.php';

DataBaseConnection();
$req1=('SELECT * FROM utilisateur WHERE Email="'.$_SESSION['Email'].'"');      //on identifie l'utilisateur dans la base de données
$ret = $bdd->query($req1);
$return=$ret->fetch_assoc();
$email=$return['Email'];
changePassword();

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title> Mes informations</title>
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
<div class ="header">
<h1> Mes informations </h1>
</div>
<p>
<div>
    
<label for "name">Nom : </label>
<?php echo $return['Nom'];?>
</p>
</div>

<div>
<p>
<label for "firstname">Prenom :</label>
<?php echo $return['Prenom'];?>
</p>
</div>

<div>
<p>
<label for="mail">E-mail :</label>
<?php echo $return['Email'];?>
</p>
</div>

<div align="center">

<hr>
</div>
<h2>Changer le Mot de Passe</h2>

<form class="formc" action="./Account.php" method="post">
<div>    
        <div align="center">
           
        <label class="lbl">Votre mot de passe actuel</label>
        <input class="form-input" type="password" placeholder="Password " id="password"  name="password" title="saisir votre nouveau mot de passe">
      
		</div>
        <br>
        
        <div align="center">
        <label class="lbl">Votre nouveau mot de passe:</label>
        <input class="form-input" type="password" placeholder="Votre Nouveau mot de passe " id="passwordN"  name="passwordN" title="saisir votre nouveau mot de passe">
        </div>
        <br>
        <div align="center">
        <label class="lbl">Veuillez confirmer votre nouveau mot de passe :</label>
        </div>
        <div align="center">
        <!-- on demande de confirmer le mdp par le même mot de passe-->
        <input class="form-input" id="password_two" name="password_two" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Merci de saisir le même mot de passe' : '');" placeholder="Verification mot de passe" required>
        </div>
        <br>
        <br>
        <div class="formbutton">
				<button type="submit">Changer mon mot de passe</button>
		</div>
        <br>

</div>
</form>
<div class="footer">
		<hr>
		<div align="center">
		<p class="description"> Attention !!!</p>
		<p class ="description">Une fois que vous modifiez votre mot de passe, vous serez automatiquement déconnecté et dirigé vers la page de connexion !</p>
		</div>
		<br>
		
	
	</div>
</div>
</div>


</body>
</html>