<?php
session_start();
require_once('class.php');
$call = new globalm;

$permit_appID = $_POST['permit_appID'];
$mini_representation= $_POST['mini_representation'];
$date_submitted = $_POST['date_submitted'];
$ref_no = $_POST['ref_no'];
$date_received = $_POST['date_received'];
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

					$sql = mysql_query("insert into ministerial VALUES ( NULL ,  '$permit_appID', '$mini_representation',  '$date_submitted',  '$ref_no ', '$date_received',  '$comments')");
	        	        if($sql){  
						$_SESSION['msg']="The permit was edited succesfuly";
						header("location:admin_index.php?m=ministerial&id=".$clientID);
						exit;
						}
						else{
							$_SESSION['error'] ="Failure please try again.".mysql_error();
		
							header("location:admin_index.php?m=ministerial&id=".$clientID);
							exit;
						}
}



?>