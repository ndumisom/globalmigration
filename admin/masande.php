
<?php

session_start();
if( isset( $_POST['Submit'] ) ){
    
    
//error_reporting(E_ALL);
error_reporting(E_STRICT);

date_default_timezone_set('America/Toronto');
require_once('class.php');
$call = new globalm;

require_once('../phpmailer/class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

$body             = file_get_contents('contents.html');
$body             = eregi_replace("[\]",'',$body);
$nam              ="My name is Masande <br/>";

$mobile_no = $_POST['cell_no'];
$firstname = $_POST['fname'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$level = $_POST['level'];
$username = $firstname;
  if(trim($firstname == '')){
		  $_SESSION['error']="Please enter the First Name.";
		  header("location:admin_index.php?m=add");
		  exit;
		 
		  }
		     else if(trim($surname =='')){
		  $_SESSION['error']="Please enter the  Surname.";
		  header("location:admin_index.php?m=add");
		  exit;
		 
		  }
                  
                  else if($call->getUsername($surname)){
                      $_SESSION['error']="The username already exist.";
		      header("location:admin_index.php?m=add");
		      exit;
                  }
                  else if($call->getEmail($email)){
                      $_SESSION['error']="The email already exist.";
		      header("location:admin_index.php?m=add");
		      exit;
                  }
		
		  else if(trim($email =='')){
		  $_SESSION['error']="Please enter the email.";
		  header("location:admin_index.php?m=add");
		  exit;
		 
		  }
		    else if(trim($mobile_no =='')){
		  $_SESSION['error']="Please enter the  Surname.";
		  header("location:admin_index.php?m=add");
		  exit;
		 
		  }

$random_id_length = 10;

//generate a random id encrypt it and store it in $rnd_id
$rnd_id = crypt(uniqid(rand(),1));

//to remove any slashes that might have come
$rnd_id = strip_tags(stripslashes($rnd_id));

//Removing any . or / and reversing the string
$rnd_id = str_replace(".","",$rnd_id);
$rnd_id = strrev(str_replace("/","",$rnd_id));

//finally I take the first 10 characters from the $rnd_id
$password = substr($rnd_id,0,$random_id_length);

$message = 'Dear '.$firstname .' '.$surname.'<br/><br/>' .'Welcome to Global Migration
 Here are your login details'. '<br/>' .'username :<b>'.$username. '</b><br/> '.'Password :<b>'.$password.'</b><br/>' .'To login click the link http://gmims/globalmigration/
<br/><br/>Warm Regards <br/> <b>Global Migration South Africa</b><br/>
<img src="images/gl.png"></div><br>';

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.gmims.co.za"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                       // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "mail.gmims.co.za"; // sets the SMTP server
$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
$mail->Username   = "admin@gmims.co.za"; // SMTP account username
$mail->Password   = "minda2011";        // SMTP account password

$mail->SetFrom('masande@globalimsa.com', 'None Reply');

$mail->AddReplyTo("masande@globalimsa.com","None Reply");

$mail->Subject    = "Login details";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($message);

$address = $email;
$mail->AddAddress($address, $firstname." ".$surname);
$sql = $call->addUserEmail($username, $password, $firstname, $surname, $email, $mobile_no, $level, $status);


if(!$mail->Send()) {
  $_SESSION['error'] ="Failure please try again.";
	    
		 header("location:admin_index.php?m=add");
		 exit;
} else {
  $_SESSION['msg']="The user was entered succesfuly";
  header("location:admin_index.php?m=add");
}
}

?>

