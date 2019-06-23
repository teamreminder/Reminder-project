<?php
  if (isset($_COOKIE['utilisateur'])) {
 ?>
  <div class="container">
    <h3>Editer un rappel</h3>
    <div class="edit_rappel">
      <?php

        foreach ($posts as $post) {
          $date1=substr($post->date_rappel, 0, -9);
          $date2=substr($post->date_rappel, 11, -3);
          $date=$date1."T".$date2.":00";
      ?>
      <form action="index.php" method="get">
        <input type="hidden" name="controller" value="rappels">
        <input type="hidden" name="action" value="updateReminderTraitement">
        <input type="hidden" name="id" value="<?php echo $post->id_rappel; ?>">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputdestinataire">Destinataire</label>
            <input type="email" name="destinataire" class="form-control" id="inputEmail4" value="<?php echo $post->email; ?>">
            <p>Votre destinataire a refusé le rappel</p>
          </div>
          <div class="input_datetime">
            <label for="inputdestinataire">Date et heure de l'envoie</label>
            <input type="datetime-local" required name="datetime" value="<?php echo $date; ?>">
          </div>
          <div class="form-group col-md-6">
            <label for="inputobjet">Objet</label>
            <input type="objet" name="objet" class="form-control" id="inputPassword4" value="<?php echo $post->objet; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="inputcontent">Message</label>
          <textarea name="message" rows="8" cols="50"><?php echo $post->message; ?></textarea>
        </div>
        <div class="col align-self-end">
          <button type="submit" class="btn btn-primary">MODIFIER</button>
        </div>
      </form>
      <?php
        }
      ?>
    </div>
    <div class="container">
      <a href=?controller=rappels&action=home>Retour</a>
    </div>
  </div>
<?php
  }else{
?>
  <div class="container">
    <p>Session expirée ! Veuillez vous reconnecter !</p>
    <a href=?controller=rappels&action=index>retour connection</a>
  </div>
<?php
  }
?>
