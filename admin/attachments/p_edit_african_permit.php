<?php
session_start();
require_once('class.php');
$call = new globalm;

$clientID = $_POST['clientID'];


$servic = $_POST['service'];
if ($servic != 0) {
    $service = implode("; ", $servic);
} else {
    $service = $_POST['service'];
}
$permit = $_POST['permit'];
$permit_status = $_POST['permit_status'];
$fees = $_POST['fees'];
$contact_dept = $_POST['contact_dept'];
$contact_partner = $_POST['contact_partner'];
$contact_embassy = $_POST['contact_embassy'];
$expiry_date = $_POST['expiry_date'];
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

	        $sql = mysql_query("UPDATE african_permit SET service = '$service', permit = '$permit', permit_status = '$permit_status', fees = '$fees', contact_dept = '$contact_dept', contact_partner = '$contact_partner', contact_embassy =  '$contact_embassy', `expiry_date` =  '$expiry_date', comments = '$comments' WHERE  `a_permitId`='$clientID'");
	        if($sql){  
                $_SESSION['msg']="The permit was edited succesfuly";
		 header("location:admin_index.php?m=e_a_permit&id=".$clientID);
		   exit;
		 }
		 else{
		      $_SESSION['error'] ="Failure please try again.";
		
			  header("location:admin_index.php?m=e_a_permit&id=".$clientID);
		           exit;
			  }
}



?>