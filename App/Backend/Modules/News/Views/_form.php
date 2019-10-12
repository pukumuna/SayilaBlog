<form action="" method="post">
 <div id="connex">   
    <p>
        <?= isset($erreurs) && in_array(\Entity\Post::AUTEUR_INVALIDE, $erreurs) ? 'L\'auteur est invalide.<br />' : '' ?>
        <label>Auteur : </label>
        <input type="text" size="80" name="auteur" value="<?= isset($post) ? $post['auteur'] : '' ?>" />
    </p> 
    <p>    
        <?= isset($erreurs) && in_array(\Entity\Post::TITRE_INVALIDE, $erreurs) ? 'Le titre est invalide.<br />' : '' ?>
        <label>Titre : </label>
        <input type="text" size="80" name="titre" value="<?= isset($post) ? $post['titre'] : '' ?>" />
    </p>
    <p>  
        <?= isset($erreurs) && in_array(\Entity\Post::CONTENT_INVALIDE, $erreurs) ? 'Le contenu est invalide.<br />' : '' ?>
        <label>Contenu</label>
        <textarea rows="15" cols="72" name="content"><?= isset($post) ? $post['content'] : '' ?></textarea>
    </p>
    <p>
        <?php  if (isset($post) && !$post->isNew()) { ?>
                <input type="hidden" name="id" value="<?= $post['id'] ?>" />
                <input type="submit" value="Modifier" name="modifier" />
        <?php  }
               else { ?>
                <input type="submit" value="Ajouter" />
        <?php  } ?>
  </p>
  </div>
</form>