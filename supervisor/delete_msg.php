<?php 
          session_start( );
		  require('class.php');
          $call = new globalm;
		  
	  if( isset( $_GET['id'] ) ) {
	       if( $call->isMSGdeleted( $_GET['id'] ) ) {
		         $_SESSION['message'] = "Your message has been deleted successfully.";
				 header("location:index.php?m=msg");
				 exit;
		   } else {
		        $_SESSION['message'] = "Your message has been deleted successfully.";
				 header("location:index.php?m=msg");
				 exit;
		   }
	  } else if( isset($_POST['del_mult']) ) {
	       if( $_POST['myCheckbox'] == null  ) {
		       $_SESSION['error'] = "<font color='#FF0000'> mark at least one checkbox and hit that button again.";
		       header("location:index.php?m=msg");
			   exit;
		   } else {
		     $isError = false;
		     $my_array = $_POST['myCheckbox'];
			 
			 for( $index = 0; $index < count($my_array); $index++ ) {
			      $del = $my_array[$index];
				 if( $call->isMSGdeleted( $del ) ) {
				     $isError = true;
					 break;
				 } 
			 }
			 
		   
		    if( !$isError ) {
		      $_SESSION['message'] = "Your message(s) has been deleted successfully.";
			  header("location:index.php?m=msg");
			  exit;
			}else{
			  $_SESSION['error'] = "<font color='#FF0000'>An error occured. We are working on it. Please retry later.";
				header("location:index.php?m=msg");
				exit;
			}
		}
	  
	 } else {
	     header("location:index.php?m=msg");
				exit;
	 }	  
?>		  
	  	   