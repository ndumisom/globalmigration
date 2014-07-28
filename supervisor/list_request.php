


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
echo '<div class="style3" id="print_content"><table class="tb" border="0" cellspacing="0" cellpadding="0" width="100%" align="center" bordercolor="#0000CC" class="table">';
	echo '<tr class="header" valign="top"><th>File no</th><th>Title&nbsp;</th><th>Firstnames</th><th>Surname</th><th> Required By </th><th> Request</th><th>Invoice No</th><th>Approved by</th><th>Allocated to</th><th valign="top">Action &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:Clickheretoprint()"><img title="print" src="images/Print.png" alt="print" width="40" height="27" /></a></th></tr>';
	
	$rowsPerPage=15; // Rows per page
	
	// Pager query
	$result=$paging->pagerQuery("SELECT *FROM client_details,task_request WHERE client_details.clientID=task_request.clientID", $rowsPerPage);
	while($data=mysql_fetch_assoc($result)){
		// Display row
		echo '<tr class="r"><td>' .$data['file_no']. '</td><td>' .$data['title']. '</td><td>'.$data['firstnames']. '</td><td>' .$data['surname'].'</td><td>'.$data['required_by']. '</td><td >'.strip_tags(substr($data['request'], 0, 35)).'</td><td>'.$data['invoice_no'].'</td><td>'.$data['approved_by'].'</td><td>'.$data['allocated_to'].'</td><td><a style="color: #0000FF;" href="index.php?m=view_request&id='.$data['task_requestID'].'"> <b>View </b></a></td></tr>';
	}
echo '</table></div>';

$link="index.php?m=task_request"; // Page name

$paging->setMaxPages(4); // Number of paging links that will be displayed per page

// Create links for paging
echo $paging->createPaging($link);
// Close database connection
mysql_close($con);
?>
