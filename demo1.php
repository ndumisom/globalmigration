<?
session_start();


$mobile_no = $_POST['cell_no'];
$firstname = $_POST['fname'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$level = $_POST['level'];

// Please specify your Mail Server - Example: mail.yourdomain.com.
ini_set("SMTP","smtp.gmims.co.za");

// Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
ini_set("smtp_port","25");
//ini_set("username","admin@gmims.co.za");
//ini_set("password","masande");

// Please specify the return address to use
ini_set('sendmail_from', 'masande@globalimsa.com');

// The message
$message = "I realy dont understand whats wrong with this ini_set . All the best";
$headers = 'From:admin@gmims.co.za';
// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70);

// Send

$i=mail('masande@globalimsa.com', 'My Subject', $message,$headers);
if($i)
echo "sucess";
else
echo "sorry";
?>