<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
          title: 'Part of people who accept mail to reminder',
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
    </script>
  </head>
  <body>
    <div id="donutchart" style="width: 900px; height: 500px;"></div>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
</html>
