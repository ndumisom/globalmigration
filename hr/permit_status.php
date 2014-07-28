


<?php
// Include class
include("nicePaging1.php");
include_once 'class.php';
// Configuration file
include("config.php");

// Connect to database
$con=mysql_connect($host, $user, $password);
mysql_select_db($database, $con);

// Create instance
$paging=new nicePaging($con);
$call = new globalm;
$firstname = $call->getFirstname($_SESSION['log']);
// Create table
// Create table
?>
<form action="exporttoexcel.php" method="post" 
                  onsubmit='$("#datatodisplay").val( $("<div>").append( $("#ReportTable").eq(0).clone() ).html() )'>
<?
echo '<div class="style3" id="print_content"><table class="tb" id="ReportTable" border="0" cellspacing="0" cellpadding="0" width="100%" align="center" bordercolor="#0000CC" class="table">';
	echo '<tr class="header" valign="top"><th>File No</th><th>Surname</th><th>Firstnames</th><th>Application Type</th><th>Passport No</th><th>Permit</th><th>Permit Status</th><th>Expiry&nbspDate</th><th valign="top">Action &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:Clickheretoprint()"><img title="print" src="images/Print.png" alt="print" width="40" height="27" /></a></th></tr>';
	
	$rowsPerPage=10; // Rows per page
	
	// Pager query
	$result=$paging->pagerQuery("SELECT *FROM client_details,permit_applications WHERE client_details.clientID=permit_applications.clientID AND corporate = '$firstname' ORDER BY surname", $rowsPerPage);
	while($data=mysql_fetch_assoc($result)){
		// Display row
		echo '<tr class="r"><td>'.$data['file_no']. '</td><td>'.$data['surname']. '</td><td>' .$data['firstnames'].'</td><td>'.$data['application_type']. '</td><td >'.$data['passport_no'].'</td><td>'.$data['permit'].'</td><td>'.$data['permit_status'].'</td><td>'.$data['expiry_date'].'</td><td><a style="color: #0000FF;" href="index.php?m=edit_client&id='.$data['clientID'].'"> <b>Details</b></a> |<a style="color: #0000FF;" href="index.php?m=view_permit&id='.$data['clientID'].'" alt="Click here to view details"> <b>Permit</b></a></td></tr>';
	}
        
echo '</table></div>';
?>
     
                <input type="hidden" id="datatodisplay" name="datatodisplay" >
                <input type="submit" value="Export per page" class="login">       
    </form>
 <?

$link="index.php?m=status"; // Page name

$paging->setMaxPages(4); // Number of paging links that will be displayed per page

// Create links for paging
echo $paging->createPaging($link);
// Close database connection
mysql_close($con);
?>
