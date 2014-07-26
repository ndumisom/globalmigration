<?php
session_start();
require_once('class.php');
$call = new globalm;


$clientID = $_POST['clientID'];
$username = $_POST['username'];
$description = $_POST['description'];

    	
	 if( isset( $_POST['Submit'] ) ){
	    
		
		  if(trim($description == '')){
		  $_SESSION['error']="Please enter the Description.";
		  header("location:index.php?m=activity&id=".$clientID);
		  exit;
		 
		  }
		
		
	  
	 $sql = mysql_query("insert into client_activity_sheet  values( 0, '$clientID', NOW(), '$username','$description')");

	   if($sql ){
           
              
	     $_SESSION['msg']="The comment was entered successfuly..........";
		 header("location:index.php?m=activity&id=".$clientID);
		 exit;
		 }
		 else{
		     $_SESSION['error'] ="Failure please try again.";
			 
		
			  header("location:index.php?m=activity&id=".$clientID);
		      exit;
			  }
}



?>