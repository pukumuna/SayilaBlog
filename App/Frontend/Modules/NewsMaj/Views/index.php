<p style="text-align: center">Il y a actuellement <?= $nombreNews ?> news. En voici la liste :</p>

<table>
  <tr><th>Auteur</th><th>Titre</th><th>Dernière modification</th><th>Action</th></tr>
  <?php foreach ($listePosts as $post) { ?>
    <tr><td> <?= $post['auteur']; ?> </td><td> <?= $post['titre'];  ?>
    </td><td>le  <?= $post['dateMaj']->format('d-m-Y à H:i:s'); ?> </td><td>
    <a href="/news-update-<?= $post['id']; ?>.html">
   	<img src="/img/update.png" alt="Modifier" /></a>
   	<a href="/news-delete-<?= $post['id']; ?>.html">
   	<img src="/img/delete.png" alt="Supprimer" /></a></td></tr>
  <?php "\n"; } ?>
</table>

