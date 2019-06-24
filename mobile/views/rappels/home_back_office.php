<div class="container">
  <h3>Back office</h3>
  <div class="col align-self-end">
    <a href="?controller=rappels&action=index">Se déconnecter</a>
  </div>
  <div class="graph">
    <div class="row">
      <div class="col-lg-4">
        <div id="chart_div" style="width: 100%; height: 200px;"></div>
      </div>
      <div class="col-lg-4">
        <div id="columnchart_values" style="width: 100%; height: 200px;"></div>
      </div>
      <div class="col-lg-4">
        <div id="curve_chart" style="width: 100%; height: 200px"></div>
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

$connect =mysqli_connect("remindmeuiremind.mysql.db", "remindmeuiremind", "Isfac2019", "remindmeuiremind");

$query = "SELECT email, slots
FROM user";
$result = mysqli_query($connect, $query);

// 2éme requête //

$todayY = date('Y');
$todayM = date('m');
switch ($todayM) {
  case 1:
    $before=8;
    $todayY=$todayY-1;
    break;
  case 2:
    $before=9;
    $todayY=$todayY-1;
    break;
  case 3:
    $before=10;
    $todayY=$todayY-1;
    break;
  case 4:
    $before=11;
    $todayY=$todayY-1;
    break;
  case 5:
    $before=12;
    $todayY=$todayY-1;
    break;
  case 6:
    $before=1;
    break;
  case 7:
    $before=2;
    break;
  case 8:
    $before=3;
    break;
  case 9:
    $before=4;
    break;
  case 10:
    $before=5;
    break;
  case 11:
    $before=6;
    break;
  case 12:
    $before=7;
    break;
}

$query2 = "SELECT MONTH(`date_enregistrement`) AS mois, COUNT(id_user) AS nombre_dUtilisateurs
FROM user
WHERE YEAR( `date_enregistrement` ) = '$todayY'
AND MONTH(`date_enregistrement`) BETWEEN '$before' AND '$todayM'
GROUP BY MONTH(`date_enregistrement`)";
$result2 = mysqli_query($connect, $query2);

// 3ème requête //

$query3 = "SELECT MONTH(`date_rappel`) AS mois, COUNT(id_rappel) AS nombre_de_rappel
FROM rappel
WHERE YEAR( `date_rappel` ) = '$todayY'
AND MONTH(`date_rappel`) BETWEEN '$before' AND '$todayM'
GROUP BY MONTH(`date_rappel`)";
$result3 = mysqli_query($connect, $query3);

?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

google.charts.load("current", {packages:["corechart"]});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['utilisateurs', 'slots'],
    <?php
      while ($row = mysqli_fetch_array($result))
      {
        echo "['".$row["email"]."', ".$row["slots"]."],";
      }
    ?>
  ]);

  var options = {
    title: 'Nombre de slots par utilisateurs.',
  };

  var chart = new google.visualization.Histogram(document.getElementById('chart_div'));
  chart.draw(data, options);
}

// 2éme graphique //

google.charts.load("current", {packages:['corechart']});
google.charts.setOnLoadCallback(drawChart2);
function drawChart2() {
  var data = google.visualization.arrayToDataTable([
    ["mois", "nombre d'inscription"],
    <?php
      while ($row = mysqli_fetch_array($result2))
      {
        switch ($row["mois"]) {
          case 1:
            $row["mois"]="Janvier";
            break;
          case 2:
            $row["mois"]="Février";
            break;
          case 3:
            $row["mois"]="Mars";
            break;
          case 4:
            $row["mois"]="Avril";
            break;
          case 5:
            $row["mois"]="Mai";
            break;
          case 6:
            $row["mois"]="Juin";
            break;
          case 7:
            $row["mois"]="Juillet";
            break;
          case 8:
            $row["mois"]="Août";
            break;
          case 9:
            $row["mois"]="Septembre";
            break;
          case 10:
            $row["mois"]="Octobre";
            break;
          case 11:
            $row["mois"]="Novembre";
            break;
          case 12:
            $row["mois"]="Décembre";
            break;
        }
        echo "['".$row["mois"]."', ".$row["nombre_dUtilisateurs"]."],";
      }
    ?>
  ]);

  var view = new google.visualization.DataView(data);

var options = {
 title: "Nombre d'inscription tous les mois.",
};
var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
chart.draw(view, options);
}

// 3ème graphique //

google.charts.setOnLoadCallback(drawChart3);
function drawChart3() {
  var data = google.visualization.arrayToDataTable([
    ['mois', 'nombre_de_rappel'],
    <?php
      while ($row = mysqli_fetch_array($result3))
      {
        switch ($row["mois"]) {
          case 1:
            $row["mois"]="Janvier";
            break;
          case 2:
            $row["mois"]="Février";
            break;
          case 3:
            $row["mois"]="Mars";
            break;
          case 4:
            $row["mois"]="Avril";
            break;
          case 5:
            $row["mois"]="Mai";
            break;
          case 6:
            $row["mois"]="Juin";
            break;
          case 7:
            $row["mois"]="Juillet";
            break;
          case 8:
            $row["mois"]="Août";
            break;
          case 9:
            $row["mois"]="Septembre";
            break;
          case 10:
            $row["mois"]="Octobre";
            break;
          case 11:
            $row["mois"]="Novembre";
            break;
          case 12:
            $row["mois"]="Décembre";
            break;
        }
        echo "['".$row["mois"]."', ".$row["nombre_de_rappel"]."],";
      }
    ?>
  ]);

  var options = {
    title: "Nombre de Reminder créé par mois."
  };

  var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

  chart.draw(data, options);
}

</script>
