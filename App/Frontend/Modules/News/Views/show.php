
<p>Par <em><?= $post['auteur']; ?></em>, le <?= $post['dateMaj']->format('d-m-Y à H:i:s'); ?></p>
<h2><?= $post['titre'] ?></h2>
<p><?= nl2br($post['content']) ?></p>


<p style="text-align: right;"><small><em>Modifiée le <?= $post['dateMaj']->format('d-m-Y à H:i:s'); ?></em></small></p>

<?php if (empty($comments)) { ?> -
 <p>Aucun commentaire n'a encore été posté. Soyez le premier à en laisser un !</p>
<?php
}

foreach ($comments as $comment)
{ ?>
<fieldset>
  <legend>
    Posté par <strong><?php echo($comment['auteur']); ?></strong> le <?= $comment['dateMaj']->format('d-m-Y à H:i:s'); ?>
    <?php if ($internaute->isAuthenticated()) { ?> -
      <a href="/admin/comment-update-<?= $comment['id'] ?>.html">Modifier</a> |
      <a href="/admin/comment-delete-<?= $comment['id'] ?>.html">Supprimer</a>
    <?php } ?>
  </legend>
  <p><?= nl2br(htmlspecialchars($comment['content'])); ?></p>
</fieldset><br>
<?php
}
?>
<br><br>
<p><a href="/commenter-<?= $post['id'] ?>.html"><em>Ajouter un commentaire</em></a></p>  