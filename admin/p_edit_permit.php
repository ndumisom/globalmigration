<?php
session_start();
require_once('class.php');
$call = new globalm;

$clientID = trim($_POST['clientID']);
$servic = $_POST['service'];
if ($servic != 0) {
    $service = implode("; ", $servic);
} else {
    $service = $_POST['service'];
}
$permit = mysql_real_escape_string(trim($_POST['permit']));
$permit_status = trim($_POST['permit_status']);
$pre_submission_date = trim($_POST['pre_submission_date']);
$memo_issue_date = trim($_POST['memo_issue_date']);
$permit_no= trim($_POST['permit_no']);
$submission_office = trim($_POST['submission_office']);
$submission_date = trim($_POST['submission_date']);
$date_endorsed = trim($_POST['date_endorsed']);
$expiry_date = trim($_POST['expiry_date']);
$process_by = trim($_POST['process_by']);
$dha_reference_no = trim($_POST['dha_refrence_no']);
$dha_case_no = trim($_POST['dha_case_no']);
$fee = trim($_POST['fee']);
$invoice_no = trim($_POST['invoice_no']);
$j_invoice_no = trim($_POST['j_invoice_no']);
$eligible_for_pr = trim($_POST['eligible_for_pr']);
$comments = mysql_real_escape_string(trim($_POST['comments']));
$id = trim($_POST['id']);

	  
	if( isset( $_POST['Submit'] ) ){
	    /*
		  if(trim($permit =='')){
		  $_SESSION['error']="Please enter permit.";
		  header("location:admin_index.php?m=permit");
		  exit;
		 
		  }
		  else if(trim($permit_no == '')){
		  $_SESSION['error']="Please enter permit number";
		  header("location:admin_index.php?m=permit");
		  exit;
		 
		  }
		
		  else if(trim($permit_status =='')){
		  $_SESSION['error']="Please enter permit status.";
		  header("location:admin_index.php?m=permit");
		  exit;
		 
		  }
		    else if(trim($submission_office =='')){
		  $_SESSION['error']="Please enter the  Surname.";
		  header("location:admin_index.php?m=permit");
		  exit;
		 
		  }
		
	  
	 */

	        $sql = mysql_query("UPDATE permit_applications SET  service =  '$service', permit =  '$permit', permit_status =  '$permit_status', pre_submission_date = '$pre_submission_date', memo_issue_date = '$memo_issue_date', permit_no ='$permit_no', submission_office =  '$submission_office', submission_date =  '$submission_date', date_endorsed =  '$date_endorsed', expiry_date =  '$expiry_date', process_by = '$process_by', dha_refrence_no =  '$dha_reference_no', dha_case_no =  '$dha_case_no', fee =  '$fee', invoice_no =  '$invoice_no', j_invoice_no =  '$j_invoice_no', eligible_for_pr = '$eligible_for_pr', comments=  '$comments' WHERE  `permit_appID`='$clientID'");
	        $update = mysql_query("insert into updated values(0, $id, $clientID, '$permit_status', NOW(),'0000-00-00',0)");
                if($sql and $update){
                
                $_SESSION['msg']="The permit was edited succesfuly";
		 header("location:admin_index.php?m=e_permit&id=".$clientID);
		   exit;
		 }
		 else{
		      $_SESSION['error'] ="Failure please try again.". mysql_error();
		
			  header("location:admin_index.php?m=e_permit&id=".$clientID);
		           exit;
			  }
}



?>