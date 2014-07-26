
<?php  session_start(); 
if(!isset($_SESSION['log']) ){header("location:/staff/index.php"); }
                        if(!$_SESSION['log']){header("location:logout.php"); 
                        if($_SESSION['level'] != 5){header("location:logout.php"); }}
						
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
		<li><a href="#profile" class="ui-btn-active ui-state-persist" data-icon="gear" data-ajax="false">Profile</a></li>
		<li><a href="logout.php" data-icon="minus" data-ajax="false">Logout</a></li>
	</ul>
</div><!-- /navbar -->
<?php if( $row = $call->printUserDetails( $_SESSION['id'] ) ){  ?>
	<div data-role="content">
	
		<p><b>Profile</b></p>		
	<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b" class="ui-listview ui-listview-inset ui-corner-all ui-shadow">
    <li data-role="list-divider" role="heading" class="ui-li ui-li-divider ui-btn ui-bar-b ui-corner-top ui-btn-up-undefined">
	Your Permit Status <br/>
	</li>
    <li><?php if( $row['clientID'] ==0 ) { echo 'No status available'; }  else { echo $call->get_permit_status($row['clientID']); } ?></li>
   
</ul>

<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b" class="ui-listview ui-listview-inset ui-corner-all ui-shadow">
    <li data-role="list-divider" role="heading" class="ui-li ui-li-divider ui-btn ui-bar-b ui-corner-top ui-btn-up-undefined">
	Personal Details<br/>
	</li>
    <li>First Name(s):
	  <?php if( $row['firstname'] =='' ){echo'----------------------';}else{echo strip_tags($row['firstname'],'<br><b><strong><em><i><link>');}?>
	</li>
    <li>Last Name:
	  <?php if( $row['surname'] =='' ){echo'----------------------';}else{echo strip_tags($row['surname'],'<br><b><strong><em><i><link>');}?>
	</li>
    <li>Email:
	<?php if( $row['email'] =='' ){echo'----------------------';}else{echo strip_tags($row['email'],'<br><b><strong><em><i><link>');}?>
	</li>
</ul>
<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b" class="ui-listview ui-listview-inset ui-corner-all ui-shadow">
    <li data-role="list-divider" role="heading" class="ui-li ui-li-divider ui-btn ui-bar-b ui-corner-top ui-btn-up-undefined">
	Login Details <br/>
	</li>
    <li>Username:
	<?php if( $row['email'] =='' ){echo'----------------------';}else{echo strip_tags($row['email'],'<br><b><strong><em><i><link>');}?>
	</li>
    <li>Password: **********</li>
    <li><a href="change_password.php" data-ajax="false">Change password</a></li>
</ul>
<?php } ?>
<p> &nbsp </p>
	</div><!-- /content -->
<div data-role="footer" data-theme="b">
		<h4>Global Migration SA  <a href="help.php" data-ajax="false">Help?</a></h4>
	</div>
</div><!-- /page -->

</body>
</html>