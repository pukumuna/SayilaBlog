<form action="" method="post">
  <div id="mefNews"> 
    <p>
    <label>AUTEUR : </label>
    <input type="text" name="auteur" size="60" value="<?= htmlspecialchars($comment['auteur']) ?>" />
    <?= isset($erreurs) && in_array(\Entity\Comment::AUTEUR_INVALIDE, $erreurs) ? 'L\'auteur est invalide.<br />' : '' ?>
    </p>
    
    <p>
    <label>VALIDATION : </label>
    <input type="text" name="validation" value="<?= htmlspecialchars($comment['validation']) ?>" />
    <?= isset($erreurs) && in_array(\Entity\Comment::VALIDATE_INVALIDE, $erreurs) ? 'validation invalide.<br />' : '' ?>
    </p>
    
    <p>
    <label>Contenu</label><textarea name="content" rows="15" cols="80"><?= htmlspecialchars($comment['content']) ?></textarea><br />
    <?= isset($erreurs) && in_array(\Entity\Comment::CONTENT_INVALIDE, $erreurs) ? 'Le contenu est invalide.<br />' : '' ?>
    </p>
 </div>
    <input type="hidden" name="news" value="<?= $comment['post'] ?>" />
    <input type="submit" value="Modifier" />
  </p> 
</form>