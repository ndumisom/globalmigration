<?php 
session_start();
include_once 'database.php';

$logout_time = date('Y-m-d h:i:s');
$user = $_SESSION['log'];

$update = mysql_query("UPDATE  `globalmigration_db`.`logs` SET  `logout_time` =  '$logout_time' WHERE  `logs`.`username` ='$user'");
$setoffline = "DELETE FROM $tbl_name WHERE session = '$session'";
session_unset();
session_destroy(); 
header("location:../index.php");
?>
