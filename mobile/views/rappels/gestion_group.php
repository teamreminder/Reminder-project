<?php
  if (isset($_COOKIE['utilisateur'])) {

 ?>
<div class="gestion_group">
  <div class="container">
    <div class="row">
      <div class="col align-self-start">
        <h4>Gestion des groupes</h4>
      </div>
      <div class="col align-self-end">
        <a href="creer_groupe.php"><img src="img/add_button.png" width="80px" height="80px" alt=""></a>
      </div>
    </div>
  </div>
    <table class="gestion_group">
      <tr>
        <th>Libellé</th>
        <th>Nombre de membres</th>
      </tr>
        <?php
        for ($i = 1; $i <= 3; $i++) {
            ?>
                  <tr>
                    <td>Isfac</td>
                    <td>9</td>
                    <td><a href='editer_groupe'><img src="img/pens.png"=""></a></td>
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
