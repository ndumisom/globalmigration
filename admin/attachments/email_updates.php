<? session_start();?>
<html>
<head>
<title>PHPMailer - SMTP basic test with authentication</title>
</head>
<body>

<?php

function send_update($firstnames, $surname, $permit, $email, $id){
//error_reporting(E_ALL);
error_reporting(E_STRICT);

date_default_timezone_set('America/Toronto');

require_once('../phpmailer/class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();
$mail->IsQmail(); // telling the class to use QMail transport

$body             = file_get_contents('contents.html');
$body             = eregi_replace("[\]",'',$body);
$nam              ="My name is Masande <br/>";

$message = 'Dear ' . $firstnames . '  ' . $surname .'<br/><br/> I trust this email finds you well. We have followed up on the progress of your '.$permit.' application at the Department of Home Affairs and the application remains pending.
                  If you have received any communication from the Department of Home Affairs including an SMS with a reference number, please forward this to us immediately.<br/><br/> 
                 We will continue to follow up and update you once a result has been received.  Should you need to travel in the near future, kindly notify us so that we may issue you with the appropriate letter for these purposes.<br/>
                 Should you have any further questions please do not hesitate to contact our offices.<br/><br/>
                 Kind Regards <br/><img src="images/gl.png"> <br/>  <br>Website:  www.globalimsa.com <br/>Fax2E-mail:  <b>086 504 3634</b><br/>International Number: <b> 0027-21-419-0934</b><br/>
                 National Telephone Number: <b> 0861-644-728 </b>(from inside SA only)<br/>Address:  2nd Floor LG Building, 1 Thibault Square, Cape Town 8001, South Africa<br/>P O Box 6844, Roggebaai, Cape Town, 8012, South Africa
                  <br/><br/>
                  ';

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

$mail->SetFrom('info@globalimsa.com', 'Global Migration RSA');

$mail->AddReplyTo("info@globalimsa.com","Global Migration RSA");

$mail->Subject    = "Global Migration Updates";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($message);

$address = $email;
$mail->AddAddress($address, $firstnames.' '.$surname);



if(!$mail->Send()) {
  //echo "Mailer Error: " . $mail->ErrorInfo;
    @mysql_query("insert into bounce_email values(null, $id, NOW(), '$email', 1)");
  $_SESSION['errot']  = 'Error occured please try send again';
} else {
  //echo "Message sent!";
    
 $_SESSION['msg']  = 'Your email(s) was sent successfully.';
}

}


?>
    

</body>
</html>
