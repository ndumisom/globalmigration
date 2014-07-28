<?php

session_start();

require( 'class.php' );
$call = new globalm;

$msg_id = 0;
$sender = $_SESSION['log'];
$subject = $_POST['subject'];
$text = $_POST['msg'];
$to = $_POST['to'];
$from = $call->getEmail($_SESSION['log']);
$status = 1;

if (isset($_POST['text'])) {

    if ($subject == null)
        $subject = '( no subject )';
     if($to==''){
        $_SESSION['error'] = "<font color='#FF0000'>Please enter recipient.";
        header("location:admin_index.php?m=compose");
        exit;
        
    }
   else if ($text == '') {
        $_SESSION['error'] = "Please enter your text message.";
        header("location:admin_index.php?m=compose");
        exit;
    }
    else if($call->getUsername($to) == ''|| $call->getUsername($to) == NULL){
        $_SESSION['error'] = "The username does not exit.";
        header("location:admin_index.php?m=compose");
        exit;
    }
    
        else if ($call->send_message($msg_id, $sender, $subject, $text, $msg_date, $to, $from, $status)) {
        $_SESSION['message'] = "Your text message has been sent successfully.";
        header("location:admin_index.php?m=compose");
        exit;
    } else {
        $_SESSION['error'] = "An error occured. We are working on it. Please retry later.";
        header("location:admin_index.php?m=compose");
        exit;
    }
}
?>