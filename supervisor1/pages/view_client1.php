<?php

// Include class
include("nicePaging.php");

// Configuration file
include("config.php");

// Connect to database
$con = mysql_connect($host, $user, $password);
mysql_select_db($database, $con);

// Create instance
$paging = new nicePaging($con);

// Create table
echo ' <div class="style3" id="print_content"> <table class="table table-bordered" border="0" cellspacing="0" cellpadding="0" width="100%" align="center" bordercolor="#0000CC" class="table">';
echo '<tr class="header" valign="top"><th>File no</th><th>Title&nbsp;</th><th>Firstnames</th><th>Surname</th><th>Application&nbsp;Type</th><th>Passport&nbsp;No</th><th>Business&nbsp;Unit</th><th>Contact&nbsp;no</th><th>Email</th><th>Action&nbsp;&nbsp;&nbsp;<a href="javascript:Clickheretoprint()"><div class="icon-print"></div></a></th></tr>';

$rowsPerPage = 10; // Rows per page
// Pager query
$result = $paging->pagerQuery("SELECT *FROM client_details", $rowsPerPage);
while ($data = mysql_fetch_assoc($result)) {
    // Display row
    echo '<tr class="r"><td>' . $data['file_no'] . '</td><td>' . $data['title'] . '</td><td>' . $data['firstnames'] . '</td><td>' . $data['surname'] . '</td><td>' . $data['application_type'] . '</td><td >' . $data['passport_no'] . '</td><td>' . $data['business_unit'] . '</td><td>' . $data['contact_no'] . '</td><td>' . $data['email'] . '</td><td>
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

$link = "index.php"; // Page name

$paging->setMaxPages(4); // Number of paging links that will be displayed per page
// Create links for paging
echo $paging->createPaging($link);
// Close database connection
mysql_close($con);
?>
</div>
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