<h2>Ajouter un commentaire</h2>
<form action="" method="post">
  <p>
    <?= isset($erreurs) && in_array(\Entity\Comment::AUTEUR_INVALIDE, $erreurs) ? 'L\'auteur est invalide.<br />' : '' ?>
    <label>Auteur</label>
    <input type="text" name="auteur" value="<?= isset($comment['auteur']) ? htmlspecialchars($comment['auteur']) : '' ?>"  autofocus /><br />
    
    <?= isset($erreurs) && in_array(\Entity\Comment::CONTENT_INVALIDE, $erreurs) ? 'Le contenu est invalide.<br />' : '' ?>
    <label>Contenu</label>
    <textarea name="content" rows="7" cols="50"><?= isset($comment['content']) ? htmlspecialchars($comment['content']) : '' ?></textarea><br />
     
    <input type="submit" value="Commenter" />
  </p>
</form>