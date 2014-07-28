<?
include_once("class.php");

   $id = $_GET["id"];
	$objConnect = mysql_connect("localhost","root","mapapa1531") or die(mysql_error());
	$objDB = mysql_select_db("globalmigration_db");
	$strSQL = "SELECT * FROM  current_permit WHERE current_permitID= '$id' ";
	$objQuery = mysql_query($strSQL);
	$row = mysql_fetch_array($objQuery) or die('
<form name="permit" action="add_permitapp.php" method="post" class="uniForm" onsubmit="return validatePermit()">
            
<table class="tab" width="100%" height="300" cellpadding="0" cellspacing="0" border="0" bordercolor="#0000FF"><tr><td align="center"><div style="color:#FF0000; font-weight:bolder;">         OOPS! THE PERSON WAS NOT FOUND </div> <table width="50%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>&nbsp;</td>
      <td>

         <p> &nbsp;</p>
</td>
    </tr>
    <tr>
      <td> Service</td>
      <td><input type="text" name="service"  /><input type="hidden" name="clientID" value="<? echo $id;?>"/></td>
    </tr>
    <tr>
      <td> Permit</td>
      <td><input type="text" name="permit" </td>
    </tr>
    <tr>
      <td> Permit Status </td>
      <td><input type="text" name="permit_status" /></td>
    </tr>
    <tr>
      <td> Permit No </td>
      <td><input type="text" name="permit_no" /></td>
    </tr>
    <tr>
      <td> Submission Office </td>
      <td><input type="text" name="submission_office" /></td>
    </tr>
    <tr>
      <td> Submission Date </td>
      <td><input type="text" name="submission_date" /></td>
    </tr>
    <tr>
      <td> Date Endorsed </td>
      <td><input type="text" name="date_endorsed" /></td>
    </tr>
    <tr>
      <td> Exipiry Date </td>
      <td><input type="text" name="expiry_date" /></td>
    </tr>
    <tr>
      <td> DHA Reference No </td>
      <td><input type="text" name="dha_refrence_no" /></td>
    </tr>
    <tr>
      <td> DHA Case No</td>
      <td><input type="text" name="dha_case_no"/></td>
    </tr>
    <tr>
      <td> Fee</td>
      <td><input type="text" name="fee" /></td>
    </tr>
    <tr>
      <td> Invoice No </td>
      <td><input type="text" name="invoice_no"/></td>
    </tr>
    <tr>
      <td> J Invoice No </td>
      <td><input type="text" name="j_invoice_no" /></td>
    </tr>
    <tr>
      <td> Comments</td>
      <td><d
          <textarea type="text" name="comments" ></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="button" value="< Back" onclick="goBack()" class="login"/><input type="submit" name="Submit" value="Edit" class="login" /></td>
    </tr>
  </table>
</form></td></tr></table>');
	if(!$row)
	{
	    echo '<table width="100%" height="300" cellpadding="0" cellspacing="0" border="1" bordercolor="#0000FF"><tr><td align="center"><div style="color:#FF0000; font-weight:bolder;">         OOPS! THE PERSON WAS NOT FOUND </div><br/><br/><input type="button" value="< Back" onclick="goBack()" class="login"/></td></tr></tsble>';
	}
	else
	{
 
?>
<style type="text/css">
    #list { height: 100px; overflow: auto; width: 300px; border: 1px solid #cccccc; background-color: white; }
   #list ul { list-style-type: none; margin: 0; padding: 0; overflow-x: hidden; }
   #list li { margin: 0; padding: 0;}
   
  </style>
<table class="tab" width="100%" cellpadding="0" cellspacing="0" border="0" bordercolor="#0000FF">
<tr>
<td >
<form name="permit" action="p_edit_c_permit.php" method="post" class="uniForm" onsubmit="return validateForm()">
    <h3> <a href="#" style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;"><b>Current Permit Applications</b></a></h3>
  <table width="50%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>&nbsp;</td>
      <td>
	  <? if( isset($_SESSION['msg']) ){echo '<span id="msg"><b>'. $_SESSION['msg'].'</span></b>'; unset($_SESSION['msg']);}
if( isset($_SESSION['error']) ){echo '<span id="error"><b>'. $_SESSION['error'].'</span></b/>'; unset($_SESSION['error']);}

    
?>
         <p> &nbsp;</p>
</td>
    </tr>
   
    <tr>
      <td>Current Permit</td>
      <td><input type="text" name="c_permit" value="<? echo $row['c_permit']; ?>"/><input type="hidden" name="clientID" value="<? echo $id;?>"/></td>
    </tr>
    <tr>
      <td>Current Permit Status </td>
      <td><input type="text" name="c_permit_status" value="<? echo $row['c_permit_status']; ?>"/></td>
    </tr>
    <tr>
      <td>Current Permit No </td>
      <td><input type="text" name="c_permit_no" value="<? echo $row['c_permit_no']; ?>"/></td>
    </tr>
    <tr>
      <td>Current  Expiry Date </td>
      <td><input type="text" name="c_permit_expiry" value="<? echo $row['c_permit_expiry']; ?>"/></td>
    </tr>
    
    <tr>
      <td>Current Comments</td>
      <td>
          <textarea type="text" name="c_permit_comment" ><? echo $row['c_permit_comment']; ?></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td><input type="button" value="< Back" onclick="goBack()" class="login"/><input type="submit" name="Submit" value="Edit" class="login" />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </td>
    </tr>
  </table>
</form>
<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
</td>
</tr>
</table>
<? } ?>
