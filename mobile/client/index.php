<?php session_start();
if(!isset($_SESSION['log']) ){header("location:/staff/index.php"); }
                        if(!$_SESSION['log']){header("location:logout.php"); 
                        if($_SESSION['level'] != 4){header("location:logout.php"); }}
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
		<li><a href="#home" class="ui-btn-active ui-state-persist" data-icon="home" data-ajax="false">Home</a></li>
		<li><a href="profile.php" data-icon="gear" data-ajax="false">Profile</a></li>
		<li><a href="logout.php" data-icon="minus" data-ajax="false">Logout</a></li>
	</ul>
</div><!-- /navbar -->
	<div data-role="content">
	
		<p><b>Home</b></p>		
		<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b" class="ui-listview ui-listview-inset ui-corner-all ui-shadow">
    <li data-role="list-divider" role="heading" class="ui-li ui-li-divider ui-btn ui-bar-b ui-corner-top ui-btn-up-undefined">
	Welcome <?php if(isset(  $_SESSION['log'])){ echo '<b> <font color="">'.ucfirst($_SESSION['log']).'</b></font>';}?><br/>
	</li>
    <li>At Global Migration we keep you updated with the process of your application</li>
    <li>Bare in mind the system is updated daily</li>
    <li>For more information you can contact you consultant</li>
    <li>OR click on help below</li>
</ul>
<p> &nbsp </p></div>
<div data-role="footer" data-theme="b">
		<h4>Global Migration SA <a href="help.php" data-ajax="false"">Help?</a></h4> 
	
</div><!-- /page -->

</body>
</html>