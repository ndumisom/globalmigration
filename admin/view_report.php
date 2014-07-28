<table class="tab" width="100%" cellspacing="0" cellpadding="0" border="0" bordercolor="#0000FF">
    <tr><td>
            <h2 class="title"><a href="#" style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;"> Reports </a></h2>
    <center>
        <?
        include_once 'database.php';
        $corporate = trim($_POST['corporate']);
        $permit_status = trim($_POST['permit_status']);
        $start_date = trim($_POST['start_date']);
        $end_date = trim($_POST['end_date']);
        $hr_department = trim($_POST['hr_department']);
        $none = " ";


       

        if ($corporate && $permit_status && $start_date && $end_date) {
            //None corporate
            if ($corporate == "None") {
                $strSQL = "SELECT * FROM client_details, permit_applications WHERE client_details.corporate =  '$none' AND permit_applications.permit_status like '%$permit_status%' AND expiry_date>=('$start_date') AND expiry_date<=('$end_date') AND client_details.clientID=permit_applications.clientID ORDER BY file_no ASC";
                $objQuery = mysql_query($strSQL);
            } else if ($corporate != "None") {
                $strSQL = "SELECT * FROM client_details, permit_applications WHERE client_details.corporate =  '$corporate' AND permit_applications.permit_status like '%$permit_status%' AND expiry_date>=('$start_date') AND expiry_date<=('$end_date') AND client_details.clientID=permit_applications.clientID ORDER BY file_no ASC";
                $objQuery = mysql_query($strSQL);
            }
        } else if ($corporate && $permit_status) {
            //None corporate
            if ($corporate == "None") {
                $strSQL = "SELECT * FROM client_details, permit_applications WHERE client_details.corporate =  '$none' AND permit_applications.permit_status like '%$permit_status%' AND client_details.clientID=permit_applications.clientID ORDER BY file_no ASC";
                $objQuery = mysql_query($strSQL);
            } else if ($corporate != "None") {
                $strSQL = "SELECT * FROM client_details, permit_applications WHERE client_details.corporate =  '$corporate' AND permit_applications.permit_status like '%$permit_status%' AND client_details.clientID=permit_applications.clientID ORDER BY file_no ASC";
                $objQuery = mysql_query($strSQL);
            }
        } else if ($corporate && $start_date && $end_date) {
            // None corporate
            if ($corporate == "None") {
                $strSQL = "SELECT * FROM client_details, permit_applications WHERE client_details.corporate =  '$none' AND expiry_date>=('$start_date') AND expiry_date<=('$end_date') AND client_details.clientID=permit_applications.clientID ORDER BY file_no ASC";
                $objQuery = mysql_query($strSQL);
            } elseif ($corporate != "None") {

                $strSQL = "SELECT * FROM client_details, permit_applications WHERE client_details.corporate =  '$corporate' AND expiry_date>=('$start_date') AND expiry_date<=('$end_date') AND client_details.clientID=permit_applications.clientID ORDER BY file_no ASC";
                $objQuery = mysql_query($strSQL);
            }
        } else if ($permit_status && $start_date && $end_date) {
            $strSQL = "SELECT * FROM client_details, permit_applications WHERE permit_applications.permit_status like '%$permit_status%' AND expiry_date>=('$start_date') AND expiry_date<=('$end_date') AND client_details.clientID=permit_applications.clientID ORDER BY file_no ASC";
            $objQuery = mysql_query($strSQL);
        } else if ($start_date && $end_date) {
            $strSQL = "SELECT * FROM client_details, permit_applications WHERE expiry_date>=('$start_date') AND expiry_date<=('$end_date') AND client_details.clientID=permit_applications.clientID ORDER BY file_no ASC";
            $objQuery = mysql_query($strSQL);
        } else if ($corporate) {
            //None corporate
            if ($corporate == 'None') {
                $strSQL = "SELECT * FROM client_details, permit_applications WHERE client_details.corporate =  '$none' AND client_details.clientID=permit_applications.clientID ORDER BY file_no ASC";
                $objQuery = mysql_query($strSQL);
            } else if ($corporate != 'None') {
                $strSQL = "SELECT * FROM client_details, permit_applications WHERE client_details.corporate =  '$corporate' AND client_details.clientID=permit_applications.clientID ORDER BY file_no ASC";
                $objQuery = mysql_query($strSQL);
            }
        }

        //permit view
        else if ($permit_status) {
            $strSQL = "SELECT * FROM client_details, permit_applications WHERE permit_applications.permit_status like '%$permit_status%' AND client_details.clientID=permit_applications.clientID ORDER BY file_no ASC";
            $objQuery = mysql_query($strSQL);
        } else {
            $strSQL = "SELECT * FROM client_details, permit_applications WHERE client_details.clientID=permit_applications.clientID ORDER BY file_no ASC";
            $objQuery = mysql_query($strSQL);
        }
        //Hr Department
        if ($hr_department) {
            $strSQL = "SELECT * FROM client_details, permit_applications WHERE hr_department='$hr_department' and client_details.clientID=permit_applications.clientID ORDER BY file_no ASC";
            $objQuery = mysql_query($strSQL);
        } elseif ($hr_department && $start_date) {
            $strSQL = "SELECT * FROM client_details, permit_applications WHERE client_details.corporate =  '$hr_department' AND expiry_date>=('$start_date') AND expiry_date<=('$end_date') AND client_details.clientID=permit_applications.clientID ORDER BY file_no ASC";
            $objQuery = mysql_query($strSQL);
        }

        $strSQL1 = "SELECT * FROM client_details, permit_applications WHERE client_details.corporate =  '$corporate' AND permit_applications.permit_status like '%$permit_status%' AND client_details.clientID=permit_applications.clientID ORDER BY surname ASC";
        $objQuery1 = mysql_query($strSQL1);
        ?>     <center>
            <form action="exporttoexcel.php" method="post" 
                  onsubmit='$("#datatodisplay").val( $("<div>").append( $("#ReportTable").eq(0).clone() ).html() )'>
                <div ali style="width: 900px; height: 500px; overflow: auto; padding: 10px; background-color: white;">

                    <table id="ReportTable" widht="100%" border="0" cellspacing="1" cellpadding="3" bgcolor="#353535" style="font-size: smaller;">

                        <tr class="header" align="left" valign="top">
                            <th> File no </th><th> Name </th><th> Surname </th><th> Passport No </th><th> Passport Expiry&nbsp;Date </th><th> Corporate </th><th> Business Unit</th><th> Processed By</th><th> Permit </th><th> Permit Status </th><th> Expiry&nbsp;Date &nbsp;</th><th> Date&nbsp;Endorsed </th><th>Eligible&nbsp;For&nbsp;PR</th><th> Submission Office </th><th> Submission Date </th> <th> pre_submission_date </th><th> memo_issue_date </th><th>Contact Number</th><th>Mobile Number</th><th> Email </th><th>In care of Email </th><th>Consultant</th><th>Comments</th><th>Date&nbsp;captured</th>

                        </tr>
<?
$numrows = mysql_num_rows($objQuery);
while ($row = mysql_fetch_array($objQuery)) {

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
      <td bgcolor='#FFFFFF'>" . $row['eligible_for_pr'] . " &nbsp;</td>    
      <td bgcolor='#FFFFFF'>" . $row['submission_office'] . "</td>
      <td bgcolor='#FFFFFF'>" . $row['submission_date'] . "</td>
      <td bgcolor='#FFFFFF'>" . $row['pre_submission_date'] . " &nbsp;</td>
      <td bgcolor='#FFFFFF'>" . $row['memo_issue_date'] . " &nbsp;</td>
      <td bgcolor='#FFFFFF'>" . $row['contact_no'] . " &nbsp;</td>	  
      <td bgcolor='#FFFFFF'>" . $row['mobile_no'] . " &nbsp;</td>
      <td bgcolor='#FFFFFF'>" . $row['email'] . "</td>
      <td bgcolor='#FFFFFF'>" . $row['in_care_email'] . "</td>  
      <td bgcolor='#FFFFFF'>" . $row['consultant'] . "</td>
      <td bgcolor='#FFFFFF'>" . $row['comments'] . "</td>
      <td bgcolor='#FFFFFF'>" . $row['date_captured'] . "</td>
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