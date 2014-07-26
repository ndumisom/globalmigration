<?
include_once("class.php");

    $id = $_GET["id"];
	$objConnect = mysql_connect("localhost","root","mapapa1531") or die(mysql_error());
	$objDB = mysql_select_db("globalmigration_db");
	$strSQL = "SELECT * FROM client_details WHERE clientID = '$id' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{
		echo "Not found ID='$id'";
	}
	else
	{	
?>
<div class="scroll">
<table class="tab" width="100%" cellspacing="0" cellpadding="0" border="0" bordercolor="#0000FF">
<tr><td>

        <form name="client" action="update_client_details.php?id=<?  echo $id; ?>" method="post" onsubmit="return validateClient()">
    <h3> <a href="#"  style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;"><b><u>Details of a client</u> </b></a></h3>
    <table border="0" cellspacing="3" cellpadding="0">

    <tr>
      <td colspan="5"><div align="center">
        <?php

if( isset($_SESSION['msg']) ){echo '<span id="msg">'. $_SESSION['msg'].'</span>'; unset($_SESSION['msg']);}
if( isset($_SESSION['error']) ){echo '<span id="error">'. $_SESSION['error'].'</span>'; unset($_SESSION['error']);}
 

       
  ?>
      </div>        </td>
      </tr>
    <tr>
        <td width="18%">File Number </td>
      <td width="21%"><input type="text" name="file_no" id="file_no" size="30" value="<?=$objResult["file_no"];?>" disabled="disabled"/></td>
      <td width="10%">&nbsp;</td>
      <td width="27%">Mobile Number </td>
      <td width="24%"><input type="text" name="mobile_no" id="mobile_no" size="30" value="<?php echo $objResult['mobile_no'] ?>" disabled="disabled"/></td>
    </tr>
    <tr>
      <td>Title</td>
      <td><input type="text" name="title" size="30" value="<?php echo $objResult['title'] ?>" disabled="disabled"/>      </td>
      <td>&nbsp;</td>
      <td>Fax Number </td>
      <td><input type="text" name="fax_no" id="fax_no" size="30" value="<?php echo $objResult['fax_no'] ?>" disabled="disabled"/></td>
    </tr>
    <tr>
      <td>Surname</td>
      <td><input type="text" name="surname" id="surname" size="30" value="<?php echo $objResult['surname'] ?>" disabled="disabled"/></td>
      <td>&nbsp;</td>
      <td>Email Address </td>
      <td><input type="text" name="email" id="email" size="30" value="<?php echo $objResult['email'] ?>" disabled="disabled"/></td>
    </tr>
    <tr>
      <td>First Names </td>
      <td><input type="text" name="firstnames" id="fisrtnames" size="30" value="<?php echo $objResult['firstnames'] ?>" disabled="disabled"/></td>
      <td>&nbsp;</td>
      <td>Street Address</td>
      <td><input type="text" name="street_address" id="street_address" size="30" value="<?php echo $objResult['street_address'] ?>" disabled="disabled"/></td>
    </tr>
    <tr>
      <td>Application Type </td>
      <td><input type="text" name="application_types" id="application_types" size="30" value="<?php echo $objResult['application_type'] ?>" disabled="disabled"/>      </td>
      <td>&nbsp;</td>
      <td>Suburb</td>
      <td><input type="text" name="suburb" id="suburb" size="30" value="<?php echo $objResult['suburb'] ?>" disabled="disabled"/></td>
    </tr>
    <tr>
      <td>D.O.B</td>
      <td><input type="text" name="dob" id="dob" size="30" value="<?php echo $objResult['dob'] ?>" disabled="disabled"/></td>
      <td>&nbsp;</td>
      <td>City</td>
      <td><input type="text" name="city" id="city" size="30" value="<?php echo $objResult['city'] ?>" disabled="disabled"/></td>
    </tr>
    <tr>
      <td>Passport Number </td>
      <td><input type="text" name="passport_no" size="30" id="passport_no" value="<?php echo $objResult['passport_no'] ?>" disabled="disabled"/></td>
      <td>&nbsp;</td>
      <td>country</td>
      <td><input type="text" name="counrty_of_origin" size="30" value="<?php echo $objResult['counrty_of_origin'] ?>" disabled="disabled"/></td>
    </tr>
    <tr>
      <td>Passport Expiry Date </td>
      <td><input type="text" name="passport_expiry_date" size="30" id="passport_expiry_date" value="<?php echo $objResult['passport_expiry_date'] ?>" disabled="disabled"/></td>
      <td>&nbsp;</td>
      <td>Postal/Zip Code </td>
      <td><input type="text" name="code" id="code" size="30" value="<?php echo $objResult['code'] ?>" disabled="disabled"/></td>
    </tr>
    <tr>
      <td>Country Of Origin </td>
      <td><input type="text" name="country_of_origin" size="30" id="country_of_origin" value="<?php echo $objResult['country_of_origin'] ?>" disabled="disabled"/></td>
      <td>&nbsp;</td>
      <td>Captured by </td>
      <td><input type="text" name="captured_by" id="captured_by" size="30" value="<?php echo $objResult['captured_by'] ?>" disabled="disabled"/></td>
    </tr>
    <tr>
      <td>Marital Status </td>
      <td><input type="text" name="marital_status" id="marital_status" size="30" value=" <?php echo $objResult['marital_status'] ?>" disabled="disabled"/></td>
      <td>&nbsp;</td>
      <td>Consultant</td>
      <td><input type="text" name="consultant" id="consultant" size="30" value="<?php echo $objResult['consultant'] ?>" disabled="disabled"/></td>
    </tr>
    <tr>
      <td>Dependents/Children</td>
      <td><input type="text" name="dependents" id="dependents" size="30" value="<?php echo $objResult['dependents'] ?>" disabled="disabled"/></td>
      <td>&nbsp;</td>
      <td>Referred By </td>
      <td><input type="text" name="source_media" id="source_media" size="30" value="<?php echo $objResult['source_media'] ?>" disabled="disabled"/></td>
    </tr>
    <tr>
      <td>Corporate</td>
      <td><input type="text" name="coperate" id="coperate" size="30" value="<?php echo $objResult['corporate'] ?>" disabled="disabled"/></td>
      <td>&nbsp;</td>
      <td>Previous Immigration Problems </td>
      <td><input type="text" name="pip" id="pip" size="30" value="<?php echo $objResult['pip']?>" disabled="disabled"/></td>
    </tr>
    <tr>
      <td>Business Unit </td>
      <td><input type="text" name="business_unit" id="business_unit" size="30" value="<?php echo $objResult['business_unit']; ?>" disabled="disabled"/></td>
      <td>&nbsp;</td>
       <td>In Care Of Email</td>
      <td><input type="text" name="in_care_of" id="in_care_of" size="30" value="<?php echo $objResult['in_care_email'] ?>" disabled="disabled"/></td>
    </tr>
    <tr>
      <td>In Care Of </td>
      <td><input type="text" name="in_care_of" id="in_care_of" size="30" value="<?php echo $objResult['in_care_of'] ?>" disabled="disabled"/></td>
      <td></td> 
      <td>Responsible fro Acc</td>
      <td><input type="text" name="responsible_for_acc" id="responsible_for_acc" size="30" value="<?php echo $objResult['responsible_for_acc'] ?>" disabled="disabled"/></td>
      
    </tr>
    <tr>
      <td>Contact Number </td>
      <td><input type="text" name="contact_no" id="contact_no" size="30" value="<?php echo $objResult['contact_no'] ?>" disabled="disabled"/><br/>
          
      </td>
      <td>&nbsp;</td>
      <td>Comments</td>
      <td><textarea name="comments" id="comments"  disabled="disabled" cols="22" rows="5"></textarea></td>
    </tr>
    <tr>
      <td><input type="button" value="< Back" onclick="goBack()" class="login"/></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td></td>
    </tr>
  
  </table>
  	  <?
	  }
	  mysql_close($objConnect);
?>
  
</form>
        <p>&nbsp;</p>

</table>
</div>
