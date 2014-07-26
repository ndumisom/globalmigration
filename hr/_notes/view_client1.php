<?php

// Include class
include("nicePaging.php");
include_once 'class.php';
// Configuration file
include("config.php");

// Connect to database
$con = mysql_connect($host, $user, $password);
mysql_select_db($database, $con);

// Create instance
$paging = new nicePaging($con);
$call = new globalm;


//get corporate by firstname
$corporate = $call->getFirstname($_SESSION['log']);

?>
<form action="exporttoexcel.php" method="post" 
                  onsubmit='$("#datatodisplay").val( $("<div>").append( $("#ReportTable").eq(0).clone() ).html() )'>
<?
// Create table
echo ' <div class="style3" id="print_content"> <table id="ReportTable" class="tb" border="0" cellspacing="0" cellpadding="0" width="100%" align="center" bordercolor="#0000CC" class="table">';
echo '<tr class="header" valign="top"><th>File No</th><th>Surname</th><th>Firstnames</th><th>Application Type</th><th>Passport No</th><th>Corporate</th><th>Email</th><th>Action &nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:Clickheretoprint()"><img title="print" src="images/Print.png" alt="print" width="40" height="27" /></a></th></tr>';

$rowsPerPage = 10; // Rows per page
// Pager query
$result = $paging->pagerQuery("SELECT *FROM client_details WHERE corporate = '$corporate' or business_unit = '$corporate' ORDER BY surname ", $rowsPerPage);
while ($data = mysql_fetch_assoc($result)) {
    // Display row
    echo '<tr class="r"><td>' . $data['file_no'] . '</td><td>' . $data['surname'] . '</td><td>' . $data['firstnames'] . '</td><td>' . $data['application_type'] . '</td><td >' . $data['passport_no'] . '</td><td>' . $data['corporate'] . '</td><td>' . $data['in_care_email'] . '</td><td><a style="color: #0000FF;" href="index.php?m=edit_client&id=' . $data['clientID'] . '"  onMouseOver="window.status="Click here to go to HTML Goodies"; return true"> <b>Details</b></a> |<a style="color: #0000FF;" href="index.php?m=view_permit&id=' . $data['clientID'] . '"> <b>Permit</b></a> </td></tr>';
}
echo '</table></div>';
?>
   
                <input type="hidden" id="datatodisplay" name="datatodisplay" >
                <input type="submit" value="Export per page" class="login">       
    </form>
 <?
$link = "index.php"; // Page name

$paging->setMaxPages(4); // Number of paging links that will be displayed per page
// Create links for paging
echo $paging->createPaging($link);
// Close database connection
mysql_close($con);
?>
<style type="text/css">

#dialog-overlay {

	/* set it to fill the whil screen */
	width:100%; 
	height:100%;
	
	/* transparency for different browsers */
	filter:alpha(opacity=50); 
	-moz-opacity:0.5; 
	-khtml-opacity: 0.5; 
	opacity: 0.5; 
	background:#000; 

	/* make sure it appear behind the dialog box but above everything else */
	position:absolute; 
	top:0; left:0; 
	z-index:3000; 

	/* hide it by default */
	display:none;
}


#dialog-box {
	
	/* css3 drop shadow */
	-webkit-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
	-moz-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
	
	/* css3 border radius */
	-moz-border-radius: 5px;
    -webkit-border-radius: 5px;
	
	background:#eee;
	/* styling of the dialog box, i have a fixed dimension for this demo */ 
	width:328px; 
	
	/* make sure it has the highest z-index */
	position:absolute; 
	z-index:5000; 

	/* hide it by default */
	display:none;
}

#dialog-box .dialog-content {
	/* style the content */
	text-align:left; 
	padding:10px; 
	margin:13px;
	color:#666; 
	font-family:arial;
	font-size:11px; 
}

a.button1 {
	/* styles for button */
	margin:10px auto 0 auto;
	text-align:center;
	background-color: #e33100;
	display: block;
	width:50px;
	padding: 5px 10px 6px;
	color: #fff;
	text-decoration: none;
	font-weight: bold;
	line-height: 1;
	
	/* css3 implementation :) */
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-box-shadow: 0 1px 3px rgba(0,0,0,0.5);
	-webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.5);
	text-shadow: 0 -1px 1px rgba(0,0,0,0.25);
	border-bottom: 1px solid rgba(0,0,0,0.25);
	position: relative;
	cursor: pointer;
	
}

a.button1:hover {
	background-color: #c33100;	
}

/* extra styling */
#dialog-box .dialog-content p {
	font-weight:700; margin:0;
}

#dialog-box .dialog-content ul {
	margin:10px 0 10px 20px; 
	padding:0; 
	height:50px;
}



</style>

<div id="dialog-overlay"></div>
<div id="dialog-box">
	<div class="dialog-content">
		<div id="dialog-message"> </div>
		<a href="#" class="button1">Close</a>
	</div>
</div>