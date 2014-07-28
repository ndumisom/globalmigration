


<?php
// Include class
include("nicePaging1.php");

// Configuration file
include("config.php");

//date
 $expiry_date =  date( 'Y-m-d',time( ) + (32 * 24 * 60 * 60) );

// Connect to database
$con=mysql_connect($host, $user, $password);
mysql_select_db($database, $con);

// Create instance
$paging=new nicePaging($con);

// Create table
// Create table
echo '<div class="style3" id="print_content"><table class="tb" border="0" cellspacing="0" cellpadding="0" width="100%" align="center" bordercolor="#0000CC" class="table">';
	echo '<tr class="header" valign="top"><th>File no</th><th>Firstnames</th><th>Surname</th><th>Permit</th><th>Permit Status</th><th>Expiry Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:Clickheretoprint()"><img title="print" src="images/Print.png" alt="print" width="40" height="27" /></a></th></tr>';
	
	$rowsPerPage=15; // Rows per page
	
	// Pager query
	$result=$paging->pagerQuery("SELECT * FROM client_details, permit_applications WHERE permit_applications.expiry_date <  '$expiry_date' AND client_details.clientID=permit_applications.clientID ORDER BY expiry_date DESC", $rowsPerPage);
	while($data=mysql_fetch_assoc($result)){
		// Display row
		echo '<tr class="r"><td>' .$data['file_no']. '</td><td>'.$data['firstnames']. '</td><td>' .$data['surname'].'</td><td>'.$data['permit'].'</td><td>'.$data['permit_status'].'</td><td>'.$data['expiry_date'].'</td></tr>';
	}
echo '</table></div>';

$link="admin_index.php?m=expiry"; // Page name

$paging->setMaxPages(4); // Number of paging links that will be displayed per page

// Create links for paging
echo $paging->createPaging($link);
// Close database connection
mysql_close($con);
?>
