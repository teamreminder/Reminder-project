<section>
  <div class="gestion_group">
    <div class="container">
      <div class="row">
        <div class="col align-self-start">
          <h4>Gestion des contacts</h4>
        </div>
        <div class="col align-self-end">
          <a href="?controller=rappels&action=createContact"><img src="img/add_button.png" width="80px" height="80px" alt=""></a>
        </div>
      </div>
    </div>
      <table class="gestion_group">
        <tr>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Groupe</th>
        </tr>
        <?php
        foreach ($posts as $post) {
          ?>
          <tr>
            <td><?php echo $post->nom; ?></td>
            <td><?php echo $post->prenom; ?></td>
            <td><?php echo $post->libelle; ?></td>
            <?php echo "<td><a href=\"?controller=rappels&action=updateContact&id=".$post->id_user."\">";?><img src="img/pens.png"=""></a></td>
            <td><a href='#'><img src="img/cross.png"=""></a></td>
          </tr>
          <?php
            }
           ?>
      </table>
      <div class="container">
        <div class="bouton_accueil">
          <a href="?controller=rappels&action=home">retour accueil</a>
        </div>
      </div>
    </div>
</section>
