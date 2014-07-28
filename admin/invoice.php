

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


echo '<table class="tb" border="0" cellspacing="0" cellpadding="0" width="100%" align="center" bordercolor="#0000CC" class="table">';
echo '<tr class="header" valign="top"><th>Invoice No</th><th>file No</th><th>First name</th><th>Surname</th><th>Date</th><th>Consultant</th><th>Tolal</th><th>Action &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:window.print()"><img title="print" src="images/Print.png" alt="print" width="40" height="27" /></a></th></tr>';

$rowsPerPage = 17; // Rows per page
// Pager query
$result = $paging->pagerQuery("select *from invoice, invoice_description, client_details where client_details.file_no = invoice.file_no and invoice.invoice_id = invoice_description.invoice_id group by client_details.file_no", $rowsPerPage);
$num = mysql_num_rows($result);
while ($data = mysql_fetch_assoc($result)) {
    $i++;
    // Display row
    echo '<tr class="row" valign="top">
        <td>' . $data['invoice_no'] . '</td>
		<td>' . $data['file_no'] . '</td>
        <td>' . $data['f_name'] . '</td>
        <td>' . $data['surname'] . '<input type="hidden" name="surname[]" value="'.$data['surname'].'"/></td>
        <td >' . $data['date'] . '<input type="hidden" name="contact_no[]" value="'.$data['contact_no'].'"/></td>
        <td>' . $data['consultant'] . '<input type="hidden" name="permit[]" value="'.$data['permit'].'"/></td>
        <td>R' . $data['total'] . '<input type="hidden" name="email[]" value="'.$data['email'].'"/></td>
        <td><a style="color: #0000FF;" href="admin_index.php?m=view_invoice&id='.$data['invoice_id'].'">  <b>View </b></a>
            <input type="hidden" name="num" value="'.$num.'" />
            <input type="hidden" name="consultant" value="'.$data['consultant'].'" />
                </td></tr>';
}

if($num == null){
 echo '<tr><td colspan="8" style="color: red;"><br/><b> No update files </b><br><br></td></tr>';
}
echo '</table>';

$link = "index.php?m=list_quote"; // Page name

$paging->setMaxPages(4); // Number of paging links that will be displayed per page
// Create links for paging
echo $paging->createPaging($link);
// Close database connection
mysql_close($con);
?>
