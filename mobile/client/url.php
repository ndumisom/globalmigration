<?php


   if($_GET['page']== 'profile')
  {
   require("profile.php");
   }
   
  else if($_GET['page']== 'help'){
   require("help.php");
  }
  
   else if($_GET['page']== 'change'){
   require("change_password.php");
   }
   
  else {
   require("home.php");
   
   }
 

?>
