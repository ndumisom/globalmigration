<?php session_start();?>
<li><a href="admin_index.php?m=msg">
       
        
        Messages<?php 
include_once 'class.php';
		  $call = new globalm;

$user= $_SESSION['log'];
$to = $user;

$get_messages= mysql_query("SELECT * FROM  `message` WHERE  `to` =  '$user' AND status='1'") or die(mysql_error());
$num_messages = mysql_num_rows($get_messages);                  
 if($num_messages==0){}else{
 echo '<div style="background-color:red; color:#FFFFFF; width:15px; font-size:12px"><b>'.$num_messages."</div></b>";}?> 
                </a></li>
                 <li>
                     <a href="admin_index.php?m=show_task">Tasks<?php
    include_once 'class.php';
    $call = new globalm;

    $user = $_SESSION['log'];
    $to = $user;

    $get_task = mysql_query("SELECT * FROM  `process_task_allocation` WHERE  `allocated_to` =  '$user' AND status='1'") or die(mysql_error());
    $num_task = mysql_num_rows($get_task);
    if($num_task ==0){}else{
    echo '<div style="background-color:#FFFFFF; color:#FF0000; width:15px; font-size:12px;"><b>' . $num_task . "</b></div>";}
?> </a></li>