<?php

include 'Data.php';
DataBaseConnection();
ForgotPassword();
  
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>oublie de mot de passe</title>
	<link rel="stylesheet" href="./style/styleForgot.css">
</head>
<body>
<form action="./Forgot.php" method="post">
<header>
      <h2>Oublie de mot de passe</h2>
    
   </header>
   <br>
   <div>
    <input class="form-input" id="email" name="email" type="text" placeholder="Jeandupont@gmail.com" title="Veuillez saisir votre adresse E-mail">
    <br>
    <input class="form-input" type="password" placeholder="Votre Nouveau mot de passe " id="password"  name="password" title="saisir votre nouveau mot de passe">
    <br>
    <input class="form-input" id="password_two" name="password_two" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Merci de saisir le même mot de passe' : '');" placeholder="Verification mot de passe" required>
    <br>
    <input class="form-input" id="secret" name="secret" type="text" placeholder="votre réponse secrete ?" title="saisir votre réponse secrete"><label>votre film preféré?</label>
    <br>
	   
<!--   other buttons -->
   <div class="other">
<!--      Forgot Password button-->

      <button class="btn submits account" onclick='return goToLogin()'>Retour</button>
<script>
function goToLogin()
{
window.location = "Login.php"; 		
return false;
}
</script> 
<!--     Sign Up button -->

<button class="btn submits Inscription">Changer Mot de passe</button>

<!--      End Other the Division -->
   </div>
     
<!--   End Conrainer  -->
  </div>
  
  <!-- End Form -->
</form>




</body>
</html>