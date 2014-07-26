<?php 
              session_start( );
			require '../../client/class.php';
              $call = new globalm;
			  $oldPSWD = $_POST['opassword'];
			  $newPSWD = $_POST['npassword'];
			  $veriyPSWD = $_POST['vpassword'];
			  
		if(	isset( $_POST['change'] ) ) {
                    if(!$oldPSWD){
                        $_SESSION['error'] = "Please Enter your old password.";
				  header("location: change_password.php");
				  exit;
                    }
                    if(!$newPSWD){
                        $_SESSION['error'] = "Please enter your new password.";
				  header("location: change_password.php");
				  exit;
                    }
                    if(!$newPSWD){
                        $_SESSION['error'] = "Please enter you new password.";
				  header("location: change_password.php");
				  exit;
                        
                    }
		     if( !$call->isPswdCorrect( $oldPSWD, $_SESSION['id'] ) ){
			      $_SESSION['error'] = "Your old password is incorrect.";
				  header("location: change_password.php");
				  exit;
			 } else if( strlen($newPSWD) <4 || strlen($newPSWD) > 20 ) {
				  $_SESSION['error'] = 'Password must consist of length between 4 and 20 characters.';
				  header("location: change_password.php");
				  exit;
			 }else if( $newPSWD != $veriyPSWD ){
				  $_SESSION['error'] = 'Please confirm your password correctly.';
				  header("location: change_password.php");
				  exit;
			 }else if( $call->updatePSWD( $_SESSION['id'], $newPSWD ) ) {
			      $_SESSION['message'] = 'Your account has been changed successfully.';
				  header("location: change_password.php");
				  exit;
			 }else {
			     $_SESSION['error'] = 'An error occured while we were updating your account. We are working on it. Retry later.';
				 header("location: change_password.php");
				 exit;
			 }
		}  

?>