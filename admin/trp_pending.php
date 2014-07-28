<style type="text/css">
.button4 {
	-webkit-box-shadow:rgba(0,0,0,0.98) 0 1px 0 0;
	-moz-box-shadow:rgba(0,0,0,0.98) 0 1px 0 0;
	box-shadow:rgba(0,0,0,0.98) 0 1px 0 0;
	background-color:#EEE;
	border-radius:0;
	-webkit-border-radius:0;
	-moz-border-radius:0;
	border:1px solid #999;
	color:#666;
	font-family:'Lucida Grande',Tahoma,Verdana,Arial,Sans-serif;
	font-size:11px;
	font-weight:700;
	padding:2px 6px;
	height:28px
}

 a:hover{
     
 	background-color:#0000FF;    
	font-size:12px;
	color:#FFF;
       
}

   a:active{
 	background-color:#0000FF;    
	font-size:12px;
	color:#FFF;
       
}
</style>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.pack.js"></script>
<script type="text/javascript">
        $(document).ready(
                function(){
                        $('#clear').fadeOut(6000);
                }
        );
  $("#pending:submit").submit(function(){
		$(":submit", this).attr("disabled","disabled").val("Please wait....");
	});
            $(function() {
	$(" a").each(function() {
		if (this.href == window.location) {
			$(this).css("color", "#FFF");
                        $(this).css("background-color", "#0000FF");
		};
	});
});
</script>

</script>


<?php
echo '<div id="clear">';
if( isset($_SESSION['msg']) ){echo '<span id="msg"><b>'. $_SESSION['msg'].'</b></span>'; unset($_SESSION['msg']);}
if( isset($_SESSION['error']) ){echo '<span id="error"><b>'. $_SESSION['error'].'</b></span>'; unset($_SESSION['error']);}
echo '</div>';
// Include class
include("nicePaging1.php");

// Configuration file
include("config.php");

// Connect to database
$con = mysql_connect($host, $user, $password);
$i = 0;
mysql_select_db($database, $con);

// Create instance
$paging = new nicePaging($con);

// Create table
// Create table


echo '<a class="button4" href="admin_index.php?m=pr_pending"> PR Pending</a>&nbsp;&nbsp; <a class="button4" href="admin_index.php?m=trp_pending"> TRP Pending</a>';
echo '<table class="tb" border="0" cellspacing="0" cellpadding="0" width="100%" align="center" bordercolor="#0000CC" class="table">';
echo '<form name="pending" action="p_trp_pending.php" method="post" class="uniForm"  id="pending"><tr class="header" valign="top"><th>File no</th><th>Title&nbsp;</th><th>Firstnames</th><th>Surname</th><th>Email</th><th>Contact&nbsp;No</th><th>Mobile&nbsp;No</th><th>Permit</th><th>Permit Status</th><th>Action &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:window.print()"><img title="print" src="images/Print.png" alt="print" width="40" height="27" /></a></th></tr>';

$rowsPerPage = 17; // Rows per page
// Pager query
$result = $paging->pagerQuery("select *from client_details, updated, permit_applications where updated.permit_appID = permit_applications.permit_appID and updated.clientID = client_details.clientID and sent = 0 and permit_applications.permit not like 'Permanent Residence Permit%' and permit_applications.permit_status = 'Pending at DHA'", $rowsPerPage);
$num = mysql_num_rows($result);
while ($data = mysql_fetch_assoc($result)) {
    $i++;
    // Display row
    echo '<tr class="row" valign="top"><td>' . $data['file_no'] . '</td>
        <td>' . $data['title'] . '<input type="hidden" name="file_no[]" value="'.$data['file_no'].'"/></td>
        <td>' . $data['firstnames'] . '<input type="hidden" name="firstnames[]" value="'.$data['firstnames'].'"/></td>
        <td>' . $data['surname'] . '<input type="hidden" name="surname[]" value="'.$data['surname'].'"/></td>
        <td>' . $data['email'] . '<input type="hidden" name="email[]" value="'.$data['email'].'"/></td>
        <td >' . $data['contact_no'] . '<input type="hidden" name="contact_no[]" value="'.$data['contact_no'].'"/></td>
		<td >' . $data['mobile_no'] . '<input type="hidden" name="mobile_no[]" value="'.$data['mobile_no'].'"/></td>
        <td>' . $data['permit'] . '<input type="hidden" name="permit[]" value="'.$data['permit'].'"/></td>
        <td>' . $data['permit_status_history'] . '<input type="hidden" name="permit_status_history[]" value="'.$data['permit_status_history'].'"/></td>
        <td> <input type="checkbox" name="id[]"  id="selectAll" value="'.$data['id'].'" class="check_box" />
            <input type="hidden" name="num" value="'.$num.'" />
            <input type="hidden" name="consultant" value="'.$data['consultant'].'" />
                </td></tr>';
}

if($num == null){
 echo '<tr><td colspan="8" style="color: red;"><br/><b> No update files </b><br><br></td></tr>';
}
echo '<tr><td colspan="10"><input type="submit" name="Submit" value="Send email" class="login"  id="submit"/><input type="submit" name="sms" value="Send sms" class="login"  id="submit"/></form></td></tr>';
echo '</table>';

$link = "admin_index.php?m=updates"; // Page name

$paging->setMaxPages(4); // Number of paging links that will be displayed per page
// Create links for paging
echo $paging->createPaging($link);
// Close database connection
mysql_close($con);
?>
