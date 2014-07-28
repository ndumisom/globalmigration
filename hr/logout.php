<?php 
session_start();
mysql_connect('localhost', 'root', 'mapapa1531') or die("Error Connecting to mysql" . mysql_error());
mysql_select_db('globalmigration_db') or die("Error Connecting to database" . mysql_error());

$logout_time = date('Y-m-d h:i:s');
$user = $_SESSION['log'];

$update = mysql_query("UPDATE  `globalmigration_db`.`logs` SET  `logout_time` =  '$logout_time' WHERE  `logs`.`username` ='$user'");
session_unset();
session_destroy(); 
header("location:../index.php");
?>
