<?php
session_start();
include_once '../phpmailer/class.phpmailer.php';
include_once '../client/class.php';
$call = new globalm;

$email = trim($_GET['email']);
$code = trim($_GET['code']);

if ($email && $code) {

   if (empty($email)) {
          $_SESSION['er'] = ("Email is empty!");
           header('location:forgot_password.php');
        exit;
        return false;
    }
    if (empty($code)) {
          $_SESSION['er'] = ("reset code is empty!");
           header('location:forgot_password.php');
        exit;
        return false;
    }
	
    if (md5($call->GetResetPasswordCode($email)) != $code) {
         $_SESSION['error'] = ("Bad reset code! Enter your email again");
         header('location:forgot_password.php');
        exit;       
    }
    
    $user_rec = array();
    if (!$call->GetUserFromEmail($email, $user_rec)) {
        return false;
    }

    $new_password = $call->ResetUserPasswordInDB($email);
    if (false === $new_password || empty($new_password)) {
          $_SESSION['er'] = ("Error updating new password");
           header('location:forgot_password.php');
        exit;
        return false;
    }

    if (false == $call->SendNewPassword($email, $new_password)) {
          $_SESSION['er'] =  ("Error sending new password");
           header('location:forgot_password.php');
        exit;
        return false;
    }
    header('location:message_new_password.php');
    return true;
	
}

?>
