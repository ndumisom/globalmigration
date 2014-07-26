
<?php  session_start(); 
if(!isset($_SESSION['log']) ){header("location:/staff/index.php"); }
                        if(!$_SESSION['log']){header("location:logout.php"); 
                        if($_SESSION['level'] != 4){header("location:logout.php"); }}
						
require '../../client/class.php';
$call = new globalm ;
 ?> 
<!DOCTYPE html> 
<html> 
<head> 
	<title>Global Migration SA</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="SHORTCUT ICON" href="../images/icon.png"> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.1/jquery.mobile-1.2.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.1/jquery.mobile-1.2.1.min.js"></script>
	
</head> 
<body> 

<div data-role="page" data-theme="b">

	<div data-role="header" data-theme="b">
		<center><img src="../images/globallogo.jpg"/></center>
	</div><!-- /header -->
 <div data-role="navbar" data-iconpos="left">
	<ul>
		<li><a href="index.php" data-icon="home" data-ajax="false">Home</a></li>
		<li><a href="profile.php" class="ui-btn-active ui-state-persist" data-icon="gear" data-ajax="false">Profile</a></li>
		<li><a href="logout.php" data-icon="minus" data-ajax="false">Logout</a></li>
	</ul>
</div><!-- /navbar -->
	<div data-role="content">
	
		<p><b>Change password</b></p>	
  		<?php

if( isset($_SESSION['error']) ){echo '<p class="ui-body-e" style="padding:2em; color:red;"><b>'. $_SESSION['error'].'</b></p>'; unset($_SESSION['error']);}
 if( isset($_SESSION['message']) ){echo '<p class="ui-body-e" style="padding:2em; color:green;"><b>'. $_SESSION['message'].'</b></p>'; unset($_SESSION['message']);}

       
  ?>		
	<form name="mobile" action="p_change_password.php" method="post" data-ajax="false" class="ui-body ui-body-b ui-corner-all">
		<label for="Old Password">Old Password:</label>
		<input type="password" name="opassword" id="old_password" value="" placeholder="Old Password" required/>
		<label for="New Password">New Password:</label>
        <input type="password" name="npassword" id="password" value="" placeholder="New Password" required/>
		 <label for="confirm">Confirm:</label>
         <input type="password" name="vpassword" id="confirm_password" value="" placeholder="Confirm" required/>
		 <button type="submit" name="change" data-theme="b" data-mini="true" class="ui-btn-hidden" aria-disabled="false">Change</button>
		 
		</form>
<p> &nbsp </p>
	</div><!-- /content -->
<div data-role="footer" data-theme="b">
		<h4>Global Migration SA  <a href="help.php" data-ajax="false">Help?</a></h4>
	</div>
</div><!-- /page -->

</body>
</html>