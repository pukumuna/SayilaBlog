<?php
foreach ($listePosts as $post)
{
?>
  <h2><a href="/news-<?= $post['id'] ?>.html"><?= $post['titre'] ?></a></h2>
  <p><?= nl2br($post['content']) ?></p>
<?php
}