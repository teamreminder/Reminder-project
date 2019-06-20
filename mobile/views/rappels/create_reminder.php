<?php
  if (isset($_COOKIE['utilisateur'])) {
    $today=date('c');
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
                <input type="email" name="email" class="form-control" id="filtre" placeholder="Votre destinataire...">
                <div id="exo5">
                </div>
              </div>
              <label for="inputdestinataire">Date et heure de l'envoi</label>
              <div class="input_datetime">
                <input type="datetime-local" name="datetime" value="<?php echo substr($today, 0, -9); ?>" required>
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
    <!-- <input type="text" id="filtre">
    <div id="exo5">

    </div> -->
    <script type="text/javascript">
    var text1=document.getElementById("filtre");
    text1.addEventListener('keyup',loadDoc);

    function loadDoc() {
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       var result=JSON.parse(this.responseText)
        myFunction(result);
      }
    };
    var dansIunput = document.getElementById("filtre").value
    var url="?controller=rappels&action=blacklist&filtre="+dansIunput
    xhttp.open("GET", url, true);
    xhttp.send();
    }
    function myFunction(arr) {
      var out = "";
      var i;
      for(i = 0; i < arr.length; i++) {
        out +=  arr[i]  + '<br>';
      }
      document.getElementById("exo5").innerHTML = out;
    }
    </script>
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
