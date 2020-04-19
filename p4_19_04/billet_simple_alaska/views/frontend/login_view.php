<?php
?>
<div id="login_image"></div>




	<form method="post" action="login_controller.php" id="login_form">
		<h2>Connectez vous</h2> 
  		<input type="texte" name="username" id="username" size="17" maxlength="30" placeholder="identifiant">
		<input type="password" name="password" id="password" size="17" maxlength="30" placeholder="mot de passe">
		<button type="submit" name="login-submit" value="valider">valider</button>
<?php
$user = new Crud;
$user ->getUser();
?>
 
</form>

</div>
