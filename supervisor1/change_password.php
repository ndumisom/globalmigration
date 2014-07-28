<table  class="table table-bordered">
  <tr>
    <td sytle="background-color: #0088cc;"> Change password</td>
  </tr>
  <tr><td>
	<?php

if( isset($_SESSION['error']) ){echo '<div class="alert alert-error">'. $_SESSION['error'].'</div>'; unset($_SESSION['error']);}
 if( isset($_SESSION['message']) ){echo '<div class="alert alert-success">'. $_SESSION['message'].'</div>'; unset($_SESSION['message']);}

       
  ?>
<form name="mobile" action="pages/p_change_password.php" method="post" data-ajax="false" class="ui-body ui-body-b ui-corner-all">
		<label for="Old Password">Old Password:</label>
		<input type="password" name="opassword" id="old_password" value="" placeholder="Old Password" required/>
		<label for="New Password">New Password:</label>
        <input type="password" name="npassword" id="password" value="" placeholder="New Password" required/>
		 <label for="confirm">Confirm:</label>
         <input type="password" name="vpassword" id="confirm_password" value="" placeholder="Confirm" required/><br/>
		 <button type="submit" name="change" data-theme="b" data-mini="true"  class="btn btn-primary" aria-disabled="false">Change</button>
		 
		</form>
  

  
  </td>
  </tr>
  </table>