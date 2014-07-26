


<?php
// Include class
include("nicePaging.php");

// Configuration file
include("config.php");

// Connect to database
$con=mysql_connect($host, $user, $password);
mysql_select_db($database, $con);

// Create instance
$paging=new nicePaging($con);

// Create table
echo '<table border="1" cellspacing="0" cellpadding="0" width="100%" align="center" bordercolor="#0000CC" class="table">';
	echo '<tr class="header"><th>Firstnames</th><th>Surname</th><th>Application Type</th><th>Passport No</th><th>Corporate</th><th>Permit Type</th><th>Expiry Date</th><th>Permit Status</th><th>Actions</th></tr>';
	
	$rowsPerPage=20; // Rows per page
	
	// Pager query
	$result=$paging->pagerQuery("SELECT *FROM client_details,permit_applications WHERE client_details.clientID = permit_applications.clientID ORDER BY file_no AND corporate = 'sasol' ", $rowsPerPage);
	while($data=mysql_fetch_assoc($result)){
		// Display row
		echo '<tr class="row"><td>'.$data['firstnames']. '</td><td>' .$data['surname'].'</td><td>'.$data['application_type']. '</td><td >'.$data['passport_no'].'</td><td>'.$data['corporate'].'</td><td>'.$data['permit_type'].'</td><td>'.$data['expiry_date'].'</td><td>'.$data['permit_status'].'</td><td> <a href="admin_index.php?m=edit_client&id='.$data['clientID'].'">View</a><a href="admin_index.php?m=e_permit&id='.$data['clientID'].'"> Permit</a> | <a href="index.php?m=activity&id=' . $row['clientID'] . '"><b>request</b></a></td></tr>';
	}
echo '</table>';

$link="admin_index.php"; // Page name

$paging->setMaxPages(4); // Number of paging links that will be displayed per page

// Create links for paging
echo $paging->createPaging($link);
// Close database connection
mysql_close($con);
?>
