
<?php
session_start();                                    //on vérifie si l'utilisateur est bien connecté
include 'Data.php';
DataBaseConnection();


$req=('SELECT * from utilisateur INNER JOIN commentaire on utilisateur.id=commentaire.ID_utilisateur WHERE utilisateur.ID="'.$_GET['subject'].'" ORDER by commentaire.Date_post Desc LIMIT 10');
$ret=$bdd->query($req);
$ret2=$bdd->query($req);
$return=$ret2->fetch_assoc();
$iduti=$return["ID"];

sendPicture();



$req3=('INSERT INTO image_profil(userid,statut) VALUES ("'.$return['ID'].'",1)');
if(isset($_POST['submit'])){
$ret4=$bdd->query($req3);
}
if(!empty($_SESSION['Email'])){
$req2=('SELECT * FROM utilisateur WHERE Email="'.$_SESSION['Email'].'"');      //on identifie l'utilisateur dans la base de données
$ret3=$bdd->query($req2);
$return2=$ret3->fetch_assoc();

}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>profile</title>
	<link rel="stylesheet" href="./style/styleAccount.css">
</head>
<div class="sidebar">
<div><a href="./Test.php">Accueil</a></div>
<div> <?php       
if (empty($_SESSION['Email'])) {
    echo'<a href="./Login.php"> Connexion </a>';
}else{
    echo'<a href="./Logout.php" onclick="return confirm(\'Are you sure?\')">Déconnexion</a>
';
}
?>
</div>
<div><a href="./Poster.php">Nouvelle Publication</a></div>
<div><a href="./TopAuthors.php">Classement des Auteurs</a></div>
</div>
<body>

<div id="MainContainer">
<div class ="header">
<h1><?php echo $return['Nom'];?></h1>
</div>
<p>
<div>
<label>Nom : </label>
<?php echo $return['Nom'];?>
</p>
</div>
<div>
<p>
<label>Prenom :</label>
<?php echo $return['Prenom'];?>
</p>
</div>
<div>
<p>
<label for="mail">E-mail :</label>
<?php echo $return['Email'];?>
</p>
</div>
<?php
echo' <div align="center">';

displayPicture();

if (!empty($_SESSION['Email'])){
if($return2['ID']==$return['ID']){
echo'

<form action ="./viewProfile.php?subject='.$return['ID'].'" method="POST" enctype="multipart/form-data">
<input type="file" name="file">
<button type="submit" name="submit">Upload</button>
</form>

';
}
}

?>
<br>
<div>
<h2>Voici les derniers posts de <?php echo $return['Prenom'].".".$return['Nom'];?></h2>
</div>
<br>
<hr>
<div>
	<?php
while( $row = $ret->fetch_array() )

{
	echo '<div>
	<br>
	<br>
	<p class ="description"> <strong>'.$row['Titre'].'</strong> 	    <div align="right"><strong> Date :'.$row['Date_post'].'</strong></div>
	<br>
	<br>
	
    '.$row ['Commentaire'].'
	<br>
	<br>
	</p>
';

if(!empty($_SESSION['Email'])){
if($return2['ID']==$return['ID']){
	echo'
	<a href="./Modify.php?subject='.$row['ID_post'].'"> Modifier votre post </a>
	';
}
}
echo'<hr>';

}
?>
</div>
</div>
</body>
</html>