<? session_start();

$objConnect = mysql_connect("localhost","root","mapapa1531") or die(mysql_error());
	$objDB = mysql_select_db("globalmigration_db");  



$date_required = trim($_POST['date_required']);
$clientID= trim($_POST['clientID']);
$required_by = trim($_POST['required_by']);
$reques = $_POST['request'];
if ($reques != 0) {
    $request = implode("; ", $reques);
} else {
    $request = $_POST['request'];
}

$request_other = trim($_POST['request_other']);
$invoice_no = trim($_POST['invoice_no']);
$receipt_no = trim($_POST['receipt_no']);
$approved_by = trim($_POST['approved_by']);
$consultant = trim($_POST['consultant']);
$allocated_to = trim($_POST['allocated_to']);
$allocated_date = trim($_POST['allocated_date']);
$completed_by = trim($_POST['completed_by']);
$completed_date = trim($_POST['completed_date']);
$client_name = $_POST['client_name'];
$file_no = $_POST['file_no'];

//Message

$sender = "Updates";  
$subject = "Task Request Updates";
$text = 'Client Name : '.$client_name.'\t\t\t';
$text .= 'File No : '.$file_no.'\n\n';
$text .= 'Consultant : '.$consultant.'\n';
$text .='Task Requested : \n'.$request.'\n';
$text .= 'Other: \n'.$request_other;
$arrto = $_POST['to'];
$status = 1;


if (isset($_POST['Submit'])) {
        $sql = mysql_query(" insert into task_request VALUES(NULL ,  '$clientID', '$date_required',  '$required_by',  '$request',  '$request_other',  '$invoice_no',  '$receipt_no',  '$approved_by',  '$consultant',  '$allocated_to',  '$allocated_date',  '$completed_by',  '$completed_date')");
        //if ($call->add_task_request( $clientID, $required_by, $request, $request_other, $invoice_no, $receipt_no, $approved_by, $consultant, $allocated_to, $allocated_date, $completed_by, $completed_date)) {
        if( $sql){
            foreach ($arrto as $to){
              mysql_query(" insert into message values( NULL, '$sender', '$subject', '$text', NOW(), '$to', '$from', '$status' ,0) ");    
            }
        $_SESSION['message'] = "Your Task Request has been sent stored.";
        header("location:index.php?m=request&id=".$clientID );
        exit;
    } else {
        $_SESSION['error'] = "An error occured. We are working on it. Please retry later.";
        header("location:index.php?m=request&id=".$clientID);
        exit;
   }
}
?>