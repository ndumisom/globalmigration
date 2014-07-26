<?php


   if($_GET['page']== 'profile')
  {
   require("profile.php");
   }
  else if($_GET['page']== 'help'){
   require("help.php");
  }
   
  else if($_GET['page']== 'change_password'){
   require("change_password.php");
  }
  
   else if($_GET['page']== 'task'){
   require("task_allocation.php");
   }
	
 else  {
        require 'home.php';
} 

 
  

?>
