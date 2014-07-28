<table width="80%" cellspacing="0" cellpadding="0" border="1" bordercolor="#0000FF">


<tr><td>
<br/>
<font color="#0000FF">

Seach for the client that you want to allocate a task
<br/>

<form name="search" action="" method="post">
  <table width="20%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><input type="text" name="name" id="search-text1"/></td>
    <td><input  type="submit" name="submit" id="search-submit" value="Search" class="login"/></td>
  </tr>
</table>
</form>

<?
 if(isset($_POST['submit'])){ 
	  if(preg_match("/^[  a-zA-Z]+/", $_POST['name'])){ 
	  $name=$_POST['name']; 
	  //connect  to the database 
	  $db=mysql_connect  ("localhost", "root",  "mapapa1531") or die ('I cannot connect to the database  because: ' . mysql_error()); 
	  //-select  the database to use 
	  $mydb=mysql_select_db("globalmigration_db"); 
	  //-query  the database table 
	  $sql="SELECT  *FROM client_details WHERE firstnames LIKE '%" . $name .  "%' OR surname LIKE '%" . $name ."%' OR file_no LIKE '%" . $name ."%'"; 
	  //-run  the query against the mysql query function 
	  $result=mysql_query($sql); 
          $numrows=mysql_num_rows($result); 
	  //-create  while loop and loop through result set
	  while($row=mysql_fetch_array($result)){ 
	          $firstname  =$row['firstnames']; 
	          $surname=$row['surname']; 
                  $file_no=$row['file_no']; 
	          $userID=$row['clientID']; 
                  $isSearchFound = true;
	 if($isSearchFound){
	  //-display the result of the array 
	
	  echo "<ul>\n"; 
	  echo "<li>" . "<a  href=\"#\">"   .$firstname . " &nbsp;&nbsp;&nbsp;  " . $surname ."   &nbsp;&nbsp;&nbsp; ".$file_no. "</a></li>\n"; 
	  echo "</ul>"; 
	  }
 else {
              echo "<h1>No results found.</h1>";
}
	  } }

   
	  else{ 
	  echo  " <br/> <p>Please enter a search query</p>"; 
	  } 
	  
	  } 
	?>

</font>&nbsp;
<tr>
<td>
<form name="permit" action="p_alter_permit.php" method="post" class="uniForm" onsubmit="return validatePermit()">
  <h3> Permit Applications</h3>
  <table width="50%" border="0" cellspacing="3" cellpadding="0">
    <tr>
      <td colspan="2" align="center"><?php
require_once 'add_client_details.php';
//$_SESSION['file_no']= trim($_POST['file_no']);
//$_SESSION['firstname'] = ucfirst(trim($_POST['firstnames']));
$file_no = trim($_POST['file_no']); ;
$firstname= ucfirst(trim($_POST['firstnames']));
$id = mysql_query("select clientID from client_details where firstnames='$firstnames' and file_no ='$file_no' ");
$row = mysql_fetch_array($id);

if( isset($_SESSION['msg']) ){echo '<span id="msg">'. $_SESSION['msg'].'</span>'; unset($_SESSION['msg']);}
if( isset($_SESSION['error']) ){echo '<span id="error">'. $_SESSION['error'].'</span>'; unset($_SESSION['error']);}

    
?></td>
      </tr>
    <tr>
      <td>Client id</td>
      <td><input type="hidden" name="clientID" value="<?php echo $userID; ?>" disabled="disabled" /></td>
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
      <td>Permit Category </td>
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
      <td>Exipiry Date </td>
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
      <td>J Invoive No </td>
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
      <td><input type="submit" name="Submit" value="Update" class="login" /></td>
    </tr>
  </table>
</form>
</td>
</tr>
</table>
