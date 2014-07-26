<?php session_start();
if( isset($_GET['m'])){
?>
<div id="refresh2">
<ul id="menu">
<li><a href="index.php" onClick="loadPage( 'none', 'include_files.php' )">Home</a></li>
<li><a href="index.php?m=profile" onClick="loadPage( 'profile', 'profile.php');">My profile</a> </li>
<li><a href="index.php?m=msg" onClick="loadPage( 'msg', 'msg.php' );">
        Messages <?php include_once 'class.php';
		  $call = new globalm;

$user= $_SESSION['log'];
$to = $user;

$get_messages= mysql_query("SELECT * FROM  `message` WHERE  `to` =  '$user' AND status='1'") or die(mysql_error());
$num_messages = mysql_num_rows($get_messages);                  
if($num_messages==0){}else{
 echo '<div style="background-color:red; color:#FFFFFF; width:43%; font-size:12px"><b>'.$num_messages."</b></div>";}?> 
                </a></li>
                
                <li>  <a href="index.php?m=show_task" onClick="loadPage( 'show_task', 'tasks.php' );">Tasks<?php include_once 'class.php';
		  $call = new globalm;

$user= $_SESSION['log'];
$to = $user;

$get_messages= mysql_query("SELECT * FROM  `process_task_allocation` WHERE  `allocated_to` =  '$user' AND status='1'") or die(mysql_error());
$num_messages = mysql_num_rows($get_messages);                  
if($num_messages==0){}else{
 echo '<div style="background-color:red; color:#FFFFFF; width:30; font-size:12px"><b >'.$num_messages."</b></div>";} ?> </a></li>
<li> <a href="logout.php">(logout)</a></li>
</ul>
</div>
<? } 
 else{ ?>
 
 <div id="refresh2">
<ul id="menu">
<li><a href="index.php" onClick="loadPage( 'none', 'include_files.php')">Home</a></li>
<li><a href="index.php?m=profile" onClick="loadPage( 'profile', 'profile.php');">My profile</a> </li>
<li><a href="index.php?m=msg" onClick="loadPage( 'msg', 'msg.php' );">
        Messages <?php include_once 'class.php';
		  $call = new globalm;

$user= $_SESSION['log'];
$to = $user;

$get_messages= mysql_query("SELECT * FROM  `message` WHERE  `to` =  '$user' AND status='1'") or die(mysql_error());
$num_messages = mysql_num_rows($get_messages);                  
if($num_messages==0){}else{
 echo '<div style="background-color:red; color:#FFFFFF; width:43%; font-size:12px"><b>'.$num_messages."</b></div>";}?> 
                </a></li>
                
                <li>  <a href="index.php?m=show_task" onClick="loadPage( 'show_task', 'tasks.php'  );">Tasks<?php include_once 'class.php';
		  $call = new globalm;

$user= $_SESSION['log'];
$to = $user;

$get_messages= mysql_query("SELECT * FROM  `process_task_allocation` WHERE  `allocated_to` =  '$user' AND status='1'") or die(mysql_error());
$num_messages = mysql_num_rows($get_messages);                  
if($num_messages==0){}else{
 echo '<div style="background-color:red; color:#FFFFFF; width:15px; font-size:12px"><b >'.$num_messages."</b></div>";} ?> </a></li>
<li> <a href="logout.php">(logout)</a></li>
</ul>
</div>
<? } ?>