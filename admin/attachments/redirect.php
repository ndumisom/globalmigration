<html>
<head>
<meta http-equiv="refresh" content="1;url=http://localhost/globalmigration/admin/admin_index.php?m=client">
</head>
<body>
<?php session_start(); ?>
<table class="tab" width="80%" border="0" cellpadding="0" cellspacing="0" bordercolor="#0000FF" >
<tr>
<td>
<form name="permit" action="add_permitapp.php" method="post" class="uniForm" onsubmit="return validatePermit()">
  <h3> Permit Applications</h3>
  <table width="50%" border="0" cellspacing="3" cellpadding="0">
    <tr>
        <td colspan="2" align="center"> <div align="right"><?php
require_once 'add_client_details.php';
//$_SESSION['file_no']= trim($_POST['file_no']);
//$_SESSION['firstname'] = ucfirst(trim($_POST['firstnames']));
$file_no = trim($_POST['file_no']); ;
$firstname= ucfirst(trim($_POST['firstnames']));
$id = mysql_query("select clientID from client_details where firstnames='$firstnames' and file_no ='$file_no' ");
$row = mysql_fetch_array($id);

if( isset($_SESSION['msg']) ){echo '<span id="msg">'. $_SESSION['msg'].'</span>'; unset($_SESSION['msg']);}
if( isset($_SESSION['error']) ){echo '<span id="error">'. $_SESSION['error'].'</span>'; unset($_SESSION['error']);}

    
?></div>
          <p>&nbsp;</p></td>
      </tr>
    <tr>
      <td>Client id</td>
      <td><input type="text" name="clientID" value="<?php echo $row['clientID']; ?>" disabled="disabled" /><input type="hidden" name="clientID" value="<?php echo $row['clientID']; ?>"/></td>
    </tr>
    <tr>
      <td>Service</td>
      <td><input type="text" name="service" /></td>
    </tr>
    <tr>
      <td>Permit</td>
      <td><input type="text" name="permit" /></td>
    </tr>
    <tr>
      <td>Permit Status </td>
      <td><input type="text" name="permit_status" /></td>
    </tr>
    <tr>
      <td>Permit No </td>
      <td><input type="text" name="permit_no" /></td>
    </tr>
    <tr>
      <td>Submission Office </td>
      <td><input type="text" name="submission_office" /></td>
    </tr>
    <tr>
      <td>Submission Date </td>
      <td><input type="text" name="submission_date" /></td>
    </tr>
    <tr>
      <td>Date Endorsed </td>
      <td><input type="text" name="date_endorsed" /></td>
    </tr>
    <tr>
      <td>Expiry Date </td>
      <td><input  type="date" name="expiry_date" /></td>
    </tr>
    <tr>
      <td>DHA Reference No </td>
      <td><input type="text" name="dha_reference" /></td>
    </tr>
    <tr>
      <td>DHA Case No</td>
      <td><input type="text" name="dha_case_no" /></td>
    </tr>
    <tr>
      <td>Fee</td>
      <td><input type="text" name="fee" /></td>
    </tr>
    <tr>
      <td>Invoice No </td>
      <td><input type="text" name="invoice_no" /></td>
    </tr>
    <tr>
      <td>J Invoice No </td>
      <td><input type="text" name="j_invoice_no" /></td>
    </tr>
    <tr>
      <td>Comments</td>
      <td><textarea name="comments" ></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Submit" class="login" /></td>
    </tr>
  </table>
</form>

</td>
</tr>
</table>
</body>
</html>
