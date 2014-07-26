<?php session_start(); 

require 'pages/class.php';
$call = new globalm;
 if( $row = $call->printUserDetails( $_SESSION['log'] ) ){  ?>
	
	
<!--	Your last login time	<p><b>Profile</b></p>
		<table class="table table-bordered">
		  <tr style="background-color: #0088cc; color: #FFF;">
		    <td>Your Permit Status </td>
	      </tr>
		  <tr>
		    <td><?php if( $row['clientID'] ==0 ) { echo 'No status available'; }  else { echo $call->get_permit_status($row['clientID']); } ?></td>
	      </tr>
</table>-->
		<p>&nbsp;</p>
		<table class="table table-bordered">
		  <tr style="background-color: #0088cc; color: #FFF;">
		    <td>Personal Details</td>
	      </tr>
		  <tr>
		    <td>First Name(s):
            <?php if( $row['firstname'] =='' ){echo'----------------------';}else{echo strip_tags($row['firstname'],'<br><b><strong><em><i><link>');}?></td>
	      </tr>
		  <tr>
		    <td>Last Name:
            <?php if( $row['surname'] =='' ){echo'----------------------';}else{echo strip_tags($row['surname'],'<br><b><strong><em><i><link>');}?></td>
	      </tr>
		  <tr>
		    <td>Email:
            <?php if( $row['email'] =='' ){echo'----------------------';}else{echo strip_tags($row['email'],'<br><b><strong><em><i><link>');}?></td>
	      </tr>
</table>
		<p>&nbsp;</p>
		<table class="table table-bordered">
		  <tr style="background-color: #0088cc; color: #FFF;">
		    <td>Login Details </td>
	      </tr>
		  <tr>
		    <td>Username:
            <?php if( $row['email'] =='' ){echo'----------------------';}else{echo strip_tags($row['email'],'<br><b><strong><em><i><link>');}?></td>
	      </tr>
		  <tr>
		    <td>Password: **********</td>
	      </tr>
		  <tr>
		    <td><a href="index.php?page=change_password" class="btn btn-primary">Change password</a></td>
	      </tr>
</table>
<?php } ?>