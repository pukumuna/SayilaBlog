<<<<<<< HEAD

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
=======

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
>>>>>>> 235d14acabf1407c7d198c81741e238b16281aca
<p><a href="/commenter-<?= $post['id'] ?>.html"><em>Ajouter un commentaire</em></a></p>  