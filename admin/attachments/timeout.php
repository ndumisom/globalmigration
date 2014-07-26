<?php 
     $inactive = 1200; // set time out period in sec
   if( isset($_SESSION['timeout']) ) {
        $session_life = time() - $_SESSION['timeout'];
		if( $session_life > $inactive ){
		  header("location:/news/leave.php?reason=timeout"); 
		  exit;
		}
   }
?>
