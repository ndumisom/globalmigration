<?php

/*
 * Create Pie Chart using GChart
 * and open the template in the editor.
 */

//require_once('class.php');
mysql_connect ("localhost", "root", "mapapa1531") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("globalmigration_db");


    

 $query = "SELECT count(allocated_task) as num_task, allocated_to from  `process_task_allocation` group by allocated_to ";
$result = mysql_query($query);
while($row = mysql_fetch_array($result)){
 $staff[] = $row;
 $tasks[] = $row['num_task'];
  //$json = $row['allocates_to'];
}


//$string .='{"Tasks": '. json_encode($tasks).'}';
$string =  json_encode($staff);
//echo $string;

$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

echo json_encode($arr);
?>

<br/>



    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Wendy',     11],
          ['Lucia',      2],
          ['Tina',  2],
          ['Gillian', 2],
          ['Tarin',    7]
        ]);

        var options = {
          title: 'Report of tasks allocated'
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
 
  <body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
  </body>