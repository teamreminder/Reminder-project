      <div class="container">
        <div class="create_remind">
          <h3>Créer un rappel</h3>
          <form action="index.php" method="get">
            <input type="hidden" name="controller" value="rappels">
            <input type="hidden" name="action" value="createReminderTraitement">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputdestinataire">Destinataire</label>
                <input type="email" name="destinataire" class="form-control" id="inputEmail4" placeholder="Votre destinataire...">
                <p>Votre destinataire a refusé le rappel</p>
              </div>
              <div class="form-group col-md-6">
                <label for="inputdestinataire">Date et heure de l'envoie</label>
                <div class="input-append date form_datetime" data-date="2013-02-21T15:25:00Z">
                  <input size="16" name="datetime" type="text" value="" readonly>
                  <span class="add-on"><i class="icon-remove"></i></span>
                  <span class="add-on"><i class="icon-calendar"></i></span>
                </div>
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
    <script src="js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
        $(".form_datetime").datetimepicker({
            language : 'fr',
            format: "dd MM yyyy - hh:ii",
            autoclose: true,
            todayBtn: true,
            startDate: "2013-02-14 10:00",
            minuteStep: 10
        });
    </script>
