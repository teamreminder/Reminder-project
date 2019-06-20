<div class="container">
  <div class="titre">
    <h3>Liste des utilisateurs</h3>
  </div>
  <table class="list_user">
    <tr>
      <th>ID</th>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Mail</th>
      <th>Slots</th>
      <th>Rappel(s) actif(s)</th>
      <th>Statut</th>
    </tr>
    <?php
    foreach ($posts as $post) {
    ?>
      <tr>
        <td><?php echo $post->id; ?></td>
        <td><?php echo $post->nom; ?></td>
        <td><?php echo $post->prenom; ?></td>
        <td><?php echo $post->email; ?></td>
        <td><?php echo $post->slots; ?></td>
        <td></td>
        <td><?php echo $post->statut; ?></td>
        <?php if ($post->statut!='admin'){
          echo "<td><a href=\"?controller=rappels&action=updateContact&id=".$post->id."\">";?><img src="img/pens.png"=""></a></td>
        <?php echo "<td><a href=\"?controller=rappels&action=deleteContact&id=".$post->id."\">";?><img src="img/cross.png"=""></a></td>
      <?php }else{
        echo "<td><a href=\"?controller=rappels&action=updateContact&id=".$post->id."\">";?><img src="img/pens.png"=""></a></td>

      <?php
        }
         ?>
      </tr>
    <?php
    }
    ?>
  </table>
  <nav aria-label="Page navigation example">
    <div class="page">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </div>
  </nav>
  <a href="?controller=admin&action=homeBackOffice">retour à l'accueil</a>
</div>
