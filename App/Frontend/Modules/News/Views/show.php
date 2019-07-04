
<p>Par <em><?= $post['auteur']; ?></em>, le <?= $post['dateMaj']->format('d-m-Y � H:i:s'); ?></p>
<h2><?= $post['titre'] ?></h2>
<p><?= nl2br($post['content']) ?></p>


<p style="text-align: right;"><small><em>Modifi�e le <?= $post['dateMaj']->format('d-m-Y � H:i:s'); ?></em></small></p>

<?php if (empty($comments)) { ?> -
 <p>Aucun commentaire n'a encore �t� post�. Soyez le premier � en laisser un !</p>
<?php
}

foreach ($comments as $comment)
{ ?>
<fieldset>
  <legend>
    Post� par <strong><?php echo($comment['auteur']); ?></strong> le <?= $comment['dateMaj']->format('d-m-Y � H:i:s'); ?>
    <?php if ($internaute->isAuthenticated()) { ?> -
      <a href="/comment-update-<?= $comment['id'] ?>.html">Modifier</a> |
      <a href="/comment-delete-<?= $comment['id'] ?>.html">Supprimer</a>
    <?php } ?>
  </legend>
  <p><?= nl2br(htmlspecialchars($comment['content'])); ?></p>
</fieldset><br>
<?php
}
?>
<br><br>
<p><a href="/commenter-<?= $post['id'] ?>.html"><em>Ajouter un commentaire</em></a></p>  