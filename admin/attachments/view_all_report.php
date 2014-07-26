<table class="tab" width="100%" cellspacing="0" cellpadding="0" border="0" bordercolor="#0000FF">
    <tr><td>
            <h2 class="title"><a href="#" style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;"> Reports </a></h2>
    <center>
        <?
        $corporate = $_POST['corporate'];
        $permit_status = $_POST['permit_status'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];


        $objConnect = mysql_connect("localhost", "root", "mapapa1531") or die(mysql_error());
        $objDB = mysql_select_db("globalmigration_db");
        $strSQL = "SELECT * FROM client_details, permit_applications WHERE client_details.corporate =  '$corporate' AND permit_applications.permit_status =  '$permit_status' AND expiry_date>=('$start_date') AND expiry_date<=('$end_date') AND client_details.clientID=permit_applications.clientID";
        $objQuery = mysql_query($strSQL);

        $strSQL1 = "SELECT * FROM client_details, permit_applications WHERE client_details.corporate =  '$corporate' AND permit_applications.permit_status =  '$permit_status' AND client_details.clientID=permit_applications.clientID";
        $objQuery1 = mysql_query($strSQL1);
        ?>     <center>
            <form action="exporttoexcel.php" method="post" 
                  onsubmit='$("#datatodisplay").val( $("<div>").append( $("#ReportTable").eq(0).clone() ).html() )'>
                <div ali style="width: 90%; height: 500px; overflow: auto; padding: 16px; background-color: white;">

                    <table id="ReportTable" widht="90%" border="0" cellspacing="0" cellpadding="0" bordercolor="#0000FF" style="font-size: smaller;">

                        <tr class="header">
                            <th>File no</th><th> Title</th><th> Name</th><th> Surname</th><th> Application type</th><th> Corporate</th><th> In care of</th><th> Permit</th> <th> Permit Status </th><th> Permit No </th><th> Submission Office </th><th> Submission Date </th><th> Expiry Date </th><th> Date Endorsed </th><th> DHA Reference No </th><th> DHA Case No</th><th> Comments</th>

                        </tr>
                        <?
                        while ($row = mysql_fetch_array($objQuery)) {
                            echo "<tr>
                                    <td>" . $row['file_no'] . "</td>
                                    <td>" . $row['title'] . "</td>
                                    <td>" . $row['firstnames'] . "</td>
                                    <td>" . $row['surname'] . "</td>
                                    <td>" . $row['application_type'] . "</td>
                                    <td>" . $row['corporate'] . "</td>
                                    <td>" . $row['in_care_of'] . "</td>
                                    <td>" . $row['permit'] . "</td>
                                    <td>" . $row['permit_status'] . "</td>
                                    <td>" . $row['permit_no'] . "</td>
                                    <td>" . $row['submission_office'] . "</td>
                                    <td>" . $row['submission_date'] . "</td>  
                                    <td>" . $row['expiry_date'] . "</td>
                                    <td>" . $row['date_endorsed'] . "</td>      
                                    <td>" . $row['dha_reference'] . "</td>
                                    <td>" . $row['dha_case_no'] . "</td>
                                    <td> " . $row['comments'] . "</td>
                                 </tr>";
                        }
                        ?>


                    </table>

                </div>
                <p>&nbsp;</p>
                <input type="hidden" id="datatodisplay" name="datatodisplay">
                <input type="submit" value="Export to Excel">
            </form> 

            </td> </tr></table>