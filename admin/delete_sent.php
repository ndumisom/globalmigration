<?php 
          session_start( );
		  require('class.php');
$call = new globalm;
		  
	  if( isset( $_GET['id'] ) ) {
	       if( $call->isSENTMSGdeleted( $_GET['id'] ) ) {
		         $_SESSION['message'] = "Your message has been deleted successfully.";
				 header("location:admin_index.php?m=sent_msg");
				 exit;
		   } else {
		        $_SESSION['message'] = "Your message has been deleted successfully.";
				 header("location:admin_index.php?m=sent_msg");
				 exit;
		   }
	  } else if( isset($_POST['del_mult']) ) {
	       if( $_POST['myCheckbox'] == null  ) {
		       $_SESSION['message'] = "Please mark at least one checkbox and hit that button again.";
		       header("location:admin_index.php?m=sent_msg");
			   exit;
		   } else {
		     $isError = false;
		     $my_array = $_POST['myCheckbox'];
			 
			 for( $index = 0; $index < count($my_array); $index++ ) {
			      $del = $my_array[$index];
				 if( $call->isSENTMSGdeleted( $del ) ) {
				     $isError = true;
					 break;
				 } 
			 }
		   
		    if( !$isError ) {
		      $_SESSION['message'] = "Your message(s) has been deleted successfully.";
			  header("location:admin_index.php?m=sent_msg");
			  exit;
			}else{
			  $_SESSION['error'] = "An error occured. We are working on it. Please retry later.";
				header("location:admin_index.php?m=sent_msg");
				exit;
			}
		}
	  
	 } else {
	     header("location:admin_index.php?m=sent_msg");
				exit;
	 }	  
?>		  
	  	  