
<table class="tab" width="100%" cellspacing="0" cellpadding="0" border="0" bordercolor="#0000FF">
<tr><td>

<form name="add_user" action="process_add_user.php" method="post" class="uniForm" onsubmit="return validateAdd();">
   <h3> <a href="#" style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;"> Add User  <a/></h3>
    <table width="50%" border="0" cellspacing="3" cellpadding="0">
<tr>
      <td width="33%"> </td>
      <td width="67%"><?php

if( isset($_SESSION['msg']) ){echo '<span id="msg">'. $_SESSION['msg'].'</span>'; unset($_SESSION['msg']);}
if( isset($_SESSION['error']) ){echo '<span id="error">'. $_SESSION['error'].'</span>'; unset($_SESSION['error']);}
 

       
  ?><p>&nbsp;</p>
      </td>
    </tr>
    <tr>
      <td width="33%">First Name </td>
      <td width="67%"><input type="text" name="fname" id="fname" /></td>
    </tr>
    <tr>
      <td>Surname</td>
      <td><input type="text" name="surname" id="surname" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" name="email" id="email" /></td>
    </tr>
    <tr>
      <td>Cell number </td>
      <td><input type="text" name="cell_no" id="cell_no" /></td>
    </tr>
    <tr>
      <td>Level</td>
      <td><select name="level" id="level">
        <option value="">--user level--</option>
		<option value="2">Consultant</option>
		<option value="3">Staff</option>
		
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Submit" class="login" onclick="return validateAdd();" /></td>
    </tr></form>
  </table>
  <p>&nbsp;</p>
  

 <p>&nbsp;</p> <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
</td></tr>
</table>
