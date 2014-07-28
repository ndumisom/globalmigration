<?php
session_start();
require_once('class.php');
$call = new globalm;

$clientID = $_POST['clientID'];
$c_permit = $_POST['c_permit'];
$c_permit_status = $_POST['c_permit_status'];
$c_permit_no = $_POST['c_permit_no'];
$c_permit_expiry = $_POST['c_permit_expiry'];
$c_permit_comment = $_POST['c_permit_comment'];

	  
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

	        $sql = mysql_query("UPDATE current_permit SET c_permit = '$c_permit', c_permit_status = '$c_permit_status', c_permit_no = '$c_permit_no', c_permit_expiry = '$c_permit_expiry', c_permit_comment=  '$c_permit_comment' WHERE  `current_permitID`='$clientID'");
	        if($sql){  
                $_SESSION['msg']="The permit was edited succesfuly";
		 header("location:admin_index.php?m=e_c_permit&id=".$clientID);
		   exit;
		 }
		 else{
		      $_SESSION['error'] ="Failure please try again.";
		
			  header("location:admin_index.php?m=e_c_permit&id=".$clientID);
		           exit;
			  }
}



?>