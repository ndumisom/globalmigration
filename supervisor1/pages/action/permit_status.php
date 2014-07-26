


<?php
// Include class
include("nicePaging1.php");

// Configuration file
include("config.php");

// Connect to database
$con=mysql_connect($host, $user, $password);
mysql_select_db($database, $con);

// Create instance
$paging=new nicePaging($con);

// Create table
// Create table
echo '<div class="style3" id="print_content">
    <table class="table table-bordered" border="0" cellspacing="0" cellpadding="0" width="100%" align="center" bordercolor="#0000CC" class="table">';
	echo '<tr class="header" valign="top">
            <th>File no</th>
            <th>Title&nbsp;</th>
            <th>Firstnames</th>
            <th>Surname</th>
            <th>Application Type</th>
            <th>Passport No</th>
            <th>Permit</th>
            <th>Permit Status</th>
            <th>Expiry&nbsp;Date</th>
            <th valign="top">Action&nbsp;&nbsp;<a href="javascript:Clickheretoprint()"><div class="icon-print"></div></a></th>
            </tr>';
	
	$rowsPerPage=10; // Rows per page
	
	// Pager query
	$result=$paging->pagerQuery("SELECT *FROM client_details,permit_applications WHERE client_details.clientID=permit_applications.clientID", $rowsPerPage);
	while($data=mysql_fetch_assoc($result)){
            // Display row
            echo '<tr class="r"><td>' .$data['file_no']. '</td><td>' .$data['title']. '</td><td>'.$data['firstnames']. '</td><td>' .$data['surname'].'</td><td>'.$data['application_type']. '</td><td >'.$data['passport_no'].'</td><td>'.$data['permit'].'</td><td>'.$data['permit_status'].'</td><td>'.$data['expiry_date'].'</td>
                <td>
                    <div class="btn-group">
                        <button class="btn btn-small dropdown-toggle btn-primary" data-toggle="dropdown">
                            Action
                            <span class="caret"></span>
                        </button>
                    <ul class="dropdown-menu">
                        <li><a href="">Send Memo</a></li>
                        <li><a href="index.php?page=edit_client&id=' . $data['clientID'] . '">Details</a></li>
                        <li><a href="index.php?page=view_permit&id=' . $data['clientID'] . '">Permit</a></li>
                        <li><a href="index.php?page=activity&id=' . $data['clientID'] . '">Activity</a></li>
                        <li><a href="index.php?page=request&id=' . $data['clientID'] . '">Request</a></li>
                        <li><a href="index.php?page=history&id=' . $data['clientID'] . '">History</a></li>
                    </ul>
                  </div>  
             </td></tr>';
	}
echo '</table></div>';

$link="index.php?page=status"; // Page name

$paging->setMaxPages(4); // Number of paging links that will be displayed per page

// Create links for paging
echo $paging->createPaging($link);
// Close database connection
mysql_close($con);
?>
</div>