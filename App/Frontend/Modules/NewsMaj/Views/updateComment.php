<<<<<<< HEAD
<form action="" method="post">
  <p>
    <?= isset($erreurs) && in_array(\Entity\Comment::AUTEUR_INVALIDE, $erreurs) ? 'L\'auteur est invalide.<br />' : '' ?>
    <label>Pseudo</label><input type="text" name="pseudo" value="<?= htmlspecialchars($comment['auteur']) ?>" /><br />
    
    <?= isset($erreurs) && in_array(\Entity\Comment::CONTENT_INVALIDE, $erreurs) ? 'Le contenu est invalide.<br />' : '' ?>
    <label>Contenu</label><textarea name="content" rows="7" cols="50"><?= htmlspecialchars($comment['content']) ?></textarea><br />
    
    <input type="hidden" name="idpost" value="<?= $comment['post'] ?>" />
    <input type="submit" value="Modifier" />
  </p>
=======
<form action="" method="post">
  <p>
    <?= isset($erreurs) && in_array(\Entity\Comment::AUTEUR_INVALIDE, $erreurs) ? 'L\'auteur est invalide.<br />' : '' ?>
    <label>Pseudo</label><input type="text" name="pseudo" value="<?= htmlspecialchars($comment['auteur']) ?>" /><br />
    
    <?= isset($erreurs) && in_array(\Entity\Comment::CONTENT_INVALIDE, $erreurs) ? 'Le contenu est invalide.<br />' : '' ?>
    <label>Contenu</label><textarea name="content" rows="7" cols="50"><?= htmlspecialchars($comment['content']) ?></textarea><br />
    
    <input type="hidden" name="idpost" value="<?= $comment['post'] ?>" />
    <input type="submit" value="Modifier" />
  </p>
>>>>>>> 235d14acabf1407c7d198c81741e238b16281aca
</form>