<div class="container">
  <div class="listLogs">

  <h3>Liste des logs</h3>
  <div class="Logs">
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
       <td><?php echo " Un rappel a été envoyé à ".$posts->email." le ".$jourEnregistrement." ".$moisEnregistrement." ".$anneeEnregistrement." pour le ".$jourRappel." ".$moisRappel." ".$anneeRappel." à ".$heureRappel." h ".$minuteRappel."<br>"?></td>
     </tr>
    <?php

    }
    ?>
    </div>
  </div>
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
