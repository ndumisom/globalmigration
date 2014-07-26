<?php
session_start();
include_once '../phpmailer/class.phpmailer.php';
include_once '../client/class.php';
$call = new globalm;

$email = $_POST['email'];

if (isset($_POST['forgot'])) {

$user_rec = array();

if($email == '' || $email == null ){
	$_SESSION['er'] = "Invalid email.";
     header('location:forgot_password.php');
}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	$_SESSION['er'] = "Invalid email.";
	header('location:forgot_password.php');	
}else if(!$call->GetUserFromEmail($mail,$user_rec)){
	$_SESSION['er'] = "Email does not exist.";
	header('location:forgot_password.php');
}else{   
	 
     if($call->SendResetPasswordLink($email, $user_rec['firstname'])){
     
	$_SESSION['msg'] = "Thank you for reseting your password!
					  Your confirmation email is on its way. Please click the link in the 
                      email to complete the password reseting.";
	header('location:forgot_password.php');
	}
}


} 

?>