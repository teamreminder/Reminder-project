<?php
  if (isset($_COOKIE['utilisateur'])) {
 ?>
      <div class="container">
        <h3>Créer un rappel</h3>
        <div class="create_remind">
          <form action="index.php" method="get">
            <input type="hidden" name="controller" value="rappels">
            <input type="hidden" name="action" value="createReminderTraitement">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputdestinataire">Destinataire</label>
                <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Votre destinataire...">
                <p>Votre destinataire a refusé le rappel</p>
              </div>
              <label for="inputdestinataire">Date et heure de l'envoie</label>
              <div class="datetime">
                <input type="datetime-local" name="datetime" value="" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputobjet">Objet</label>
                <input type="objet" name="objet" class="form-control" id="inputPassword4" placeholder="Votre objet...">
              </div>
            </div>
            <div class="form-group">
              <label for="inputcontent">Message</label>
              <textarea name="message" rows="8" cols="50" placeholder="Votre message..."></textarea>
            </div>
            <div class="col align-self-end">
              <button type="submit" class="btn btn-primary">CRÉER</button>
            </div>
          </form>
        </div>
      </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
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
