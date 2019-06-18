<form action="" method="post">
  <p id="connex">
    
    <label>Name :</label>
    <input type="text" name="name" value="<?= isset($user) ? $user['name'] : '' ?>"  autofocus /><br />
    
    <label>LastName :</label>
    <input type="text" name="lastname" value="<?= isset($user) ? $user['lastname'] : '' ?>" /><br />

    <?= isset($erreurs) && in_array(\Entity\User::PSEUDO_INVALIDE, $erreurs) ? 'Le Pseudo est invalide.<br />' : '' ?>
    <label>Pseudo :</label>
    <input type="text" name="pseudo" value="<?= isset($user) ? $user['pseudo'] : '' ?>" /><br />
    
    <?= isset($erreurs) && in_array(\Entity\User::EMAIL_INVALIDE, $erreurs) ? 'L\'email est invalide.<br />' : '' ?>
    <label>Email :</label><input type="text" name="email" value="<?= isset($user) ? $user['email'] : '' ?>" /><br />
    
    <?= isset($erreurs) && in_array(\Entity\User::PASSWORD_INVALIDE, $erreurs) ? 'Le mot de passe est invalide.<br />' : '' ?>
    <label>Password :</label><input type="password" name="password" value="<?= isset($user) ? $user['password'] : '' ?>" /><br />

    <label>Role :</label><input type="text" name="role" value="<?= isset($user) ? $user['role'] : 'abonne' ?>" /><br />
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