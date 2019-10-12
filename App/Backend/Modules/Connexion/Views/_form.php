<form action="" method="post">
  <div id="connex">
   <p>  
    <label>Name :</label>
    <input type="text" name="name" value="<?= isset($user) ? $user['name'] : '' ?>"  autofocus />
   </p>
   <p> 
    <label>LastName :</label>
    <input type="text" name="lastname" value="<?= isset($user) ? $user['lastname'] : '' ?>" />
    </p>
    <p>
    <?= isset($erreurs) && in_array(\Entity\User::PSEUDO_INVALIDE, $erreurs) ? 'Le Pseudo est invalide.<br />' : '' ?>
    <label>Pseudo :</label>
    <input type="text" name="pseudo" value="<?= isset($user) ? $user['pseudo'] : '' ?>" />
    </p>
    <p>
    <?= isset($erreurs) && in_array(\Entity\User::EMAIL_INVALIDE, $erreurs) ? 'L\'email est invalide.<br />' : '' ?>
    <label>Email :</label><input type="text" name="email" value="<?= isset($user) ? $user['email'] : '' ?>" />
    </p>
    <p>
    <?= isset($erreurs) && in_array(\Entity\User::PASSWORD_INVALIDE, $erreurs) ? 'Le mot de passe est invalide.<br />' : '' ?>
    <label>Password :</label><input type="password" name="password" value="<?= isset($user) ? $user['password'] : '' ?>" />
    </p>
    <p>
    <label>Role :</label><input type="text" name="role" value="<?= isset($user) ? $user['role'] : 'abonne' ?>" />
    </p>
</div>    
<?php
if(isset($user) && !$user->isNew())
{
?>
    <input type="hidden" name="id" value="<?= $user['id'] ?>" />
    <input type="submit" value="Modifier" name="modifier" />
<?php
}
else
{
?>
    <input type="submit" value="Ajouter" />
<?php
}
?>
  </p>
</form>