<div class="container">
  <div class="graph">
    <div class="row">
      <div class="col-lg-4">
        <div id="chart_div" style="width: 100%; height: 200px;"></div>
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
   <td><?php echo "Un rappel a été envoyé à ".$posts->email." le ".$jourEnregistrement." ".$moisEnregistrement." ".$anneeEnregistrement." pour le ".$jourRappel." ".$moisRappel." ".$anneeRappel." à ".$heureRappel." h ".$minuteRappel.".<br>"?></td>
 </tr>
<?php } ?>
  </div>
  <a href="?controller=admin&action=listUser">Liste des utilisateurs</a>
</div>
<?php
$bdd = new PDO('mysql:host=remindmeuiremind.mysql.db;dbname=remindmeuiremind;charset=utf8', 'remindmeuiremind', 'Isfac2019', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$today=date('Y-m-d H:i:s');
$requete1 = "SELECT count(id_user) AS nb_user, slots FROM user GROUP BY slots";
$result1=$bdd->query($requete1);
$resultat1=$result1->fetchAll();

?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Dinosaur', 'Length'],
          ['Acrocanthosaurus (top-spined lizard)', 12.2],
          ['Albertosaurus (Alberta lizard)', 9.1],
          ['Allosaurus (other lizard)', 12.2],
          ['Apatosaurus (deceptive lizard)', 22.9],
          ['Archaeopteryx (ancient wing)', 0.9],
          ['Argentinosaurus (Argentina lizard)', 36.6],
          ['Baryonyx (heavy claws)', 9.1],
          ['Brachiosaurus (arm lizard)', 30.5],
          ['Ceratosaurus (horned lizard)', 6.1],
          ['Coelophysis (hollow form)', 2.7],
          ['Compsognathus (elegant jaw)', 0.9],
          ['Deinonychus (terrible claw)', 2.7],
          ['Diplodocus (double beam)', 27.1],
          ['Dromicelomimus (emu mimic)', 3.4],
          ['Gallimimus (fowl mimic)', 5.5],
          ['Mamenchisaurus (Mamenchi lizard)', 21.0],
          ['Megalosaurus (big lizard)', 7.9],
          ['Microvenator (small hunter)', 1.2],
          ['Ornithomimus (bird mimic)', 4.6],
          ['Oviraptor (egg robber)', 1.5],
          ['Plateosaurus (flat lizard)', 7.9],
          ['Sauronithoides (narrow-clawed lizard)', 2.0],
          ['Seismosaurus (tremor lizard)', 45.7],
          ['Spinosaurus (spiny lizard)', 12.2],
          ['Supersaurus (super lizard)', 30.5],
          ['Tyrannosaurus (tyrant lizard)', 15.2],
          ['Ultrasaurus (ultra lizard)', 30.5],
          ['Velociraptor (swift robber)', 1.8]]);

        var options = {
          title: 'Lengths of dinosaurs, in meters',
          legend: { position: 'none' },
        };

        var chart = new google.visualization.Histogram(document.getElementById('chart_div'));
        chart.draw(data, options);
      }

  google.charts.setOnLoadCallback(drawChart2);
  function drawChart2() {
    var data = google.visualization.arrayToDataTable([
      ['Months', 'register'],
      ['Jan',  234],
      ['Fév',  256],
      ['Mar',  269],
      ['Avr',  301],
      ['Mai',  375],
      ['Jui',  587]
    ]);

    var options = {
      title: 'Part of register to reminder from 2018',
      curveType: 'function',
      legend: { position: 'bottom' }
    };

    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

    chart.draw(data, options);
  }

  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart3);

  function drawChart3() {
    var data = google.visualization.arrayToDataTable([
      ['Year', 'Sales', 'Expenses', 'Profit'],
      ['2014', 1000, 400, 200],
      ['2015', 1170, 460, 250],
      ['2016', 660, 1120, 300],
      ['2017', 1030, 540, 350]
    ]);

    var options = {
      chart: {
        title: 'Company Performance',
        subtitle: 'Sales, Expenses, and Profit: 2014-2017',
      }
    };

    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
  }

</script>
