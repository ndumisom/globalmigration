<html>
<head>
<title>PHPMailer - MySQL Database - SMTP basic test with authentication</title>
</head>
<body>

<?php

//error_reporting(E_ALL);
error_reporting(E_STRICT);

date_default_timezone_set('America/Toronto');

require_once('../class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail                = new PHPMailer();

$body                = file_get_contents('contents.html');
$body                = eregi_replace("[\]",'',$body);

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host          = "smtp1.gmims.co.za;smtp2.site.com";
$mail->SMTPAuth      = true;                  // enable SMTP authentication
$mail->SMTPKeepAlive = true;                  // SMTP connection will not close after each email sent
$mail->Host          = "mail.gmims.co.za"; // sets the SMTP server
$mail->Port          = 26;                    // set the SMTP port for the GMAIL server
$mail->Username   = "admin@gmims.co.za"; // SMTP account username
$mail->Password   = "minda2011";        // SMTP account password      // SMTP account password
$mail->SetFrom('info@globalimsa.com', 'Global Migration');
$mail->AddReplyTo('info@globalimsa.com', 'Global Migration');

$mail->Subject       = "PHPMailer Test Subject via smtp, basic with authentication";

@MYSQL_CONNECT("localhost","root","mapapa1531");
@mysql_select_db("globamigration_db");
$query  = "select *from client_details, permit_applications, updated where updated.permit_status_history='Pending at DHA' and updated.sent=0 and client_details.clientID=permit_applications.clientID and updated.clientID = client_details.clientID";
$result = @MYSQL_QUERY($query);

while ($row = mysql_fetch_array ($result)) {
  $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
  $mail->MsgHTML($body);
  $mail->AddAddress($row["email"], $row["firstnames"]);
  $mail->AddStringAttachment($row["photo"], "YourPhoto.jpg");

  if(!$mail->Send()) {
    echo "Mailer Error (" . str_replace("@", "&#64;", $row["email"]) . ') ' . $mail->ErrorInfo . '<br />';
  } else {
    echo "Message sent to :" . $row["firstnames"] . ' (' . str_replace("@", "&#64;", $row["email"]) . ')<br />';
  }
  // Clear all addresses and attachments for next loop
  $mail->ClearAddresses();
  $mail->ClearAttachments();
}
?>

</body>
</html>
