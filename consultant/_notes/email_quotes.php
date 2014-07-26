<? session_start();?>
<html>
<head>
<style>
    table{
        font-family: "Arial";
       
    }
</style>
</head>
<body>

<?php
//function to read arry/


//functin to send email
function send_quote( $f_name, $surname, $date, $address_to,  $quote_no, $invoice_no,  $email_to, $consultant,  $service, $payment_terms, $description, $professional_fees, $saqa_dha_fee, $line_total, $subtotal1, $subtotal2, $subtotal3, $vat, $discount, $total, $comments){


  foreach ($description as $value) {
      
      if($value == null || $value == " "){
      }
      else{
     
    $descr .= $value . '&nbsp;<hr/>';
      }
}

foreach ($professional_fees as $p_feels) {
    
     if($p_feels == null || $p_feels == "0"){
      }
      else{
    $pr_fees .= 'R '. $p_feels . '<hr>';
      }
}
foreach ($saqa_dha_fee as $s_fee) {
    
     if($s_fee == null || $s_fee== "0"){
         
      }
      else{
    $sa_fees .= 'R '. $s_fee . '<hr>';
    
      }
}

foreach ($line_total as $l_total) {
    

     if($l_total == null || $l_total == "0"){
         
      }
      else{
    $li_total .= 'R '. $l_total . '<hr>';
      }
}


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

$message = '<table border="0" width="80%" cellspacing="0" cellpadding="0" 
       bgcolor="#353535" align="center">
        <tr>
    <td bgcolor="#FFFFFF" colspan="4" align="center"></td>
  </tr>
        <tr>
          <td colspan="4" align="left" valign="top" bgcolor="#FFFFFF" ><img src="../images/quote_header.jpg" width="900" height="200" /></td>
        </tr>
        <tr>
          <td colspan="4" align="left" valign="top" bgcolor="#FFFFFF" >&nbsp;</td>
        </tr>
   <tr>
    <td bgcolor="#FFFFFF" width="144" ><strong>First Name</strong></td>
    <td bgcolor="#FFFFFF" width="144" >'.$f_name.'</td>
            <td bgcolor="#FFFFFF" width="144"><strong>Surname</strong></td>
            <td bgcolor="#FFFFFF" width="144">'.$surname.'</td>
</tr>
  <tr>
    <td  align="left" valign="top" bgcolor="#FFFFFF" ><strong>To: </strong>&nbsp;&nbsp;&nbsp;&nbsp;'.$address_to.'</td>
    <td width="144"  align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="144" valign="top" bgcolor="#FFFFFF"><strong>Quote No </strong><br/><br/>
      <strong>Invoice No </strong><br/><br/>
        <strong>Date</strong><br/><br/>
        <strong>Email</strong></td>
    <td width="144" valign="top" bgcolor="#FFFFFF">
	 '.$quote_no.'<br/><br/>
         '.$invoice_no.' <br/><br/>
	 '.$date.' <br/><br/>
	 '.$email_to.'  <br/></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" colspan="4" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td width="144" valign="top" bgcolor="#000" ><strong style="color:#FFFFFF">Consultant</strong></td>
    <td width="144" valign="top" bgcolor="#000" ><strong style="color:#FFFFFF">Service</strong></td>
    <td width="144" valign="top" bgcolor="#000" ><strong style="color:#FFFFFF">Payment Terms </strong></td>
    <td bgcolor="#FFFFFF" width="144">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" width="144" >'.$consultant.'</td>
    <td bgcolor="#FFFFFF" width="144" >'.$service.'</td>
    <td bgcolor="#FFFFFF" width="144">'.$payment_terms.'</td>
    <td bgcolor="#FFFFFF" width="144">&nbsp;</td> 
  </tr>
  
  <tr><td colspan="4">
  

  <table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#353535" align="center">
  <tr>
    <td width="144" valign="top" bgcolor="#000" ><strong style="color:#FFFFFF">Description</strong></td>
    <td width="144" valign="top" bgcolor="#000" ><strong style="color:#FFFFFF">Professional fees </strong></td>
    <td width="144" valign="top" bgcolor="#000" ><strong style="color:#FFFFFF">SAQA/DHA Fees </strong></td>
    <td width="144" valign="top" bgcolor="#000" ><strong style="color:#FFFFFF">Line Total </strong></td>
  </tr>
 <tr>
     <td bgcolor="#FFFFFF" width="70%" valign="top"><p>' . $descr . '</p></td>
     <td bgcolor="#FFFFFF" valign="top"><p>' . $pr_fees . '</p></td>
     <td bgcolor="#FFFFFF" valign="top"><p>' . $sa_fees . '</p></td>
     <td bgcolor="#CCCCCC" valign="top"><p>' . $li_total . '</p></td>
   </tr>
    <tr>
    <td bgcolor="#FFFFFF" colspan="4" align="center"></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC" width="144" ><strong>Subtotal </strong></td>
    <td bgcolor="#CCCCCC" width="144" ><b>R</b>'.$subtotal1.'</td>
    <td bgcolor="#CCCCCC" width="144"><b>R </b>'.$subtotal2.'</td>
    <td bgcolor="#CCCCCC" width="144"><b>R </b>'.$subtotal3.'</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" width="144" ><strong>Vat</strong></td>
    <td bgcolor="#FFFFFF" width="144" ><b>R</b>'.$vat.'</td>
    <td bgcolor="#FFFFFF" width="144"><b>R</b> 0</td>
    <td bgcolor="#CCCCCC" width="144"><b>R</b> '.$vat.'</td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC" width="144" ><strong>Total</strong></td>
    <td bgcolor="#CCCCCC" width="144" >&nbsp;</td>
    <td bgcolor="#CCCCCC" width="144">&nbsp;</td>
    <td bgcolor="#CCCCCC" width="144"><b>R </b>'.$total.'</td>
  </tr>
  </table>
  

  
  </td></tr>
 
  <tr>
    <td bgcolor="#FFFFFF" width="144" >&nbsp;</td>
    <td bgcolor="#FFFFFF" width="144" >&nbsp;</td>
    <td bgcolor="#FFFFFF" width="144">&nbsp;</td>
    <td bgcolor="#FFFFFF" width="144">&nbsp;</td>
  </tr>
  <tr>
    <td width="144" valign="top" bgcolor="#FFFFFF" ><strong>Comments</strong></td>
    <td colspan="3" bgcolor="#FFFFFF" >'.$comments.'</td>
  </tr>
  <tr>
    
    <td colspan="4" bgcolor="#FFFFFF" >
    
    <br>
    <strong>
    PLEASE NOTE: All professional fees and disbursements are payable in full on instruction and are non-refundable. Interest of 2% per month will be charged on outstanding invoices <br/>
    </strong>
    </td>
  </tr>
  <tr>
    
    <td colspan="4" bgcolor="#FFFFFF" >
    <br>
    <b><u>Banking Details</u></b><br>
    <b>Bank :</b> ABSA <b>Branch :</b> HEERENGRACHT <b>Branch Code:</b> 506009 <br/>
    <b>Account Name :</b> EXPERT MIGRATION SERVICES T/A GLOBAL MIGRATION SA<br/>
    <b>Account Numbe:</b> 4064480810<br/>
    <b>International Code:</b> 632005 
    <b>Swift Code:</b> ABSA ZA JJ
  </td>
  </tr>
</table> ';

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

$mail->Subject    = "Global Migration Quote";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($message);

$address = $email_to;
$mail->AddAddress($address, 'Masande Mbondwana ');
$mail->AddCC('mmbondwana@gmail.com');



if(!$mail->Send()) {
 // echo "Mailer Error: " . $mail->ErrorInfo;
   // @mysql_query("insert into bounce_email values(null, $id, NOW(), '$email', 1)");
 // $_SESSION['error']  = 'Error occured please try send again';
 return false;
} else {
    return TRUE;
  //echo "Message sent!";
    
 //$_SESSION['msg']  = 'Your email(s) was sent successfully.';
}
}

?>
    

</body>
</html>
