<?php session_start(); ?>
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
		<center><img src="images/globallogo.jpg"/></center>
	</div><!-- /header -->

	<div data-role="content">
	 <div data-role="header" class="ui-body ui-body-b ui-corner-all">
	<h1>Forgot Password</h1>
	</div>
	<br/>
		<?php

if( isset($_SESSION['er']) ){echo '<p class="ui-body-e" style="padding:2em; color:red;"><b>'. $_SESSION['er'].'</b></p>'; unset($_SESSION['er']);}    
if( isset($_SESSION['msg']) ){echo '<p class="ui-body-e" style="padding:2em; color:green;"><b>'. $_SESSION['msg'].'</b></p>'; unset($_SESSION['msg']);} 
  ?>
		<form name="mobile" action="p_forgot_password.php" method="post" data-ajax="false" class="ui-body ui-body-b ui-corner-all">
		<label for="email" >Email:</label>
		<input type="text" name="email" id="email" value="" placeholder="Email" required/>
		 <button type="submit" name="forgot" data-theme="b" data-mini="true" class="ui-btn-hidden" aria-disabled="false" data-ajax="false">Submit</button>
		 
		</form>
		<a href="index.php" data-role="button">Login</a>
<p> &nbsp </p><p> &nbsp </p>		
	</div><!-- /content -->
<div data-role="footer" data-theme="b">
		<h4>Global Migration SA</h4>
	</div>
</div><!-- /page -->

</body>
</html>