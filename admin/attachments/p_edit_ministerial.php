<?php
session_start();
require_once('class.php');
$call = new globalm;
$id=$_GET['id'];
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

					$sql = mysql_query("update ministerial set mini_representation='$mini_representation',  date_submitted ='$date_submitted' , ref_no='$ref_no', date_received='$date_received', comments = '$comments' where id=$id");
	        	        if($sql){  
						$_SESSION['msg']="The permit was edited succesfuly";
						header("location:admin_index.php?m=edit_ministerial&id=".$id);
						exit;
						}
						else{
							$_SESSION['error'] ="Failure please try again.".mysql_error();
		
							header("location:admin_index.php?m=dit_ministerial=".$id);
							exit;
						}
}



?>