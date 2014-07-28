<table class="tab" width="100%" cellspacing="0" cellpadding="0" border="0" bordercolor="#0000FF">
    <tr><td>
            <h2 class="title"><a href="#" style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;">File Opened Reports </a></h2>
    <center>
        <?
        include_once 'database.php';
        $corporate = trim($_POST['corporate']);
        $permit_status = trim($_POST['permit_status']);
        $start_date = trim($_POST['start_date']);
        $end_date = trim($_POST['end_date']);
        $hr_department = trim($_POST['hr_department']);
        $none = " ";


       

      if ($start_date && $end_date) {
            $strSQL = "SELECT * FROM client_details, permit_applications WHERE client_details.date_captured>=('$start_date') AND client_details.date_captured<=('$end_date') AND client_details.clientID=permit_applications.clientID ORDER BY file_no ASC";
            $objQuery = mysql_query($strSQL);
        }elseif ($start_date== null || $end_date==null) { 
      
    
}
     

      
        ?>     <center>
            <form action="exporttoexcel.php" method="post" 
                  onsubmit='$("#datatodisplay").val( $("<div>").append( $("#ReportTable").eq(0).clone() ).html() )'>
                <div ali style="width: 900px; height: 500px; overflow: auto; padding: 10px; background-color: white;">

                    <table id="ReportTable" widht="100%" border="0" cellspacing="1" cellpadding="3" bgcolor="#353535" style="font-size: smaller;">

                        <tr class="header" align="left" valign="top">
                            <th> File no </th><th> Name </th><th> Surname </th><th> Passport No </th><th> Passport Expiry&nbsp;Date </th><th> Corporate </th><th> Business Unit</th><th> Process By </th><th> Permit </th><th> Permit Status </th><th> Expiry&nbsp;Date &nbsp;</th><th> Date&nbsp;Endorsed </th><th> Submission Office </th><th> Submission Date </th> <th> pre_submission_date </th><th> memo_issue_date </th><th> Email </th><th>In care of Email </th><th>Consultant</th><th>Comments</th><th>Date&nbsp;captured</th>

                        </tr>
<?
$numrows = @mysql_num_rows($objQuery);
while ($row = @mysql_fetch_array($objQuery)) {

    echo "<tr>
       <td bgcolor='#FFFFFF'>" . $row['file_no'] . " &nbsp;</td>
      <td bgcolor='#FFFFFF'>" . $row['firstnames'] . " &nbsp;</td>
      <td bgcolor='#FFFFFF'>" . $row['surname'] . " &nbsp;</td>
      <td bgcolor='#FFFFFF'>" . $row['passport_no'] . " &nbsp;</td>
      <td bgcolor='#FFFFFF'>" . $row['passport_expiry_date'] . " &nbsp;</td>
      <td bgcolor='#FFFFFF'>" . $row['corporate'] . " &nbsp;</td>
      <td bgcolor='#FFFFFF'>" . $row['business_unit'] . " &nbsp;</td>
	  <td bgcolor='#FFFFFF'>" . $row['process_by'] . " &nbsp;</td>
      <td bgcolor='#FFFFFF'>" . $row['permit'] . " &nbsp;</td>
      
      <td bgcolor='#FFFFFF'>" . $row['permit_status'] . " &nbsp;</td>
      <td bgcolor='#FFFFFF'>" . $row['expiry_date'] . " &nbsp;</td>
      <td bgcolor='#FFFFFF'>" . $row['date_endorsed'] . " &nbsp;</td>
      <td bgcolor='#FFFFFF'>" . $row['submission_office'] . "</td>
      <td bgcolor='#FFFFFF'>" . $row['submission_date'] . "</td>
          <td bgcolor='#FFFFFF'>" . $row['pre_submission_date'] . " &nbsp;</td>
      <td bgcolor='#FFFFFF'>" . $row['memo_issue_date'] . " &nbsp;</td>
      <td bgcolor='#FFFFFF'>" . $row['email'] . "</td>
      <td bgcolor='#FFFFFF'>" . $row['in_care_email'] . "</td>  
      <td bgcolor='#FFFFFF'>" . $row['consultant'] . "</td>
      <td bgcolor='#FFFFFF'>" . $row['comments'] . "</td>
      <td bgcolor='#FFFFFF'>" . $row['date_captured'] . "</td>
    </tr >";
}
if ($numrows == 0) {
    echo "<tr><td colspan='17' bgcolor='#FFFFFF'><br/><b><div align='center'><font color='red'> No results &nbsp;&nbsp;&nbsp;<a style='color: #0000FF;' href='admin_index.php?m=file_opened'> go back</a></div></font></b><br/></td></tr>";
}
?>


                    </table>

                </div>
                <p>&nbsp;</p>
                <input type="hidden" id="datatodisplay" name="datatodisplay" >
                <input type="submit" value="Export to Excel" class="login">
            </form> 

            </td> </tr></table>