<div class="container">
  <div class="graph">
    <div class="row">
      <div class="col-lg-4">
        <div id="donutchart" style="width: 100%; height: 200px;"></div>
      </div>
      <div class="col-lg-4">
        <div id="curve_chart" style="width: 100%; height: 200px"></div>
      </div>
      <div class="col-lg-4">
        <div id="columnchart_material" style="width: 100%; height: 200px;"></div>
      </div>
    </div>
  </div>
  <div class="alert">
    <br>
    <a href="?controller=admin&action=listLogs">Liste des logs</a>
    <br><br>
<?php
  foreach ($post as $posts) {
    $anneeEnregistrement=substr($posts->prenom, 0, -15);
    $moisEnregistrement=substr($posts->prenom, 5, -12);
    $jourEnregistrement=substr($posts->prenom, 8, -9);
    $anneeRappel=substr($posts->password, 0, -15);
    $moisRappel=substr($posts->password, 5, -12);
    $jourRappel=substr($posts->password, 8, -9);
    $heureRappel=substr($posts->password, 11, -6);
    $minuteRappel=substr($posts->password, 14, -3);

 ?>
 <tr>
   <td><?php echo "Un rappel a été envoyé à ".$posts->email." le ".$jourEnregistrement." ".$moisEnregistrement." ".$anneeEnregistrement." pour le ".$jourRappel." ".$moisRappel." ".$anneeRappel." à ".$heureRappel." h ".$minuteRappel."<br>"?></td>
 </tr>
<?php } ?>
  </div>
  <a href="?controller=admin&action=listUser">Liste des utilisateurs</a>
</div>
  <?php require_once('./script.php') ?>
