<?php 
          session_start( );
		  require('class.php');
$call = new globalm;
		  
	  if( isset( $_GET['id'] ) ) {
	       if( $call->isTask( $_GET['id'] ) ) {
		         $_SESSION['message'] = "Task has been removed completely.......";
				 header("location:index.php?m=show_task");
				 exit;
		   } else {
		        $_SESSION['message'] = "An error occured. We are working on it. Please retry later.";
				header("location:index.php?m=show_task");
				exit;
		   }
	  } else if( isset($_POST['del_mult']) ) {
	       if( $_POST['myCheckbox'] == null  ) {
		       $_SESSION['message'] = "Please mark at least one checkbox and hit that button again.";
		       header("location:index.php?m=show_task");
			   exit;
		   } else {
		     $isError = false;
		     $my_array = $_POST['myCheckbox'];
			 
			 for( $index = 0; $index < count($my_array); $index++ ) {
			      $del = $my_array[$index];
				 if( !$call->isTask( $del ) ) {
				     $isError = true;
					 break;
				 } 
			 }
		   
		    if( !$isError ) {
		      $_SESSION['message'] = "Your Task(s) has been deleted successfully.";
			  header("location:index.php?m=show_task");
			  exit;
			}else{
			  $_SESSION['message'] = "An error occured. We are working on it. Please retry later.";
				header("location:index.php?m=show_task");
				exit;
			}
		}
	  
	 } else {
	     header("location:index.php?m=show_task");
				exit;
	 }	  
?>		  
	  	   