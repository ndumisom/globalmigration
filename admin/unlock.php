<?php 
         session_start( );
			 require('class.php');
			 
			 $username = $_POST['username'];
			 $password = $_POST['password'];
			
	if( isset( $_POST['login'] ) ) {
              $call = new globalm ;
		     
			 if( $username == "" || $username == "username" ) {
		        $_SESSION['er'] = "Please enter your username.";
				header("location: index.php");
				exit;
			}
			else if($password == "" || $password == "password"){
			    $_SESSION['er'] = "Please enter your password.";
				header("location: index.php");
				exit;
			}
                        else if( $call->login( $username, $password ) ) {
                            if( $call->getUserLevel( $username ) == 1 ){
                                   $_SESSION['log'] = $username; 
	                           header('location:admin/admin_index.php');
	                           exit;
                                
                                
                            } 
                            else if($call->getUserLevel( $username ) == 2 ){
                                $_SESSION['log'] = $username; 
	                           header('location:staff/index.php');
	                           exit;
                                
                            }
                            
                           
                  }
                  else{
                      $_SESSION['er'] = "Username and password do not match.";
	              header('location:index.php');
	               exit;
                      
                  }
        }
		 
		       
			
		     
		

?> 