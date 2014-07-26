<?php
  $id = $_GET["id"];
  $db=mysql_connect  ("localhost", "root",  "mapapa1531") or die ('I cannot connect to the database  because: ' . mysql_error()); 
	  //-select  the database to use 
	  $mydb=mysql_select_db("globalmigration_db"); 
	  $strSQL = "SELECT * FROM client_details WHERE clientID = '$id' ";
?>
<table width="80%" cellspacing="0" cellpadding="0" border="1" bordercolor="#0000FF">
<tr><td>

<form name="task" action="add_task.php" method="post" class="uniForm" onsubmit="return validateForm()">
    <a href="#" style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;"><h3>Task Alocation </h3></a>
<table width="50%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
    <td><?php

if( isset($_SESSION['msg']) ){echo '<span id="msg">'. $_SESSION['msg'].'</span>'; unset($_SESSION['msg']);}
if( isset($_SESSION['error']) ){echo '<span id="error">'. $_SESSION['error'].'</span>'; unset($_SESSION['error']);}
 

       
  ?><br/></td>
  </tr>
  <tr>
    <td>Consultant</td>
    <td><input type="text" name="consultant" id="consultant" /><input type="text" name="clientID" value="<? echo $id; ?>"</td>
  </tr>
  <tr>
    <td>Allocated task </td>
    <td><input type="text" name="allocated_task" id="allocated_task"/></td>
  </tr>
  <tr>
    <td>Allocated by </td>
    <td><input type="text" name="allocated_by" id="allocated_by" /></td>
  </tr>
  <tr>
    <td>Allocated to </td>
    <td><input type="text" name="allocated_to" id="allocated_to" /></td>
  </tr>
  <tr>
    <td>Due date </td>
    <td><input type="text" name="due_date" id="due_date"/></td>
  </tr>
  <tr>
    <td>Date completed </td>
    <td><input type="text" name="date_completed" id="date_completed"/></td>
  </tr>
  <tr>
    <td>Details</td>
    <td><input type="text" name="details" id="details"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="Submit" class="login"/></td>
  </tr>
</table>
</form>
</td>
</tr>
</table>
