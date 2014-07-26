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
    <h3> <a href="#" style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;"><b><u>Details of a client</u> </b></a></h3>
    <table border="0" cellspacing="3" cellpadding="0">

    <tr>
      <td colspan="5"><div align="center">
        
      </div>        </td>
      </tr>
    <tr>
        <td width="18%">File Number </td>
      <td width="21%" bgcolor="#3BB9FF"><?=$objResult["file_no"];?></td>
      <td width="10%">&nbsp;</td>
      <td width="27%">Mobile Number </td>
      <td width="24%" bgcolor="#3BB9FF"><?php echo $objResult['mobile_no'] ?></td>
    </tr>
    <tr>
      <td>Title</td>
      <td bgcolor="#3BB9FF"><?php echo $objResult['title'] ?> </td>
      <td>&nbsp;</td>
      <td>Fax Number </td>
      <td bgcolor="#3BB9FF"><?php echo $objResult['fax_no'] ?></td>
    </tr>
    <tr>
      <td>Surname</td>
      <td bgcolor="#3BB9FF"><?php echo $objResult['surname'] ?></td>
      <td>&nbsp;</td>
      <td>Email Address </td>
      <td bgcolor="#3BB9FF"><?php echo $objResult['email'] ?></td>
    </tr>
    <tr>
      <td>First Names </td>
      <td bgcolor="#3BB9FF"><?php echo $objResult['firstnames'] ?></td>
      <td>&nbsp;</td>
      <td>Street Address</td>
      <td bgcolor="#3BB9FF"><?php echo $objResult['street_address'] ?></td>
    </tr>
    <tr>
      <td>Application Type </td>
      <td bgcolor="#3BB9FF"><?php echo $objResult['application_type'] ?></td>
      <td>&nbsp;</td>
      <td>Suburb</td>
      <td bgcolor="#3BB9FF"> <?php echo $objResult['suburb'] ?></td>
    </tr>
    <tr>
      <td>D.O.B</td>
      <td bgcolor="#3BB9FF"><?php echo $objResult['dob'] ?></td>
      <td>&nbsp;</td>
      <td>City</td>
      <td bgcolor="#3BB9FF"><?php echo $objResult['city'] ?></td>
    </tr>
    <tr>
      <td>Passport Number </td>
      <td bgcolor="#3BB9FF"><?php echo $objResult['passport_no'] ?></td>
      <td>&nbsp;</td>
      <td>country</td>
      <td bgcolor="#3BB9FF"><?php echo $objResult['counrty_of_origin'] ?></td>
    </tr>
    <tr>
      <td>Passport Expiry Date </td>
      <td bgcolor="#3BB9FF"><?php echo $objResult['passport_expiry_date'] ?></td>
      <td>&nbsp;</td>
      <td>Postal/Zip Code </td>
      <td bgcolor="#3BB9FF"><?php echo $objResult['code'] ?></td>
    </tr>
    <tr>
      <td>Country Of Origin </td>
      <td bgcolor="#3BB9FF"><?php echo $objResult['country_of_origin'] ?></td>
      <td>&nbsp;</td>
      <td>Captured by </td>
      <td bgcolor="#3BB9FF"><?php echo $objResult['captured_by'] ?></td>
    </tr>
    <tr>
      <td>Marital Status </td>
      <td bgcolor="#3BB9FF"><?php echo $objResult['marital_status'] ?></td>
      <td>&nbsp;</td>
      <td>Consultant</td>
      <td bgcolor="#3BB9FF"><?php echo $objResult['consultant'] ?></td>
    </tr>
    <tr>
      <td>Dependents/Children</td>
      <td bgcolor="#3BB9FF"><?php echo $objResult['dependents'] ?></td>
      <td>&nbsp;</td>
      <td>Referred By </td>
      <td bgcolor="#3BB9FF"><?php echo $objResult['source_media'] ?></td>
    </tr>
    <tr>
      <td>Corporate</td>
      <td bgcolor="#3BB9FF"><?php echo $objResult['corporate'] ?></td>
      <td>&nbsp;</td>
      <td>Previous Immigration Problems </td>
      <td bgcolor="#3BB9FF"><?php echo $objResult['pip']?></td>
    </tr>
    <tr>
      <td>Business Unit </td>
      <td bgcolor="#3BB9FF"><?php echo $objResult['business_unit']; ?></td>
      <td>&nbsp;</td>
       <td>In Care Of Email</td>
      <td bgcolor="#3BB9FF"><?php echo $objResult['in_care_email'] ?></td>
    </tr>
    <tr>
      <td>In Care Of </td>
      <td bgcolor="#3BB9FF"><?php echo $objResult['in_care_of'] ?></td>
      <td></td> 
      <td>Responsible fro Acc</td>
      <td bgcolor="#3BB9FF"><?php echo $objResult['responsible_for_acc'] ?></td>
      
    </tr>
    <tr>
      <td>Contact Number </td>
      <td bgcolor="#3BB9FF"><?php echo $objResult['contact_no'] ?><br/>
          
      </td>
      <td>&nbsp;</td>
      <td>Comments</td>
      <td bgcolor="#3BB9FF"><?php if($objResult['comments'] == NULL){ echo '--------No comment-------';} else {echo $objResult['comments']; }?></td>
    </tr>
    <tr>
        <td><p>&nbsp</p><input type="button" value="< Back" onclick="goBack()" class="login"/></td>
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
