<table class="tab" width="100%" cellspacing="0" cellpadding="0" border="0" bordercolor="#0000FF">
    <tr><td>
            <h2 class="title"><a href="#" style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;"> Reports </a></h2>
    <center>
        <?
        include_once 'class.php';

//Permit status

        $permit_status = trim($_POST['permit_status']);
        $corporate = trim($_POST['corporate']);
        if ($permit_status) {
            $strSQL = "SELECT * FROM client_details, permit_applications WHERE (business_unit ='' or corporate = '' or email = '' or consultant = '' or passport_no = '' or passport_expiry_date = ''  or in_care_email = '') and  permit_applications.permit_status =  '$permit_status' AND client_details.clientID=permit_applications.clientID ORDER BY file_no ASC";
            $objQuery = mysql_query($strSQL);
        }

        if ($corporate && $permit_status) {
            //None corporate
            if ($corporate == "None") {
                $strSQL = "SELECT * FROM client_details, permit_applications WHERE (business_unit ='' or corporate = '' or email = '' or consultant = '' or passport_no = '' or passport_expiry_date = ''  or in_care_email = '') and  client_details.corporate =  '$none' AND permit_applications.permit_status =  '$permit_status' AND client_details.clientID=permit_applications.clientID ORDER BY file_no ASC";
                $objQuery = mysql_query($strSQL);
            } else if ($corporate != "None") {
                $strSQL = "SELECT * FROM client_details, permit_applications WHERE (business_unit ='' or corporate = '' or email = '' or consultant = '' or passport_no = '' or passport_expiry_date = ''  or in_care_email = '') and  client_details.corporate =  '$corporate' AND permit_applications.permit_status =  '$permit_status' AND client_details.clientID=permit_applications.clientID ORDER BY file_no ASC";
                $objQuery = mysql_query($strSQL);
            }
        }

       
        ?>
        <center>
            <form action="exporttoexcel.php" method="post" 
                  onsubmit='$("#datatodisplay").val( $("<div>").append( $("#ReportTable").eq(0).clone() ).html() )'>
                <div ali style="width: 900px; height: 500px; overflow: auto; padding: 10px; background-color: white;">

                    <table id="ReportTable" widht="100%" border="0" cellspacing="1" cellpadding="3" bgcolor="#353535" style="font-size: smaller;">

                        <tr class="header" align="left" valign="top">
                            <th> File no </th><th> Name </th><th> Surname </th><th> Passport No </th><th> Passport Expiry&nbsp;Date </th><th> Corporate </th><th> Business Unit</th><th> Process By </th><th> Permit </th> <th> Permit Status </th><th> Expiry&nbsp;Date &nbsp;</th><th> Date&nbsp;Endorsed </th><th> Submission Office </th><th> Submission Date </th><th> Email </th><th>In care of Email </th><th>Consultant</th><th>Date&nbsp;captured</th>

                        </tr>
                        <?
                        $numrows = mysql_num_rows($objQuery);
                        while ($row = mysql_fetch_array($objQuery)) {
                            echo "<tr>";
                            if ($row['file_no'] == null) {
                                echo " <td bgcolor='#FFFFFF'> <font color='red'> This field is empty </font> </td>";
                            } else {
                                echo "<td bgcolor='#FFFFFF'>" . $row['file_no'] . " &nbsp;</td>";
                            }
                            if ($row['firstnames'] == null) {
                                echo "<td bgcolor='#FFFFFF'> <font color='red'> This field is empty </font> </td>";
                            } else {
                                echo "<td bgcolor='#FFFFFF'>" . $row['firstnames'] . " &nbsp;</td>";
                            }
                            if ($row['surname'] == null) {
                                echo "<td bgcolor='#FFFFFF'> <font color='red'> This field is empty </font> </td>";
                            } else {
                                echo "<td bgcolor='#FFFFFF'>" . $row['surname'] . " &nbsp;</td>";
                            }
                            if ($row['passport_no'] == null) {
                                echo "<td bgcolor='#FFFFFF'><font color='red'> This field is empty </font> </td>";
                            } else {
                                echo "<td bgcolor='#FFFFFF'>" . $row['passport_no'] . " &nbsp;</td>";
                            }
                            if ($row['passport_expiry_date'] == 0000 - 00 - 00) {
                                echo "<td bgcolor='#FFFFFF'> <font color='red'> This field is empty </font> </td>";
                            } else {
                                echo "<td bgcolor='#FFFFFF'>" . $row['passport_expiry_date'] . " &nbsp;</td>";
                            }
                            if ($row['corporate'] == null) {
                                echo "<td bgcolor='#FFFFFF'> <font color='red'> This field is empty </font> </td>";
                            } else {
                                echo "<td bgcolor='#FFFFFF'>" . $row['corporate'] . " &nbsp;</td>";
                            }
                            if ($row['business_unit'] == null) {
                                echo "<td bgcolor='#FFFFFF'> <font color='red'> This field is empty </font> </td>";
                            } else {
                                echo "<td bgcolor='#FFFFFF'>" . $row['business_unit'] . " &nbsp;</td>";
                            } if ($row['process_by'] == null) {
                                echo "<td bgcolor='#FFFFFF'> <font color='red'> This field is empty </font> </td>";
                            } else {
                                echo "<td bgcolor='#FFFFFF'>" . $row['process_by'] . " &nbsp;</td>";
                            }
                            if ($row['permit'] == null) {
                                echo "<td bgcolor='#FFFFFF'> <font color='red'> This field is empty </font></td>";
                            } else {
                                echo "<td bgcolor='#FFFFFF'>" . $row['permit'] . " &nbsp;</td>";
                            }
                            if ($row['permit_status'] == null) {
                                echo "<td bgcolor='#FFFFFF'> <font color='red'> This field is empty </font></td>";
                            } else {
                                echo "<td bgcolor='#FFFFFF'>" . $row['permit_status'] . " &nbsp;</td>";
                            }
                            if ($row['expiry_date'] == 0000 - 00 - 00) {
                                echo "<td bgcolor='#FFFFFF'> <font color='red'> This field is empty </font> </td>";
                            } else {
                                echo "<td bgcolor='#FFFFFF'>" . $row['expiry_date'] . " &nbsp;</td>";
                            }

                            if ($row['date_endorsed'] == null) {
                                echo "<td bgcolor='#FFFFFF'> <font color='red'> This field is empty </font></td>";
                            } else {
                                echo "<td bgcolor='#FFFFFF'>" . $row['date_endorsed'] . " &nbsp;</td>";
                            }
                            if ($row['submission_office'] == null) {
                                echo "<td bgcolor='#FFFFFF'><font color='red'> This field is empty </font></td>";
                            } else {
                                echo "<td bgcolor='#FFFFFF'>" . $row['submission_office'] . " &nbsp;</td>";
                            }
                            if ($row['submission_date'] == null) {
                                echo "<td bgcolor='#FFFFFF'> <font color='red'> This field is empty </font></td>";
                            } else {
                                echo "<td bgcolor='#FFFFFF'>" . $row['submission_date'] . " &nbsp;</td>";
                            }
                            if ($row['email'] == null) {
                                echo "<td bgcolor='#FFFFFF'><font color='red'> This field is empty </font></td>";
                            } else {
                                echo "<td bgcolor='#FFFFFF'>" . $row['email'] . " &nbsp;</td>";
                            }
                            if ($row['in_care_email'] == null) {
                                echo "<td bgcolor='#FFFFFF'> <font color='red'> This field is empty </font></td>";
                            } else {
                                echo "<td bgcolor='#FFFFFF'>" . $row['in_care_email'] . " &nbsp;</td>";
                            }
                            if ($row['consultant'] == null) {
                                echo "<td bgcolor='#FFFFFF'> <font color='red'> This field is empty </font></td>";
                            } else {
                                echo "<td bgcolor='#FFFFFF'>" . $row['consultant'] . " &nbsp;</td>";
                            }
                            if ($row['date_captured'] == null) {
                                echo "<td bgcolor='#FFFFFF'> <font color='red'> This field is empty </font></td>";
                            } else {
                                echo "<td bgcolor='#FFFFFF'>" . $row['date_captured'] . " &nbsp;</td>";
                            }
                            echo "</tr>";
                        }
                        if ($numrows == 0) {
                            echo "<tr><td colspan='17' bgcolor='#FFFFFF'><br/><b><div align='center'><font color='red'> No results</div></font></b><br/></td></tr>";
                        }
                        ?>


                    </table>

                </div>
                <p>&nbsp;</p>
                <input type="hidden" id="datatodisplay" name="datatodisplay" >
                <input type="submit" value="Export to Excel" class="login">
            </form> 

            </td> </tr></table>
