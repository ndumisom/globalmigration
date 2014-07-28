<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//include class db connector

include_once 'class.php';

$four_months = date('Y-m-d', time() + (120 * 24 * 60 * 60));
$five_months = date('Y-m-d', time() + (150 * 24 * 60 * 60));
$six_months = date('Y-m-d', time() + (180 * 24 * 60 * 60));
$twelve_months = date('Y-m-d', time() + (363 * 24 * 60 * 60));

// Finalised awaiting permit Remind

$objConnect = mysql_connect("localhost", "root", "mapapa1531") or die(mysql_error());
$objDB = mysql_select_db("globalmigration_db");

function check_finalised() {
    $four = date('Y-m-d', time() + (120 * 24 * 60 * 60));
    $status = 'Finalised awaiting permit';
    $query = mysql_query("select firstnames, surname, permit_status_history, DATE(time_updated) expiry_date from client_details, permit_applications, updated where updated.permit_status_history='$status' and client_details.clientID=permit_applications.clientID and updated.clientID = client_details.clientID LIMIT 4");
    $row = mysql_fetch_array($query);
    if ($row == true) {
        return $row['permit_status_history'];
    } else {
        return false;
    }
}

$strSQL = "select firstnames, surname, permit_status_history, DATE(time_updated) expiry_date from client_details, permit_applications, updated where client_details.clientID=permit_applications.clientID and updated.clientID = client_details.clientID LIMIT 4;";
$objQuery = mysql_query($strSQL);
$numrows = mysql_num_rows($objQuery);

if ($numrows > 0 && $_SESSION['count'] < 1 && check_finalised()) {
    ?>
    <div id="overlay" class="overlay"></div>
    <div id="boxpopup" class="box">
        <a onclick="closeOffersDialog('boxpopup');" class="boxclose"></a>
        <div id="content1">
            <h3> <font color="red"><b> * <u>Expiring Permits</u> *</b></font></h3>

            <?
            while ($row = mysql_fetch_array($objQuery)) {
              
                    echo "<ol> &nbsp; " . $row['firstnames'] . " &nbsp;
                   &nbsp; " . $row['surname'] . " &nbsp;
                   &nbsp; " . $row['expiry_date'] . " &nbsp; </ol><br/>";
                }
            
        }
        ?>

        <br/>
        <?
        $four = date('Y-m-d', time() + (2 * 24 * 60 * 60));
        echo $four;
        ?>
        <br/>
        click <a href="#" onClick="Notifier()"> here </a> to view expiring permit list.
        
    </div>
</div>



