<?php
session_start();
require_once('class.php');
$call = new globalm;


$clientID = $_POST['clientID'];
$username = $_POST['username'];
$description = $_POST['description'];
$description1 = $_POST['description1'];
$description2 = $_POST['description2'];

if($description1 == NULL || $description1 == " "){
    $description = $description2;
}
    
else{
    $description = $description1;
}


    	
	 if( isset( $_POST['Submit'] ) ){
	    
		
		  if(trim($description == '' || $description == NULL)){
		  $_SESSION['error']="Please select or type your description.";
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