
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="jquery-1.6.2.min.js"></script>
    <script type="text/javascript">
    
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);
      
    function drawChart() {
      var jsonData = $.ajax({
          url: "getdata.php",
          dataType:"json",
          async: false
          }).responseText;
          
      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);
     
      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, {width: 950, height: 440});
    }

    </script>
 <table valign="top" class="tab" width="100%" cellspacing="0" cellpadding="0" border="0" bordercolor="#0000FF">
        <tr valign="top" >
            <td valign="top"><h2 class="title"><b style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;">Daily Task Report</b></h2>
               <a class="button4" href="index.php?m=sent_task">  <b style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;"><< back</b></a>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"> </div>
            </td>
        </tr>
 </table>
  
