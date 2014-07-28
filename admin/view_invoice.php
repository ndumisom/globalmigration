<?

session_start();
$id = $_GET["id"];
require_once 'database.php';
$strSQL = "SELECT * FROM invoice, invoice_description WHERE invoice_description.invoice_id = invoice.invoice_id AND invoice.invoice_id ='$id' ";
$objQuery = mysql_query($strSQL);
$row = mysql_fetch_array($objQuery);
$result = mysql_query("SELECT *FROM invoice_description WHERE  invoice_id =$id");

?>
<style>
    .table1{
        font-family: "Arial";
   
    }
</style>
<table class="table1" border="0" width="80%" cellspacing="0" cellpadding="0" 
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
    <td bgcolor="#FFFFFF" width="144" ><strong>First Name:
      
    </strong>  <?= $row['f_name'] ?></td>
    <td bgcolor="#FFFFFF" width="144" >&nbsp;</td>
            <td width="144" align="right" bgcolor="#FFFFFF"><strong>Surname</strong></td>
            <td bgcolor="#FFFFFF" width="144"><?= $row['surname']?></td>
</tr>
  <tr>
    <td  align="left" valign="top" bgcolor="#FFFFFF" ><strong>To: </strong>&nbsp;&nbsp;&nbsp;&nbsp;<?= $row['address_to'] ?></td>
    <td width="144"  align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="144" align="right" valign="top" bgcolor="#FFFFFF"><strong>Quote No </strong><br/><br/>
      <strong>Invoice No </strong><br/><br/>
        <strong>Date</strong><br/><br/>
        <strong>Email</strong></td>
    <td width="144" valign="top" bgcolor="#FFFFFF">
	<br/><br/>
         <?= $row['invoice_no']?><br/><br/>
	 <?=$row['date'] ?><br/><br/>
	 <?=$row['email_to']?> <br/></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" colspan="4" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td width="144" valign="top" bgcolor="#000" ><strong style="color:#FFFFFF"></strong></td>
    <td width="144" valign="top" bgcolor="#000" ><strong style="color:#FFFFFF"></strong></td>
    <td width="144" valign="top" bgcolor="#000" ><strong style="color:#FFFFFF"></strong></td>
    <td bgcolor="#FFFFFF" width="144">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" width="144" >Consultant: <?= $row['consultant'] ?></td>
    <td bgcolor="#FFFFFF" width="144" >Service: <?= $row['service'] ?></td>
    <td bgcolor="#FFFFFF" width="144">Payment Terms:  <?= $row['payment_terms'] ?></td>
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
  <?  $i = 0;
     while($row1 = mysql_fetch_assoc($result)){
        

     ?><tr>
     <td bgcolor="#FFFFFF" width="70%" valign="top"><p><?= $row1['description'].''.count($row1['description']) ?></p></td>
     <td bgcolor="#FFFFFF" valign="top"><p><?=$row1['professional_fees']; ?></p></td>
     <td bgcolor="#FFFFFF" valign="top"><p><?=$row1['saqa_dha_fees']; ?></p></td>
     <td bgcolor="#CCCCCC" valign="top"><p><?=$row1['line_total'];  ?></p></td>
     </tr>
     
     <? $i++;
     }
     
     ?>
   
    <tr>
    <td bgcolor="#FFFFFF" colspan="4" align="center"></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC" width="144" ><strong>Subtotal </strong></td>
    <td bgcolor="#CCCCCC" width="144" ><b>R</b><?= $row['subtotal1'] ?></td>
    <td bgcolor="#CCCCCC" width="144"><b>R </b><?= $row['subtotal2']?></td>
    <td bgcolor="#CCCCCC" width="144"><b>R </b><?= $row['subtotal3'] ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" width="144" ><strong>Vat</strong></td>
    <td bgcolor="#FFFFFF" width="144" ><b>R</b><?= $row['vat'] ?></td>
    <td bgcolor="#FFFFFF" width="144"><b>R</b> 0</td>
    <td bgcolor="#CCCCCC" width="144"><b>R</b><?= $row['vat'] ?></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC" width="144" ><strong>Total</strong></td>
    <td bgcolor="#CCCCCC" width="144" >&nbsp;</td>
    <td bgcolor="#CCCCCC" width="144">&nbsp;</td>
    <td bgcolor="#CCCCCC" width="144"><b>R </b><?= $row['total'] ?></td>
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
    <td colspan="3" bgcolor="#FFFFFF" ><?=$row['comments'] ?></td>
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
  <tr>
      <td colspan="4" bgcolor="#FFFFFF">
          <input type="button" value="< Back" onclick="goBack()" class="login"/>
      </td>
  </tr>
</table> 
