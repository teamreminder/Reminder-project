<?php
if (isset($_COOKIE['utilisateur'])) {
 ?>
<section>
  <div class="gestion_group">
    <div class="container">
      <div class="row">
        <div class="col align-self-start">
          <h3>Gestion des contacts</h3>
        </div>
        <div class="col align-self-end">
          <a href="?controller=rappels&action=createContact"><img src="img/add_button.png" width="80px" height="80px" alt=""></a>
        </div>
      </div>
    </div>
    <div class="container">
      <table class="gestion_group">
        <tr>
          <th>Email</th>
        </tr>
        <?php
        foreach ($posts as $post) {
          ?>
          <tr>
            <td><?php echo $post->email; ?></td>
            <?php echo "<td><a href=\"?controller=rappels&action=updateContact&id=".$post->idUserLiaison."\">";?><img src="img/pens.png"=""></a></td>
            <?php echo "<td><a onclick=\"return confirm('Etes vous sûre de vouloir supprimer ce contact ?');\" href=\"?controller=rappels&action=deleteContact&id=".$post->idUserLiaison."\">";?><img src="img/cross.png"=""></a></td>
          </tr>
          <?php
            }
           ?>
      </table>
      </div>
      <div class="container">
        <div class="bouton_accueil">
          <a href="?controller=rappels&action=home">retour accueil</a>
        </div>
      </div>
    </div>
</section>
<?php
}else{
  ?>
  <div class="container">
    <p>session expirée ! veuillez vous reconnecter !</p>
    <a href=?controller=rappels&action=index>retour connection</a>
  </div>
  <?php
}
 ?>
