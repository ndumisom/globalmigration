<?php
session_start();
require_once('class.php');
$call = new globalm;

$clientID = $_POST['clientID'];
$service = $_POST['service'];
$permit = $_POST['permit'];
$permit_status = $_POST['permit_status'];
$permit_no= $_POST['permit_no'];
$submission_office = $_POST['submission_office'];
$submission_date = $_POST['submission_date'];
$date_endorsed = $_POST['date_endorsed'];
$expiry_date = $_POST['expiry_date'];
$dha_reference_no = $_POST['dha_reference'];
$dha_case_no = $_POST['dha_case_no'];
$fee = $_POST['fee'];
$invoice_no = $_POST['invoice_no'];
$j_invoice_no = $_POST['j_invoice_no'];
$comments = $_POST['comments'];

	  
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

	        $sql = mysql_query("UPDATE  permit_applications SET
service =  '$service',
permit =  '$permit',
permit_status =  '$permit_status',
permit_no =  '$permit_no',
submission_office =  '$submission_office',
submission_date =  '$submission_date',
date_endorsed =  '$date_endorsed',
expiry_date =  '$expiry_date',
dha_refrence_no =  '$dha_reference_no',
dha_case_no =  '$dha_case_no',
fee =  '$fee',
invoice_no =  '$invoice_no',
j_invoice_no =  '$j_invoice',
comments =  '$comments' WHERE  clientID =$clientID  ;')");
	        if($sql){  
                $_SESSION['msg']="The user was entered succesfuly";
		  header("location:admin_index.php?m=e_permit&id=".$clientID."");
		   exit;
		 }
		 else{
		         $_SESSION['error'] ="Failure please try again.";
			 
		
			  header("location:admin_index.php?m=e_permit&id=".$clientID."");
		           exit;
			  }
}     



?>