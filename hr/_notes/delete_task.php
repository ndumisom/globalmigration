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
		        $_SESSION['message'] = "Task has been completed and removed.";
				header("location:index.php?m=show_task");
				exit;
		   }
	  } 
		   
	  else {
	     header("location:index.php?m=show_task");
				exit;
	 }	  
?>		  
	  	   