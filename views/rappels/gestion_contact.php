<section>
  <div class="gestion_group">
    <div class="container">
      <div class="row">
        <div class="col align-self-start">
          <h3>Gestion des contacts</h3>
        </div>
        <div class="col align-self-end">
          <a href="?controller=rappels&action=createContact"><img src="img/add_button.png" alt=""></a>
        </div>
      </div>
    </div>
      <table class="gestion_group">
        <tr>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Groupe</th>
        </tr>
          <!-- <td>Dixneuf</td>
          <td>Florent</td>
          <td>isfac</td> -->
          <?php
          for ($i = 1; $i <= 5; $i++) {
              ?>
                    <tr>
                      <td>Dixneuf</td>
                      <td>Florent</td>
                      <td>Isfac</td>
                      <td><a href='editer_contact.php'><img src="img/pens.png"=""></a></td>
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
