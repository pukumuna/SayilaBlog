<form action="" method="post">
  <p>
    
    <label>AUTEUR</label><input type="text" name="auteur" value="<?= htmlspecialchars($comment['auteur']) ?>" />
    <?= isset($erreurs) && in_array(\Entity\Comment::AUTEUR_INVALIDE, $erreurs) ? 'L\'auteur est invalide.<br />' : '' ?>
    <br />
    
    
    <label>VALIDATION</label><input type="text" name="validation" value="<?= htmlspecialchars($comment['validation']) ?>" />
    <?= isset($erreurs) && in_array(\Entity\Comment::VALIDATE_INVALIDE, $erreurs) ? 'validation invalide.<br />' : '' ?>
    <br />
    
    
    <label>Contenu</label><textarea name="content" rows="7" cols="50"><?= htmlspecialchars($comment['content']) ?></textarea><br />
    <?= isset($erreurs) && in_array(\Entity\Comment::CONTENT_INVALIDE, $erreurs) ? 'Le contenu est invalide.<br />' : '' ?>

    <input type="hidden" name="news" value="<?= $comment['post'] ?>" />
    <input type="submit" value="Modifier" />
  </p> 
</form>