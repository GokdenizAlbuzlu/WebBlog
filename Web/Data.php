<?php
//fonction qui assure la connexion à la base de données
function DataBaseConnection(){
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "we4a";
    global $bdd;
    $bdd = new mysqli($servername, $username, $password, $dbname);
    return $bdd;
}
//fonction qui permet de vérifier les logins des utilisateurs
function LoginChecker(){
    global $bdd;
     if  (isset($_POST["email"]) && isset($_POST["password"])&& !empty($_POST["email"])&&!empty($_POST["password"])){
		$email = $_POST["email"];
		$password = md5($_POST["password"]);

		$req = ('SELECT Mot_de_passe FROM utilisateur WHERE email="'.$email.'"');	//on saisie notre requête de sql
		$ret=$bdd->query($req);
		$return=$ret->fetch_assoc();
		
	}
	$loginSuccessful = false;

	if ( isset($email) && isset($password)&& $return ){
		$loginSuccessful = ( $password == $return["Mot_de_passe"]) ;			//on verifie la correspondance des deux mots de passes
		if(isset($_POST["remember"])) {									//si la case remembrer est cochée alors on créer des cookies de 1h pour les input de email et password
			setcookie("email", $email, time()+3600);
			setcookie("password", $password, time()+3600);
			}

	if($loginSuccessful){
		session_start();
		$_SESSION['Email'] = $email;
		header("Location: ./Test.php");
	
	}
}
return $loginSuccessful;
}
//fonction qui permet de créer un compte 
function CreateAccount(){
global $bdd;

$register=false;
if (isset($_POST['Nom'])&& isset($_POST['Prenom'])&& isset($_POST['password'])&& isset($_POST['email'])&& isset($_POST['secret'])){
$nom = $_POST['Nom'];
$prenom = $_POST['Prenom'];
$password= md5($_POST['password']);
$email=$_POST['email'];
$qstSecrete=md5($_POST['secret']);
 
    $req=("INSERT INTO utilisateur(Nom,Prenom,Email,Mot_de_passe,qstSecrete) VALUES ('$nom','$prenom','$email','$password','$qstSecrete');");
    $result = $bdd->query($req);
    $register=true;
    
    if($register==true){
        echo "
        <script type=\"text/javascript\">  
        alert ('votre compte a été créé avec succès, vous allez être dirigés vers la page de connexion !');
        window.location = 'Login.php'; 	
        </script> 
    ";

}

}
 return $register;
}
//Fonction pour l'oublie de mot de passe
function ForgotPassword(){
    global $bdd;

    if (isset($_POST['Nom'])&& isset($_POST['Prenom'])&& isset($_POST['password'])&& isset($_POST['email'])&& isset($_POST['secret'])){
    $nom = $_POST['Nom'];
    $prenom = $_POST['Prenom'];
    $password= md5($_POST['password']);
    $email=$_POST['email'];
    $qstSecrete=md5($_POST['secret']);

    $req1 = ("SELECT qstSecrete FROM utilisateur WHERE Email='$email'");                // dans cette partie du code ,on verifie la question secrète
    $ret=$bdd->query($req1);
    $return=$ret->fetch_assoc();

    if ( $qstSecrete == $return['qstSecrete'])
{

    $req2 = ("UPDATE utilisateur SET utilisateur.Mot_de_passe = '$password' WHERE utilisateur.Email ='$email'");        // si la question secrète est verifiée alors on modifie le mot de passe de l'utilisateur dans la base de données
    $result = $bdd->query($req2);
    echo "
            <script type=\"text/javascript\">  
            alert ('votre mot de passe à été modifié avec succès, vous allez être dirigés vers la page de connexion !');
            window.location = 'Login.php'; 	
            </script> 
        ";
}else{
    echo "
            <script type=\"text/javascript\">  
            alert ('les données saisies ne sont pas correctes !');
            </script> 
        ";


}
    }

}


