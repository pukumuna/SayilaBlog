<form action="" method="post">
	<div id="connex">
	<p>	 
		<?= isset($erreurs) && in_array(\Entity\User::PSEUDO_INVALIDE, $erreurs) ? 'Le Pseudo est invalide.<br />' : '' ?>
	    <label for="pseudo">Pseudo : </label> 
	    <input type="text" placeholder="" name="pseudo" value="<?= isset($user) ? $user['pseudo'] : '' ?>"  autofocus  />  
	</p>
	<p>
		<?= isset($erreurs) && in_array(\Entity\User::EMAIL_INVALIDE, $erreurs) ? 'L\'email est invalide.<br />' : '' ?>
	    <label for="Email"> Email : </label> 
	    <input type="text" placeholder="" name="email" value="<?= isset($user) ? $user['email'] : '' ?>" /> 
	</p>
	<p>
		<?= isset($erreurs) && in_array(\Entity\User::PASSWORD_INVALIDE, $erreurs) ? 'Le mot de passe est invalide.<br />' : '' ?>
		<?= 'password saisie = ', isset($user) ? $user['password'] : '', '<br>'  ?>
	   <label for="Password" >Password : </label>      
	   <input  type="password" placeholder="" name="password"  value="<?= isset($user) ? $user['password'] : '' ?>" required />
	</p>
    <p>
	   <input type="submit" value="Connexion">
	   <!--<a href="">Forgot your password?</a>  ou  <a href="">Register</a> -->
	</p>
	</div> 
</form>