<?php

session_start();
$session=session_id();
$time=time();
$time_check=$time-300; //SET TIME 10 Minute

include_once 'database.php';
$tbl_name="user_online"; // Table name

$sql="SELECT * FROM $tbl_name WHERE session='$session'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
$username = $_SESSION['log'];
   if($username) {
if($count=="0"){

$sql1="INSERT INTO $tbl_name VALUES(null, '$username', '$session', '$time')";
$result1=mysql_query($sql1);
}

else {
"$sql2=UPDATE $tbl_name SET time='$time' WHERE session = '$session'";
$result2=mysql_query($sql2);
}

// if over 10 minute, delete session 
$sql4="DELETE FROM $tbl_name WHERE time<$time_check";
$result4=mysql_query($sql4);
// Open multiple browser page for result
   }
   // if over 10 minute, delete session 
$sql4="DELETE FROM $tbl_name WHERE time<$time_check";
$result4=mysql_query($sql4);
// Open multiple browser page for result

// Close connection
mysql_close();
?>