function DestroySession(){
    session_start();
    session_destroy();
    if (isset($_COOKIE["email"])) {
        unset($_COOKIE["email"]);
        setcookie('email', '', time() - 3600); 
    }
    if (isset($_COOKIE["password"])) {
        unset($_COOKIE["password"]);
        setcookie('password', '', time() - 3600); 
    }
    header("location:./Login.php");
}


function SearchUser(){
    global $bdd;
    $nom=$_POST["Search"];
    $req=("SELECT * FROM utilisateur WHERE utilisateur.Prenom LIKE '%$nom%' OR utilisateur.Nom LIKE '%$nom%'");
    $ret=$bdd->query($req);
    $ret2=$bdd->query($req);
    
    if(is_null($ret2->fetch_array())){
        echo '<h2>Aucun utilisateur ne correpond à votre recherche</h2>
        ';
    }else{
        echo'<h2>Voici les utilisateurs correspondants à votre recherche :</h2>';
    }
    while( $row = $ret->fetch_array())
    
    {
        echo '<div>
        <br>
        <br>
        <p class ="description"><a href="./viewProfile.php?subject='.$row['ID'].'"> '.$row['Nom'].'. '.$row['Prenom'].'</a> 
        <br>
    
        <br>
        <hr>
        </p>
    ';
       
    }
       
}

function sendPicture(){
    global $bdd;

    $req=('SELECT * from utilisateur INNER JOIN commentaire on utilisateur.id=commentaire.ID_utilisateur WHERE utilisateur.ID="'.$_GET['subject'].'" ORDER by commentaire.Date_post Desc LIMIT 10');
    $ret=$bdd->query($req);
    $ret2=$bdd->query($req);
    $return=$ret2->fetch_assoc();
    $iduti=$return["ID"];
    
    if(isset($_POST['submit'])){
        $file=$_FILES['file'];
        print_r($file);
        $fileName=$_FILES['file']['name'];
        $fileTmpName=$_FILES['file']['tmp_name'];
        $fileSize=$_FILES['file']['size'];
        $fileError=$_FILES['file']['error'];
        $fileType=$_FILES['file']['type'];
    
        $fileExt=explode('.',$fileName);
        $fileActualExt=strtolower(end($fileExt));
        $allowed=array('jpg','jpeg','png');
        
        if(in_array($fileActualExt,$allowed)){
            if($fileError==0){
                if($fileSize<5000000){
                    $fileNameNew="profile".$iduti.".".$fileActualExt;
                $fileDestination='./Images/'.$fileNameNew;
                $sql="UPDATE image_profil SET statut=0 WHERE userid='$id';";
                $essai=$bdd->query($sql);
                move_uploaded_file($fileTmpName,$fileDestination);
                header("Location: Test.php?uploadsuccess");
            
                }else {
                    echo"fichier trop volumineux";
                }
            }else{
                echo "il y'a eu un erreur";
            }
            
        }else{
            echo "cet format d'image n'est pas supporté !";
        }
    }



}


function displayPicture(){
global $bdd;

$req=('SELECT * from utilisateur INNER JOIN commentaire on utilisateur.id=commentaire.ID_utilisateur WHERE utilisateur.ID="'.$_GET['subject'].'" ORDER by commentaire.Date_post Desc LIMIT 10');
$ret=$bdd->query($req);
$return=$ret->fetch_assoc();
$iduti=$return["ID"];

$req2=('SELECT * FROM image_profil where userid="'.$iduti.'"');
$ret2=$bdd->query($req2);
$img=$ret2->fetch_assoc();

if(isset($img['statut'])){
if($img['statut']==1){
	echo"<img src='./Images/profile".$iduti.".jpg?'".mt_rand().">";
}
}else{
	
	echo"<img src='./Images/profiledefault.png'>";
}

}

