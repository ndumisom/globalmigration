<table class="tab" width="100%" cellspacing="0" cellpadding="0" border="0" bordercolor="#0000FF">
    <tr><td>
            <h2 class="title"><a href="#" style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;"> Reports </a></h2>
    <center></center>
<form action="exporttoexcel.php" method="post" 
                  onsubmit='$("#datatodisplay").val( $("<div>").append( $("#ReportTable").eq(0).clone() ).html() )'>
                <div ali style="width: 900px; height: 500px; overflow: auto; padding: 10px; background-color: white;">

                    <table id="ReportTable" widht="100%" border="0" cellspacing="1" cellpadding="3" bgcolor="#353535" style="font-size: smaller;">

                        <tr class="header" align="left" valign="top"> 
                            <th> File no </th><th>Surname  </th><th>Name </th><th> Application&nbsp;Type </th><th>Permit</th><th> Passport&nbsp;No </th><th> Corporate </th><th>Email </th>

                        </tr>
<?

include_once 'class.php';
$call = new globalm;
$firstname = $call->getFirstname($_SESSION['log']);

$objQuery = mysql_query("SELECT *FROM client_details, permit_applications WHERE (corporate = '$firstname' or business_unit = '$firstname')and client_details.clientID=permit_applications.clientID ORDER BY surname");

$numrows = mysql_num_rows($objQuery);
while ($row = mysql_fetch_array($objQuery)) {

    echo "<tr>
       <td bgcolor='#FFFFFF'>" . $row['file_no'] . " &nbsp;</td>     
      <td bgcolor='#FFFFFF'>" . $row['surname'] . " &nbsp;</td>
           <td bgcolor='#FFFFFF'>" . $row['firstnames'] . " &nbsp;</td>
      <td bgcolor='#FFFFFF'>" . $row['application_type'] . " &nbsp;</td>
           <td bgcolor='#FFFFFF'>" . $row['permit'] . " &nbsp;</td>
      <td bgcolor='#FFFFFF'>" . $row['passport_no'] . " &nbsp;</td>
      <td bgcolor='#FFFFFF'>" . $row['corporate'] . " &nbsp;</td>
      <td bgcolor='#FFFFFF'>" . $row['in_care_email'] . "</td>
     
    </tr >";
}
if ($numrows == 0) {
    echo "<tr><td colspan='17' bgcolor='#FFFFFF'><br/><b><div align='center'><font color='red'> No results &nbsp;&nbsp;&nbsp;<a style='color: #0000FF;' href='admin_index.php?m=reports'> go back</a></div></font></b><br/></td></tr>";
}
?>


                    </table>

                </div>
                <p>&nbsp;</p>
                <input type="hidden" id="datatodisplay" name="datatodisplay" >
                <input type="submit" value="Export to Excel" class="login">
            </form> 

            </td> </tr></table>