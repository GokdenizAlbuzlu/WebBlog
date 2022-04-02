
<?php
	include 'Data.php';
	DataBaseConnection();
	LoginChecker();
	
	?> 

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login page</title>
	<link rel="stylesheet" href="./style/styleLogin.css">
</head>
<body>
<form action="./Login.php" method="post">
   <header>
      <h2>Connexion</h2>
      <p>connectez vous en utilisant votre E-mail et mot de passe</p>
   </header>
   <br>
   <div>
    
    <input class="form-input" id="email" name="email" type="text" title="Veuillez saisir votre adresse E-mail" placeholder="Jeandupont@gmail.com" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>">
      <br>
    <input class="form-input" type="password" placeholder="Password" id="password"  name="password" title="Veuillez saisir votre mot de passe ">
      <button>Connexion !</button>
	  <div align="center">
	<input  type="checkbox" name="remember" checked='checked' class="remember" />Se souvenir de moi
	|
   <a href="./Test.php">Continuer en tant qu'invité</a>  
   </div>
   </div>
   
<!--   other buttons -->
   <div class="other">
<!--      Forgot Password button-->

      <button class="btn submits oubliMdp" onclick='return password_change_button()'>Mot de Passe Oublié?</button>
<script>
function password_change_button()
{
window.location = "Forgot.php"; 		
return false;
}
function go_to_create_account()
{
	window.location="Create.php";
	return false;
}
</script> 
<!--     Sign Up button -->

<button class="btn submits Inscription" onclick='return go_to_create_account()'>Inscription</button>

<!--      End Other the Division -->
   </div>
     
<!--   End Conrainer  -->
  </div>
  
  <!-- End Form -->
</form>
<div id="manipulate" align="center">
            
        		<a href="https://www.facebook.com" target="_blank">
   <img src="./Images/facebook.jpg" height="50" width="50">
                </a>
            <a href="https://www.instagram.com" target="_blank">
    <img src="./Images/instagram.png" height="50" width="50">
            </a>
			<a href="https://www.twitter.com" target="_blank">
   <img src="./Images/twitter.png" height="50" width="50">
                </a>

        </div>
</body>
</html>
