<?php

	


include 'Data.php';
DataBaseConnection();              //version mysqli
session_start();
if(!empty($_SESSION['Email'])){
$req=('SELECT * FROM utilisateur WHERE Email="'.$_SESSION['Email'].'"');      //on identifie l'utilisateur dans la base de données
$ret=$bdd->query($req);
$return=$ret->fetch_assoc();
}

$req3=('SELECT * from utilisateur INNER JOIN commentaire on utilisateur.id=commentaire.ID_utilisateur ORDER by commentaire.Date_post Desc LIMIT 10');
$ret3=$bdd->query($req3);
$ret4=$bdd->query($req3);
$return3=$ret3->fetch_assoc();


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title> Forum</title>
	<link rel="stylesheet" href="./style/styleBlog.css">
</head>
<body>
<!-- Sidebar -->
<div class="sidebar">
<div><a href="./Account.php">Mes informations</a></div>
<div><a href="./Poster.php">Nouvelle Publication</a></div>
<div><a href="./TopAuthors.php">Classement des Auteurs</a></div>
<div> <?php if(!empty($_SESSION['Email'])){echo '<a href="./viewProfile.php?subject='.$return['ID'].'">Voir mon blog</a>';}?></div>
<div> <?php       
if (empty($_SESSION['Email'])) {
    echo'<a href="./Login.php"> Connexion </a>';
}else{
    echo'<a href="./Logout.php" onclick="return confirm(\'Are you sure?\')">Déconnexion</a>
';
}

?>
</div>





</div>
<?php

if (!empty($_SESSION['Email'])){
$req10=('SELECT * FROM image_profil where userid="'.$return['ID'].'"');
$ret10=$bdd->query($req10);
$img=$ret10->fetch_assoc();
}

if(isset($img['statut'])){
if($img['statut']==1){
	echo"
    <div align='center'>
    <img src='./Images/profile".$return['ID'].".jpg?'".mt_rand()." class='img'>
    </div>";
}
}else{
	echo"<div align='center'>
	<img src='./Images/profiledefault.png' class='img'>
    </div>";
}



?>
<div id="welcome" align="center">
<h1><p>Content de vous revoir <?php if(!empty($_SESSION['Email'])){echo $return['Prenom']; echo $return['Nom'];} ?><br /><br />
<form action="./searchUser.php" method="post" name="search">
<label>Vous chercher un auteur ?  
<input class="form-input" name="Search" required="required" placeholder="Prenom/Nom" title="Chercher un Auteur"/>
<button><img src="./Images/searchBar.png" alt="" height="50" width="50"></button>
</label>
</form>
<hr>
</p>
</h1>
</div>




<div class="container mb80">    
<div class="page-timeline">
    <?php 
    while( $row = $ret4->fetch_array()){

    echo'
        <div class="vtimeline-point">
            <div class="vtimeline-icon">
                <i class="fa fa-image"></i>
            </div>
            <div class="vtimeline-block">
                <span class="vtimeline-date"> '.$row['Date_post'].'</span><div class="vtimeline-content">
               
                    <a href="#"><h3>'.$row['Titre'].'</h3></a>
                    <ul class="post-meta list-inline">
                        <li class="list-inline-item"
                            <i class="fa fa-user-circle-o"></i>  Auteur : <a href="./viewProfile.php?subject='.$row['ID'].'">'.$row['Prenom'].' &nbsp; '.$row['Nom'].'</a>
                            
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-calendar-o"></i> Date de Publication :  '.$row['Date_post'].'
                        </li>
                    </ul>
                    <p>
					'.$row['Commentaire'].'
                    </p><br>
                    ';
                    if(!empty($_SESSION['Email'])){
                     if ($return['ID']==$row['ID']){ 
                                       echo '
                                       <a href="./Modify.php?subject='.$row['ID_post'].'">Modifier votre post</a>
                                       ';
                    }
                }
    echo'
                </div>
            </div>
        </div>
        ';
        
                }
                ?>

    </div>
</div>

</div>
</body>
</html>