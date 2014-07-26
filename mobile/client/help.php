<?php  session_start(); 
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
	<style>
	.table-bordered {
	background: #eee;
border: 1px solid #0088cc;
border-collapse: separate;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;
}
table {
width: 100%;
margin-bottom: 20px;
}.table-bordered th, .table-bordered td {
border-left: 0px solid #dddddd;
}
th,td {
padding: 8px;
line-height: 20px;
text-align: left;
vertical-align: top;
border-top: 1px solid #dddddd;
}
	</style>
	
</head> 
<body> 

<div data-role="page" data-theme="b">

	<div data-role="header" data-theme="b">
		<center><img src="../images/globallogo.jpg"/></center>
	</div><!-- /header -->
 <div data-role="navbar" data-iconpos="left">
	<ul>
		<li><a href="index.php" data-icon="home" data-ajax="false">Home</a></li>
		<li><a href="profile.php" data-icon="gear" data-ajax="false">Profile</a></li>
		<li><a href="logout.php" data-icon="minus" data-ajax="false">Logout</a></li>
	</ul>
</div><!-- /navbar -->
	<div data-role="content">
	
		<p><b>Help</b></p>		
	<table data-role="table" id="table-column-toggle" data-mode="columntoggle" class="table-bordered">
     <thead>
       <tr>
         <th data-priority="2">No#</th>
         <th data-priority="2">Name</th>
         <th data-priority="3">Description</th>
         
       </tr>
     </thead>
     <tbody>
       <tr>
         <th>1</th>
         <td>Current valid TRP</td>
         <td>1941</td>
         
       </tr>
       <tr>
         <th>2</th>
         <td>Expired</td>
         <td>1942</td>
        
       </tr>
       <tr>
         <th>3</th>
         <td>File close</td>
         <td>1972</td>
         
       </tr>
       <tr>
         <th>4</th>
         <td>Finalised</td>
         <td>1939</td>
         
       </tr>
       <tr>
         <th>5</th>
         <td>Memo issued</td>
         <td>1962</td>
         
       </tr>
       <tr>
         <th>6</th>
         <td>Pending at DHA</td>
         <td>1964</td>
         
       </tr>
       <tr>
         <th>7</th>
         <td>PR Endorsed</td>
         <td>1967</td>
        
       </tr>
       <tr>
         <th>8</th>
         <td>Pre-Submission</td>
         <td>1939</td>
        
       </tr>
       <tr>
         <th>9</th>
         <td>Rejected</td>
         <td>1952</td>
       
       </tr>
       <tr>
         <th>10</th>
         <td class="title">TRP Endorsed</td>
         <td>2010</td>
         
       </tr>
     </tbody>
   </table>
<p> &nbsp </p>
	</div><!-- /content -->
<div data-role="footer" data-theme="b">
		<h4>Global Migration SA  <a href="#help" class="ui-btn-active ui-state-persist" data-ajax="false">Help?</a></h4>
	</div>
</div><!-- /page -->

</body>
</html>