function displayTopAuthors(){
global $bdd;

$req=('SELECT *,COUNT(commentaire.ID_post) FROM utilisateur INNER JOIN commentaire on commentaire.ID_utilisateur = utilisateur.ID GROUP BY utilisateur.ID order by count(commentaire.ID_post) DESC');
$ret=$bdd->query($req);
$ranking=1;
while( $row = $ret->fetch_array() )

{
	echo '<div>
	<br>
	<br>
	<p class ="description"> rank : '.$ranking.' <a href="./viewProfile.php?subject='.$row['ID'].'"> '.$row['Nom'].'. '.$row['Prenom'].'</a> 	    <div align="right"><strong> Nombre de Post :'.$row['COUNT(commentaire.ID_post)'].'</strong></div>
	<br>
	<br>
	<hr>
	</p>
';
$ranking++;
    
}
}

function changePassword(){                  
    global $bdd;
    $req1=('SELECT * FROM utilisateur WHERE Email="'.$_SESSION['Email'].'"');      //on identifie l'utilisateur dans la base de données
    $ret = $bdd->query($req1);
    $return=$ret->fetch_assoc();
    $email=$return['Email'];
    
    
    if (isset($_POST['password'])&& isset($_POST['passwordN'])){
    $password=md5($_POST['password']);
    $passwordN= md5($_POST['passwordN']);
    
    
    if ($password == $return['Mot_de_passe']){
        $req2 =('UPDATE utilisateur SET utilisateur.Mot_de_passe = "'.$passwordN.'" WHERE utilisateur.Email ="'.$return['Email'].'"');        // si la question secrète est verifiée alors on modifie le mot de passe de l'utilisateur dans la base de données
        $ret2=$bdd->query($req2);
        echo "
        <script type=\"text/javascript\">  
        alert ('votre mot de passe à été modifié avec succès, vous allez être dirigés vers la page de connexion !');
        window.location = 'Login.php'; 	
        </script> 
    ";
    }else{
    echo "
        <script type=\"text/javascript\">  
        alert ('les données saisies ne sont pas correctes !');
        </script> 
    ";
    }
    }


}

function ModifyPost(){
global $bdd;
$var=$_GET['subject'];

$req3=('SELECT * from utilisateur INNER JOIN commentaire on utilisateur.id=commentaire.ID_utilisateur WHERE commentaire.ID_post="'.$_GET['subject'].'"');
$ret3=$bdd->query($req3);
$return3=$ret3->fetch_assoc();

$reqSupress=("DELETE from commentaire WHERE commentaire.ID_post='".$return3['ID_post']."'");

if (isset($_POST['Commentaire'])&&isset($_POST['titre'])){
$commentaire=$_POST['Commentaire'];
$titre=$_POST['titre'];
$date_creation = date('Y-m-d');
$postModified=false;
$reqModif=("UPDATE commentaire SET commentaire.Titre = '$titre', commentaire.Commentaire='$commentaire' WHERE commentaire.ID_post='".$return3['ID_post']."'");
$retModif=$bdd->query($reqModif);


$postModified=true;
if($postModified==true){
 header("Location: ./Test.php");
}  
}
if (isset($_POST['button_supprimer'])){
    $retSupress=$bdd->query($reqSupress); 
    header('location: ./Test.php'); 
}
}


function PublishPost(){
global $bdd;
$req=('SELECT * FROM utilisateur WHERE Email="'.$_SESSION['Email'].'"');      //on identifie l'utilisateur dans la base de données
$ret=$bdd->query($req);
$return=$ret->fetch_assoc();

$posted=false;

if (isset($_POST['Commentaire'])&&isset($_POST['titre'])){
$commentaire=$_POST['Commentaire'];
$titre=$_POST['titre'];
$date_creation = date('Y-m-d');
$ID_utilisateur= $return['ID'];

$req2 =("INSERT INTO commentaire(ID_utilisateur,Commentaire,Date_post,Titre) VALUES ('$ID_utilisateur','$commentaire','$date_creation','$titre');");
$result = $bdd->query($req2);
$posted=true;

if($posted==true){
        header('location: ./Test.php'); 
    }
}
}

?>
