
<?php

include 'Data.php';
DataBaseConnection();
CreateAccount();
  
    ?>
 
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login page</title>
	<link rel="stylesheet" href="./style/styleCreate.css">
</head>
<body>
<form action="./Create.php" method="post">
   <header>
      <h2>Inscription</h2>
      <p>vous pouvez désormais vous inscrire</p>
   </header>
   <br>
   <div>
    <input class="form-input" name="Nom" required="required" placeholder="Nom" title="Veuillez saisir votre nom"/>
    <br>
    <input class="form-input" name="Prenom" required="required" placeholder="Prenom"title="Veuillez saisir votre prenom"/>
    <br>
     <input class="form-input" id="email" name="email" type="text" placeholder="Jeandupont@gmail.com" title="Veuillez saisir votre adresse E-mail">
    <br>
    <input class="form-input" type="password" placeholder="Password" id="password"  name="password" title="au moins 6 caractère">
    <br>
    <input class="form-input" id="password_two" name="password_two" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Merci de saisir le même mot de passe' : '');" placeholder="Verification mot de passe" required>
    <br>
    <input class="form-input" id="secret" name="secret" type="text" placeholder="Quel est votre film préféré ?" title="Attention ! n'oubliez pas votre réponse, celle-ci servira de question secrète">
    <br>
	   
<!--   other buttons -->
   <div class="other">
<!--      Forgot Password button-->

      <button class="btn submits account" onclick='return already_account()'>j'ai déjà un compte</button>
<script>
function already_account()
{
window.location = "Login.php"; 		
return false;
}
</script> 
<!--     Sign Up button -->

<button class="btn submits Inscription">Inscription</button>

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
