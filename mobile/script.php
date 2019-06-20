<?php
$bdd = new PDO('mysql:host=localhost;dbname=reminder;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$today=date('Y-m-d H:i:s');
$requete1 = "SELECT DISTINCT COUNT(id_rappel) AS nbr_rappel,id_user AS utilisateur FROM rappel WHERE date_rappel>'$today' GROUP BY id_user";
$result1=$bdd->query($requete1);
$resultat1=$result1->fetchAll();
foreach ($resultat1 as $value)
{
  $nbr_rappel=$value['nbr_rappel'];
  $utilisateurs=$value['utilisateur'];
}
?>

<script type="text/javascript">

  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Task', 'part of suscribe'],
      ['suscribe',     11],
      ['un-suscribe',      2],
    ]);

    var options = {
      title: 'Répartition des utilisateurs par nombre de rappel',
      pieHole: 0.4,
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
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
