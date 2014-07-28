
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
echo '<table class="tb" border="0" cellspacing="0" cellpadding="0" width="100%" align="center" bordercolor="#0000CC" class="table">';
	echo '<tr class="header" valign="top"><th>Username</th><th>Firstnames</th><th>Surname</th><th>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:window.print()"><img title="print" src="images/Print.png" alt="print" width="40" height="27" /></a></th></tr>';
	
	$rowsPerPage=25; // Rows per page
	
	// Pager query
	$result=$paging->pagerQuery("SELECT *FROM users ORDER BY surname", $rowsPerPage);
	while($data=mysql_fetch_assoc($result)){
		// Display row
		echo '<tr class="row"><td>' .$data['username']. '</td><td>'.$data['firstname']. '</td><td>' .$data['surname'].'</td><td>' .$data['email'].'</td></tr>';
	}
echo '</table>';

$link="admin_index.php?m=view_users"; // Page name

$paging->setMaxPages(4); // Number of paging links that will be displayed per page

// Create links for paging
echo $paging->createPaging($link);
// Close database connection
mysql_close($con);
?>
