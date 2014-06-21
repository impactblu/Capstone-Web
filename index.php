<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Voltage', 'Current'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance',
          vAxis: {title: "Amount ($)"},
          hAxis: {title: "Year"}

        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>

    <?php
$con=mysqli_connect("127.0.0.1","root","root","mysql");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM data1");

echo "<table border='1'>";
echo "<tr><th>Date</th><th>Voltage</th><th>Current</th></tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>" . $row['voltage'] . "</td>";
  echo "<td>" . $row['current'] . "</td>";

  echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>

      <!--<div id="chart_div" style="width: 50%; height: 50%;"></div> -->
  </body>
</html>