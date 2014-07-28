<?php 
          session_start( );
		  
		  require( 'class.php' );
		  $call = new globalm;
		  
		  $msg_id = 0;
                  $id = $_POST['msg_id'];
		  $sender = $_SESSION['log'];
		  $subject = $_POST['subject'];
		  $text = $_POST['msg'];
		  $to = $_POST['sender'];
		  $from = $call->getEmail($_SESSION['log']);
		  $status = 1;
		   
	  if( isset( $_POST['reply'] ) ) {
	         
			 if( $subject == null ) $subject = '( no subject )';
			 
	         if( $text == '' ) {
			     $_SESSION['error'] = "Please enter your text message.";
				 header("location:admin_index.php?m=reply");
				 exit;
			 }else if ($call->getUsername($to) == '' || $call->getUsername($to) == NULL) {
                                $_SESSION['error'] = "The username does not exit.";
                                header("location:admin_index.php?m=reply&id=".$id);
                                exit;
                               }  else if( $call->send_message( $msg_id, $sender, $subject, $text, $msg_date, $to, $from, $status ) ) {
			     $_SESSION['message'] = "You have replied successfully.";
				 header("location:admin_index.php?m=msg");
				 exit;
			 } else { 
			     $_SESSION['error'] = "An error occured. We are working on it. Please retry later.";
				 header("location:admin_index.php?m=reply&id=".$id);
				 exit;
			 }
	  
	  
	  }	   
		