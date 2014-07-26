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
    <h3> <a href="#" style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;"><b>Edit Client </b></a></h3>
    <table  border="0" cellspacing="3" cellpadding="0">

    <tr>
      <td colspan="5"><div align="center">
        <?php

if( isset($_SESSION['msg']) ){echo '<span id="msg">'. $_SESSION['msg'].'</span>'; unset($_SESSION['msg']);}
if( isset($_SESSION['error']) ){echo '<span id="error">'. $_SESSION['error'].'</span>'; unset($_SESSION['error']);}
 

       
  ?>
              <p>&nbsp;</p>
      </div>        </td>
      </tr>
    <tr>
        <td width="18%"><input type="hidden" name="clientID" value="<?=$objResult["clientID"];?>"/>File Number </td>
      <td width="21%"><input type="text" name="file_no" id="file_no"  value="<?=$objResult["file_no"];?>"/></td>
      <td width="10%">&nbsp;</td>
      <td width="27%">in care of email</td>
      <td width="24%"><input type="text" name="in_care_email" id="in_care_email" value="<?php echo $objResult['in_care_email'] ?>" /></td>
    </tr>
    <tr>
      <td>Title</td>
      <td><input type="text" name="title" value="<?php echo $objResult['title'] ?>">      </td>
      <td>&nbsp;</td>
      <td>Mobile Number </td>
      <td><input type="text" name="mobile_no" id="mobile_no" value="<?php echo $objResult['mobile_no'] ?>" /></td>
    </tr>
    <tr>
      <td>Surname</td>
      <td><input type="text" name="surname" id="surname" value="<?php echo $objResult['surname'] ?>" /></td>
      <td>&nbsp;</td>
      <td>Fax Number </td>
      <td><input type="text" name="fax_no" id="fax_no" value="<?php echo $objResult['fax_no'] ?>" /></td>
    </tr>
    <tr>
      <td>Fisrt Names </td>
      <td><input type="text" name="firstnames" id="fisrtnames" value="<?php echo $objResult['firstnames'] ?>" /></td>
      <td>&nbsp;</td>
      <td>Email Address </td>
      <td><input type="text" name="email" id="email" value="<?php echo $objResult['email'] ?>" /></td>
    </tr>
    <tr>
      <td>Application Type </td>
      <td><input type="text" name="application_type" id="application_type" value="<?php echo $objResult['application_type'] ?>"/>      </td>
      <td>&nbsp;</td>
      <td>Street Address</td>
      <td><input type="text" name="street_address" id="street_address" value="<?php echo $objResult['street_address'] ?>" /></td>
    </tr>
    <tr>
      <td>D.O.B</td>
      <td><input type="text" name="dob" id="dob" value="<?php echo $objResult['dob'] ?>" /></td>
      <td>&nbsp;</td>
      <td>Suburb</td>
      <td><input type="text" name="suburb" id="suburb" value="<?php echo $objResult['suburb'] ?>" /></td>
    </tr>
    <tr>
      <td>Passport Number </td>
      <td><input type="text" name="passport_no" id="passport_no" value="<?php echo $objResult['passport_no'] ?>" /></td>
      <td>&nbsp;</td>
      <td>City</td>
      <td><input type="text" name="city" id="city" value="<?php echo $objResult['city'] ?>" /></td>
    </tr>
    <tr>
      <td>Passport Expiry Date </td>
      <td><input type="text" name="passport_expiry_date" id="passport_expiry_date" value="<?php echo $objResult['passport_expiry_date'] ?>" /></td>
      <td>&nbsp;</td>
      <td>country</td>
      <td><input type="text" name="country" value="<?php echo $objResult['country'] ?>"/></td>
    </tr>
    <tr>
      <td>Country Of Origin </td>
      <td><input type="text" name="country_of_origin" id="country_of_origin" value="<?php echo $objResult['country_of_origin'] ?>" /></td>
      <td>&nbsp;</td>
      <td>Postal/Zip Code </td>
      <td><input type="text" name="code" id="code" value="<?php echo $objResult['code'] ?>" /></td>
    </tr>
    <tr>
      <td>Marital Status </td>
      <td><input type="text" name="marital_status" id="marital_status"value="<?php echo $objResult['marital_status'] ?>" /></td>
      <td>&nbsp;</td>
      <td>Captured by </td>
      <td><input type="text" name="captured_by" id="captured_by" value="<?php echo $objResult['captured_by'] ?>" /></td>
    </tr>
    <tr>
      <td>Dependents/Children</td>
      <td><input type="text" name="dependents" id="dependents" value="<?php echo $objResult['dependents'] ?>" /></td>
      <td>&nbsp;</td>
      <td>Consultant</td>
      <td><input type="text" name="consultant" id="consultant" value="<?php echo $objResult['consultant'] ?>" /></td>
    </tr>
    <tr>
      <td>Corporate</td>
      <td><input type="text" name="corporate" id="corporate" value="<?php echo $objResult['corporate'] ?>" /></td>
      <td>&nbsp;</td>
      <td>Referred By</td>
      <td><input type="text" name="source_media" id="source_media" value="<?php echo $objResult['source_media'] ?>"/></td>
    </tr>
    <tr>
      <td>Business Unit </td>
      <td><input type="text" name="business_unit" id="business_unit" value="<?php echo $objResult['business_unit']; ?>"/></td>
      <td>&nbsp;</td>
      <td>Responsible For Acc</td>
      <td><input type="text" name="responsible_for_acc" id="responsible_for_acc" value="<?php echo $objResult['responsible_for_acc'] ?>"/></td>
    </tr>
    <tr>
      <td>Hr Department </td>
      <td><input type="text" name="hr_department" id="hr_department" value="<?php echo $objResult['hr_department']; ?>"/></td>
      <td>&nbsp;</td>
      <td>Previous Immigration Problems </td>
      <td><input type="text" name="pip" id="pip" value="<?php echo $objResult['pip']?>"/></td>
    </tr>
    <tr>
      <td>In Care Of </td>
      <td><input type="text" name="in_care_of" id="in_care_of" value="<?php echo $objResult['in_care_of'] ?>" /></td>
      <td>&nbsp;</td>
      <td>Comments</td>
      <td><textarea name="comments" id="comments" ><? echo $objResult['comments'] ?></textarea></td>
    </tr>
    <tr>
      <td>Contact Number </td>
      <td><input type="text" name="contact_no" id="contact_no" value="<?php echo $objResult['contact_no'] ?>" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="button" value="< Back" onclick="goBack()" class="login"/><input type="submit" name="submit" value="   Edit   " class="login" /></td>
    </tr>
  </table>
  	  <?
	  }
	  mysql_close($objConnect);
?>
  
        </form>

</table>
</div>
